@extends('layouts.app')
@section('view_descrip')
<h2 class="page-header" style="margin-top:0!important">
  <i class="fa fa-user" aria-hidden="true"></i>
  {{$perfil->nombres.' '.$perfil->apellidos}}
  <small class="pull-right">Role: {{-- Auth::users()->roles->nombre --}}</small>
</h2>
@endsection
@section('content')
	@include('partials.flash')
	<div clas="row">
		<button class="btn btn-flat btn-warning" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit" aria-hidden="true"></i> Modificar informacion</button>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<h4>Detalles</h4>
				<p><b>Usuario:</b> {{$perfil->usuario }}</p>
				<p><b>Nombre:</b> {{$perfil->nombres }}</p>
				<p><b>Apellidos:</b> {{$perfil->apellidos }}</p>
				<p><b>Cedula:</b> {{$perfil->nac.'-'.$perfil->cedula }}</p>
				<p><b>Telefono:</b> {{$perfil->telefono }}</p>
			</div>
			<div class="col-md-4">
				<h4>Departamento</h4>
				<p><b>Departamento: </b> {{ $perfil->departamentos->nombre }}</p>
			</div>

			<div class="col-md-4">
				<h4>Accesos</h4>
					{{ Auth::user()->departamentos->nombre }}
			</div>
    </div>
	</div>

		<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title" id="editModalLabel">Modificar informacion</h4>
	        </div>
	        <div class="modal-body">
	          <div class="row">
	          	<div class="col-md-8 col-md-offset-2">
		            <form action="{{route('update_perfil')}}" method="POST" id="editar">
									  {{method_field('PATCH')}}
									  {{csrf_field()}}
								  <div class="form-group">
										 <div class="alert alert-danger" style="display:none;" id="message">
									      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									      <strong class="text-center">Las contraseñas deben ser iguales</strong> 
			  				     </div>
								  </div>
								  <div class="form-group">
								    <label for="nombres">Nombres: </label>
								    <input type="text" class="form-control" name="nombres"  value="{{$perfil->nombres}}" required>
								  </div>

								  <div class="form-group">
								    <label for="apellidos">Apellidos:</label>
								    <input type="text" class="form-control" name="apellidos" value="{{$perfil->apellidos}}" required>
								  </div>

								  <div class="form-group">
								    <label for="telefono">Telefono:</label>
								    <input type="text" class="form-control" name="telefono" value="{{$perfil->telefono}}" required>
								  </div>

								  <div class="form-group">
								  	<div class="checkbox">
									    <label>
									      <input type="checkbox" id="pp" name="checkbox" value="Yes"> ¿Desea cambiar su contraseña?
									    </label>
								    </div>
								  </div>

								  <section id="pass" style="display:none">
									  <div class="form-group">
									  	<label for="password_new">Nueva contraseña</label>
									  	<input type="password" class="form-control" name="password_new">
									  </div>
									  <div class=" form-group">
									  	<label for="password_rep">Password repeat</label>
									  	<input type="password" class="form-control" name="password_rep">
									  </div>
								  </section>

								  <div class="form-group">
								     <button type="submit" id="send" class="btn btn-flat btn-success">Guardar</button>
								  </div>
							  </form>
							</div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
@stop

@section('script')
 	<script type="text/javascript">
 	$(document).ready(function(){
 			$("#pp").click(function(event) {
	 		var bool = this.checked;
	 		if(bool === true){
	 			$("#pass").show('slow/400/fast');
	 			$("#password_new,password_rep").prop('required',true);
	 		}else{

	 			$("#pass").hide('slow/400/fast');
	 			$("#password_new,password_rep").prop('required',false).val('');
	 		}
	 	});

		$("#send").click(function(event) {
			event.preventDefault();
			var form  = $('#editar');
			var pass1 = $("#pass_new").val();
			var pass2 = $("#pass_rep").val();
			var message = $("#message");
			if(pass1 === pass2){
				form.submit();
			}else{
				$("#pass_new").css('border','solid 1px red');
				$("#pass_rep").css('border','solid 1px red');
				message.fadeIn('slow/400/fast');
				message.fadeOut(3000);				
			}
	 	});
 	});
 	</script>
@stop