@extends('layouts.app')

@section('content')
	@include('partials.flash')
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">Areas</h3>
			<span class="pull-left">
				<a class="btn btn-flat btn-default"  href="{{ route('areas.index') }}"><i class="fa fa-reply"></i> Volver</a>
				<a href="{{ url('areas/'.$area->id_area.'/edit') }}" class="btn btn-flat btn-success"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
				<button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
			</span>
		</div>
	</div>

	<div class="row" style="padding:20px 50px;">
		<div class="col-md-12" style="margin-top:15px">
			<div class="col-md-6">
				<h4>Detalles</h4>
				<p><b> Departamento:</b> {{ $area->departamentos->nombre }}</p>
				<p><b> Nombre:</b> {{ $area->nombre }}</p>
			</div>
			<div class="col-md-6">
				<h4>Asignaciones</h4>
				<p><b> Sub-areas:</b> {{ $subareas->count }}</p>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<h3 class="text-center">Sub-Areas en el area</h3>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Sub-area</th>
						<th class="text-center">Accion</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@php $i=1; @endphp
					@foreach($subareas->subareas AS $sub)
						<tr>
							<td class="text-center">{{ $i }}</td>
							<td>{{ $sub->nombre }}</td>
							<td class="text-center"><a class="btn btn-flat btn-primary" href="{{ url('areas/'.$sub->id_area) }}"><i class="fa fa-search"></i></a></td>
						</tr>
						@php $i++; @endphp
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
          <h4 class="modal-title" id="delModalLabel">Eliminar area</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form id="delProduct" class="col-md-8 col-md-offset-2" action="{{ url('areas/'.$area->id_area) }}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <h4 class="text-center">¿Esta seguro que desea eliminar este area?</h4><br>

              <div class="form-group">
                <div class="progress" style="display:none">
                  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                  </div>
                </div>
                <div class="alert" style="display:none" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>&nbsp;<span id="msj"></span></div>
              </div>
              <center>
                <button class="btn btn-flat btn-danger" type="submit">Aceptar</button>
                <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Close</button>
              </center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	
@endsection