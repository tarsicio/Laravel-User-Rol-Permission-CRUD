@extends('layouts.app')

@section('htmlheader_title')
    Seguridad Permisos
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('root'))
        @include('errors.mensajes')
        <h4 class="text-center">Editar Permiso: {{ $permission->name  }}</h4>
        <a href="{{ url('admin/permisos') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        {!! Form::model($permission, [ 'route' => ['permisos.update', $permission], 'method' => 'PUT']) !!}
        @include('permisos.partials.fieldsedit')
        <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar cambios de: {{ $permission->name  }}</button>
        {!! Form::close() !!}
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection