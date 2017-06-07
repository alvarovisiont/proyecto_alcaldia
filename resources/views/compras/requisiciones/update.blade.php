@extends('layouts.app')

@section('view_descrip')
	<h3 class="text-center">Modificar Unidad {{ucwords($requisicion->codigo)}}</h3>
@endsection

@section('content')
	@include('compras.requisiciones.partials.form')
@endsection

@section('script')
	<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
	<script>
		$(function(){
			$("#fecha").datepicker({
				format: "dd-mm-yyyy",
				autoclose: true
			})

			$("#unidad").change(function(){
				var val = $(this).val(),
					detalle = $(this).children('[value="'+val+'"]').data('descripcion')

				$("#des_unidad").val(detalle)
			})
		})
	</script>
@endsection