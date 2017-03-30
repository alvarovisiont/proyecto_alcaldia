@extends('layouts.app')

@section('content')

<a href="" class="pull-left btn btn-flat btn-danger" data-target="#modal-delete-{{$sub->id_sub_area}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
<h2 class="text-center"> Sub area - <strong>{{$sub->nombre}}</strong></h2>

<hr>

<p><strong>Nombre del rol: </strong>{{$sub->nombre}}</p>
<p><strong>Descripcion del rol: </strong>{{$sub->descripcion}}</p>
<p><strong>Area: </strong>{{$sub->areas->nombre}}</p>



<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$sub->id_sub_area}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('sub_area/'.$sub->id_sub_area) }}">
{{--<input type="hidden" name="_token" value="{{ csrf_token }}" id="token">--}}
{{csrf_field()}}
{{method_field('DELETE')}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" arial-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Elminar Sub Area</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar la sub area <strong>{{$sub->nombre}}</strong></p>
			
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