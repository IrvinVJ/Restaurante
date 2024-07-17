<?php

namespace App\Http\Controllers;
//agregamos
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class RolController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only' =>  'create','store']);
        $this->middleware('permission:editar-rol', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            DB::beginTransaction();
            $permissions = Permission::get();
            return view('roles.crear', compact('permissions'));
            DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return redirect()->route('roles.index')->with('error', $e->getMessage());
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, ['name' => 'required', 'permission' => 'required']);
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('roles.index')->with('error', $e->getMessage());
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
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();
            $role = Role::find($id);
            $permission = Permission::get();
            $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, ['name' => 'required', 'permission' => 'required']);
            $role = Role::find($id);
            $role -> name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permission'));
            return redirect()->route('roles.index');
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
