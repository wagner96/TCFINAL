<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use function PHPSTORM_META\type;
use Response;
use TC\Models\Pet;
use TC\Models\User;
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
//        $this->middleware('auth');
    }

    public function index()
    {
        $petsAb = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])
            ->where('type', '=', 'abandoned')
            ->where('active_pet', '=', '1')
            ->orderByDesc('id')
            ->take(3)
            ->get();
        $petsDi = Pet::with(['AdPetDisappeared', 'PhotosPet', 'User'])
            ->where('type', '=', 'disappeared')
            ->where('active_pet', '=', '1')
            ->orderByDesc('id')
            ->take(3)
            ->get();
        $i = 0;
        foreach ($petsAb as $petAb) {
            $parts = explode(' ', $petAb->user->name);
            $firtName = array_shift($parts);
            $lastName = array_pop($parts);
            $name = $firtName . ' ' . $lastName;
            $petsAb[$i]->user->name = $name;
            $i++;
            $name = "";
        }
        $i = 0;
        foreach ($petsDi as $petDi) {
            $parts = explode(' ', $petDi->user->name);
            $firtName = array_shift($parts);
            $lastName = array_pop($parts);
            $name = $firtName . ' ' . $lastName;
            $petsDi[$i]->user->name = $name;
            $i++;
            $name = "";
        }
        return view('index', compact('petsAb','petsDi'));
    }

    public function myProfile(){
        try{
            $id_user = auth()->user()->id;
            $user = User::find($id_user);
        }
        catch (\Exception $e){
            session()->flash('flash_error', 'Você não esta logado!!!');
            return $this->index();
        }
        return view('myProfile', compact('user'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function createAdAbandoned()
    {
        $vrf_user = auth()->user();
        if ($vrf_user == null){
            session()->flash('flash_log', 'Para criar um anuncio você prescisa estar logado!!!');
            return redirect('login');
        }
        return view('createAdPetAban');
    }
    public function createAdDisappeared()
    {
        $vrf_user = auth()->user();
        if ($vrf_user == null){
            session()->flash('flash_log', 'Para criar um anuncio você prescisa estar logado!!!');
            return redirect('login');
        }
        return view('createAdPetDisa');
    }
    public function sendEmailContact(Request $request)
    {
        try {
            $users = User::where('role', '=', 'admin')
                ->select('email')
                ->get();
            foreach ($users as $user) {

                $data['name'] = $request->name;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;
                $data['msn'] = $request->msn;
                $data['email_to'] = $user['email'];
                Mail::send('emails.contact', $data, function ($message) use ($data) {

                    $message->to($data['email_to'], '')
                        ->subject('Adote um amigo (Contato)');

                });
                session()->flash('flash_message', 'E-mail enviado com sucesso!!!');

            }
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao enviar e-mail!!!');
        }
        return redirect('contato');

    }

}
