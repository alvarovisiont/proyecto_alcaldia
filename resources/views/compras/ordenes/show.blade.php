@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-1">
		<a href="{{ url('/com_ordenes') }}" class="pull-left btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> Volver a las Ordenes</a>
	</div>
	<div class="col-md-1 col-md-offset-9">
		<a href="{{url('com_ordenes_detalle/create?orden='.$orden->id)}}" class="pull-right btn btn-flat btn-success" ><i class="fa fa-edit"></i> Agg detalle</a>
	</div>
	<div class="col-md-1">
		<a href="" class="pull-right btn btn-flat btn-danger" data-target="#modal-delete-{{$orden->id}}" data-toggle="modal"><i class="fa fa-trash"></i> Eliminar</a>
	</div>
	
</div>

@include('partials.flash')

<h2 class="text-center"> Orden - {{$orden->codigo}}</h2>

<hr>

<table class="table table-bordered table-hover">
	<tbody>
		<tr>
			<td><strong>Código: </strong>{{$orden->codigo}}</td>
			<td><strong>Fecha: </strong>{{date('d-m-Y',strtotime($orden->fecha_orden))}}</td>
			<td><strong>Nº Control: </strong>{{$orden->numero_control}}</td>
		</tr>
		<tr>
			<td><strong>Forma de Pago: </strong>{{$orden->forma_pago}}</td>
			<td><strong>Condición Compra: </strong>{{$orden->condicion_compra}}</td>
			<td><strong>Lugar Entrega: </strong>{{$orden->lugar_entrega}}</td>
		</tr>
		<tr>
			<td><strong>Plazo Entrega: </strong>{{$orden->plazo_entrega}}</td>
			<td><strong>Tipo Orden: </strong>{{$orden->tipo_orden}}</td>
		</tr>
		<tr>
			<td><strong>Código Requisición: </strong>{{$orden->com_requisiciones_codigo}}</td>
			<td><strong>Fecha Requisición: </strong>{{$orden->fecha_requisicion}}</td>
			<td><strong>Concepto Requisición: </strong>{{$orden->com_requisicion_concepto}}</td>
		</tr>
		<tr>
			<td><strong>Programática: </strong>{{$orden->com_departamento_programatica}}</td>
			<td><strong>Departamento: </strong>{{$orden->com_departamento_unidad}}</td>
		</tr>
		<tr>
			<td><strong>Rif Proveedor: </strong>{{$orden->com_provees_rif}}</td>
			<td><strong>Proveedor: </strong>{{$orden->com_provees_razon_social}}</td>
			<td><strong>Dirección Proveedor: </strong>{{$orden->com_provees_direccion}}</td>
		</tr>
	</tbody>
</table>

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$orden->id}}">

<!-- Modal de eliminar usuario -->	
<form method="POST" action="{{ url('com_ordenes/'.$orden->id) }}">
{{csrf_field()}}
{{method_field('DELETE')}}
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" arial-label="Close">
				<span aria-hidden="true">x</span>
			</button>
			<h4 class="modal-title">Elminar Orden</h4>
		</div>
		<div class="modal-body">
			<p>Confirme si desea eliminar la orden?</p>
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