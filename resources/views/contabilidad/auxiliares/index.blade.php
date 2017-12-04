@extends('layouts.app')

@section('view_descrip')
	<div class="info-box">
	  <!-- Apply any bg-* class to to the icon to color it -->
	  	<span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
	  	<div class="info-box-content">
		    <span class="info-box-text">Total Auxiliares</span>
	    	<span class="info-box-number" id="total_registros">{{ count($auxiliares) }}</span>
	    	<br>
	  	</div><!-- /.info-box-content -->
	</div><!-- /.info-box -->
	<h3 class="text-center">Auxiliares de los Maestros de Cuentas</h3>
@endsection

@section('content')
	@include('partials.flash')
		<div class="box box-warning color-palette-box">
		    <div class="box-header with-border">
		      	<h2 class="box-title"><i class="fa fa-bank"></i>&nbsp;&nbsp;Auxiliares Registradas</h2>
		      	<div class="pull-right">
		       		<a href="{{route('cont_auxiliares.create')}}" class="btn btn-success btn-flat btn-md pull-right">Registrar Auxiliares&nbsp;&nbsp;<i class="fa fa-pencil"></i><i class="fa fa-plus"></i></a>
		      	</div>
		    </div>
		    <div class="box-body">
		    	<table class="table table-bordered table-hover">
		    		<thead>
		    			<tr>
		    				<th class="text-center">Cuenta</th>
		    				<th class="text-center">Auxiliar</th>
		    				<th class="text-center">Descripción</th>
		    				@if(Auth::user()->restringido())
		    					<th class="text-center">Acción</th>
		    				@endif
		    			</tr>
		    		</thead>
		    		<tbody class="text-center">
		    			@foreach($auxiliares as $row)
		    				<tr>
		    					<td>{{ $row->cuentas->cuenta }}</td>
		    					<td>{{ $row->auxiliar }}</td>
		    					<td>{{ $row->descripcion }}</td>
		    					@if(Auth::user()->restringido())
		    						<td>
		    							<a href="{{ url('cont_auxiliares/'.$row->id.'/edit') }}" title="Editar Cuenta"><i class="fa fa-edit letras-medianas"></i></a>
	    								<a href="#" class="eliminar letras-medianas" data-eliminar="{{$row->id}}" title="Eliminar Auxiliar"><i class="fa fa-trash fa-1x"></i></a>
		    						</td>
		    					@endif
		    				</tr>
		    			@endforeach
		    		</tbody>
		    	</table>
		    </div>
		</div>

		<form action="{{ url('cont_auxiliares/'.':USER') }}" id="form_eliminar" method="POST">
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