@extends('layouts.app')

@section('content')

<a href="" class="pull-left btn btn-flat btn-danger" data-target="#modal-delete-{{$rol->id_rol}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
<h2 class="text-center"> Rol - {{$rol->nombre}}</h2>

<hr>

<p><strong>Nombre del rol: </strong>{{$rol->nombre}}</p>
<p><strong>Descripcion del rol: </strong>{{$rol->descripcion}}</p>
<hr>
<br>
<br>
<br>
<h2 class="text-center">Usuarios con este rol</h2>
<br>
<table class="table table-bordered table-hover table-condensed tabla">
	<thead>
	  <tr>
		<th>Cedula</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Accion</th>
	  </tr>
	</thead>
	<tbody>
	@foreach($usuarios->user as $u)
		<tr>
			<td>{{$u->nac.'-'.$u->cedula}}</td>
			<td>{{$u->nombres}}</td>
			<td>{{$u->apellidos}}</td>
			<td>
				<a href="{{ url('usuario/'.$u->id)}}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>


<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$rol->id_rol}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('roles/'.$rol->id_rol) }}">
{{csrf_field()}}
{{method_field('DELETE')}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" arial-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Elminar Rol</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar el rol <strong>{{$rol->nombre}}</strong></p>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-danger" id="enviar">Eliminar</button>
		</div>
	</div>
</div>
</form>
</div>
<!-- fin eliminar usuario -->
@stop