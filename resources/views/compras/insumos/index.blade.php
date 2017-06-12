@extends('layouts.app')

@section('content')

		
	<h2 class="text-center">Insumos <a href="{{url('insumos/create')}}" class="pull-left btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar INSUMO</a>
 	</h2>
		@include('partials.flash')
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Codigo</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Cantidad</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($insumos as $in)
				<tr>
					<td>{{$i}}</td>
					<td>00{{$in->codigo}}</td>
					<td>{{$in->descripcion}}</td>
					<td>{{$in->cantidad}}</td>
					<td>{{$in->unidades->descripcion}}</td>
					<td>
					  <a href="{{ url('insumos/'.$in->id) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('insumos/'.$in->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
	</table>
	
@endsection

@section('script')


@stop
