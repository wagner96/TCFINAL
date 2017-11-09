<?php

namespace TC\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use TC\Http\Requests\AdminUserRequest;
use TC\Models\User;
use TC\Repositories\UserRepository;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        try {
            $search = $request->pesq;
            $users = $this->listUsers($search);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao pesquisar!!!');
        }
        return view('admin.users.allUsers', compact('users'));
    }

    public function listUsers($search)
    {
        if ($search != null) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->paginate(6);
        } else {
            $users = User::orderByDesc('id')
                ->paginate(6);
        }
        return $users;
    }

    public function create()
    {
        $vrf_user = auth()->user();

        if ($vrf_user == null) {
            return view('register_user');

        }
        return view('admin.users.createUser');

    }

    // Admin salva usuario

    public function store(AdminUserRequest $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|alpha_spaces',
                'email' => 'required|max:255|unique:users',
                'password' => 'required',
                'role' => 'required',
                'city' => 'Alpha',
            ]);
            $data = $request->all();
            if ($data['role'] == 'ong') {
                $data['breed'] = null;
            }
            $data['password'] = bcrypt($data['password']);
            $conf = $this->repository->create($data);
            session()->flash('flash_message', 'Usuário registrado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao registrar!!!');
        }
        return redirect()->route('admin.users.index');
    }

    // Salvar usuario
    public function storeUser(AdminUserRequest $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|alpha_spaces',
                'email' => 'required|max:255|unique:users',
                'password' => 'required',
                'role' => 'required',
                'city' => 'Alpha',
            ]);
            $data = $request->all();
            if ($data['role'] == 'ong') {
                $data['breed'] = null;
            }
            $data['password'] = bcrypt($data['password']);
            $conf = $this->repository->create($data);
            $data['nameUser'] = $request->name;
            $data['email'] = $request->email;
            session()->flash('flash_message', 'Registro realizado com sucesso !!!');
            Mail::send('emails.createUser', $data, function ($message) use ($data) {
                $message->to($data['email'], '')
                    ->subject('Adote um amigo');
            });
            session()->flash('flash_message', 'Registro realizado com sucesso !!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao registrar!!!');
        }

        return redirect()->route('users.registrar');
    }


    public function show($id)
    {
        try {
            $user = User::find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao mostrar!!!');
        }

        return view('show', array('user' => $user));
    }

    public function edit($id)
    {
        try {
            $user = $this->repository->find($id);
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao mostrar!!!');
        }
        return view('admin.users.editUser', compact('user'));
    }

    public function update(AdminUserRequest $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|max:255',
            ]);
            $data = $request->all();
            if ($data['role'] == 'ong') {
                $data['breed'] = null;
            }

            $this->repository->update($data, $id);
            session()->flash('flash_message', 'Usuário editado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao editar!!!');
        }

        return redirect()->route('admin.users.index');
    }

    public function updatePassword(Request $request, $id)
    {
        try {
            if ($request->password == $request->password2) {
                $data = $request->all();
                $data['password'] = bcrypt($data['password']);
                $this->repository->update($data, $id);
                session()->flash('flash_message', 'Senha atualizada!!!');
            }
        }catch (\Exception $e){
            session()->flash('flash_error', 'Erro ao atualizar senha!!!');
        }
        return redirect()->route('myProfile');
    }

    public function updateForUsers(Request $request, $id)
    {

        try {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|max:255',
            ]);

            $data = $request->all();
            $this->repository->update($data, $id);
            session()->flash('flash_message', 'Informações editadas com sucesso !!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao editar!!!');
        }

        return redirect()->route('myProfile');
    }


    public function destroy($id)
    {

    }

    public function active($id)
    {
        try {
            $teste = array('active_user' => 0);
            $this->repository->update($teste, $id);
            session()->flash('flash_message', 'Usuário desativado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao desativar usuário!!!');
        }
        return redirect()->route('admin.users.index');
    }

    public function desactive($id)
    {
        try {
            $teste = array('active_user' => 1);
            $this->repository->update($teste, $id);
            session()->flash('flash_message', 'Usuário ativado!!!');
        } catch (\Exception $e) {
            session()->flash('flash_error', 'Erro ao ativar usuário!!!');
        }
        return redirect()->route('admin.users.index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
