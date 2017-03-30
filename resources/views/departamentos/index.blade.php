@extends('layouts.app')
@section('view_descrip')
<h3 class="text-center">Departamentos
	<span class="pull-right">
		<a href="{{ route('departamentos.create') }}" class="btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo departamento</a>
	</span>
</h3>
@endsection
@section('content')
	@include('partials.flash')

	<div class="row">
		<div class="col-md-12" style="margin-top:15px">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Icon</th>
						<th class="text-center">Accion</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($departamentos as $d)
						<tr>
							<td class="text-center">{{ $i }}</td>
							<td>{{$d->nombre}}</td>
							<td>{{$d->descripcion}}</td>
							<td>{{$d->fa_class}}</td>
							<td class="text-center">
								<a href="{{ url('departamentos/'.$d->id_departamento) }}" class="btn btn-primary btn-flat btn-sm" title="Ver"><i class="fa fa-search"></i></a>
								<a href="{{ url('departamentos/'.$d->id_departamento.'/edit') }}" class="btn btn-success btn-flat btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						@php $i++; @endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@endsection

@section('script')
	<script>
		$(document).ready(function(){

		});
	</script>
@endsection