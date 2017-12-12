@extends('layouts.app')
@section('view_descrip')
Conceptos - Editar Concepto
@endsection
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form action="{{route('bienes_conceptos.update',['id'=>$concepto->id])}}" method="POST">
			{{method_field('PATCH')}}
			{{csrf_field()}}
			<div class="form-group">
				<label for="" class="control-label">Tipo *</label>
				<select name="tipo" id="tipo" class="form-control" required="">
					<option value="">Seleccione...</option>
					<option value="Incorporación" {{$concepto->tipo=='Incorporación'?'selected':''}}>Incorporación</option>
					<option value="Desincorporación" {{$concepto->tipo=='Desincorporación'?'selected':''}}>Desincorporación</option>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Status *</label>
				<select name="status" id="status" class="form-control" required="">
					<option value="">Seleccione...</option>
					<option value="SM" {{$concepto->status=='SM'?'selected':''}}>SM</option>
					<option value="MM" {{$concepto->status=='MM'?'selected':''}}>MM</option>
					<option value="CM" {{$concepto->status=='CM'?'selected':''}}>CM</option>
				</select>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Descripción *</label>
				<input type="text" id="descripcion" name="descripcion" required="" class="form-control" value="{{$concepto->descripcion}}">
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