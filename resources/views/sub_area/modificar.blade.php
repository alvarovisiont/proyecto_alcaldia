@extends('layouts.app')

@section('content')

<h2 class="text-center"> Modificar Sub_Area</h2>
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
	<form action="{{ url('sub_area/'.$sub->id_sub_area) }}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}
	<div class="form-group">
		<label class="control-label">Areas</label>
		<select name="area_id" class="form-control">
		  <option value="{{$sub->areas->id_area}}" selected>{{'Area:&nbsp;'.$sub->areas->nombre.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|Departamento:'.$sub->areas->departamentos->nombre}}</option>
		@foreach($areas as $area)
			<option value="{{$sub->areas->id_area}}">{{'Area:&nbsp;'.$sub->areas->nombre.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|Departamento:'.$area->departamentos->nombre}}</option>
		@endforeach
		</select>
		<div class="form-group">
			<label class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$sub->nombre}}">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Descripcion</label>
			<input type="text" class="form-control" name="descripcion" value="{{$sub->descripcion}}">
		</div>
		<div class="form-group">
			<label>Ruta</label>
			<input type="text" name="ruta" class="form-control" value="{{$sub->ruta}}">
		</div>
	</div>
		<div class="form-group col-md-offset-2">
			<input type="submit" name="enviar" value="Modificar" class="btn btn-flat btn-success">
			<a href="{{route('sub_area.index')}}" class="btn btn-flat btn-default"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
 Volver</a>
		</div>
</form>
</div>




@stop