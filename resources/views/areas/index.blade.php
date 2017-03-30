@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Areas</h3>
			<span class="pull-right">
				<a href="{{ route('areas.create') }}" class="btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Area</a>
			</span>
		</div>
	</div>

	@include('partials.flash')

	<div class="row">
		<div class="col-md-12" style="margin-top:15px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Departamento</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Accion</th>
					</tr>
				</thead>
				<tbody>

				@php $i=1; @endphp
				@foreach($areas AS $area)
					<tr>
						<td>{{$i}}</td>
						<td>{{ $area->departamentos->nombre }}</td>
						<td>{{ $area->nombre }}</td>
						<td class="text-center">
							<a class="btn btn-flat btn-sm btn-primary" href="{{ url('/areas/'.$area->id_area) }}"><i class="fa fa-search"></i></a>
							<a class="btn btn-flat btn-sm btn-success" href="{{ url('/areas/'.$area->id_area.'/edit') }}"><i class="fa fa-edit"></i></a>
						</td>
					</tr>				
					@php $i++; @endphp
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection