<h1 class="text-primary">Permisos</h1>

<table class="table table-bordered" id="MyTable">
    <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($permissions as $permission)
        <tr>
            <td class="text-center">{{ $permission->id }}</td>
            <td class="text-center">{{ $permission->slug }}</td>
            <td class="text-center">{{ $permission->description }}</td>
            {!! Form::open(['route' => ['permisos.destroy', $permission->id], 'method' => 'DELETE'] ) !!}
            <td class="text-center">
                {!! Form::button('<i class="fa fa-trash"></i>', [
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'data-toggle'=>'tooltip',
                'data-title'=>'Eliminar',
                'data-container'=>'body',
                'onclick' => "return confirm('¿Está seguro de eliminar el registro ID $permission->id, Slug $permission->name ?')"
                 ]) !!}
               <!-- <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button> -->
                <a href="{{ url('admin/permisos/'.$permission->id.'/edit') }}" class="btn btn-info btn-xs"
                   data-toggle="tooltip" title="Modificar">
                    <span class="glyphicon" aria-hidden="true"></span><i class="fa fa-pencil"></i>
                </a>
            </td>

            {!! Form::close() !!}

        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Acciones</th>
    </tr>
    </tfoot>
</table>
<hr>
{!! $permissions->render() !!}