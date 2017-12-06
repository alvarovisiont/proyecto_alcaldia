@extends('layouts.app')

@section('view_descrip')
	Modificar usuarios
@endsection

@section('content')
	@php
		$x = 1;
		$valida = false;
	@endphp

	@include('usuarios.partials.form')
@endsection

@section('script')
	<script>


		$(function(){

			var field1 = document.getElementById('acumulado_departamentos'),
				field2 = document.getElementById('departamentos_grabar')
				field2.value = field1.value


			$('.area_checkbox').on('click',function(){
			
			// Función que se ejecuta cuando a las areas se les clickea

				var area = $(this).val(),
						check  = $(this)

				if(check.is(':checked'))
				{

					// Si el check esta checkeado se despliega el sub_area y se valida para agregar el departamento

					$('.div_sub_'+area).show('slow/400/fast')

					var depar = check.data().departamento,
							depar_selec = $('#departamentos_grabar').val(),
							depar_array  = depar_selec.split(','),
							valida = true

					for(var i = depar_array.length; i >= 0; i--)
					{
						if(depar == depar_array[i])
						{
							valida = false
						}
					}

					if(valida)
					{
						depar_selec += depar+','
						$('#departamentos_grabar').val(depar_selec)
					}
				}
				else
				{
					// Código para validar que si todas las areas están desactivadas borrar el departamento a grabar

					var depar = check.data().departamento,
							depar_selec = $('#departamentos_grabar').val(),
							valida = true,
							depar_selec_nuevo = ""

							depar_selec = depar_selec.substring(0, depar_selec.length -1)

					var depar_array  = depar_selec.split(',')

					$('.div_sub_'+area).hide('slow/400/fast')	

					$('.area_checkbox[data-departamento="'+depar+'"]').each(function(e){
						
						if($(this).is(':checked'))
						{
							valida = false
						}
					})

					if(valida)
					{
						for(var i = depar_array.length -1; i >= 0; i--)
						{
							if(parseInt(depar) != parseInt(depar_array[i]))
							{
								depar_selec_nuevo += depar_array[i]+','
							}
							
						}
						
						$('#departamentos_grabar').val(depar_selec_nuevo)

					}

					// ** ====================== Código para validar que los hijos de esa área sean deseleccionados ============= 

					$('.div_sub_'+area).children().children().children().each(function(e){
						$(this).prop('checked',false)
					})

				}
			})
		})
	</script>
@endsection
