@extends('layouts.app')

@section('content')

		
	<h2 class="text-center">Requisiciones <a href="{{url('com_requisicion/create')}}" class="pull-left btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
 		Agregar Requisicion</a>
 		 <a href="{{url('req_detalle/create')}}" class="pull-right btn btn-flat  btn-success"><i class="fa fa-arrow-right" aria-hidden="true"></i> Agregar Detalle</a>
 		 <br>
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


<hr>

 <h2 class="text-center">Detalles de requisiciones </h2>
 	</h2>
	<table class="table table-bordered table-hover table-condensed tabla" >
		<thead>
			<tr>
				<th class="text-center">Codigo</th>
				<th class="text-center">Requisicion</th>
				<th class="text-center">Cantidad</th>
				<th class="text-center">Insumo</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Accion</th>
			</tr>
		</thead>
		<tbody class="text-center">
		@foreach($requisiciones as $req)
			<tr>
				<td class="text-center">00{{$req->codigo}}</td>
				<td class="text-center"><a href="{{url('com_requisicion/'.$req->requisicion->id)}}">{{$req->requisicion->descripcion}}</a></td>
				<td class="text-center">{{$req->cantidad}}</td>
				<td class="text-center">{{$req->insumos->descripcion}}</td>
				<td class="text-center">{{$req->insumos->unidades->descripcion}}</td>
				<td class="text-center">
					 <a href="{{ url('req_detalle/'.$req->id) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
						<a href="{{ url('req_detalle/'.$req->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	<hr>

@endsection

@section('script')


@stop
