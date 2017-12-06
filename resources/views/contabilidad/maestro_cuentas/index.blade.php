@extends('layouts.app')

@section('view_descrip')
	<div class="info-box">
	  <!-- Apply any bg-* class to to the icon to color it -->
	  	<span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
	  	<div class="info-box-content">
		    <span class="info-box-text">Total Cuentas </span>
	    	<span class="info-box-number" id="total_registros">{{count($cuentas)}}</span>
	    	<br>
	  	</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
	<h3 class="text-center">Maestro Cuentas</h3>
@endsection

@section('content')
	@include('partials.flash')

	<div class="box box-warning color-palette-box">
	    <div class="box-header with-border">
	      	<h2 class="box-title"><i class="fa fa-bank"></i>&nbsp;&nbsp;Cuentas Registradas</h2>
	      	<div class="pull-right">
	       		<a href="{{ route('cont_maestroCuentas.create') }}" class="btn btn-success btn-flat btn-md pull-right">Registrar Cuentas&nbsp;&nbsp;<i class="fa fa-pencil"></i><i class="fa fa-plus"></i></a>
	      	</div>
	    </div>
	    <div class="box-body">
	    	<table class="table table-bordered table-hover">
	    		<thead>
	    			<tr>
	    				<th class="text-center">Cuenta</th>
	    				<th class="text-center">Descripción</th>
	    				<th class="text-center">Operativa</th>
	    				<th class="text-center">Detalle</th>
	    				<th class="text-center">P21</th>
	    				<th class="text-center">Año</th>
	    				@if(Auth::user()->restringido())
	    					<th class="text-center">Acción</th>
	    				@endif
	    			</tr>
	    		</thead>
	    		<tbody class="text-center">
	    			@foreach($cuentas as $row)
	    				<tr>
	    					<td>{{ $row->cuenta }}</td>
	    					<td>{{ $row->descripcion }}</td>
	    					<td>{{ $row->operativa === 1 ? 'Si' : 'No' }}</td>
	    					<td>{{ $row->detalle === 1 ? 'Si' : 'No' }}</td>
	    					<td>{{ $row->p21  }}</td>
	    					<td>{{ $row->ano  }}</td>
	    					@if(Auth::user()->restringido())
	    						<td>
	    							<a href="{{ url('cont_maestroCuentas/'.$row->id.'/edit') }}" title="Editar Cuenta"><i class="fa fa-edit letras-medianas"></i></a>
	    							<a href="#" class="eliminar letras-medianas" data-eliminar="{{$row->id}}" title="Eliminar Cuenta"><i class="fa fa-trash fa-1x"></i></a>
	    						</td>
	    					@endif
	    				</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    </div>
	</div>

	<form action="{{ url('cont_maestroCuentas/'.':USER') }}" id="form_eliminar" method="POST">
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