@extends('layouts.app')
@section('view_descrip')
Bienes
@endsection
@section('options')
	<a href="{{route('bienes_bienes.create')}}" class="pull-right btn-flat btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>
		Agregar Bienes
	</a>
@endsection
@section('content')
	@include('partials.flash')
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-condensed">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Código</th>
						<th class="text-center">Descripción</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Precio</th>
						<th class="text-center">Status</th>
						<th class="text-center">Acción</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@foreach($bienes as $row)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td><span class="badge alert-warning">{{$row->codigo}}</span></td>
							<td>{{$row->descripcion}}</td>
							<td>{{$row->fecha}}</td>
							<td>{{number_format($row->precio,2,",",".")}}</td>
							<td>{{$row->status}}</td>
							<td>
								<a href="{{ route('bienes_bienes.show',['id'=>$row->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
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