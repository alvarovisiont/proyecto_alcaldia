@extends('layouts.app')

@section('view_descrip')
	<div class="info-box">
		  <!-- Apply any bg-* class to to the icon to color it -->
		  	<span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
		  	<div class="info-box-content">
			    <span class="info-box-text">Total Insumos </span>
		    	<span class="info-box-number" id="total_registros">{{count($insumos)}}</span>
		    	<br>
		  	</div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
	<h2 class="text-center">Insumos</h2>
	@include('partials.flash')
@endsection
@section('content')
	<div class="box  color-palette-box">
	    <div class="box-header with-border">
	      	<h2 class="box-title"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Insumos Registrados</h2>
	      	<div class="pull-right">
	      		@if(Auth::user()->restringido())
	       			<a href="{{url('com_insumos/create')}}" class="btn btn-success btn-flat btn-md pull-right">Registrar Insumos&nbsp;&nbsp;<i class="fa fa-pencil"></i><i class="fa fa-plus"></i></a>
	       		@endif
	      	</div>
	    </div>
	    <div class="box-body">
	    	<table class="table table-bordered table-hover table-condensed tabla" >
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Codigo</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Cantidad</th>
						<th class="text-center">Unidad</th>
						@if(Auth::user()->restringido())
						<th class="text-center">Accion</th>
						@endif
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
							@if(Auth::user()->restringido())
							<td>
							  <a href="{{ url('com_insumos/'.$in->id) }}" class="btn btn-flat btn-success btn-sm"><i class="fa fa-search"></i></a>
								<a href="{{ url('com_insumos/'.$in->id.'/edit') }}" class="btn btn-flat btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>
							</td>
							@endif
						</tr>
						@php $i++; @endphp
					@endforeach
				</tbody>
			</table>
	    </div>
	</div>
@endsection

@section('script')


@stop
