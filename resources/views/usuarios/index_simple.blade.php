@extends('layouts.app')
@section('view_descrip')
<h3 class="text-center">Usuarios - {{$departamento}}
	<span class="pull-right">
		<a href="{{ route('usuarios.create_simple') }}" class="btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo usuario</a>
	</span>
</h3>
@endsection
@section('content')
	@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Usuario</th>
				<th class="text-center">Nombres</th>
				<th class="text-center">Apellidos</th>
				<th class="text-center">Teléfono</th>
				<th class="text-center">Departamento</th>
				<th class="text-center">Rol</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($usuarios as $d)	
				<tr>
					<td>{{$i}}</td>
					<td>{{$d->usuario}}</td>
					<td>{{$d->nombres}}</td>
					<td>{{$d->apellidos}}</td>
					<td>{{$d->telefono}}</td>
					<td>{{ $d->departamentos->nombre }}</td>
					<td>{{$d->roles->nombre}}</td>
					<td>
						<a class="btn btn-primary btn-flat btn-sm" href=""><i class="fa fa-search"></i></a>
						<a href="{{ url('usuario/'.$d->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
@endsection