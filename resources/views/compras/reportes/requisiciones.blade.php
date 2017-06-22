@extends('layouts.app')

@section('content')

		
	<div class="content">
	<h3 class="text-center">Reportes</h3>
	<hr>
		@include('partials.flash')
		<form action="{{route('busqueda.requisicion')}}" method="POST">
			{{csrf_field()}}
			<div class="row">
				<div class="col-md-4 col-md-offset-2">
					<label class="control-label">Desde:</label>
					<input type="text" name="desde" class="form-control fecha" required>
				</div>
				<div class="col-md-4">
					<label class="control-label">Hasta:</label>
					<input type="text" name="hasta" class="form-control fecha" required>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4 col-md-offset-5">
					<input type="submit" name="consultar" class="btn btn-flat btn-success" value="Buscar">
				</div>
			</div>
		</form>
	</div>


@endsection

@section('script')


@stop
