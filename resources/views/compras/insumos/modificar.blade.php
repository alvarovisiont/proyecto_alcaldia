@extends('layouts.app')

@section('content')

<h2 class="text-center"> Modificar Rol</h2>
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

<form action="{{url('roles/'.$rol->id_rol)}}" method="POST">
{{csrf_field()}}
{{method_field('PUT')}}
	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Nombre del rol</label>
		<input type="text" name="nombre" class="form-control" value="{{$rol->nombre}}">
	</div>
	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Descripcion del rol</label>
		<input type="text" name="descripcion" class="form-control" value="{{$rol->descripcion}}">
	</div>
	
		<div class="form-group col-md-12 col-md-offset-4">
			<input type="submit"  value="Modificar" class="btn btn-flat btn-success">
			<a href="{{route('roles.index')}}" class="btn btn-flat btn-default"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
 Volver</a>
		</div>
</form>



@stop