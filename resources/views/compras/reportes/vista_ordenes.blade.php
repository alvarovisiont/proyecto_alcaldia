@extends('layouts.app')

@section('view_descrip')
	Reporte de Ordenes de Compras
@endsection

@section('content')
	
	<h2 class="text-center">Escoja las opciones de filtro</h2>

	<form action="{{ route('pdf.ordenes') }}" class="form-horizontal" id="form_ordenes" method="POST">
		{{csrf_field()}}
		<div class="form-group">
			<label for="" class="control-label col-md-2">Desde</label>
			<div class="col-md-4">
				<input type="text" id="desde" name="desde" required="" class="form-control fecha">
			</div>
			<label for="" class="control-label col-md-2">Hasta</label>
			<div class="col-md-4">
				<input type="text" id="hasta" name="hasta" required="" class="form-control fecha">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="control-label col-md-2">Tipo</label>
			<div class="col-md-4">
				<select name="tipo" id="tipo" class="form-control" required="">
					<option value="Todos">Todos</option>
					<option value="Compra">Compra</option>
					<option value="Servicio">Servicio</option>
					<option value="Donación">Donación</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-success btn-block">Generar&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button>
			</div>
		</div>
	</form>

@endsection

@section('script')
	
@endsection