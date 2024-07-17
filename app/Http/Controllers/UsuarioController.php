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

        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' =>  'create', 'store']);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
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
        try{
            DB::beginTransaction();
            $usuarios = User::all();
            $roles = Role::pluck('name', 'name')->all();
            return view('usuarios.crear', compact('usuarios', 'roles'));
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('usuarios.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',

            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));


            return redirect('usuarios');
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('usuarios.index')->with('error', $e->getMessage());
            }
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
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->roles->pluck('name', 'name')->all();

            return view('usuarios.editar', compact('user', 'roles', 'userRole'));
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('usuarios.index')->with('error', $e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, [
                'name' => 'required',
                //'email' => 'required|email|unique:users,email'.$id,
                //'password' => 'same:confimr-password',
                //'roles' => 'required'
            ]);

            $input = $request->all();

            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $id)->delete();

            $user->assignRole($request->input('roles'));
            return redirect('usuarios');
            DB::commit();
            }
            catch(\Exception $e){
                DB::rollBack();
                return redirect()->route('usuarios.index')->with('error', $e->getMessage());
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            User::find($id)->delete();
            return redirect('usuarios');
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('usuarios.index')->with('error', $e->getMessage());
        }
    }

}
