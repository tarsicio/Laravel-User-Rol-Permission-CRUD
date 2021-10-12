@extends('layouts.app')

@section('htmlheader_title')
    Seguridad Roles
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('root'))
        @include('errors.mensajes')
        <h4 class="text-center">Editar Usuario: {{ $user->name  }}</h4>
        <a href="{{ url('admin/users') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        {!! Form::model($user, [ 'route' => ['users.update', $user], 'method' => 'PUT', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
        @include('users.partials.fieldsedit')
        <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar cambios de: {{ $user->name  }}</button>
        {!! Form::close() !!}
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection