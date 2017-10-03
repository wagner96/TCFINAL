<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TC\Models\AdPetAbandoned;
use TC\Models\Pet;
use TC\Models\PhotosPet;


class ControllerAdAbandonedPet extends Controller
{

    public function index()
    {
        return view('admin.advertisings.allAdAbandoned');
    }

    public function create()
    {
        return view('admin.advertisings.createAdAbandoned');
    }

    public function listAd(){
        $adPets = DB::table('users')
            ->join('pets', 'users.id', '=', 'pets.fkUser')
            ->join('ad_pet_abandoneds', 'pets.id','=','ad_pet_abandoneds.fkPet' )
            ->paginate(6);
        return \Response::json($adPets);
    }
    public function store(Request $request)
    {


        $pet = new Pet();

        $data = $request->all();
        $data['fkUser'] = auth()->user()->id;
        $array_pet = $pet->create($data);

        $data = $request->all();

        $adAbandoned = new AdPetAbandoned();
        $data['fkPet'] = $array_pet['id'];

        $adAbandoned->create($data);

        $fk_pet = $data['fkPet'];

        if ($request->hasFile('photos')) {
            $photos = $request->photos;
            $i = 0;
            foreach ($photos as $photo) {
                $photos_pet = new PhotosPet();
                $photo_name = time() . $photo->getClientOriginalName();
                $photo->move('images/Pets Disappeared', $photo_name);
                $photos_pet->fkPet = $fk_pet;
                $photos_pet->url = 'images/Pets Disappeared/' . $photo_name;
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
return $id;
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }


}
