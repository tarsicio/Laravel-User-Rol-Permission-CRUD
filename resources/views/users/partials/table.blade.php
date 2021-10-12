<h1 class="text-primary">Usuarios</h1>

<table class="table table-bordered" id="MyTable">
    <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Perfil</th>
        <th class="text-center">Login</th>
        <th class="text-center">Activo</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <?php $user['rol'] = $user->roles()->first();?>
        <tr>
            <td class="text-center">{{ $user->id }}</td>
            <td class="text-center"><img src="{{ asset('storage/'. $user->foto) }}" class="img-circle" height="45" width="31" alt="Usuario"></td>
            <td class="text-center">{{ $user->name }}</td>
            <td class="text-center">{{ $user->rol->slug }}</td>
            <td class="text-center">{{ $user->login }}</td>
            <td class="text-center">{{ $user->activo }}</td>
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE'] ) !!}
            <td class="text-center">
                @if($user->rol->slug <> "root")
                {!! Form::button('<i class="fa fa-trash"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'data-toggle'=>'tooltip',
                'data-title'=>'Eliminar',
                'data-container'=>'body',
                'onclick' => "return confirm('¿Está seguro de eliminar el registro ID: $user->id, Nombre: $user->name ?')"
                 ]) !!}
                @endif
                        <!-- Boton para modificar al usuario seleccionado-->
                <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-info btn-xs"
                   data-toggle="tooltip" title="Modificar">
                    <span class="glyphicon" aria-hidden="true"></span><i class="fa fa-pencil"></i>
                </a>
                <!-- Boton para asignar los permisos al Usuario
                <a data-toggle="modal" rol_id="{{ $user->rol->id }}" data-target="#permisos"
                   class="btn btn-success btn-xs get-permisos" data-toggle="tooltip" title="Permisos">
                    <span class="glyphicon" aria-hidden="true"></span><i class="fa fa-eye"></i></a>-->
            </td>

            {!! Form::close() !!}

        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Perfil</th>
        <th class="text-center">Login</th>
        <th class="text-center">Activo</th>
        <th class="text-center">Acciones</th>
    </tr>
    </tfoot>
</table>
<hr>
<!-- Aquí inicia código importado -->
<div class="container">
    <div class="user">
        <div class="modal" id="permisos">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" style="text-align: center">Gestionar permisos del ID:{{$user->id}}  Usuario:{{$user->name}}  </h4>
                    </div>
                    <div class="modal-body">
                        <a href='#' id='select-all'>Select all (No implementado) / </a>
                        <a href='#' id='deselect-all'>Deselect all (No implementado)</a>
                        <select id="select-permisos" multiple="multiple">
                            @if(isset($permisos))
                                @foreach($permisos as $permiso)
                                    <option value="{{ $permiso->id }}">{{ $permiso->slug }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div id="datos"></div>
                    <div class="modal-footer">
                        <a href="#" onclick="javascript:location.reload();" data-dismiss="modal" class="btn">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aquí Finaliza código importado -->
{!! $users->render() !!}
