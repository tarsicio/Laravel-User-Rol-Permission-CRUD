@extends('layouts.app')

@section('htmlheader_title')
    Seguridad Perfiles
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('root'))
        @include('errors.mensajes')
        <h4 class="text-center">Editar el Perfil: {{ $role->slug  }}</h4>
        <a href="{{ url('admin/roles') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        {!! Form::model($role, [ 'route' => ['roles.update', $role], 'method' => 'PUT']) !!}
        @include('roles.partials.fieldsedit')
        <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar cambios del Perfil: {{ $role->slug  }}</button>
        {!! Form::close() !!}
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection