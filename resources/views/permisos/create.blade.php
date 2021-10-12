@extends('layouts.app')

@section('htmlheader_title')
    Seguridad Roles
@endsection


@section('main-content')
    @if(Auth::check() && Auth::user()->isRole('root'))
        @include('errors.mensajes')
        <h2 class="text-center">Nuevo Permiso</h2>
        <a  href="{{ url('admin/permisos') }}"><img src="/img/menu/boton-atras.jpg" height="33" width="100" alt="Botón"></a>
        {!! Form::open(['route' => 'permisos.store', 'method' => 'POST']) !!}
        @include('permisos.partials.fields')
        <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
        {!! Form::close() !!}
    @else
        <div class="panel-body">
            {{ trans('adminlte_lang::message.permiso') }}
        </div>
    @endif
@endsection
