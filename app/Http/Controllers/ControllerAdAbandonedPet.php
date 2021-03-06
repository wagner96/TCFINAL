<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use TC\Models\AdPetAbandoned;
use TC\Models\Pet;
use TC\Models\PhotosPet;
use TC\Models\User;
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

    public function removeCharacters($string)
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
        return redirect('abandonados/animal/' . $idPet);
    }


//Filtro admin
    public function searchPetsAdmin($search)
    {
        if ($search != null) {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->where('type', '=', 'abandoned')
                ->where('name_pet', 'like', '%' . $search . '%')
                ->paginate(6)
                ->appends('pesq', request('pesq'));
        } else {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->where('type', '=', 'abandoned')
                ->orderByDesc('id')
                ->paginate(6)
                ->appends('pesq', request('pesq'));
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

            $order_pet = $request->order;
            $specie_pet = $request->specie;
            $state_pet = $request->state_pet;
            $pesq_pet = $request->pesq;

            $pets = $this->filter($request);
            if (($order_pet == null) and ($specie_pet == null) and ($state_pet == null) and ($pesq_pet == null)) {


                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('type', '=', 'abandoned')
                    ->where('active_pet', '=', '1')
                    ->orderByDesc('id')
                    ->paginate(6);
            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        $i = 0;
        foreach ($pets as $pet) {
            $parts = explode(' ', $pet->user->name);
            $firtName = array_shift($parts);
            $lastName = array_pop($parts);
            $name = $firtName . ' ' . $lastName;
            $pets[$i]->user->name = $name;
            $i++;
            $name = "";
        }
        return view('petsAbandoned', compact('pets'));
    }


    //Filtro e pesquisa para gatos, chachorros, etc
    public function filter(Request $request)
    {

        try {
            $order_pet = $request->order;
            $specie_pet = $request->specie;
            if ($specie_pet == "null") {
                $specie_pet = null;
            }
            $state_pet = $request->state_pet;
            if ($state_pet == "null") {
                $state_pet = null;
            }
            $pesq_pet = $request->pesq;

            if (($order_pet == "last" || $order_pet == 'null' || $order_pet == '')) {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('type', '=', 'abandoned')
                    ->where('active_pet', '=', '1')
                    ->where('name_pet', 'like', '%' . $pesq_pet . '%')
                    ->where('species_pet', 'like', '%' . $specie_pet . '%')
                    ->where('state_pet', 'like', '%' . $state_pet . '%')
                    ->orderByDesc('id')
                    ->paginate(6);
            } else {
                $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                    ->where('type', '=', 'abandoned')
                    ->where('active_pet', '=', '1')
                    ->where('name_pet', 'like', '%' . $pesq_pet . '%')
                    ->where('species_pet', 'like', '%' . $specie_pet . '%')
                    ->where('state_pet', 'like', '%' . $state_pet . '%')
                    ->paginate(6);
            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }

        return $pets;
    }

    public function validateMovie($url)
    {
        $regex_pattern = "/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/";
        $match;
        if (preg_match($regex_pattern, $url, $match)) {
            $resp = true;
        } else {
            $resp = false;
        }
        return $resp;
    }

    public function store(Request $request)
    {
        try {
            $request['user'] = auth()->user()->id;
            $this->validate($request, [
                'name_pet' => 'required|alpha_spaces',
                'movie_pet' => '',
                'city_pet' => 'required|alpha_spaces',
                'personality_pet' => 'required',
                'photos' => 'max:8',
                'user' => 'required',
            ]);
            $pet = new Pet();

            $data = $request->all();

            if ($data['movie_pet'] != null) {
                $validate_movie = $this->validateMovie($data['movie_pet']);
                if ($validate_movie == false) {
                    session()->flash('flash_error', 'Link de vídeo inválido!!!');
                    return $this->create();
                }
            }
            $data['active_pet'] = 1;
            $data['type'] = 'abandoned';
            $data['user_id'] = auth()->user()->id;
            $array_pet = $pet->create($data);
            $data = $request->all();

            $adAbandoned = new AdPetAbandoned();
            $data['pet_id'] = $array_pet['id'];
            $request['active_pet'] = 1;
            $adAbandoned->create($data);
            $fk_pet = $data['pet_id'];
            if ($request->hasFile('photos')) {
                $photos = $request->photos;
                $i = 0;
                foreach ($photos as $photo) {
                    $photos_pet = new PhotosPet();
                    $s_photo = $this->removeCharacters($photo->getClientOriginalName());
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


//Users salva pet
    public function storePet(Request $request)
    {
        try {
            $request['user'] = auth()->user()->id;
            $this->validate($request, [
                'name_pet' => 'required|alpha_spaces',
                'movie_pet' => '',
                'city_pet' => 'required|alpha_spaces',
                'personality_pet' => 'required',
                'photos' => 'max:8',
                'user' => 'required',
            ]);
            $pet = new Pet();

            $data = $request->all();
            if ($data['movie_pet'] != null) {
                $validate_movie = $this->validateMovie($data['movie_pet']);
                if ($validate_movie == false) {
                    session()->flash('flash_error', 'Link de vídeo inválido!!!');
                    return view("createAdPetAban");
                }
            }

            $data['user_id'] = auth()->user()->id;
            $data['active_pet'] = 0;
            if (auth()->user()->role == 'admin') {
                $data['active_pet'] = 1;
            }
            $data['type'] = 'abandoned';
            $array_pet = $pet->create($data);
            $data = $request->all();

            $adAbandoned = new AdPetAbandoned();
            $data['pet_id'] = $array_pet['id'];

            $email['name_pet'] = $array_pet['name_pet'];
            $email['name_user'] = auth()->user()->name;
            $adAbandoned->create($data);
            $fk_pet = $data['pet_id'];
            if ($request->hasFile('photos')) {
                $photos = $request->photos;
                $i = 0;
                foreach ($photos as $photo) {
                    $photos_pet = new PhotosPet();
                    $s_photo = $this->removeCharacters($photo->getClientOriginalName());
                    $photo_name = time() . $s_photo;
                    $photo->move('images/Pets Abandoned', $photo_name);
                    $photos_pet->pet_id = $fk_pet;
                    $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                    $photos_pet->save();
                    unset($photos_pet);
                }
            }
            if (auth()->user()->role != 'admin') {
                $users = User::where('role', '=', 'admin')
                    ->select('email')
                    ->get();
                foreach ($users as $user) {
                    $email['email_to'] = $user['email'];
                    Mail::send('emails.newAd', $email, function ($message) use ($email) {

                        $message->to($email['email_to'], '')
                            ->subject('Adote um amigo (Anúncio para análise)');

                    });
                }
            }
            session()->flash('flash_message', 'Anúncio salvo, em breve ele estará disponível para visualização!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao salvar!!!');
        }
        return redirect()->route('homeController.createAdAbandoned');
    }


    public function show($id)
    {
        try {
            $pet = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
                ->find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        return view('showPetAbandoned', compact('pet'));
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

    //User edita pet
    public function editPet($id)
    {
        try {
            $dataPet = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        return view('editAdPetAban', compact('dataPet'));
    }

    public function update(Request $request, $id)
    {
        try {
        $this->validate($request, [
            'name_pet' => 'required|alpha_spaces',
            'movie_pet' => '',
            'city_pet' => 'required|alpha_spaces',
            'personality_pet' => 'required',
            'photos' => 'max:8',
        ]);

        $data = $request->all();

        if ($data['movie_pet'] != null) {
            $validate_movie = $this->validateMovie($data['movie_pet']);
            if ($validate_movie == false) {
                session()->flash('flash_error', 'Link de vídeo inválido!!!');
                return $this->edit($id);
            }
        }
        $personality_pet = $request->get('personality_pet');
        $this->repository->update($data, $id);

        DB::table('ad_pet_abandoned')
            ->where('pet_id', $id)
            ->update(['personality_pet' => $personality_pet]);
        $data = $request->all();
        if ($request['photos']['0'] != null) {
            $photos = $request->photos;
            $i = 0;
            foreach ($photos as $photo) {
                $photos_pet = new PhotosPet();
                $s_photo = $this->removeCharacters($photo->getClientOriginalName());
                $photo_name = time() . $s_photo;
                $photo->move('images/Pets Abandoned', $photo_name);
                $photos_pet->pet_id = $id;
                $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                $photos_pet->save();
                unset($photos_pet);
            }
        }

        session()->flash('flash_message', 'Anúncio foi editado com sucesso!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao editar!!!');
        }
        return redirect()->route('admin.adverts.abandoned.index');

    }

    public function updatePet(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name_pet' => 'required|alpha_spaces',
                'movie_pet' => '',
                'city_pet' => 'required|alpha_spaces',
                'personality_pet' => 'required',
                'photos' => 'max:8',
            ]);

            $data = $request->all();
            if ($data['movie_pet'] != null) {
                $validate_movie = $this->validateMovie($data['movie_pet']);
                if ($validate_movie == false) {
                    session()->flash('flash_error', 'Link de vídeo inválido!!!');
                    return $this->editPet($id);
                }
            }
            $data['active_pet'] = 0;
            if (auth()->user()->role == 'admin') {
                $data['active_pet'] = 1;
            }
            $personality_pet = $request->get('personality_pet');

            $this->repository->update($data, $id);

            DB::table('ad_pet_abandoned')
                ->where('pet_id', $id)
                ->update(['personality_pet' => $personality_pet]);

            $email['name_pet'] = $data['name_pet'];
            $email['name_user'] = auth()->user()->name;
            if (auth()->user()->role != 'admin') {
                $users = User::where('role', '=', 'admin')
                    ->select('email')
                    ->get();
                foreach ($users as $user) {
                    $email['email_to'] = $user['email'];
                    Mail::send('emails.newAd', $email, function ($message) use ($email) {

                        $message->to($email['email_to'], '')
                            ->subject('Adote um amigo (Anúncio para análise)');

                    });
                }
            }
            if ($request['photos']['0'] != null) {
                $photos = $request->photos;
                $i = 0;
                foreach ($photos as $photo) {
                    $photos_pet = new PhotosPet();
                    $s_photo = $this->removeCharacters($photo->getClientOriginalName());
                    $photo_name = time() . $s_photo;
                    $photo->move('images/Pets Abandoned', $photo_name);
                    $photos_pet->pet_id = $id;
                    $photos_pet->url = 'images/Pets Abandoned/' . $photo_name;
                    $photos_pet->save();
                    unset($photos_pet);
                }
            }
            session()->flash('flash_message', 'Anúncio editado, em breve ele estará disponível para visualização!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao editar!!!');
        }
        return redirect()->route('myPetsForAdoption');

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

    public function myPetsForAdoption(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Você não esta logado!!!');
            return redirect()->route('homeController.index');
        }

        try {
            $pets = $this->searchMyPetsForAdoption($request->pesq, $user_id);

        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao buscar!!!');
        }
        return view('myPetsAbandoned', compact('pets'));
    }

    public function searchMyPetsForAdoption($pesq, $user_id)
    {
        if ($pesq != null) {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet'])
                ->where('type', '=', 'abandoned')
                ->where('active_pet', '=', '1')
                ->where('user_id', '=', $user_id)
                ->where('name_pet', 'like', '%' . $pesq . '%')
                ->orderByDesc('id')
                ->paginate(6)
                ->appends('pesq', request('pesq'));
        } else {
            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet'])
                ->where('type', '=', 'abandoned')
                ->where('active_pet', '=', '1')
                ->where('user_id', '=', $user_id)
                ->orderByDesc('id')
                ->paginate(6)
                ->appends('pesq', request('pesq'));
        }
        return $pets;
    }

    public function deletePhoto($id)
    {
        try {
            $photo = DB::table('photos_pets')
                ->where('id', '=', $id)
                ->get();

            unlink($photo[0]->url);

            DB::table('photos_pets')
                ->where('id', '=', $id)
                ->delete();

            session()->flash('flash_message', 'Imagem excluida!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao excluir imagem!!!');

        }

        return redirect($_SERVER['HTTP_REFERER']);

    }

    public function deleteMyPetForAdoption($id)
    {
        try {
            $test = DB::table('pets')
                ->where('id', $id)
                ->update(['active_pet' => 0]);
            session()->flash('flash_message', 'Anúncio excluido!!!');

        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao excluir!!!');
        }
        return redirect()->route('myPetsForAdoption');
//        try {
//            $user_id = auth()->user()->id;
//        } catch (\Exception $e) {
//            session()->flash('flash_error', 'Você não esta logado!!!');
//            return redirect()->route('homeController.index');
//        }
//
//        try {
//            $pets = Pet::with(['AdPetAbandoned', 'PhotosPet'])
//                ->where('active_pet', '=', '1')
//                ->where('user_id', '=', $user_id)
//                ->orderByDesc('id')
//                ->paginate(6);
//        } catch (\Exception $e) {
//            session()->flash('flash_error', 'Erro ao buscar dados!!!');
//        }
//        return view('myPetsAbandoned', compact('pets'));
    }

}
