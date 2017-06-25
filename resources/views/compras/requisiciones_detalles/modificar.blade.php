@extends('layouts.app')

@section('content')

<h2 class="text-center"> Registrar Detalle de requisicion</h2>
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
<div class="content">
	<div class="row">
		<form action="{{url('com_req_detalle/'.$req->id)}}" method="POST">
	{{method_field('PUT')}}
     {{csrf_field()}}
		 <div class="form-group">
		 <label class="control-label">Codigo</label>
		 <input type="text" name="codigo" class="form-control" value ="00{{$req->codigo}}" readonly>
	    </div>
     	<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
		  <label class="control-label">Cantidad</label>
		  <input type="text"  name="cantidad" class="form-control" required value="{{$req->cantidad}}">
	    </div>

	<div class="form-group">
		<label class="control-label">Insumos</label>
		<select name="com_insumo_id" class="form-control" required>
			<option value="">Seleccione...</option>
		@foreach($insumos as $in)
			<option value="{{$in->id}}" @if($in->id == $req->com_insumo_id): selected @endif>{{$in->descripcion}}    ||   Unidad: {{$in->unidades->descripcion}}</option>
		@endforeach
		</select>
	</div>
	
<div class="col-md-1 col-md-offset-5">
	<div class="form-group">
	   <input type="submit" name="enviar" value="Modificar" class="btn btn-flat btn-success">
	</div>
</div>
		
</form>
	</div>
</div>


@stop

