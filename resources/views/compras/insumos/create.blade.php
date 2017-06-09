@extends('layouts.app')

@section('content')

<h2 class="text-center"> Registrar Rol</h2>
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

<form action="{{route('roles.store')}}" method="POST">
{{csrf_field()}}
	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Nombre del rol</label>
		<input type="text" name="nombre" class="form-control">
	</div>
	<div class="form-group col-md-4 col-md-offset-4">
		<label class="control-label">Descripcion del rol</label>
		<input type="text" name="descripcion" class="form-control">
	</div>
	
		<div class="form-group col-md-12 col-md-offset-4">
			<input type="submit" name="enviar" value="Registrar" class="btn btn-flat btn-success">
		</div>
</form>



@stop