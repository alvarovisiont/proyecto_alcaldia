@extends('layouts.app')

@section('view_descrip')
<h3 class="text-center">Configuración
	<a href="{{route('cont_configuracion.create')}}" class="pull-right btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
		Agregar Configuración</a>
</h3>
@endsection

@section('content')
	@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Año</th>
				<th class="text-center">Alcalde</th>
				<th class="text-center">Coordinador</th>
				<th class="text-center">Status</th>
				@if(Auth::user()->restringido())
				<th class="text-center">Accion</th>
				@endif
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($config as $con)
				<tr>
					<td>{{$i}}</td>
					<td>{{$con->ano}}</td>
					<td>{{$con->alcalde}}</td>
					<td>{{$con->coordinador}}</td>
					<td>{{$con->status == 1 ? 'Activo' : 'Inactivo'}}</td>

					@if(Auth::user()->restringido())
					<td>
						<a href="{{ url('cont_configuracion/'.$con->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
					@endif
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
@endsection

@section('script')
	<script>
	</script>
@endsection