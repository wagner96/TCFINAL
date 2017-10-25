<?php

namespace TC\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
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

    public function index()
    {

        return view('admin.users.allUsers');
    }

    public function listUsers(Request $request)
    {
        $pesq = $request->pesq;
        if ($pesq){
            $users = User::where('name', 'like', '% $pesq %')
                ->paginate(6);
        }
        else{
            $users = User::paginate(6);
        }
        return \Response::json($users);
    }

    public function create()
    {
        return view('admin.users.createUser');
    }

    public function store(AdminUserRequest $request)
    {

        $this->validate($request, [
            'name' => 'required|Alpha',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'role' => 'required',
            'city' => 'Alpha',
        ]);
        $data = $request->all();
        if ($data['role'] == 'ong'){
            $data['breed'] = null;
        }
        $data['password'] = bcrypt($data['password']);
        $conf = $this->repository->create($data);
        session()->flash('flash_message', 'Usuário registrado!!!');

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {

        $user = User::find($id);


        return view('show', array('user' => $user));
    }

    public function edit($id)
    {

        $user = $this->repository->find($id);
        return view('admin.users.editUser', compact('user'));
    }

    public function update(AdminUserRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255',
        ]);
        $data = $request->all();
        if ($data['role'] == 'ong'){
            $data['breed'] = null;
        }

        $this->repository->update($data, $id);
        session()->flash('flash_message', 'Usuário editado!!!');

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {

    }

    public function active($id)
    {
        $teste = array('active_user' => 0);
        $this->repository->update($teste, $id);
        session()->flash('flash_message', 'Usuário desativado!!!');

        return redirect()->route('admin.users.index');
    }

    public function desactive($id)
    {
        $teste = array('active_user' => 1);
        $this->repository->update($teste, $id);
        session()->flash('flash_message', 'Usuário ativado!!!');

        return redirect()->route('admin.users.index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
