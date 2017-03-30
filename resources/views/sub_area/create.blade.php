@extends('layouts.app')

@section('content')

<h2 class="text-center"> Registrar Sub_Area</h2>
<hr>

@if(count($errors) > 0)
			 <div class="alert alert-danger">
			 	<ul>
			 	@foreach($errors->all() as $error)
			 		<li>{{$error}}</li>
			 	@endforeach
			 	</ul>
			 </div>
			 @endif
<div class="col-md-5 col-md-offset-3">
	<form action="{{route('sub_area.store')}}" method="POST">
{{csrf_field()}}
	<div class="form-group">
		<label class="control-label">Areas</label>
		<select name="area_id" class="form-control">
		  <option value="" selected>Seleccione...</option>
		@foreach($areas as $area)
			<option value="{{$area->id_area}}">{{'Area:&nbsp;'.$area->nombre.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|Departamento:'.$area->departamentos->nombre}}</option>
		@endforeach
		</select>
		<div class="form-group">
			<label class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Descripcion</label>
			<input type="text" class="form-control" name="descripcion">
		</div>
		<div class="form-group">
			<label>Ruta</label>
			<input type="text" name="ruta" class="form-control">
		</div>
	</div>
		<div class="form-group col-md-offset-2">
			<input type="submit" name="enviar" value="Registrar" class="btn btn-flat btn-success">
			<a href="{{route('sub_area.index')}}" class="btn btn-flat btn-default"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
 Volver</a>
		</div>
</form>
</div>




@stop