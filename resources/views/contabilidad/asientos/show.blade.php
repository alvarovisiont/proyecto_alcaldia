@extends('layouts.app')

@section('view_descrip')
	<h3 class="text-center">
		
		<a href="{{route('cont_asientos.index')}}" class=" btn btn-default letras-medianas pull-left" data-eliminar="{{$asiento->id}}" title="Eliminar Asiento"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Volver</a>	

		Detalles del asiento {{$asiento->comprobante}}
		
		<button type="button" class=" btn btn-danger eliminar-asiento letras-medianas pull-right" data-eliminar="{{$asiento->id}}" title="Eliminar Asiento">Eliminar Asiento&nbsp;&nbsp;<i class="fa fa-trash"></i></button>	
	</h3>
	<br>
	@include('partials.flash')
	<br>
	<form action="{{ url('/cont_asiento_detalles') }}" id="form_registrar" method="POST">
		{{csrf_field()}}
		
		<input type="hidden" id="cont__master_accounts_id" name="cont__master_accounts_id">
		<input type="hidden" id="cont_auxiliares_id" name="cont_auxiliares_id" value="0">	
		<input type="hidden" id="cont_asientos_id" name="cont_asientos_id" value="{{$asiento->id}}">	

		<div class="form-group row">
			<div class="col-md-4">
				<label for="" class="col-md-3">
					<a href="#modal_cuenta" data-toggle="modal">Cuenta</a>
				</label>
				<div class="col-md-4">
					<input type="text" id="codigo_cuenta" readonly="" class="form-control">
				</div>
				<div class="col-md-4">
					<input type="text" id="descripcion_cuenta" readonly="" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<label for="" class="col-md-2">
					<a href="#modal_auxiliar" data-toggle="modal">Aux</a>
				</label>
				<div class="col-md-4">
					<input type="text" id="codigo_auxiliar" readonly="" class="form-control">
				</div>
				<div class="col-md-4">
					<input type="text" id="descripcion_auxiliar" readonly="" class="form-control">
				</div>
			</div>
			<div class="col-md-4">
				<label for="" class="col-md-4">Referencia</label>
				<div class="col-md-8">
					<input type="text" id="referencia" name="referencia" class="form-control">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="" class="col-md-1 col-md-offset-1">Debe</label>
			<div class="col-md-2">
				<input type="number" id="debe" name="debe" class="form-control" step="any">
			</div>
			<label for="" class="col-md-1 col-md-offset-1">haber</label>
			<div class="col-md-2">
					<input type="number" id="haber" name="haber" class="form-control" step="any">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-primary btn-block">Guardar&nbsp;<i class="fa fa-save"></i></button>
			</div>
		</div>
	</form>

@endsection

@section('content')

	<table class="table table-hover table-bordered table-condensed">
		<thead>
			<tr>
				<th class="text-center">Cuenta</th>
				<th class="text-center">Descripción</th>
				<th class="text-center">Aux</th>
				<th class="text-center">Descripción</th>
				<th class="text-center">Referencia</th>
				<th class="text-center">Debe</th>
				<th class="text-center">Haber</th>
				@if(Auth::user()->restringido())
					<th class="text-center">Eliminar</th>
				@endif
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($detalles as $row)
				<tr>
					<td>{{ $row->cuenta_codigo }}</td>
					<td>{{ $row->cuenta_descripcion }}</td>
					<td>{{ $row->cuenta_auxiliar }}</td>
					<td>{{ $row->auxiliar_descripcion }}</td>
					<td>{{ $row->referencia }}</td>
					<td>{{ $row->debe }}</td>
					<td>{{ $row->haber }}</td>
					@if(Auth::user()->restringido())
						<td>
							<a href="#" class="eliminar-detalle" data-eliminar="{{$row->id}}"><i class="fa fa-trash"></i></a>
						</td>
					@endif
				</tr>
				@php
					$debe = $row->debe + $debe;
					$haber = $row->haber + $haber;
					$contador++;
				@endphp
			@endforeach
			<tr>
				<td>
					@if($debe === $haber && $contador > 0)
						<p style="color: #367fa9; font-size: 14px">Asiento Cuadrado</p>
					@else
						<p style="color: darkred; font-size: 14px">Asiento No Cuadrado</p>
					@endif
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><span class="badge alert-info">{{$debe}}</span></td>
				<td><span class="badge alert-danger">{{$haber}}</span></td>
				<td></td>
			</tr>			
		</tbody>
	</table>

