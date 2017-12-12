@extends('layouts.app')
@section('view_descrip')
Conceptos
@endsection
@section('options')
	<a href="{{route('bienes_conceptos.create')}}" class="pull-right btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
		Agregar Concepto
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
						<th class="text-center">Descripción</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Status</th>
						<th class="text-center">Codigo</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($conceptos as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$row->descripcion}}</td>
							<td><span class="badge alert-warning">{{$row->tipo}}</span></td>
							<td>{{$row->status}}</td>
							<td>{{$row->codigo}}</td>
							<td>
								@if(Auth::user()->restringido())
								<a href="{{ route('bienes_conceptos.edit',['id'=>$row->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
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
          <h4 class="modal-title" id="delModalLabel">Eliminar Concepto</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-md-8 col-md-offset-2">
	            <form id="del_unidad" action="#" method="POST">
								  {{method_field('DELETE')}}
								  {{csrf_field()}}
								 <input id="unidad" type="hidden" name="unidad" value="0">
								 <h4>¿Esta seguro que desea eliminar este concepto?</h4>
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
			  var action = "{{route('bienes_conceptos.index')}}/"+id;
			  console.log(action);
			  $('#del_unidad').attr('action',action);

			  var modal = $(this);
			  modal.find('#unidad').val(id);
			});
		});

	</script>
@endsection