<?php

namespace App\Http\Controllers\User;

use App\Models\Seguridad\Permission;
use App\Models\Seguridad\PermissionRole;
use App\Models\Seguridad\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation;
use App\Http\Requests\Users\UserNuevoRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Requests;

class UsersController extends Controller
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
        $users = User::paginate(7);
        $permisos = Permission::all();
        return view('users.index', array('users'=> $users, 'permisos' => $permisos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $roles = Role::all()->pluck('slug','id');
;
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserNuevoRequest $request)
    {
        $user = new User();
        //obtenemos el campo file definido en el formulario
        $file = $request->file('foto');
        if(!is_null($file)){
            /**
             * Se le puso un prefijo corto, pero si usted desea
             * puede colocar un prfijo mas largo, descomente la linea de abajo
             * y vera los resultados.
             */
            //$nombre = 've-'.uniqid(uniqid(),true).'.'.$file->getClientOriginalName();
            $nombre = 've-'.$file->getClientOriginalName();
        }else{
            $nombre = 'sin-foto.png';
        }
        $user->name = $request->input('name');
        $user->login  = $request->input('login');
        $user->foto  = $nombre;
        $user->email  = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->fechainicio = $request->input('fechainicio');
        $user->fechafin    = $request->input('fechafin');
        $user->remember_token = str_random(100);
        $user->save();
        /**
         * El Metodo attachRole Guarda el Rol_id en la tabla role_user con el user_id
         */
        $user->attachRole(Role::find(Input::get('rol')));

        /**
         * indicamos que queremos guardar el archivo imagen
         * del empleado en el disco local de la carpeta
         * pública storage
         */
        if(!is_null($file)) {
            $file->move('storage',$nombre);
        }
        return redirect()->route('users.index');
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
        $user = User::find($id);
        $userRole = $user->roles()->first();
        $user['rol'] = $userRole;
        $roles = Role::all()->pluck('slug','id');
        return view('users.edit', array('user' => $user, 'roles' => $roles ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserUpdateRequest $request, $id)
    {

        $user = User::find($id);
        //obtenemos el campo file definido en el formulario
        $file = $request->file('foto');
        if(!is_null($file)){
            /**
             * Se le puso un prefijo corto, pero si usted desea
             * puede colocar un prfijo mas largo, descomente la linea de arriba
             * y vera los resultados.
             */
            //$nombre = 've-'.uniqid(uniqid(),true).'.'.$file->getClientOriginalName();
            $nombre = 've-'.$file->getClientOriginalName();
        }else{
            $nombre = 'sin-foto.png';
        }

        $user->name = $request->input('name');
        $user->login  = $request->input('login');
        //$user->email  = $request->input('email');
        $user->foto  = $nombre;
        $user->password  =  Hash::make($request->input('password'));
        $user->fechainicio = $request->input('fechainicio');
        $user->fechafin    = $request->input('fechafin');
        $user->activo  = $request->input('activo');
        $user->remember_token = str_random(100);
        $user->save();
        /**
         * No es necesario eliminar la relacion con el
         * antiguo rol ya que la libreria permite tener multiples roles, pero
         * Para este caso en Particular nos interesa eliminar el rol anterior y
         * luego colocamos el nuevo Rol, para que solo un usuario tenga un solo rol.
         * Con el metodo detach eliminarmos el rol que tenga.
         */
        $user->roles()->detach();
        /**
         * El Metodo attachRole Guarda el Rol_id en la tabla role_user con el user_id
         */
        $user->attachRole(Role::find(Input::get('rol')));

        /**
         * indicamos que queremos guardar el archivo imagen
         * del empleado en el disco local de la carpeta
         * pública storage
         */
        if(!is_null($file)) {
            $file->move('storage',$nombre);
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::find($id);
        $imagenName = $user->foto;
        /**
         * Borramos el archivo de imagen de la carpeta storage, si el usuario
         * no tiene foto, no permitimos que se borre la imagen sin-foto.png
         * ya que esa es la imagen base para los que no tienen fotos
         */
        if(!is_null($imagenName) and $imagenName <> 'sin-foto.png') {
            File::delete(public_path('storage/').$imagenName);
        }
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