<!-- ** ==================================== MODALES ======================================== ** -->
	<div id="modal_cuenta" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header login-header">
	                <button type="button" class="close" data-dismiss="modal">×</button>
	                <h4 class="modal-title">Escoger Cuenta</h4>
	            </div>
                <div class="modal-body">
                	<table class="table table-hover table-striped">
                		<thead>
                			<tr>
                				<th class="text-center">Cuenta</th>
                				<th class="text-center">Descripción</th>
                				<th class="text-center">Elegir</th>
                			</tr>
                		</thead>
                		<tbody class="text-center">
                			@foreach($cuentas as $row)
                				<tr>
                					<td>{{ $row->cuenta }}</td>
                					<td>{{ $row->descripcion }}</td>
                					<td>
                						<button type="button" 
                							data-id="{{ $row->id }}" 
                							data-descripcion="{{ $row->descripcion }}" 
                							data-cuenta="{{ $row->cuenta }}" 
                							class="btn btn-success btn-xs elegir-cuenta">
                							<i class="fa fa-check"></i>
                						</button>
                					</td>
                				</tr>
                			@endforeach
                		</tbody>
                	</table>
                </div><!-- fin modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
	        </div><!-- fin modal-content -->
	    </div><!-- fin modal-dialog -->
	</div> <!-- fin modal -->

	<div id="modal_auxiliar" class="modal fade" role="dialog">
	    <div class="modal-dialog">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header login-header">
	                <button type="button" class="close" data-dismiss="modal">×</button>
	                <h4 class="modal-title">Escoger Auxiliar</h4>
	            </div>
	            <div class="modal-body">
	            	<table class="table-hover table-striped" id="tabla_modal_auxiliar">
                		<thead>
                			<tr>
                				<th class="text-center">Auxiliar</th>
                				<th class="text-center">Descripción</th>
                				<th class="text-center">Elegir</th>
                			</tr>
                		</thead>
                		<tbody class="text-center">
                		</tbody>
                	</table>
	            </div><!-- fin modal-body -->
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	            </div>
	        </div><!-- fin modal-content -->
	    </div><!-- fin modal-dialog -->
	</div> <!-- fin modal -->
<!-- ** ===================================================================================== ** -->


	<form action="{{ url('cont_asientos/'.':USER') }}" id="form_eliminar" method="POST">
		{{csrf_field()}}
		{{method_field('DELETE')}}
	</form>
	<form action="{{ url('/cont_asiento_detalles/'.':USER') }}" id="form_eliminar_detalle" method="POST">
		{{csrf_field()}}
		{{method_field('DELETE')}}
	</form>
@endsection
@section('script')
	<script>
		$(function(){
			$('.eliminar-asiento').click(function(){

				var form = $('#form_eliminar'),
					id   = $(this).data('eliminar')
				ruta = form.prop('action').replace(':USER',id)
				form.attr('action',ruta)
				
				form.submit()

			})

			$('.eliminar-detalle').click(function(){

				var form = $('#form_eliminar_detalle'),
					id   = $(this).data('eliminar')
				ruta = form.prop('action').replace(':USER',id)
				form.attr('action',ruta)
				
				form.submit()

			})

			$('.elegir-cuenta').click(function(e){
				
				var id_cuenta   = e.currentTarget.dataset.id
				var descripcion = e.currentTarget.dataset.descripcion
				var cuenta      = e.currentTarget.dataset.cuenta

				document.getElementById('cont__master_accounts_id').value = id_cuenta
				document.getElementById('descripcion_cuenta').value = descripcion
				document.getElementById('codigo_cuenta').value = cuenta

				$('#modal_cuenta').modal('hide')

			})

			$('#modal_auxiliar').on('show.bs.modal',function(e){
				var id_cuenta = document.getElementById('cont__master_accounts_id').value
				
				if(id_cuenta == '') 
				{
					alert('Debe seleccionar una cuenta para poder seleccionar un auxiliar')
					e.preventDefault()
				}
				else
				{
					$.ajax({
						url: '{{url("/cont_traer_auxiliares")}}',
						type: 'GET',
						dataType: 'JSON',
						data: {cuenta: id_cuenta},
					})
					.done(function(response) {
						var html = '',
							tabla_aux = document.getElementById('tabla_modal_auxiliar')

						tabla_aux.childNodes[3].innerHTML = ''

						response.forEach(function(ele,index){
							
							var button = '<button type="button" class="btn btn-success btn-xs elegir-auxiliar" data-id="'+ele.id+'" data-descripcion="'+ele.descripcion+'"  data-cuenta="'+ele.auxiliar+'"><i class="fa fa-check"></i></button>'

							html+= '<tr><td>'+ele.auxiliar+'</td><td>'+ele.descripcion+'</td><td>'+button+'</td></tr>'	
						})

						tabla_aux.setAttribute('class','table')

						tabla_aux.childNodes[3].innerHTML = html

					})
					.fail(function(error) {
						console.log(error);
					})
					
				}
			}) // fin modal auxiliar
				
		})

		$('#tabla_modal_auxiliar > tbody').on('click','tr > td > .elegir-auxiliar',function(e){

			var id_auxiliar   = e.currentTarget.dataset.id
			var descripcion = e.currentTarget.dataset.descripcion
			var cuenta      = e.currentTarget.dataset.cuenta

			document.getElementById('cont_auxiliares_id').value = id_auxiliar
			document.getElementById('descripcion_auxiliar').value = descripcion
			document.getElementById('codigo_auxiliar').value = cuenta

			$('#modal_auxiliar').modal('hide')
		})
	</script>
@endsection