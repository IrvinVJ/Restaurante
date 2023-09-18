<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only'=>['index']]); 
        $this->middleware('permission:crear-usuario',['only' =>  'create','store']);
        $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuario', ['only'=>['destroy']]);
    }
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all();
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.crear', compact('usuarios','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        //$usuarios = new User();
        //$usuarios->name=$request->txtnombre;
       // $usuarios->email= $request->txtemail;
       // $usuarios->rol= $request->txtrol;
       // $usuarios->password=$request->password;
        //$usuarios->save();
        return redirect('usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('usuarios.editar', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            //'email' => 'required|email|unique:users,email'.$id,
            //'password' => 'same:confimr-password',
            //'roles' => 'required'
        ]);

        $input = $request->all();

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }else {
            $input = Arr::except($input, array('password'));
        }
        
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('usuarios');
    }
}
