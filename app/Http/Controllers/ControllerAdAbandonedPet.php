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
        return view('admin.adverts.abandoned.allAdAbandoned');
    }

    public function create()
    {
        return view('admin.adverts.abandoned.createAdAbandoned');
    }

    public function listAd()
    {
        $adPets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->paginate(6);

        return \Response::json($adPets);
    }

    public function store(Request $request)
    {
        $request['user'] = auth()->user()->id;
        $this->validate($request, [
            'name_pet' => 'required|Alpha',
            'age_pet' => 'AlphaNum|min:0|max:15',
            'movie_pet' => '',
            'city_pet' => 'required|Alpha',
            'personality_pet' => 'required',
            'photos' => 'mimes:jpeg,bmp,png,jpg,gif',
            'user' => 'required',
        ]);
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
                $photos_pet->pet_id = $fk_pet;
                $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                $photos_pet->save();
                unset($photos_pet);
            }
        }
        session()->flash('flash_message', 'Anúncio salvo!!!');

        return redirect()->route('admin.adverts.abandoned.index');
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

        return view('admin.adverts.abandoned.editAdAbandoned', compact('dataPet'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_pet' => 'required|Alpha',
            'age_pet' => 'AlphaNum|min:0|max:15',
            'movie_pet' => '',
            'city_pet' => 'required|Alpha',
            'personality_pet' => 'required',
            'photos' => 'mimes:jpeg,bmp,png,jpg,gif',
        ]);
        $data = $request->all();
        $personality_pet = $request->get('personality_pet');

        $this->repository->update($data, $id);

        DB::table('ad_pet_abandoned')
            ->where('pet_id', $id)
            ->update(['personality_pet' => $personality_pet]);

        session()->flash('flash_message', 'Anúncio foi editado com sucesso!!!');

        return redirect()->route('admin.adverts.abandoned.index');


    }


    public function destroy($id)
    {
//
        $dataPet = DB::table('pets')
            ->where('pets.id', '=', $id)
            ->join('ad_pet_abandoned', 'pets.id', '=', 'ad_pet_abandoned.fkPet')
            ->join('photos_pets', 'pets.id', '=', 'photos_pets.fkPet')
            ->get();
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
        session()->flash('flash_message', 'Anúncio desativado!!!');

        return redirect()->route('admin.adverts.abandoned.index');
    }

    public function desactive($id)
    {
        DB::table('pets')
            ->where('id', $id)
            ->update(['active_pet' => 1]);
        session()->flash('flash_message', 'Anúncio ativado!!!');

        return redirect()->route('admin.adverts.abandoned.index');
    }

}
