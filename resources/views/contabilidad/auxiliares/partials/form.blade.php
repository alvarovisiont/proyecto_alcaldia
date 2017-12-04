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
			<select name="cont__master_accounts_id" id="cont__master_accounts_id" class="form-control" required="">
				<option value=""></option>
				@foreach($cuentas as $row)
					<option value="{{$row->id}}" 
						@if($edit) @if($row->id == $auxiliar->cont__master_accounts_id) {{'selected'}} @endif @endif >
						{{$row->cuenta}}
					</option>
				@endforeach
			</select>
		</div>
		<label for="password" class="control-label col-md-2">Auxiliar</label>
		<div class="col-md-4">
			<input type="number" id="auxiliar" name="auxiliar" required="" class="form-control" value="{{$auxiliar->auxiliar}}">
		</div>
	</div>
	<div class="form-group">
		<!--Grupo NOMBRE APELLIDO-->
		<label for="nombres" class="control-label col-md-2">Descripción</label>
		<div class="col-md-4">
			<textarea name="descripcion" id="descripcion" rows="2" class="form-control">{{$auxiliar->descripcion}}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-block btn-danger">Guardar&nbsp;<i class="fa fa-send"></i></button>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<a class="btn btn-link" href="{{route('cont_auxiliares.index')}}">Volver a la vista de la auxiliares</a>
		</div>
	</div>
</form>