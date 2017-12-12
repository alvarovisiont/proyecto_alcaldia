@extends('layouts.app')
@section('view_descrip')
Reportes - BM-4
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<form action="{{route('bienes_reportes.bm4')}}" class="form-horizontal" method="POST">
				{{csrf_field()}}
				<h2 class="text-center"><span class="subrayado_rojo">Reporte BM-4</span></h2>
				<br>
				<div class="form-group">
					<label for="" class="control-label col-md-2 col-sm-2">Unidad</label>
					<div class="col-md-4 col-sm-4">
						<select name="unidad_id" id="unidad_id" class="form-control" required>
							<option value=""></option>
							@foreach($unidades AS $row)
								<option value="{{$row->id}}">{{$row->identificacion}}</option>
							@endforeach
						</select>
					</div>
					<label for="" class="control-label col-md-2 col-sm-2">Sección</label>
					<div class="col-md-4 col-sm-4">
						<select name="seccion" id="seccion" class="form-control" required>
							<option value=""></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2 col-sm-2">Mes</label>
					<div class="col-md-4 col-sm-4">
						<select name="mes" id="mes" class="form-control" required>
							<option value="">Seleccione...</option>
							<option value="01">Enero</option>
							<option value="02">Febrero</option>
							<option value="03">Marzo</option>
							<option value="04">Abril</option>
							<option value="05">Mayo</option>
							<option value="06">Junio</option>
							<option value="07">Julio</option>
							<option value="08">Agosto</option>
							<option value="09">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
					</div>
					<label for="" class="control-label col-md-2 col-sm-2">Año</label>
					<div class="col-md-4 col-sm-4">
						<select name="anio" id="anio" class="form-control" required>
							<option value="">Seleccione...</option>
							@foreach($anios AS $row)
								<option value="{{$row->anio}}">{{$row->anio}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
						<button type="submit" class="btn btn-danger btn-block">Generar&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script>
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

		});
	</script>
@endsection