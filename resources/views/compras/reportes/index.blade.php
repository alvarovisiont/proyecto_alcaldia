@extends('layouts.app')

@section('content')

		
	<div class="content">
	<h2 class="text-center">Reportes Disponibles</h2>
	<hr>
		<div class="row">
			<div class="col-md-4">
				<a href="{{route('pdf.insumos')}}" class="btn btn-flat btn-lg btn-warning btn-block">Insumos</a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('vista.requisicion') }}" class="btn btn-flat btn-lg btn-warning btn-block">Requisiciones</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('pdf.departamentos')}}" class="btn btn-flat btn-lg btn-warning btn-block">Departamentos</a>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="{{route('pdf.proveedor')}}" class="btn btn-flat btn-lg btn-warning btn-block">Proveedores</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('pdf.unidades')}}" class="btn btn-flat btn-lg btn-warning btn-block">Unidades de medida</a>
			</div>
			<div class="col-md-4">
				<a href="{{ route('vista_pdf.ordenes') }}" class="btn btn-flat btn-lg btn-warning btn-block">Ordenes</a>
			</div>

		</div>
	</div>


@endsection

@section('script')


@stop
