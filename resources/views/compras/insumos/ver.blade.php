@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-1">
		<a href="{{url('com_insumos/'.$insumo->id.'/edit')}}" class="pull-left btn btn-flat btn-success" ><i class="fa fa-edit"></i> Editar</a>
	</div>
	<div class="col-md-1 col-md-offset-1">
		<a href="" class="pull-left btn btn-flat btn-danger" data-target="#modal-delete-{{$insumo->id}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
	</div>
</div>


<h2 class="text-center"> Insumo - {{$insumo->descripcion}}</h2>

<hr>
<p><strong>Codigo: </strong>00{{$insumo->codigo}}</p>
<p><strong>Unidad del insumo: </strong>{{$insumo->unidades->descripcion}}</p>
<p><strong>Descripcion del insumo: </strong>{{$insumo->descripcion}}</p>



<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$insumo->id}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('com_insumos/'.$insumo->id) }}">
{{csrf_field()}}
{{method_field('DELETE')}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" arial-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Elminar Insumo</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar el insumo <strong>{{$insumo->descripcion}}</strong></p>
			
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