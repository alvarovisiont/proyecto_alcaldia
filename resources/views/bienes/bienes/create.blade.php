@extends('layouts.app')
@section('view_descrip')
Bienes - Agregar Bien
@endsection
@section('content')
		<form class="form-horizontal" action="{{route('bienes_bienes.store')}}" method="POST">
			{{csrf_field()}}

			<div class="form-group">
				<label for="" class="control-label col-md-2">Código</label>
				<div class="col-md-4">
					<input type="text" class="form-control text-center" value="{{$codigo}}" readonly="">
				</div>
				<label for="" class="control-label col-md-2">Fecha *</label>
				<div class="col-md-4">
					<input type="text" id="fecha" name="fecha" class="form-control fecha" required>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label col-md-2">Unidad *</label>
				<div class="col-md-4">
					<select name="unidad_id" id="unidad_id" class="form-control" required>
						<option value="">Seleccione...</option>
						@foreach($unidades AS $row)
							<option value="{{$row->id}}">{{$row->identificacion}}</option>
						@endforeach
					</select>
				</div>
				<label for="" class="control-label col-md-2">Sección *</label>
				<div class="col-md-4">
					<select name="seccion" id="seccion" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-md-2">Sub-Grupo *</label>
				<div class="col-md-4">
					<select name="sub_grupo" id="sub_grupo" class="form-control" required>
						<option value="">Seleccione...</option>
						@foreach($subgrupos AS $row)
							<option value="{{$row->id}}">{{$row->descripcion}}</option>
						@endforeach
					</select>
				</div>
				<label for="" class="control-label col-md-2">Sub Sub_Grupo</label>
				<div class="col-md-4">
					<select name="sub_sub_grupo" id="sub_sub_grupo" class="form-control">
						<option value=""></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-md-2">Tipo Bien *</label>
				<div class="col-md-4">
					<select name="tipo_bien_id" id="tipo_bien_id" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-md-2">Descripción *</label>
				<div class="col-md-4">
					<textarea name="descripcion" id="descripcion" rows="2" class="form-control" required></textarea>
				</div>
				<label for="" class="control-label col-md-2">Descripción General</label>
				<div class="col-md-4">
					<textarea name="descripcion_general" rows="2" class="form-control"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-md-2">Orden de Compra</label>
				<div class="col-md-4">
					<input type="text" name="id_orden_compra" class="form-control">
				</div>
				<label for="" class="control-label col-md-2">Insumo</label>
				<div class="col-md-4">
					<input type="text" id="id_insumo" name="id_insumo" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="" class="control-label col-md-2">Precio *</label>
				<div class="col-md-4">
					<input type="number" id="precio" name="precio" class="form-control" min="1" required>
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

			<div class="form-group">
				<div class="col-md-12">
					<center>
						<button type="submit" class="btn btn-primary" {{Auth::user()->restringido()?'':'disabled'}}>Guardar&nbsp;<i class="fa fa-send"></i></button>
						<a class="btn btn-default" href="{{route('bienes_conceptos.index')}}">Volver</a>
					</center>
				</div>
			</div>
		</form>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#unidad_id').change(function(){
				var unidad = $(this).val();
				var action = "{{route('bienes_unidades.index')}}/getDetalles/"+unidad;
				$('#seccion').empty();

				if(!unidad) return false;

				$.ajax({
					type: 'POST',
					url: action,
					data: {'_token':'{{csrf_token()}}'},
					dataType: 'json',
					success: function(r){
						$('#seccion').append('<option value="">Seleccione...</option>');

						$.each(r,function(k,v){
							$('#seccion').append('<option value="'+v.id+'">'+v.descripcion+'</option>');
						});
					}
				})	
			});

			$('#sub_grupo').change(function(){
				var grupo    = 1;
				var subgrupo = $(this).val();
				var action = "{{route('bienes_nomenclaturas.getSubgrupos2')}}";

				$('#sub_sub_grupo').empty();

				if(!subgrupo) return false;

				$.ajax({
					type: 'POST',
					url: action,
					data: {'_token': '{{ csrf_token() }}','grupo':grupo,'subgrupo':subgrupo},
					dataType: 'json',
					success: function(r){
						$('#sub_sub_grupo').append('<option value="">Seleccione...</option>');
						$.each(r, function(k,v){						
							$('#sub_sub_grupo').append('<option value="'+v.id+'">'+v.descripcion+'</option>');
							$('#sub_sub_grupo').prop('disabled',false);
						});
					} 
				})
			});

			$('#sub_sub_grupo').change(function(){
				var id     = $(this).val();
			  var action = "{{route('bienes_nomenclaturas.index')}}/getTipoBienes/"+id;

				$('#tipo_bien_id').empty();

				if(!id) return false;

			  $.ajax({
			  	type: 'POST',
			  	url: action,
			  	data: {'_token':'{{csrf_token()}}'},
			  	dataType: 'json',
			  	success: function(r){
						$('#tipo_bien_id').append('<option value="">Seleccione...</option>');
			  		$.each(r,function(k,v){

			  			$('#tipo_bien_id').append('<option value="'+v.id+'">'+v.descripcion+'</option>');
			  		});
			  	}
			  });
			});



		
		});
	</script>
@endsection