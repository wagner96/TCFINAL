<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use TC\Models\Pet;
use TC\Repositories\PetRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PetRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function index()
    {
        $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->paginate(8);
        return view('index', compact('pets'));
    }

    public function listAbandoned()
    {
        $adPets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->paginate(6);
        return \Response::json($adPets);
    }
}
