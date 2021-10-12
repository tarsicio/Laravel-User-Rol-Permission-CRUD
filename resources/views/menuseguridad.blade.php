@extends('layouts.app')

@section('htmlheader_title')
    SEGURIDAD
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Menú Seguridad, seleccione una opción</div>
                    <a href="{{ url('/home') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
    @role('root')
        <div class="panel-body">
            <h3 class="text-primary">ACCIÓN</h3>
            <table class="table table-bordered" class="col-xs-6 col-sm-3" id="MyTable">
                <tr>
                    <td class="text-center"><a href="{{ url('admin/roles') }}" ><img src="/img/menu/inicio/rol-permiso.png" alt="Perfiles" width="32" height="32"><p><div style="text-align: center;">Perfiles</div></a></td>
                    <td class="text-center"><a href="{{ url('admin/permisos') }}" ><img src="/img/menu/inicio/permisos.png" alt="Permisos" width="32" height="32"><p><div style="text-align: center;">Permisos</div></a></td>
                </tr>
                <tr>
                    <td class="text-center"><a href="{{ url('admin/users') }}" ><img src="/img/menu/inicio/usuarios.png" alt="Usuarios" width="32" height="32"><p><div style="text-align: center;">Usuarios</div></a></td>
                    <td class="text-center"><a  href="{{ url('logout') }}" ><img src="/img/menu/inicio/salir.png" alt="Salir" width="32" height="32"><p><div style="text-align: center;">Salir</div></a></td>
                </tr>
            </table>
        </div>
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endrole
</div>
</div>
</div>
</div>
@endsection
