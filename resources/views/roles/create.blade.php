@extends('layouts.app')

@section('htmlheader_title')
    Seguridad Perfiles
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('admin|root'))
        @include('errors.mensajes')
        <h2 class="text-center">Nuevo Perfil</h2>
        <a  href="{{ url('admin/roles') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        @include('roles.partials.fields')
        <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar Perfil</button>
        {!! Form::close() !!}
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection
