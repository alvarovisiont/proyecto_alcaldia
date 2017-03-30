@extends('layouts.app')

@section('content')

		
	<h2 class="text-center">Sub-areas
		<a href="{{url('sub_area/create')}}" class="pull-left btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar sub area</a>
 	</h2>

	@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Departamento</th>
				<th class="text-center">Area</th>
				<th class="text-center">nombre Sub_Area</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($sub_area as $sub)
				<tr>
					<td>{{$i}}</td>
					<td>{{$sub->areas->departamentos->nombre}}</td>
					<td>{{$sub->areas->nombre}}</td>
					<td>{{$sub->nombre}}</td>
					<td>{{$sub->descripcion}}</td>
					<td>
					  <a href="{{ url('sub_area/'.$sub->id_sub_area) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('sub_area/'.$sub->id_sub_area.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
	
@endsection

@section('script')


@stop
