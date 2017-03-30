@extends('layouts.app')

@section('content')
	@include('partials.flash')
	<div class="row">
		<h3 class="text-center">Editar departamento</h3>
		<div class="col-md-4 col-md-offset-4">
			<form class="form-horizontal" action="{{url('departamentos/'.$departamento->id_departamento)}}" method="POST">
				{{ method_field( 'PATCH' ) }}
				{{csrf_field()}}
				<div class="form-group">
					<label for="nombre" class="form-label">Nombre:</label>
					<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{ $departamento->nombre }}">
				</div>

				<div class="form-group">
					<label for="descripcion" class="form-label">Descripcion:</label>
					<input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion" value="{{ $departamento->descripcion }}">
				</div>

				<div class="form-group">
					<label for="fa_class" class="form-label">Icon:</label>
					<input id="fa_class" class="form-control" type="text" name="fa_class" placeholder="icon" value="{{ $departamento->fa_class }}">
				</div>

				<div class="form-group">
					<a class="btn btn-flat btn-default"><i class="fa fa-reply"></i> Volver</a>
					<button class="btn btn-flat btn-success" type="submit">Guardar <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('script')

@endsection
