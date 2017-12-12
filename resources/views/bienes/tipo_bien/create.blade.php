@extends('layouts.app')
@section('view_descrip')
Tipo Bien- Agregar Tipo
@endsection
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<form action="{{route('bienes_tipo_bien.store')}}" class="form-horizontal" method="POST">
			{{csrf_field()}}
				{{csrf_field()}}
				<div class="form-group">
					<label for="" class="control-label">Grupo *</label>
					<select name="grupo" id="grupo" class="form-control" required="">
						<option value="">Seleccione...</option>
						<option value="1">Incorporación</option>
						<option value="2">Desincorporación</option>
					</select>
				</div>
				<div class="form-group">
					<label for="" class="control-label">Subgrupo *</label>
					<select name="subgrupo" id="subgrupo" class="form-control" required="" disabled>
						<option value="">Seleccione...</option>
					</select>
				</div>

				<div class="form-group">
					<label for="" class="control-label">Subsubgrupo</label>
					<select name="subsubgrupo" id="subsubgrupo" class="form-control" disabled>
						<option value="">Seleccione...</option>
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
				<a class="btn btn-default" href="{{route('bienes_tipo_bien.index')}}">Volver</a>
			</div>
		</form>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#grupo').change(function(){
				var grupo  = $(this).val();
				var action = "{{route('bienes_nomenclaturas.getSubgrupos')}}";

				$('#subgrupo').html('<option value="">Seleccione...</option>');
				$('#subgrupo').prop('disabled',true);

				$.ajax({
					type: 'POST',
					url: action,
					data: {'_token': '{{ csrf_token() }}','grupo':grupo},
					dataType: 'json',
					success: function(r){
						$.each(r, function(k,v){
							$('#subgrupo').append('<option value="'+v.sub_grupo+'">'+v.descripcion+'</option>');
							$('#subgrupo').prop('disabled',false);
						});
					} 
				})
			});

			$('#subgrupo').change(function(){
				var grupo    = $('#grupo').val();
				var subgrupo = $(this).val();
				var action = "{{route('bienes_nomenclaturas.getSubgrupos2')}}";

				$('#subsubgrupo').html('<option value="">Seleccione...</option>');
				$('#subsubgrupo').prop('disabled',true);

				$.ajax({
					type: 'POST',
					url: action,
					data: {'_token': '{{ csrf_token() }}','grupo':grupo,'subgrupo':subgrupo},
					dataType: 'json',
					success: function(r){
						$.each(r, function(k,v){
							$('#subsubgrupo').append('<option value="'+v.id+'">'+v.descripcion+'</option>');
							$('#subsubgrupo').prop('disabled',false);
						});
					} 
				})
			});
		});
	</script>

@endsection