<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use TC\Repositories\PhotosPetRepository;

class ControllerPhotosPet extends Controller
{
    private $image;

    public function __construct(PhotosPetRepository $repository)
    {
        $this->image = $repository;
    }

    public function uploadImages(Request $request)
    {
//        $file = $request->file('file');
//
//        $filename = uniqid().$file->getClientOriginalName();
//
//        $file->mode('images', $filename);
//
//        $url = 'imagens/'.$filename;
//
//        $data = $request->all();
        $photo = Input::all();
        $response= $this->image->upload($photo);
        return $response;


    }

}
