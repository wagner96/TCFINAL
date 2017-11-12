<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
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
        $pets = Pet::with(['AdPetAbandoned', 'PhotosPet', 'User'])->paginate(8);
        return view('index', compact('pets'));
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
                $data['msn'] = $request->msg;
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
