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
		<form action="{{route('req_detalle.store')}}" method="POST">
		<input type="hidden" name="ano" value="{{$ano}}">
     {{csrf_field()}}
		 <div class="form-group">
		 <label class="control-label">Codigo</label>
		 <input type="text" name="codigo" class="form-control" value ="00{{$codigo}}" readonly>
	    </div>
     	<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
		  <label class="control-label">Cantidad</label>
		  <input type="text"  name="cantidad" class="form-control" required>
	    </div>

	<div class="form-group">
		<label class="control-label">Insumos</label>
		<select name="com_insumo_id" class="form-control" required>
			<option value="">Seleccione...</option>
		@foreach($insumos as $in)
			<option value="{{$in->id}}">{{$in->descripcion}}    ||   Unidad: {{$in->unidades->descripcion}}</option>
		@endforeach
		</select>
	</div>
	
<div class="col-md-1 col-md-offset-5">
	<div class="form-group">
	   <input type="submit" name="enviar" value="Registrar" class="btn btn-flat btn-success">
	</div>
</div>
		
</form>
	</div>
</div>
<hr>

<h2 class="text-center">Detalles de requisiciones </h2>
 	</h2>
		@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">Codigo</th>
				<th class="text-center">Cantidad</th>
				<th class="text-center">Insumo</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
		@foreach($requisiciones as $req)
			<tr>
				<td class="text-center">00{{$req->codigo}}</td>
				<td class="text-center">{{$req->cantidad}}</td>
				<td class="text-center">{{$req->insumos->descripcion}}</td>
				<td class="text-center">{{$req->insumos->unidades->descripcion}}</td>
				<td class="text-center">
					 <a href="{{ url('req_detalle/'.$req->id) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('req_detalle/'.$req->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

@stop

