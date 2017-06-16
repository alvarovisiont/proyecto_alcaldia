@extends('layouts.app')

@section('content')

		
	<h2 class="text-center">Requisiciones <a href="{{url('com_requisicion/create')}}" class="pull-left btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar Requisicion</a>
 	</h2>
		@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Codigo</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Fecha</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Año</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($requisicion as $in)
				<tr>
					<td>{{$i}}</td>
					<td>{{$in->codigo}}</td>
					<td>{{$in->fecha}}</td>
					<td>{{$in->status}}</td>
					<td>{{$in->departamento->programatica}}</td>
					<td>{{$in->descripcion}}</td>
					<td>{{$in->ano}}</td>
					<td>
					  <a href="{{ url('com_requisicion/'.$in->id) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('com_requisicion/'.$in->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
	
@endsection

@section('script')


@stop
