@extends('layouts.app')
@section('view_descrip')
Tipo Bien
@endsection
@section('options')
	<a href="{{route('bienes_tipo_bien.create')}}" class="pull-right btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
		Agregar Tipo Bien
	</a>
@endsection
@section('content')
	@include('partials.flash')

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-condensed" id="tabla">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Bien Inmueble</th>
						<th class="text-center">Sub grupo</th>
						<th class="text-center">Sub sub grupo</th>
						<th class="text-center">Codigo</th>
						<th class="text-center">Descripcion</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($tipos as $row)
						@php
							if($row->nomenclatura->tipo==1){
								$sub    = $row->nomenclatura->descripcion; 
								$subsub = "";
							}else{
								$sub    = $row->nomenclatura->getParentDescripcion();
								$subsub = $row->nomenclatura->descripcion;
							}
						@endphp
						<tr>
							<td>{{$loop->iteration}}</td>
							<td><span class="badge alert-danger">{{$row->nomenclatura->grupo}}</span></td>
							<td>{{$sub}}</td>
							<td>{{$subsub}}</td>
							<td>{{$row->codigo}}</td>
							<td>{{$row->descripcion}}</td>
							<td>
								@if(Auth::user()->restringido())
								<a href="{{ route('bienes_tipo_bien.edit',['id'=>$row->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
	    					<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal" data-id="{{$row->id}}" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>


	<div id="delModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="delModalLabel">Eliminar Tipo Bien</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form id="del_unidad" action="#" method="POST">
								  {{method_field('DELETE')}}
								  {{csrf_field()}}
								 <input id="unidad" type="hidden" name="unidad" value="0">
								 <h4>¿Esta seguro que desea eliminar este Tipo Bien?</h4>
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
			  $('#del_unidad').attr('action','bienes_tipo_bien/'+id);

			  var modal = $(this);
			  modal.find('#unidad').val(id);
			});
		});

	</script>
@endsection