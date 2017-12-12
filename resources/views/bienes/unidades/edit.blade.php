@extends('layouts.app')
@section('view_descrip')
Unidades
@endsection
@section('content')
	<form action="{{route('bienes_unidades.update',['id'=>$unidad->id])}}" class="form-horizontal" method="POST">
		{{method_field('PATCH')}}
		{{csrf_field()}}
		<div class="form-group">
			<label for="" class="control-label col-md-2">Identificación</label>
			<div class="col-md-4">
				<input type="text" id="identificacion" name="identificacion" class="form-control" required="" value="{{$unidad->identificacion}}">
			</div>
			<label for="" class="control-label col-md-2">Actividad</label>
			<div class="col-md-4">
				<input type="text" id="actividad" name="actividad" class="form-control" required value="{{$unidad->actividad}}">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-2">Ubicación</label>
			<div class="col-md-4">
				<textarea name="ubicacion" id="ubicacion" rows="2" class="form-control" required>{{$unidad->ubicacion}}</textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary btn-block" {{Auth::user()->restringido()?'':'disabled'}}>Guardar&nbsp;<i class="fa fa-send"></i></button>
			</div>
			<div class="col-md-offset-1 col-md-3">
				<a href="{{route('bienes_unidades.index')}}">Regresar a la Vista de Unidades</a>
			</div>
		</div>

			@if (count($errors) > 0)
      <div class="alert alert-danger alert-important">
        <ul>
          @foreach($errors->all() as $error)
             <li>{{$error}}</li>
           @endforeach
         </ul>  
      </div>
    	@endif
	</form>
@endsection

@section('script')

@endsection