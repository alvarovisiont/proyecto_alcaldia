<form action="{{url($ruta)}}" class="form-horizontal" id="form_provee" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}

	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Programatica</label>
		<div class="col-md-4">
			<input type="text" id="programatica" name="programatica" required="" class="form-control" value="{{$departamentos->programatica}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<textarea name="descripcion" id="descripcion" rows="2" required="" class="form-control">{{$departamentos->descripcion}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('com_departamentos.index')}}">Volver a la vista de los Departamentos</a>
		</div>
	</div>
</form>