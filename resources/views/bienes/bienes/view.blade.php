@extends('layouts.app')
@section('view_descrip')
Bienes - {{$bien->codigo}}
@endsection
@section('options')

@endsection
@section('content')
	@include('partials.flash')
	<h3 class="text-center">Detalles del {{$bien->codigo}}</h3>
	<br><br>
	<div class="row no-gutters">
		<div class="col-md-4">
			<a href="{{route('bienes_bienes.index')}}" class="btn btn-primary btn-block btn-flat pull-left"><i class="fa fa-arrow-left"></i>&nbsp;Regresar</a>		
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<button class="btn btn-success btn-block btn-flat pull-right" data-toggle="modal" data-target="#registrarModal" type="button">Registrar Movimientos&nbsp;<i class="fa fa-plus"></i></button>
		</div>
	</div>
	<div class="row" style="margin-top: 20px">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Unidad: </span></strong>
					<br><br> {{$bien->unidad->identificacion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Tipo: </span></strong>   <br><br> {{$bien->tipo->descripcion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Descripción General: </span></strong>  <br><br> {{$bien->descripcion_general}} 
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Grupo Bien Inmueble: </span></strong><br><br>{{$bien->tipo->nomenclatura->grupo}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Sub_Grupo: </span></strong><br><br>{{$subgrupo}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Sub Sub Grupo: </span></strong><br><br>{{$subsubgrupo}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Orden Compra: </span></strong><br><br>{{$bien->id_orden_compra ?$bien->id_orden_compra:''}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Status: </span></strong><br><br>{{ $bien->status == 0 ? '' : $bien->status}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Concepto Final: </span></strong><br><br>{{$bien->concepto->descripcion}}
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Insumo: </span></strong><br><br>{{$bien->id_insumo ? $bien->id_insumo : ''}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Dirección: </span></strong><br><br>{{$bien->direccion == 0 ? '' : $bien->direccion}}
				</div>
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Categoría: </span></strong><br><br>{{$bien->categoria == 0 ? '' : $bien->categoria}}
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center">
					<strong><span class="badge alert-danger" style="font-size: 13px">Imagen QR: </span></strong><br><br><img src="{{asset($bien->qr_code?$bien->qr_code:'')}}" title="{{$bien->codigo}}">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<h3 class="text-center">Movimientos</h3>
			<hr>
			<table class="table table-bordered">
				<thead>
    			<tr>
    				<th class="text-center">#</th>
    				<th class="text-center">Fecha</th>
    				<th class="text-center">Concepto</th>
    				<th class="text-center">Observación</th>
    				<th class="text-center">Unidad</th>
    				<th class="text-center">Sección</th>
    			</tr>
				</thead>
				<tbody>
					@foreach($movimientos->get() AS $row)
    			<tr>
    				<td class="text-center">{{$loop->iteration}}</td>
    				<td><span class='badge alert-danger'>{{$row->fecha}}</span></td>
    				<td>{{$row->concepto->descripcion}}</td>
    				<td>{{$row->observacion?$row->observacion:'N/A'}}</td>
    				<td>{{$row->unidad->identificacion}}</td>
    				<td>{{$row->unidad_detalles->descripcion}}</td>
    			</tr>
    			@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div id="registrarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrarModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="registrarModalLabel">Registrar Movimiento</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-12">
	            <form id="registrarMovimiento" class="form-horizontal" action="{{route('bienes_movimientos.store')}}" method="POST">
								  {{csrf_field()}}
								 <input id="bien_id" type="hidden" name="bien_id" value="{{$bien->id}}">

									<div class="form-group">
										<label for="" class="control-label col-md-2 col-sm-2">Concepto *</label>
										<div class="col-md-3 col-sm-3">
											<label for="incorporacion" class="control-label radio-inline">
												<input type="radio" id="incorporacion" name="tipo" value="1" {{!$desincorporado?'disabled':'checked'}}>
												Incorporación
											</label>				
										</div>
										<div class="col-md-3 col-sm-3">
											<label for="des_incorporacion" class="control-label radio-inline">
												<input type="radio" id="des_incorporacion" name="tipo" value="2" {{$desincorporado?'disabled':'checked'}}>
												Desincorporación
											</label>				
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-sm-6 col-md-offset-2 col-sm-offset-2">
											<select name="concepto_id" id="concepto_id" required class="form-control">
												<option value="">Seleccione...</option>
												@foreach($conceptos AS $row)
												<option value="{{$row->id}}">{{$row->descripcion}}</option>
												@endforeach
											</select>				
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-md-2 col-sm-2">Unidad *</label>
										<div class="col-md-4 col-sm-4">
											<select name="unidad_id" id="unidad_id" class="form-control" required>
												<option value=""></option>
												@foreach($unidades AS $row)
													<option value="{{$row->id}}">{{$row->identificacion}}</option>
												@endforeach
											</select>
										</div>
										<label for="" class="control-label col-md-2 col-sm-2">Sección *</label>
										<div class="col-md-4 col-sm-4">
											<select name="unidad_detalles_id" id="unidad_detalles_id" class="form-control" required>
												<option value=""></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-md-2 col-sm-2">Fecha *</label>
										<div class="col-md-4 col-sm-4">
											<input type="text" id="fecha" name="fecha" class="form-control fecha" required>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="control-label col-md-2 col-sm-2">Observación</label>
										<div class="col-md-10 col-sm-10">
											<textarea name="observacion" id="observacion" rows="2" class="form-control"></textarea>
										</div>
									</div>

							  <center>
							    <button type="submit" class="btn btn-flat btn-primary" {{Auth::user()->restringido()?'':'disabled'}}>Registrar</button>
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
          <h4 class="modal-title" id="delModalLabel">Eliminar Bien</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form id="delBien" action="" method="POST">
								  {{method_field('DELETE')}}
								  {{csrf_field()}}
								 <input id="bien" type="hidden" name="bien" value="0">
								 <h4>¿Esta seguro que desea eliminar este Bien?</h4>
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

			$('#delModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget);
			  var id     = button.data('id');
			  var action = "{{route('bienes_bienes.index')}}/"+id;
			  $('#delBien').attr('action',action);

			  var modal = $(this);
			  modal.find('#bien').val(id);
			});


			$('#unidad_id').change(function(){
				var unidad = $(this).val();
				var action = "{{route('bienes_unidades.index')}}/getDetalles/"+unidad;
				$('#unidad_detalles_id').empty();

				if(!unidad) return false;

				$.ajax({
					type: 'POST',
					url: action,
					data: {'_token':'{{csrf_token()}}'},
					dataType: 'json',
					success: function(r){
						$('#unidad_detalles_id').append('<option value="">Seleccione...</option>');

						$.each(r,function(k,v){
							$('#unidad_detalles_id').append('<option value="'+v.id+'">'+v.descripcion+'</option>');
						});
					}
				})	
			});

		});//Ready

	</script>
@endsection