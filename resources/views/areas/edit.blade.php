@extends('layouts.app')

@section('content')
	@include('partials.flash')

	<div class="row">
		<h3 class="text-center">Editar Area</h3>
		<div class="col-md-4 col-md-offset-4">
			<form class="form-horizontal" action="{{url('areas/'.$area->id_area)}}" method="POST">
				{{ method_field( 'PATCH' ) }}
				{{csrf_field()}}

				<div class="form-group">
					<label for="departamento_id" class="form-label">Departamento:</label>
					<select id="departamento_id" class="form-control" name="departamento_id">
						<option value="">Seleccione...</option>
						@foreach($departamentos as $d)
						<option value="{{ $d->id_departamento }}" {{ $d->id_departamento==$area->departamento_id?'selected':'' }}>{{ $d->nombre }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="nombre" class="form-label">Nombre:</label>
					<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="{{ $area->nombre }}">
				</div>

				<div class="form-group">
					<a class="btn btn-flat btn-default" href="{{ route('areas.index') }}"><i class="fa fa-reply"></i> Volver</a>
					<button class="btn btn-flat btn-success" type="submit">Guardar <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('script')

@endsection
