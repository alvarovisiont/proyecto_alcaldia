@extends('layouts.app')
@section('view_descrip')
Unidades - {{$unidad->identificacion}}
@endsection
@section('options')
	@if(Auth::user()->restringido())

		<a href="{{ route('bienes_unidades.index')}}" class="btn btn-default"><i class="fa fa-reply"></i> Volver</a>
		<a href="{{ route('bienes_unidades.edit',['id'=>$unidad->id]) }}" class="btn btn-success" title="Editar"><i class="fa fa-edit"></i> Editar</a>

		<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addModal" type="button">
			<i class="fa fa-plus" aria-hidden="true"></i>
			Agregar Detalle
		</button>
	@endif
@endsection
@section('content')
	@include('partials.flash')

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-condensed" id="tabla">
				<thead>
					<tr>
						<th class="text-center">#</th>						
						<th class="text-center">Descripción</th>
						<th class="text-center">Actividad</th>
						<th class="text-center">Ubicación</th>
						<th class="text-center">Sección</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($detalles as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$row->descripcion}}</td>
							<td>{{$row->actividad}}</td>
							<td>{{$row->ubicacion}}</td>
							<td>{{$row->seccion}}</td>
							<td>
								@if(Auth::user()->restringido())
	    					<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{$row->id}}" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
	    					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal" data-id="{{$row->id}}" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addModalLabel">Agregar Detalle</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form action="{{route('bienes_unidades_detalles.store')}}" method="POST">
								  {{csrf_field()}}
								 <input id="unidad_id" type="hidden" name="unidad_id" value="{{$unidad->id}}">

								 	<div class="form-group">
				        		<label for="" >Descripción</label>
			        			<textarea name="descripcion" rows="3" required="" class="form-control" maxlength="5000"></textarea>
				        	</div>
				        	<div class="form-group">
				        		<label for="">Ubicación</label>
			        			<textarea name="ubicacion" rows="3" class="form-control" maxlength="5000"></textarea>
				        	</div>
				        	<div class="form-group">
				        		<label for="">Actividad</label>
			        			<input type="text" name="actividad" class="form-control">
				        	</div>

							  <center>
							    <button type="submit" class="btn btn-flat btn-danger">Guardar</button>
	                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
							  </center>
						  </form>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="editModalLabel">Editar Detalle</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form id="editDetalle" action="#" method="POST">
	            		{{method_field('PATCH')}}
								  {{csrf_field()}}
								 <input id="und_detalle" type="hidden" name="detalle" value="0">

								 	<div class="form-group">
				        		<label for="" >Descripción</label>
			        			<textarea  id="descripcion" name="descripcion" rows="3" required="" class="form-control" maxlength="5000"></textarea>
				        	</div>
				        	<div class="form-group">
				        		<label for="">Ubicación</label>
			        			<textarea id="ubicacion" name="ubicacion" rows="3" class="form-control" maxlength="5000"></textarea>
				        	</div>
				        	<div class="form-group">
				        		<label for="">Actividad</label>
			        			<input id="actividad" type="text" name="actividad" class="form-control">
				        	</div>

							  <center>
							    <button type="submit" class="btn btn-flat btn-danger">Guardar</button>
	                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
							  </center>
						  </form>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Eliminar Detalle</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form id="delDetalle" action="" method="POST">
								  {{method_field('DELETE')}}
								  {{csrf_field()}}
								 <input id="detalle" type="hidden" name="detalle" value="0">
								 <h4>¿Esta seguro que desea eliminar este detalle?</h4>
							  <center>
							     <button type="submit" class="btn btn-flat btn-danger">Eliminar</button>
	                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cerrar</button>
							  </center>
						  </form>
						</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$('#editModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget);
			  var id     = button.data('id');
			  var action = "{{route('bienes_unidades_detalles.index')}}/"+id;
			  $('#editDetalle').attr('action',action);

			  var modal = $(this);
			  modal.find('#und_detalle').val(id);

			  $.ajax({
			  	type: 'GET',
			  	cache: false,
			  	url: action,
			  	dataType: 'JSON',
			  	success: function(r){
			  		$('#descripcion').val(r.descripcion);
			  		$('#ubicacion').val(r.ubicacion);
			  		$('#actividad').val(r.actividad);
			  	}
			  })
			});

			$('#delModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget);
			  var id     = button.data('id');
			  var action = "{{route('bienes_unidades_detalles.index')}}/"+id;
			  $('#delDetalle').attr('action',action);

			  var modal = $(this);
			  modal.find('#detalle').val(id);
			});
		});

	</script>
@endsection