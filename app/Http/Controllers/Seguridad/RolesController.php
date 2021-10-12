<?php

namespace App\Http\Controllers\Seguridad;

use App\Models\Seguridad\Permission;
use App\Models\Seguridad\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation;
use App\Http\Requests\Roles\RoleNuevoRequest;
use App\Http\Requests\Roles\RoleUpdateRequest;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(7);
        $permisos = Permission::all();
       // attachPermission
       // detachPermission
        //dd($permisos);
        return view('roles.index', array('roles'=> $roles, 'permisos' => $permisos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleNuevoRequest $request)
    {
        $role = new Role();
        $role->slug = $request->input('slug');
        $role->description  = $request->input('description');
        $role->level  = $request->input('level');

        $role->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit')->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        //$role->name = $request->input('name');
        $role->description  = $request->input('description');
        $role->level  = $request->input('level');

        $role->save();


        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('roles.index');
    }
}
