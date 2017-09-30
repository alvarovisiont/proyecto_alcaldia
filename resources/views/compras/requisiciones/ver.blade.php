@extends('layouts.app')

@section('content')
@if(Auth::user()->restringido())
<div class="row">
	<div class="col-md-1">
		<a href="{{url('com_requisicion/'.$requisicion->id.'/edit')}}" class="pull-left btn btn-flat btn-success" ><i class="fa fa-edit"></i> Editar</a>
	</div>
	<div class="col-md-1 col-md-offset-1">
		<a href="" class="pull-left btn btn-flat btn-danger" data-target="#modal-delete-{{$requisicion->id}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
	</div>
</div>
@endif

<h2 class="text-center"> Insumo - {{$requisicion->codigo}}</h2>

<hr>
<p><strong>Codigo: </strong>{{$requisicion->codigo}}</p>
<p><strong>Fecha:</strong>{{$requisicion->fecha}}</p>
<p><strong>Año</strong>{{$requisicion->ano}}</p>
<p><strong>Status:</strong><span class=@if($requisicion->status == 'Vigente') bg-green @endif @if($requisicion->status == 'Inactivo') bg-red @endif>{{$requisicion->status}}</span></p>
<p><strong>Descripcion de la requisicion: </strong>{{$requisicion->descripcion}}</p>
<br>
<h2 class="text-center">Unidad de la requisicion</h2>
<hr>
<p><strong>Unidad de la requisicion: </strong>{{$requisicion->departamento->programatica}}</p>
<p><strong>Descripcion de unidad</strong>{{$requisicion->departamento->descripcion}}</p>


<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$requisicion->id}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('com_requisicion/'.$requisicion->id) }}">
{{csrf_field()}}
{{method_field('DELETE')}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" arial-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Elminar Requisicion</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar la requisicion <strong>{{$requisicion->descripcion}}</strong></p>
			
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