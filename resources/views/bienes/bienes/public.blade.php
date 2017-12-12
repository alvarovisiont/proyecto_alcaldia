@extends('layouts.public')
@section('view_descrip')
Bienes - {{$bien->codigo}}
@endsection
@section('content')
	<h3 class="text-center">Detalles del Bien {{$bien->codigo}}</h3>
	<br><br>

	<div class="row" style="margin-top: 20px">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Unidad: </span></strong>
					<br><br> {{$bien->unidad->identificacion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Tipo: </span></strong>   <br><br> {{$bien->tipo->descripcion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Descripción General: </span></strong>  <br><br> {{$bien->descripcion_general}} 
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Grupo Bien Inmueble: </span></strong><br><br>{{$bien->tipo->nomenclatura->grupo}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Sub_Grupo: </span></strong><br><br>{{$subgrupo}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Sub Sub Grupo: </span></strong><br><br>{{$subsubgrupo}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Orden Compra: </span></strong><br><br>{{$bien->id_orden_compra ?$bien->id_orden_compra:''}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Status: </span></strong><br><br>{{ $bien->status == 0 ? '' : $bien->status}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Concepto Final: </span></strong><br><br>{{$bien->concepto->descripcion}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Insumo: </span></strong><br><br>{{$bien->id_insumo ? $bien->id_insumo : ''}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Dirección: </span></strong><br><br>{{$bien->direccion == 0 ? '' : $bien->direccion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Categoría: </span></strong><br><br>{{$bien->categoria == 0 ? '' : $bien->categoria}}
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<h3 class="text-center">Movimientos</h3>
			<hr>
				<table class="table table-bordered" style="width:100%">
					<thead>
	    			<tr>
	    				<th class="text-center">#</th>
	    				<th class="text-center">Fecha</th>
	    				<th class="text-center">Concepto</th>
	    				<th class="text-center">Observación</th>
	    				<th class="text-center">Unidad</th>
	    				<th class="text-center">Sección</th>
	    			</tr>
					</thead>
					<tbody>
						@foreach($movimientos->get() AS $row)
	    			<tr>
	    				<td class="text-center">{{$loop->iteration}}</td>
	    				<td><span class='badge alert-danger'>{{$row->fecha}}</span></td>
	    				<td>{{$row->concepto->descripcion}}</td>
	    				<td>{{$row->observacion?$row->observacion:'N/A'}}</td>
	    				<td>{{$row->unidad->identificacion}}</td>
	    				<td>{{$row->unidad_detalles->descripcion}}</td>
	    			</tr>
	    			@endforeach
					</tbody>
				</table>
		</div>
	</div>
@endsection