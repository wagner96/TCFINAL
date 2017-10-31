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

    public function index(Request $request)
    {
        $search = $request->pesq;
        $users = $this->listUsers($search);

        return view('admin.users.allUsers', compact('users'));
    }

    public function listUsers($search)
    {
        if ($search != null) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%'. $search .'%')
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
        return view('admin.users.createUser');

    }

    public function store(AdminUserRequest $request)
    {

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
            'email' => 'required|max:255',
        ]);
        $data = $request->all();
        if ($data['role'] == 'ong') {
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
        return redirect('/');
    }

}
