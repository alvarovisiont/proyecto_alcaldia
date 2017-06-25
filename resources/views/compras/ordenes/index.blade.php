@extends('layouts.app')

@section('view_descrip')
	
@endsection

@section('content')

	<h2 class="text-center">Ordenes Registradas <a href="{{url('com_ordenes/create')}}" class="pull-left btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar Orden</a>
 		 <a href="{{url('com_ordenes_detalle/create?orden=')}}" class="pull-right btn btn-flat  btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i> Agregar Detalle</a>
 		 <br>
 	</h2>

 	@include('partials.flash')
	
	<table class="table table-condensed table-hover table-bordered">
		<thead>
			<tr>
				<th class="text-center">Código</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Nº Control</th>
				<th class="text-center">Forma de Pago</th>
				<th class="text-center">Condición Compra</th>
				<th class="text-center">Lugar Entrega</th>
				<th class="text-center">Plazo Entrega</th>
				<th class="text-center">Acción</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($ordenes as $row)
				<tr>
					<td>{{$row->codigo}}</td>
					<td>{{date('d-m-Y', strtotime($row->fecha_orden))}}</td>
					<td>{{$row->numero_control}}</td>
					<td>{{$row->forma_pago}}</td>
					<td>{{$row->condicion_compra}}</td>
					<td>{{$row->lugar_entrega}}</td>
					<td>{{$row->plazo_entrega}}</td>
					<td>
						<a href="{{url('com_ordenes/'.$row->id)}}" class="btn btn-success btn-sm" title="Ver Orden"><i class="fa fa-search"></i></a>
						<a href="{{url('com_ordenes/'.$row->id.'/edit')}}" class="btn btn-warning btn-sm" title="Modificar Orden"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<br><br><br>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<div class="alert alert-success" id="aviso" style="display: none;">
			 <h5 class="">Detalle eliminado con éxito&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
		    </div>
		</div>
	</div>

	<h2 class="text-center">Detalle Ordenes</h2>
	<table class="table table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th class="text-center">Orden</th>
				<th class="text-center">Insumo</th>
				<th class="text-center">Cantidad</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Base</th>
				<th class="text-center">Iva</th>
				<th class="text-center">Iva %</th>
				<th class="text-center">Total</th>
				<th class="text-center">Año</th>
				<th></th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($detalle as $row)	
				<tr>
					<td>{{$row->ordenes->codigo}}</td>
					<td>{{$row->descripcion}}</td>
					<td>{{$row->unidad}}</td>
					<td>{{$row->cantidad}}</td>
					<td>{{number_format($row->base,2,',','.')}}</td>
					<td>{{number_format($row->iva,2,',','.')}}</td>
					<td>{{$row->iva_porcentaje}}</td>
					<td>{{number_format($row->total,2,',','.')}}</td>
					<td>{{$row->ano}}</td>
					<td>
						<a href="#" id="eliminar_detalle" data-eliminar="{{$row->id}}" class="eliminar"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<form action="{{url('com_ordenes_detalle/'.':USER')}}" id="form_eliminar">
		{{csrf_field()}}
		{{method_field('DELETE')}}
	</form>
@endsection

@section('script')
	<script>
		$(function(){

			$(".eliminar").click(function(){

				var btn  = $(this),
					id   = btn.data('eliminar'),
					form = $("#form_eliminar"),
					ruta = form.attr('action').replace(':USER', id),
				   datos = form.serialize(),
				   agree = confirm("Esta seguro de querer borrar este Detalle?")

				   if(agree)
				   {
					$.post(ruta, datos, function(){
				   		btn.parent().parent().remove();
						$("#aviso").show('slow/400/fast', function(){
							setTimeout(function(){
								$("#aviso").hide('slow');
							}, 2000);
						});
					});
				   }
			});
		})
	</script>
@endsection