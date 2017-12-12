@extends('layouts.app')
@section('view_descrip')
Reportes - Incorporaciones
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12">
			<form action="{{route('bienes_reportes.des_incorporaciones')}}" class="form-horizontal" method="POST">
				<input type="hidden" name="tipo" value="1">
				{{csrf_field()}}
				<h2 class="text-center"><span class="subrayado_rojo">Reporte Incorporaciones</span></h2>
				<br>
				<div class="form-group">
					<label for="" class="control-label col-md-2 col-sm-2">Concepto</label>
					<div class="col-md-4 col-sm-4">
						<select name="concepto_id" id="concepto_id" class="form-control" required>
							<option value=""></option>
							@foreach($conceptos AS $row)
								<option value="{{$row->id}}">{{$row->descripcion}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="control-label col-md-2 col-sm-2">Desde</label>
					<div class="col-md-4 col-sm-4">
						<input type="text" id="desde" name="desde" class="form-control text-center fecha" value="">
					</div>
					<label for="" class="control-label col-md-2 col-sm-2">Hasta</label>
					<div class="col-md-4 col-sm-4">
						<input type="text" id="hasta" name="hasta" class="form-control text-center fecha" value="">
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