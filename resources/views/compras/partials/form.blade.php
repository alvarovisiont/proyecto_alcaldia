<form action="{{url($ruta)}}" class="form-horizontal" id="form_config" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}

	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Año</label>
		<div class="col-md-4">
			<input type="number" id="ano" name="ano" required="" class="form-control" value="{{$config->ano}}">
		</div>
		<label for="password" class="control-label col-md-2">Presidente</label>
		<div class="col-md-4">
			<input type="text" id="presidente" name="presidente" required="" class="form-control" value="{{$config->presidente}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="nombres" class="control-label col-md-2">Coordinador</label>
		<div class="col-md-4">
			<input type="text" id="coordinador" name="coordinador" required="" class="form-control" value="{{$config->coordinador}}">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
	</div>
</form>