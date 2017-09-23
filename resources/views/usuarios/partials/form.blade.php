
<ul class="nav nav-pills nav-justified">
  <li class="active"><a data-toggle="pill" href="#datos">Datos</a></li>
  <li><a data-toggle="pill" href="#permisos">Permisos</a></li>
</ul>
	<br><br>
<form action="{{url($url)}}" method="POST" class="form-horizontal" id="form_usuario">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}
	
	<div class="tab-content">	
	  <div id="datos" class="tab-pane fade in active">
	    <div class="form-group">
			<!--Grupo nacionalidad-->
			<label for="nac" class="control-label col-md-2">Nac</label>
			<div class="col-md-4">
				<select name="nac" id="nac" class="form-control" required="">
					@if($usuario->nac == 'V')
						<option value="V" selected="">V</option>
						<option value="E">E</option>
					@elseif($usuario->nac == 'E')
						<option value="V">V</option>
						<option value="E" selected="">E</option>	
					@else
						<option value="V">V</option>
						<option value="E">E</option>
					@endif
				</select>
			</div>
		</div>
		<div class="form-group">
			<!--Grupo USUARIO CONTRASEÑA-->
			<label for="usuario" class="control-label col-md-2">Usuario</label>
			<div class="col-md-4 {{ $errors->has('usuario') ? 'has-error' : ''}}">
				<input type="text" id="usuario" name="usuario" required="" class="form-control" value="{{$usuario->usuario}}">
				@if($errors->has('usuario'))
					<span class="help-block"><strong>{{$errors->first('usuario')}}</strong></span>
				@endif
			</div>
			<label for="password" class="control-label col-md-2">Password</label>
			<div class="col-md-4">
				<input type="text" id="password" name="password" required="" class="form-control" value="{{$usuario->password}}">
			</div>
		</div>
		<div class="form-group">
			<!--Grupo NOMBRE APELLIDO-->
			<label for="nombres" class="control-label col-md-2">Nombres</label>
			<div class="col-md-4">
				<input type="text" id="nombres" name="nombres" required="" class="form-control" value="{{$usuario->nombres}}">
			</div>
			<label for="apellidos" class="control-label col-md-2">Apellidos</label>
			<div class="col-md-4">
				<input type="text" id="apellidos" name="apellidos" required="" class="form-control" value="{{$usuario->apellidos}}">
			</div>
		</div>
		<div class="form-group">
			<!--Grupo CEDULA TELEFONO-->
			<label for="cedula" class="control-label col-md-2">Cedula</label>
			<div class="col-md-4 {{$errors->has('cedula') ? 'has-error' : ''}}">
				<input type="number" id="cedula" name="cedula" required="" class="form-control" value="{{$usuario->cedula}}" min="0">
				@if($errors->has('cedula'))
					<span class="help-block"><strong>{{$errors->first('cedula')}}</strong></span>
				@endif
			</div>
			<label for="telefono" class="control-label col-md-2">Telefono</label>
			<div class="col-md-4">
				<input type="number" id="telefono" name="telefono" required="" class="form-control" value="{{$usuario->telefono}}">
			</div>
		</div>
		<div class="form-group">
			<label for="cedula" class="control-label col-md-2">Roles</label>
			<div class="col-md-4">
				<select name="rol_id" id="rol_id" class="form-control" required="">
					@foreach($roles as $row)
						@if($usuario->rol_id == $row->id_rol)
							<option value="{{$row->id_rol}}" selected="">{{$row->nombre}}</option>
						@else
							<option value="{{$row->id_rol}}">{{$row->nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<label for="departamento_id" class="control-label col-md-2">Departamento_Area</label>
			<div class="col-md-4">
				<select name="departamento_id" id="departamento_id" class="form-control" required="">
					@foreach($departamentos as $row)
						@if($usuario->departamento_id == $row->id_departamento)
							<option value="{{$row->id_departamento}}" selected="">{{$row->nombre}}</option>
						@else
							<option value="{{$row->id_departamento}}">{{$row->nombre}}</option>
						@endif
					@endforeach
				</select>
			</div>
		</div>
	  </div>
	
	  	<div id="permisos" class="tab-pane fade">
	  		<input type="hidden" id="departamentos_grabar" name="departamentos_grabar">
	  		<table class="table table-hover table-bordered">
	  			<thead>
	  				<tr>
	  					<th class="text-center" width="20%">Departamento</th>
	  					<th class="text-center" width="80%">Areas y Sub-Areas</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				@foreach($departamentos as $depar)
						<tr>
							<td width="20%">{{ $depar->nombre }}</td>
							<td width="80%">
								@if($validar_accion)
									@include('usuarios.partials.areas_modificar')
								@else
									@include('usuarios.partials.areas_crear')
								@endif
							</td>
						</tr>
	  				@endforeach
	  			</tbody>
	  		</table>
	  	</div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<div class="col-md-offset-2 col-md-3">
				<button type="submit" class="btn btn-success btn-block">Guardar&nbsp;&nbsp;<i class="fa fa-save"></i></button>
			</div>	
			<div class="col-md-offset-3 col-md-4">
				<a href="{{route('usuario.index')}}" class="btn btn-link">Volver al listado de usuarios&nbsp;&nbsp;</a>
			</div>
		</div>
	</div>
</form>

