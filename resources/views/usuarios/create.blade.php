@extends('layouts.app')

@section('view_descrip')
	Crear usuarios
@endsection

@section('content')
	
	@include('usuarios.partials.form', ['url' => 'usuario', 'usuario' => $usuario, 'edit' => false, 'areas' => $areas, 'sub_areas' => $sub_areas]);
	
@endsection

@section('script')
	<script>
		$(function(){
			var form = $("#form_usuario")
			
			$(form).find('.departamento').click(function(e) {
				
				let depar = e.target.value
				
				if(e.target.checked)
				{
					let cantidad = $(`#section_area${depar}`).find('.col-md-2').size()
					if(cantidad > 0)
					{
						$(`#section_area${depar}`).show('slow/400/fast')
					}
				}
				else
				{

					$(`#section_area${depar}`).hide('fast', function(){
						$(this).find('.area').each(function(e){
							
							$(this).prop('checked', false)

							let sub = $(this).val();
							
							$(`#section_sub_area${sub}`).hide('fast', function(e){
								$(this).find('.sub_area').each(function(e){
									$(this).prop('checked', false)
								})
							})
						})
					})
				}	
					
			})

			$(form).find('.area').click(function(e) {
				let area = e.target.value
				
				if(e.target.checked)
				{
					let cantidad = $(`#section_sub_area${area}`).find('.col-md-2').size()
					if(cantidad > 0)
					{

						$(`#section_sub_area${area}`).show('slow/400/fast')
					}
				}
				else
				{
					$(`#section_sub_area${area}`).hide('fast', function(){
						$(this).find('.sub_area').each(function(e){
							$(this).prop('checked', false)
						})
					})
				}	
			})
		})
	</script>
@endsection
