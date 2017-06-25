@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-1">
		<a href="{{url('com_req_detalle/'.$requisicion->id.'/edit')}}" class="pull-left btn btn-flat btn-success" ><i class="fa fa-edit"></i> Editar</a>
	</div>
	<div class="col-md-1 col-md-offset-1">
		<a href="" class="pull-left btn btn-flat btn-danger" data-target="#modal-delete-{{$requisicion->id}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
	</div>
</div>


<h2 class="text-center"> Insumo - {{$requisicion->codigo}}</h2>

<hr>
<p><strong>Codigo: </strong>{{$requisicion->codigo}}</p>
<p><strong>Cantidad: </strong>{{$requisicion->cantidad}}</p>
<p><strong>Año: </strong>{{$requisicion->ano}}</p>
<p><strong>Insumo </strong>{{$requisicion->insumos->descripcion}}</p>
<p><strong>Unidad: </strong>{{$requisicion->insumos->unidades->descripcion}}</p>



<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$requisicion->id}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('com_req_detalle/'.$requisicion->id) }}">
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
			<p>Confirme si desea eliminar el detalle?</p>
			<p><strong>Codigo: </strong>{{$requisicion->codigo}}</p>
			<p><strong>Cantidad:</strong>{{$requisicion->cantidad}}</p>
			<p><strong>Año:</strong>{{$requisicion->ano}}</p>
			<p><strong>Insumo</strong>{{$requisicion->insumos->descripcion}}</p>
			<p><strong>Unidad:</strong>{{$requisicion->insumos->unidades->descripcion}}</p>
			
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