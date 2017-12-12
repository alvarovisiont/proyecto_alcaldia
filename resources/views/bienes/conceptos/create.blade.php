@extends('layouts.app')
@section('view_descrip')
Conceptos - Agregar Concepto
@endsection
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form action="{{route('bienes_conceptos.store')}}" method="POST">
			{{csrf_field()}}
			<div class="form-group">
				<label for="" class="control-label">Tipo *</label>
				<select name="tipo" id="tipo" class="form-control" required="">
					<option value="">Seleccione...</option>
					<option value="Incorporación">Incorporación</option>
					<option value="Desincorporación">Desincorporación</option>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Status *</label>
				<select name="status" id="status" class="form-control" required="">
					<option value="">Seleccione...</option>
					<option value="SM">SM</option>
					<option value="MM">MM</option>
					<option value="CM">CM</option>
				</select>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Descripción *</label>
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

			<div class="form-group">
				<button type="submit" class="btn btn-primary" {{Auth::user()->restringido()?'':'disabled'}}>Guardar&nbsp;<i class="fa fa-send"></i></button>
				<a class="btn btn-default" href="{{route('bienes_conceptos.index')}}">Volver</a>
			</div>
		</form>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
	</script>
@endsection