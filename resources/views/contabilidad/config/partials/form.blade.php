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
		<label for="password" class="control-label col-md-2">Alcalde</label>
		<div class="col-md-4">
			<input type="text" id="alcalde" name="alcalde" required="" class="form-control" value="{{$config->alcalde}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="nombres" class="control-label col-md-2">Coordinador</label>
		<div class="col-md-4">
			<input type="text" id="coordinador" name="coordinador" required="" class="form-control" value="{{$config->coordinador}}">
		</div>
		@if($edit)
			<label for="nombres" class="control-label col-md-2">Status</label>
			<div class="col-md-4">
				<select name="status" id="status" required="" class="form-control">
					<option value=""></option>
					<option value="1" {{ $config->status === 1 ? 'selected' : ''}}>Activado</option>
					<option value="0" {{ $config->status === 0 ? 'selected' : ''}}>Desactivado</option>
				</select>
			</div>
		@endif
	</div>

	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('cont_configuracion.index')}}">Volver a la vista de la configuración</a>
		</div>
	</div>
</form>