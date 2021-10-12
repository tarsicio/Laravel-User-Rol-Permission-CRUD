<h1 class="text-primary">Perfiles</h1>
        <table class="table table-bordered" id="MyTable">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Nivel</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
        @if(isset($roles))
        <tbody>
        @foreach($roles as $rol)
            <tr>
                <td class="text-center">{{ $rol->id }}</td>
                <td class="text-center">{{ $rol->slug }}</td>
                <td class="text-center">{{ $rol->description }}</td>
                <td class="text-center">{{ $rol->level }}</td>
                <!-- formulario Principal -->
                {!! Form::open(['route' => ['roles.destroy', $rol->id], 'method' => 'DELETE'] ) !!}
                <td class="text-center">
                    <!-- Boton para Eliminar el rol -->
                    @if($rol->slug <> "root")
                    {!! Form::button('<i class="fa fa-trash"></i>', [
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'data-toggle'=>'tooltip',
                    'data-title'=>'Eliminar',
                    'data-container'=>'body',
                    'onclick' => "return confirm('¿Está seguro de eliminar el registro ID $rol->id, Slug $rol->slug ?')"
                     ]) !!}
                     @endif
                    <!-- Boton para modificar el rol o Perfil-->
                    <a href="{{ url('admin/roles/'.$rol->id.'/edit') }}" class="btn btn-info btn-xs"
                       data-toggle="tooltip" title="Modificar Perfil">
                        <span class="glyphicon" aria-hidden="true"></span><i class="fa fa-pencil"></i></a>
                    <!-- Boton para asignar los permisos al rol o Perfil-->
                    <a data-toggle="modal" rol_id="{{ $rol->id }}" data-target="#permisos"
                       class="btn btn-success btn-xs get-permisos" data-toggle="tooltip" title="Permisos">
                        <span class="glyphicon" aria-hidden="true"></span><i class="fa fa-eye"></i></a>
                </td>

                {!! Form::close() !!}

            </tr>
        @endforeach
        </tbody>
            @endif
            <tfoot>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Nivel</th>
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
                        <h4 class="modal-title" style="text-align: center">Gestionar permisos del ID:  Perfil:  </h4>
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
                    <div class="modal-footer">
                        <a href="#" onclick="javascript:location.reload();" data-dismiss="modal" class="btn">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aquí Finaliza código importado -->
{!! $roles->render() !!}