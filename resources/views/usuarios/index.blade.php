@extends('layouts.app')

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
				 <h5 class="">Usuario eliminado con éxito&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
			    </div>
			</div>
		</div>
	<h2 class="text-center">Usuarios del sistema</h2>
	<table class="table table-bordered table-hover table-condensed" id="tabla">
		<thead>
			<tr>
				<th class="text-center">Usuario</th>
				<th class="text-center">Nombres</th>
				<th class="text-center">Apellidos</th>
				<th class="text-center">Teléfono</th>
				<th class="text-center">Rol</th>
				<th class="text-center">Departamento</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($user as $row)
				<tr>
					<td>{{$row->usuario}}</td>
					<td>{{$row->nombres}}</td>
					<td>{{$row->apellidos}}</td>
					<td>{{$row->telefono}}</td>
					<td>{{$row->roles->nombre}}</td>
					<td>{{$row->departamentos->nombre}}</td>
					<td>
						<a href="{{ url('usuario/'.$row->id.'/edit') }}" class="btn btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
						<button type="button" class="btn btn-danger btn-sm eliminar" title="Eliminar" data-eliminar = "{{$row->id}}"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<form action="{{url('usuario/'.':USER')}}" id="form_eliminar">
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
				   datos = form.serialize();
					btn.parent().parent().remove();

				$.post(ruta, datos, function(){
					$("#aviso").show('slow/400/fast', function(){
						setTimeout(function(){
							$("#aviso").hide('slow');
						}, 2000);
					});
				});
			});

		});
	</script>
@endsection