@extends('layouts.app')

@section('content')
	@include('partials.flash')
	<div class="row">
		<h3 class="text-center">Agregar departamento</h3>

		<div class="col-md-4 col-md-offset-4">
			<form class="form-horizontal" action="{{route('departamentos.store')}}" method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre" class="form-label">Nombre:</label>
					<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
				</div>

				<div class="form-group">
					<label for="descripcion" class="form-label">Descripcion:</label>
					<input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
				</div>

				<div class="form-group">
					<label for="fa_class" class="form-label">Icon:</label>
					<input id="fa_class" class="form-control" type="text" name="fa_class" placeholder="icon">
				</div>

				<div class="form-group">
					<button class="btn btn-flat btn-success" type="submit">Agregar <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('script')

@endsection
