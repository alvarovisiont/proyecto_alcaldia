@extends('layouts.app')

@section('content')

		
	<div class="content">
	<h3 class="text-center">Reportes</h3>
	<hr>
		<div class="row">
			<div class="col-md-3 col-md-offset-2">
				<a href="{{route('pdf.insumos')}}" class="btn btn-flat btn-lg btn-warning">Insumos</a>
			</div>
			<div class="col-md-3">
				<a href="{{ route('vista.requisicion') }}" class="btn btn-flat btn-lg btn-warning">Requisiciones</a>
			</div>
			<div class="col-md-3">
				<a href="{{route('pdf.departamentos')}}" class="btn btn-flat btn-lg btn-warning">Departamentos</a>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-offset-2">
				<a href="{{route('pdf.proveedor')}}" class="btn btn-flat btn-lg btn-warning">Proveedores</a>
			</div>
			<div class="col-md-3">
				<a href="{{route('pdf.unidades')}}" class="btn btn-flat btn-lg btn-warning">Unidades de medida</a>
			</div>
			<div class="col-md-3">
				<a href="{{ route('vista_pdf.ordenes') }}" class="btn btn-flat btn-lg btn-warning">Ordenes</a>
			</div>

		</div>
	</div>


@endsection

@section('script')


@stop
