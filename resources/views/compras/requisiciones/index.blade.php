@extends('layouts.app')

@section('view_descrip')
<h3 class="text-center">Requisiciones
			<a href="{{route('com_requisicion.create')}}" class="pull-right btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
	 		Agregar Requisición</a>
</h3>
@endsection

@section('content')
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
				 <h5 class="">Requisición eliminada con éxito&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
			    </div>
			</div>
		</div>
	<table class="table table-bordered table-hover table-condensed tabla">
		<thead>
			<tr>
				<th class="text-center">Código</th>
				<th class="text-center">Descripción</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Status</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Des_Unidad</th>
				<th class="text-center">Centro</th>
				<th class="text-center">Año</th>
				<th class="text-center">Detalle</th>
				<th class="text-center"></th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($requision as $con)
				<tr>
					<td>{{$con->codigo}}</td>
					<td>{{$con->descripcion}}</td>
					<td>{{date('d-m-Y', strtotime($con->fecha))}}</td>
					<td>{{$con->status}}</td>
					<td>{{$con->unidad}}</td>
					<td>{{$con->des_unidad}}</td>
					<td>{{$con->centro}}</td>
					<td>{{$con->ano}}</td>
					<td><a href="{{ url('com_requisicion/'.$con->id) }}" class="btn btn-flat btn-success btn-sm" title="Agregar Detalles"><i class="fa fa-search"></i></a></td>
					<td>
						<a href="{{ url('com_requisicion/'.$con->id.'/edit') }}" class="btn btn-flat btn-primary btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
						<button type="button" class="btn btn-danger btn-sm eliminar" title="Eliminar" data-eliminar = "{{$con->id}}"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
	<form action="{{url('com_requisicion/'.':USER')}}" id="form_eliminar">
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
				   agree = confirm("Esta seguro de querer borrar este registro?")

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