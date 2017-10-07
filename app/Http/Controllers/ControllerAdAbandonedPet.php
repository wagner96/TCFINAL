<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TC\Models\AdPetAbandoned;
use TC\Models\Pet;
use TC\Models\PhotosPet;
use TC\Repositories\PetRepository;


class ControllerAdAbandonedPet extends Controller
{

    private $repository;

    public function __construct(PetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('admin.advertisings.allAdAbandoned');
    }

    public function create()
    {
        return view('admin.advertisings.createAdAbandoned');
    }

    public function listAd()
    {
//        $adPets = DB::table('users')
//            ->join('pets', 'users.id', '=', 'pets.fkUser')
//            ->join('ad_pet_abandoneds', 'pets.id', '=', 'ad_pet_abandoneds.fkPet')
//            ->paginate(6);
        $adPets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->paginate(6);

        return \Response::json($adPets);
    }

    public function store(Request $request)
    {
        $pet = new Pet();

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $array_pet = $pet->create($data);
        $data = $request->all();
        $adAbandoned = new AdPetAbandoned();
        $data['pet_id'] = $array_pet['id'];
        $adAbandoned->create($data);
        $fk_pet = $data['pet_id'];
        if ($request->hasFile('photos')) {
            $photos = $request->photos;
            $i = 0;
            foreach ($photos as $photo) {
                $photos_pet = new PhotosPet();
                $photo_name = time() . $photo->getClientOriginalName();
                $photo->move('images/Pets Abandoned', $photo_name);
                $photos_pet->fkPet = $fk_pet;
                $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                $photos_pet->save();
                unset($photos_pet);
            }
        }

        return redirect()->route('admin.advertising.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        //echo "<pre>";
        //  print_r($user);
        //echo "</pre>";
        return view('show', array('user' => $user));
    }


    public function edit($id)
    {
        $dataPet = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->find($id);

        return view('admin.advertisings.editAdAbandoned', compact('dataPet'));
    }

    public function update(Request $request, $id)
    {
//        $data = $request->all();
//        $data = request()->except(['_token']);
//        $test =
//        Pet::with(['AdPetAbandoned'])->update($data, $id);
//        return view('admin.advertisings.allAdAbandoned');

    }


    public function destroy($id)
    {
//
//        $dataPet = DB::table('pets')
//            ->where('pets.id', '=', $id)
//            ->join('ad_pet_abandoneds', 'pets.id', '=', 'ad_pet_abandoneds.fkPet')
//            ->join('photos_pets', 'pets.id', '=', 'photos_pets.fkPet')
//            ->get();
//        $dataPhoto = DB::table('photos_pets')
//            ->select('url')
//            ->where('fkPet','=', $id)
//            ->get();
//
//
//        foreach ($dataPhoto as $url){
//            File::delete($url);
//        }

    }

    public function active($id)
    {
        $test = DB::table('pets')
            ->where('id', $id)
            ->update(['active_pet' => 0]);

        return redirect()->route('admin.advertising.index');
    }

    public function desactive($id)
    {
        DB::table('pets')
            ->where('id', $id)
            ->update(['active_pet' => 1]);
        return redirect()->route('admin.advertising.index');
    }

}
