@extends('layouts.app')
@section('view_descrip')
Nomenclaturas - Agregar Subgrupo
@endsection
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form action="{{route('bienes_nomenclaturas.storesub')}}" method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label for="" class="control-label">Grupo</label>
				<select name="grupo" id="grupo" class="form-control" required="">
					<option value=""></option>
					<option value="1">Incorporación</option>
					<option value="2">Desincorporación</option>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Descripción</label>
				<input type="text" id="descripcion" name="descripcion" required="" class="form-control">
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
    	
			<center>
				<button type="submit" class="btn btn-primary " {{Auth::user()->restringido()?'':'disabled'}}>Guardar&nbsp;<i class="fa fa-send"></i></button>
				<a class="btn btn-default" href="{{route('bienes_nomenclaturas.index')}}">Regresar a la Vista de Nomenclatura</a>
			</center>
		</form>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
@endsection