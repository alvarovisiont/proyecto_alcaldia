@extends('layouts.app')

@section('view_descrip')
	<div class="info-box">
	  <!-- Apply any bg-* class to to the icon to color it -->
	  	<span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
	  	<div class="info-box-content">
		    <span class="info-box-text">Total asientos</span>
	    	<span class="info-box-number" id="total_registros">{{ count($asientos) }}</span>
	    	<br>
	  	</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
	<h3 class="text-center">Asientos Contables</h3>
@endsection

@section('content')
	@include('partials.flash')
		<div class="box box-warning color-palette-box">
		    <div class="box-header with-border">
		      	<h2 class="box-title"><i class="fa fa-bank"></i>&nbsp;&nbsp;Asientos Registrados</h2>
		      	<div class="pull-right">
		       		<a href="{{route('cont_asientos.create')}}" class="btn btn-success btn-flat btn-md pull-right">Registrar asientos&nbsp;&nbsp;<i class="fa fa-pencil"></i><i class="fa fa-plus"></i></a>
		      	</div>
		    </div>
		    <div class="box-body">
		    	<table class="table table-bordered table-hover">
		    		<thead>
		    			<tr>
		    				<th class="text-center">Comprobante</th>
		    				<th class="text-center">Descripción</th>
		    				<th class="text-center">Fecha</th>
		    				<th class="text-center">Status</th>
		    				@if(Auth::user()->restringido())
		    					<th class="text-center">Acción</th>
		    				@endif
		    			</tr>
		    		</thead>
		    		<tbody class="text-center">
		    			@foreach($asientos as $row)
		    				<tr>
		    					<td>{{ $row->comprobante }}</td>
		    					<td>{{ $row->descripcion }}</td>
		    					<td>{{ date('d-m-Y',strtotime($row->fecha)) }}</td>
		    					<td>{{ $row->status == 1 ? 'Vigente' : 'Inactivo' }}</td>
		    					@if(Auth::user()->restringido())
		    						<td>
		    							<a href="{{ url('cont_asientos/'.$row->id.'/edit') }}" title="Editar Cuenta"><i class="fa fa-edit letras-medianas"></i></a>
		    							<a href="{{ url('cont_asientos/'.$row->id) }}" title="Ver Detalles"><i class="fa fa-search letras-medianas"></i></a>
		    						</td>
		    					@endif
		    				</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		    </div>
		</div>

		<form action="{{ url('cont_asientos/'.':USER') }}" id="form_eliminar" method="POST">
			{{csrf_field()}}
			{{method_field('DELETE')}}
		</form>
@endsection

@section('script')
	<script>
		$(function(){
			$('.eliminar').click(function(){

				var form = $('#form_eliminar'),
					id   = $(this).data('eliminar')
				ruta = form.prop('action').replace(':USER',id)
				form.attr('action',ruta)
				
				form.submit()

			})
				
		})
	</script>
@endsection