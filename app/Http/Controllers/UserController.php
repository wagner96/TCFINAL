<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use TC\Models\User;
use TC\Http\Controllers\Controller;
use TC\Repositories\UserRepository;
use TC\Http\Requests\AdminUserRequest;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

        //$users = DB::table('users')->select('id', 'name', 'city', 'role', 'active_user')->get();

        //$users = DB::table('users')->get();
        //c

        //  return view('admin.users.allUsers')->with(compact('users'));

        return view('admin.users.allUsers');
    }

    public function listUsers()
    {
       // $users = DB::table('users')->select('id', 'name', 'city', 'role', 'active_user')->get();
        $users = User::paginate(6);
        return \Response::json($users);
    }

    public function create()
    {
        return view('admin.users.createUser');
    }

    public function store(AdminUserRequest $request)
    {

        $this->validate($request, ['name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $this->repository->create($data);

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
        $this->validate($request, ['name' => 'required',
            'email' => 'required|email|max:255|',
        ]);
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {

    }

    public function active($id)
    {
        $teste = array('active_user' => 0);
        $this->repository->update($teste, $id);
        return redirect()->route('admin.users.index');
    }

    public function desactive($id)
    {
        $teste = array('active_user' => 1);
        $this->repository->update($teste, $id);
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
