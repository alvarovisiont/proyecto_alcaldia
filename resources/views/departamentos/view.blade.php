@extends('layouts.app')

@section('view_descrip')
<h3 class="text-center">Departamentos</h3>
<span class="pull-left">
	<a class="btn btn-flat btn-default"  href="{{ route('departamentos.index') }}"><i class="fa fa-reply"></i> Back</a>
	<a href="{{ url('departamentos/'.$departamento->id_departamento.'/edit') }}" class="btn btn-flat btn-success"><i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
	<button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#delModal"><i class="fa fa-times" aria-hidden="true"></i> Delete</button>
</span>
@endsection

@section('content')
	@include('partials.flash')

	<div class="row" style="padding:20px 50px;">
		<div class="col-md-12" style="margin-top:15px">
			<div class="col-md-6">
				<h4>Detalles</h4>
				<p><b> Nombre:</b> {{ $departamento->nombre }}</p>
				<p><b> Descripcion:</b> {{ $departamento->descripcion }}</p>
				<p><b> Icon:</b> {!! $departamento->fa_class?'<i class="fa '.$departamento->fa_class.'"></i>':'N/A' !!}</p>
			</div>
			<div class="col-md-6">
				<h4>Asignaciones</h4>
				<p><b> Areas:</b> {{ $areas->count }}</p>
				<p><b> Usuarios:</b> {{ $areas->users }}</p>
			</div>
		</div>
		<br>
		<div class="col-md-12">
			<h3 class="text-center">Areas en el departamento</h3>
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Area</th>
						<th class="text-center">Accion</th>
					</tr>
				</thead>
				<tbody class="text-center">
					@php $i=1; @endphp
					@foreach($areas->areas AS $area)
						<tr>
							<td>{{ $i }}</td>
							<td>{{ $area->nombre }}</td>
							<td class="text-center"><a class="btn btn-flat btn-primary" href="{{ url('areas/'.$area->id_area) }}"><i class="fa fa-search"></i></a></td>
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
          <h4 class="modal-title" id="delModalLabel">Eliminar departamento</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <form id="delProduct" class="col-md-8 col-md-offset-2" action="{{ url('departamentos/'.$departamento->id_departamento) }}" method="POST">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <h4 class="text-center">¿Esta seguro que desea eliminar este departamento?</h4><br>

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