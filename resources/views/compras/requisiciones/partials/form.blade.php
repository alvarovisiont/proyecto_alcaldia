<form action="{{url($ruta)}}" class="form-horizontal" id="form_provee" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}

	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Codigo</label>
		<div class="col-md-4">
			<input type="text" id="codigo" name="codigo" required="" class="form-control" value="{{$requisicion->codigo}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<textarea name="descripcion" id="descripcion" rows="2" required="" class="form-control">{{$requisicion->descripcion}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Unidad</label>
		<div class="col-md-4">
			<select name="unidad" id="unidad" required="" class="form-control">
				<option value=""></option>
				@foreach($departamentos as $row)
					<option value="{{$row->programatica}}" data-descripcion="{{$row->descripcion}}" 
					<? if($requisicion->unidad != null){ if($requisicion->unidad == $row->programatica) {echo "selected";}} ?>
					>{{$row->programatica}}</option>
				@endforeach
			</select>
		</div>
		<label for="nombres" class="control-label col-md-2">Des_unidad</label>
		<div class="col-md-4">
			<input type="text" id="des_unidad" name="des_unidad" required="" class="form-control" value="{{$requisicion->des_unidad}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Fecha</label>
		<div class="col-md-4">
			<input type="text" id="fecha" name="fecha" required="" class="form-control" value="{{date('d-m-Y', strtotime($requisicion->fecha))}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Status</label>
		<div class="col-md-4">
			<input type="text" id="status" name="status" required="" class="form-control" value="{{$requisicion->status}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Centro</label>
		<div class="col-md-4">
			<input type="text" id="centro" name="centro" required="" class="form-control" value="{{$requisicion->centro}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Ano</label>
		<div class="col-md-4">
			<input type="text" id="ano" name="ano" required="" class="form-control" value="<? 
			if($requisicion->ano != ""){echo $requisicion->ano;}else{ echo $año->ano;} ?>
			" readonly="">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('com_requisicion.index')}}">Volver a la vista de las requisiciones</a>
		</div>
	</div>
</form>