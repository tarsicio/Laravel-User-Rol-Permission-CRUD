@extends('users.app')

@section('htmlheader_title')
    Permisos
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('root'))
        <a href="{{ url('admin/modulos') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        <a class="btn btn-primary pull-right" href="{{ url('admin/users/create') }}" data-toggle="tooltip" title="Nuevo Usuario" role="button">Nuevo Usuario</a>
    @include('users.partials.table')
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection
