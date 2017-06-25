@extends('layouts.app')

@section('view_descrip')
	Crear Orden
@endsection

@section('content')
	
	@include('compras.ordenes.partials.form');

@endsection

@section('script')
	<script>
		$(function(){

			$("#fecha_orden").datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				language: 'es'
			})

			$("#buscar_requisicion").change(function(event) {
				var val = $(this).val(),
					option = $(this).children('[value="'+val+'"]'),
					unidad = option.data().unidad,
					programatica = option.data().programatica,
					fecha = option.data().fecha,
					concepto = option.data().concepto

				$("#com_requisiciones_codigo").val(val)
				$("#com_requisicion_concepto").val(concepto)
				$("#fecha_requisicion").val(fecha)
				$("#com_departamento_programatica").val(programatica)
				$("#com_departamento_unidad").val(unidad)
			});

			$("#buscar_proveedor").change(function(event) {
				var rif = $(this).val(),
					option = $(this).children('[value="'+rif+'"]'),
					razon = option.data().razon,
					direccion = option.data().direccion

				$("#com_provees_rif").val(rif)
				$("#com_provees_razon_social").val(razon)
				$("#com_provees_direccion").val(direccion)
			});

			$("#form_orden").submit(function(e) {
				
				if($("#numero_control").val().length > 10)
				{
					alert("El número de control no puede poseer mas de 10 caracteres de longitud")
					return false
				}
				else
				{
					$("#form_orden").submit()
				}
			});
		})
	</script>
@endsection
