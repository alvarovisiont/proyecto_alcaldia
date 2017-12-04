<form action="{{url($ruta)}}" class="form-horizontal" id="form_config" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}
	
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul class="text-center">
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<div class="form-group">
		<!--Grupo USUARIO CONTRASEÑA-->
		<label for="usuario" class="control-label col-md-2">Comprobante</label>
		<div class="col-md-4">
			<input type="text" id="comprobante" name="comprobante" class="form-control" required="" 
			value="{{$asiento->comprobante}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<textarea name="descripcion" id="descripcion" rows="2" class="form-control">{{$asiento->descripcion}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="usuario" class="control-label col-md-2">Fecha</label>
		<div class="col-md-4">
			<input type="text" id="fecha" name="fecha" class="form-control fecha" required="" 
			value="{{$asiento->fecha ? date('d-m-Y',strtotime($asiento->fecha)) : ''}}">
		</div>
		<label for="usuario" class="control-label col-md-2">Status</label>
		<div class="col-md-4">
			<select name="status" id="status" class="form-control" required="">
				<option value=""></option>
				<option value="1" 
					@if($edit) @if($asiento->status == 1) {{'selected'}} @endif @endif>
					Vigente
				</option>	
				<option value="0"
					@if($edit) @if($asiento->status == 0) {{'selected'}} @endif @endif>
					Inactivo
				</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('cont_asientos.index')}}">Volver a la vista de asientos</a>
		</div>
	</div>
</form>