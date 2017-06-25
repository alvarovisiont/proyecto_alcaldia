@extends('layouts.app')

@section('view_descrip')
	Detallle de Ordenes
@endsection

@section('content')
	@include('compras.ordenes.detalle_ordenes.partials.form');
	<br><br><br>

	<div class="row">
		<div class="col-md-8 col-md-offset-2 text-center">
			<div class="alert alert-success" id="aviso" style="display: none;">
			 <h5 class="" id="title_aviso">&nbsp;<i class="fa fa-exclamation-circle"></i></h5>
		    </div>
		</div>
	</div>

	<h2 class="text-center">Orden Detalle</h2>
	<table class="table table-bordered table-hover table-condensed" id="tabla">
		<thead>
			<tr>
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
			@if($detalles)
			
				@foreach($detalles as $row)	
					<tr>
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
			@else
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			@endif
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


			$("#item_insumo").change(function(event) {
				var val = $(this).val(),
					option = $(this).children('[value="'+val+'"]'),
					desc = option.data().descripcion,
					unidad = option.data().unidad

					$("#descripcion").val(desc)
					$("#unidad").val(unidad)
			})

			$("#form_detalle").submit(function(e) {
				e.preventDefault()

				var datos = $(this).serialize(),
					ruta  = $(this).attr('action')

				$.ajax({
					url: ruta,
					type: 'POST',
					data: datos,
					dataType:'JSON',
					cache: false,
					success: function(data)
					{
						$("#form_detalle")[0].reset()

						$("#title_aviso").text('').html('Detalle Agregado con Éxito&nbsp;<i class="fa fa-exclamation-circle"></i>')

						$("#aviso").show('slow/400/fast', function(){
							setTimeout(function(){
								$("#aviso").hide('slow');
							}, 2000);
						});

						var filas = '<tr><td>'+data.descripcion+'</td><td>'+data.unidad+'</td><td>'+data.cantidad+'</td><td>'+data.base+'</td><td>'+data.iva+'</td><td>'+data.iva_porcentaje+'</td><td>'+data.total+'</td><td>'+data.ano+'</td><td>'+data.eliminar+'</td></tr>'

						$("#tabla tbody").append(filas)
					}
				})
			})

			$("#com_ordenes_id").change(function(event) {
				var val = $(this).val()

				$("#tabla tbody").html('')

				$.ajax({
					url: '{{ url("com_traer_detalles") }}',
					type: 'GET',
					data: {orden : val},
					dataType:'JSON',
					cache: false,
					success: function(data)
					{
						var filas = ""
						if(Object.keys(data[0]).length > 0)
						{
							data.forEach(function(val){
								filas+= '<tr><td>'+val.descripcion+'</td><td>'+val.unidad+'</td><td>'+val.cantidad+'</td><td>'+val.base+'</td><td>'+val.iva+'</td><td>'+val.iva_porcentaje+'</td><td>'+val.total+'</td><td>'+val.ano+'</td><td><a href="#" id="eliminar_detalle" data-eliminar="'+val.id+'" class="eliminar"><i class="fa fa-trash"></i></a></td></tr>'
							})	
						}

						$("#tabla tbody").html(filas)
					}
				})
			});

			$("#tabla tbody").on('click','tr td .eliminar',function(){

				$("#title_aviso").text('').html('Detalle Eliminado con Éxito&nbsp;<i class="fa fa-exclamation-circle"></i>')

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