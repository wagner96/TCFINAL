<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use TC\Models\AdPetAbandoned;
use TC\Models\Pet;
use TC\Models\PhotosPet;


class ControllerAdAbandonedPet extends Controller
{

    //
    public function index()
    {
        return view('admin.advertisings.allAdAbandoned');
    }

    public function create()
    {
        return view('admin.advertisings.createAdAbandoned');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //echo "<pre>";
        //  print_r($user);
        //echo "</pre>";
        return view('show', array('user' => $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function post_upload(Request $request)
    {


        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $photo = new PhotosPet();
        $photo->url = $imageName;
        // $photo->save();


        return response()->json(['success' => $imageName]);

    }

}
