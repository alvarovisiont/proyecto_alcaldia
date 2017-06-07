<form action="{{url($ruta)}}" class="form-horizontal" id="form_provee" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}

	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Rif_Cédula</label>
		<div class="col-md-4">
			<input type="number" id="rif_cedula" name="rif_cedula" required="" class="form-control" value="{{$proveedores->rif_cedula}}">
		</div>
		<label for="password" class="control-label col-md-2">Razón Social</label>
		<div class="col-md-4">
			<input type="text" id="razon_social" name="razon_social" required="" class="form-control" value="{{$proveedores->razon_social}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="nombres" class="control-label col-md-2">Dirección</label>
		<div class="col-md-4">
			<textarea name="direccion" id="direccion" rows="2" required="" class="form-control">{{$proveedores->direccion}}</textarea>
		</div>

		<label for="nombres" class="control-label col-md-2">Télefono</label>
		<div class="col-md-4">
			<input type="number" id="telefono" name="telefono" required="" class="form-control" value="{{$proveedores->telefono}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="nombres" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<textarea name="descripcion" id="descripcion" rows="2" required="" class="form-control">{{$proveedores->descripcion}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('com_proveedores.index')}}">Volver a la vista de los Proveedores</a>
		</div>
	</div>
</form>