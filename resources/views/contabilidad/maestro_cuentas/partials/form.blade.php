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
		<label for="usuario" class="control-label col-md-2">Cuenta</label>
		<div class="col-md-4">
			<input type="text" id="cuenta" name="cuenta" required="" class="form-control" value="{{$cuenta->cuenta}}">
		</div>
		<label for="password" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<input type="text" id="descripcion" name="descripcion" required="" class="form-control" value="{{$cuenta->descripcion}}">
		</div>
	</div>
	<div class="form-group">
		<label for="nombres" class="control-label col-md-2">Publicación 21</label>
		<div class="col-md-4">
			<input type="number" id="p21" name="p21" required="" class="form-control" value="{{$cuenta->p21}}">
		</div>
		<label for="nombres" class="control-label col-md-2">Año</label>
		<div class="col-md-4">
			<input type="number" id="ano" name="ano" required="" class="form-control" value="{{$cuenta->ano}}">
		</div>	
	</div>
	</div>
	<div class="form-group">
		<div class="col-md-2 col-md-offset-2">
			<label for="operativa" class="checkbox-inline">
				<input type="checkbox" id="operativa" name="operativa" value="1" {{ $cuenta->operativa === 1 ? 'checked' : ''}}>
				Operativa
			</label>
		</div>
		<div class="col-md-2">
			<label for="detalle" class="checkbox-inline">
				<input type="checkbox" id="detalle" name="detalle" value="1" {{ $cuenta->detalle === 1 ? 'checked' : ''}}>
				Detalle
			</label>

		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('cont_maestroCuentas.index')}}">Volver a la vista de Cuentas</a>
		</div>
	</div>
</form>