@extends('layouts.app')

@section('view_descrip')

	
	<div class="info-box">
	  <!-- Apply any bg-* class to to the icon to color it -->
	  	<span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
	  	<div class="info-box-content">
		    <span class="info-box-text">Total Proveedores</span>
	    	<span class="info-box-number" id="total_registros">{{count($proveedores)}}</span>
	    	<br>
	  	</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
	<h3 class="text-center">Proveedores</h3>
</h3>
@endsection

@section('content')
		<div class="box box-info color-palette-box">
		    <div class="box-header with-border">
		      	<h2 class="box-title"><i class="fa fa-truck"></i>&nbsp;&nbsp;Proveedores Registrados</h2>
		      	<div class="pull-right">
					@if(Auth::user()->restringido())
		       			<a href="{{route('com_proveedores.create')}}" class="btn btn-success btn-flat btn-md pull-right">Registrar Proveedores&nbsp;&nbsp;<i class="fa fa-pencil"></i><i class="fa fa-plus"></i></a>
		       		@endif
		      	</div>
		    </div>
		    <div class="box-body">
				<?php
					$x = 0;
				?>
				@if(Session::has('flash_create'))
					<div class="row">
						<div class="col-md-8 col-md-offset-2 ">
							<div class="alert alert-success">
							 <h5 class="text-center">{{Session::get('flash_create')}}&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
						    </div>
						</div>
					</div>
					 <?php 
					 	$x = 1;
					 ?>
				@endif
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="alert alert-success" id="aviso" style="display: none;">
						 <h5 class="">Proveedor eliminado con éxito&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
					    </div>
					</div>
				</div>
				<table class="table table-bordered table-hover table-condensed tabla">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Rif_cédula</th>
							<th class="text-center">Razón_social</th>
							<th class="text-center">Dirección</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center">Descripción</th>
							@if(Auth::user()->restringido())
							<th class="text-center">Acceso</th>
							@endif
						</tr>
					</thead>
					<tbody class="text-center">
						@php $i=1; @endphp
						@foreach($proveedores as $con)
							<tr>
								<td>{{$i}}</td>
								<td>{{$con->rif_cedula}}</td>
								<td>{{$con->razon_social}}</td>
								<td>{{$con->direccion}}</td>
								<td>{{$con->telefono}}</td>
								<td>{{$con->descripcion}}</td>
								@if(Auth::user()->restringido())
								<td>
									<a href="{{ url('com_proveedores/'.$con->id.'/edit') }}" class="btn btn-flat btn-primary btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
									<button type="button" class="btn btn-danger btn-sm eliminar" title="Eliminar" data-eliminar = "{{$con->id}}"><i class="fa fa-trash"></i></button>
								</td>
								@endif
							</tr>
							@php $i++; @endphp
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	<form action="{{url('com_proveedores/'.':USER')}}" id="form_eliminar">
		{{csrf_field()}}
		{{method_field('DELETE')}}
	</form>
@endsection
@section('script')
	<script>
		$(function(){
			var validate = <?php echo $x; ?>;

			if(validate == 1)
			{
				setTimeout(function(){
					
					$(".alert-success").hide('slow');

				}, 2500);
				
			}

			$(".eliminar").click(function(){

				var btn  = $(this),
					id   = btn.data('eliminar'),
					form = $("#form_eliminar"),
					ruta = form.attr('action').replace(':USER', id),
				   datos = form.serialize(),
				   agree = confirm("Esta seguro de querer borrar este proveedor?")

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