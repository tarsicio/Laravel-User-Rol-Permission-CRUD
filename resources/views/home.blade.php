@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Menú principal, seleccione una opción</div>
					@permission('crear.usuarios')
					 <!-- Aqui lo que quiera mostrar -->						
					@endpermission
					@if(Auth::check() && Auth::user())
					<div class="panel-body">
						<h3 class="text-primary">MÓDULOS</h3>
						<table class="table table-bordered" class="col-xs-6 col-sm-3" id="MyTable">
							<tr>
								@role('root')
								<td class="text-center"><a href="{{ url('admin/modulos') }}" ><img src="/img/menu/inicio/soldado.png" alt="Roles y Permiso" width="32" height="32"><p><div style="text-align: center;">Seguridad</div></a></td>
								@else
									<td class="text-center"><a href="" ><img src="/img/avatar.png" alt="Roles y Permiso" width="32" height="32"><p><div style="text-align: center;">Inicio</td>
								@endrole
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/industria.png" alt="Industria" width="32" height="32"><p><div style="text-align: center;">Industrias</div></a></td>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/herramientas.png" height="32" width="32" alt="Herramientas"><p><div style="text-align: center;">Reparar</div></a></td>
							</tr>
							<tr>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/respaldo.png" alt="Respaldo" width="32" height="32"><p><div style="text-align: center;">Respaldo</div></a></td>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/transporte.png" alt="Usuarios" width="32" height="32"><p><div style="text-align: center;">transporte</div></a></td>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/reportes.png" alt="Reportes" width="32" height="32"><p><div style="text-align: center;">Reportes</div></a></td>
							</tr>
							<tr>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/telefonos.png" alt="soldado" width="32" height="32"><p><div style="text-align: center;">Directorio</div></a></td>
								<td class="text-center"><a href="" ><img src="/img/menu/inicio/manual.png" alt="Manuales" width="32" height="32"><p><div style="text-align: center;">Manuales</div></a></td>
								<td class="text-center"><a  href="{{ url('logout') }}" ><img src="/img/menu/inicio/salir.png" alt="Salir" width="32" height="32"><p><div style="text-align: center;">Salir</div></a></td>
							</tr>
						</table>
					</div>
					@else
						<div class="panel-body">
							{{ trans('adminlte_lang::message.permiso') }}
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
