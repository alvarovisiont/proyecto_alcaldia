@extends('layouts.app')

@section('content')

<h2 class="text-center"> Modificar Insumo</h2>
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

<form action="{{url('com_insumos/'.$insumo->id)}}" method="POST">
{{method_field('PUT')}}
{{csrf_field()}}
	<div class="form-group col-md-2 col-md-offset-4">
		<label class="control-label">Codigo</label>
		<input type="text" name="codigo" class="form-control" value ="00{{$insumo->codigo}}" readonly>
	</div>

	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Descripcion del insumo</label>
		<input type="text" name="descripcion" class="form-control" value="{{$insumo->descripcion}}">
	</div>

	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Cantidad</label>
		<input type="text" name="cantidad" class="form-control" value="{{$insumo->cantidad}}">
	</div>

	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Bien</label>
		<select name="bienes" class="form-control" required="">
			<option value="">Seleccione...</option>
			<option value="1" @if($insumo->bienes == 1) selected="" @endif>Si</option>
			<option value="0" @if($insumo->bienes == 0) selected="" @endif>No</option>
		</select>
	</div>

	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Unidad</label>
		<select name="id_unidad" class="form-control">
			<option value="">Seleccione...</option>
			@foreach($unidad as $u)
			  <option value="{{$u->codigo}}" @if($u->codigo == $insumo->id_unidad) selected @endif>{{$u->descripcion}}</option>
			@endforeach
		</select>
	</div>

	
		<div class="form-group col-md-12 col-md-offset-4">
			<input type="submit" name="enviar" value="Modificar" class="btn btn-flat btn-success">
		</div>
</form>



@stop