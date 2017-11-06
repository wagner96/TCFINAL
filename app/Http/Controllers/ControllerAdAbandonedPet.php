<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
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

    // Index admin
    public function index(Request $request)
    {
        $search = $request->pesq;

        $pets = $this->searchPetsAdmin($search);

        return view('admin.adverts.abandoned.allAdAbandoned', compact('pets'));
    }

    public function removeAccent($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
    }

//Enviar email para adotante

    public function sendEmail(Request $request)
    {
        $idPet = $request->id_pet;
        try {
            $data['namePet'] = $request->name_pet;
            $data['nameUser'] = $request->name;
            $data['phone'] = $request->phone;
            $data['email'] = $request->email;
            $data['msn'] = $request->msg;
            $data['email_to'] = $request->email_user;

            Mail::send('emails.mail', $data, function ($message) use ($data) {

                $message->to($data['email_to'], '')
                    ->subject('Adote um amigo');
                session()->flash('flash_message', 'E-mail enviado com sucesso!!!');

            });
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao enviar e-mail!!!');
        }
        return redirect('animal/' . $idPet);
    }


//Filtro admin
    public function searchPetsAdmin($search)
    {
        if ($search != null) {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->where('name_pet', 'like', '%' . $search . '%')
                ->paginate(6);
        } else {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->orderByDesc('id')
                ->paginate(6);
        }

        return $pets;
    }

    public function create()
    {
        return view('admin.adverts.abandoned.createAdAbandoned');
    }

// Index all pets users
    public function listIndex(Request $request)
    {
        try {
            $search = $request->pesq;

            $pets = $this->searchPetsUsers($search);

            if ($search != '') {
                $pets = $this->searchPetsUsers($search);
                return view('petsAbandoned', compact('pets'));
            }
            if ($request->order != null || $request->specie != null || $request->state_pet != null) {
                $pets = $this->filter($request);
                if ($pets == null) {
                    $pets = $this->searchPetsUsers($search);
                }
            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }

        return view('petsAbandoned', compact('pets'));
    }

//Filtro users
    public function searchPetsUsers($search)
    {

        if ($search != null) {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->where('active_pet', '=', '1')
                ->where('name_pet', 'like', '%' . $search . '%')
                ->paginate(6);
        } else {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->where('active_pet', '=', '1')
                ->orderByDesc('id')
                ->paginate(6);
        }

        return $pets;
    }

    //Filtro para gatos, chachorros, etc
    public function filter(Request $request)
    {

        try {
            $order_pet = $request->order;
            $specie_pet = $request->specie;
            $state_pet = $request->state_pet;

            if ($order_pet == 'last') {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->orderByDesc('id')
                    ->paginate(6);
            } else if ($order_pet == 'first') {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->paginate(6);
            } else if ($specie_pet == 'dog') {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->where('species_pet', '=', 'Cachorro')
                    ->paginate(6);
            } else if ($specie_pet == 'cat') {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->where('species_pet', '=', 'Gato')
                    ->paginate(6);
            } else if ($specie_pet == 'other') {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->where('species_pet', '=', 'Outros')
                    ->paginate(6);
            } else if ($state_pet != null) {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('active_pet', '=', '1')
                    ->where('state_pet', "=", $state_pet)
                    ->orderByDesc('id')
                    ->paginate(6);
            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }

        return $pets;
    }

    public function store(Request $request)
    {
        try {
            $request['user'] = auth()->user()->id;
            $this->validate($request, [
                'name_pet' => 'required|alpha_spaces',
                'age_pet' => 'AlphaNum|min:0|max:15',
                'movie_pet' => '',
                'city_pet' => 'required|alpha_spaces',
                'personality_pet' => 'required',
                'photos' => 'max:8',
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
                    $s_photo = $this->removeAccent($photo->getClientOriginalName());
                    $photo_name = time() . $s_photo;
                    $photo->move('images/Pets Abandoned', $photo_name);
                    $photos_pet->pet_id = $fk_pet;
                    $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                    $photos_pet->save();
                    unset($photos_pet);
                }
            }
            session()->flash('flash_message', 'Anúncio salvo!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao salvar!!!');
        }
        return redirect()->route('admin.adverts.abandoned.index');
    }

    public function show($id)
    {
        try {
            $pet = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        return view('showPet', compact('pet'));
    }


    public function edit($id)
    {
        try {
            $dataPet = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        return view('admin.adverts.abandoned.editAdAbandoned', compact('dataPet'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name_pet' => 'required|alpha_spaces',
                'age_pet' => 'AlphaNum|min:0|max:15',
                'movie_pet' => '',
                'city_pet' => 'required|alpha_spaces',
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
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao editar!!!');
        }
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
        try {
            $test = DB::table('pets')
                ->where('id', $id)
                ->update(['active_pet' => 0]);
            session()->flash('flash_message', 'Anúncio desativado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao ativar!!!');
        }
        return redirect()->route('admin.adverts.abandoned.index');
    }

    public function desactive($id)
    {
        try {
            DB::table('pets')
                ->where('id', $id)
                ->update(['active_pet' => 1]);
            session()->flash('flash_message', 'Anúncio ativado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao desativar!!!');
        }
        return redirect()->route('admin.adverts.abandoned.index');
    }

}
