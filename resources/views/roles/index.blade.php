@extends('layouts.app')

@section('content')

		
	<h2 class="text-center">Roles del sistema <a href="{{url('roles/create')}}" class="pull-left btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar ROL</a>
 	</h2>
		@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($roles as $rol)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rol->nombre}}</td>
					<td>{{$rol->descripcion}}</td>
					<td>
					  <a href="{{ url('roles/'.$rol->id_rol) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('roles/'.$rol->id_rol.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
	
@endsection

@section('script')


@stop
