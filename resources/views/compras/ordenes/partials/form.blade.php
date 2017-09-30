<form action="{{url($ruta)}}" class="form-horizontal" id="form_orden" method="POST">
	@if($edit)
		{{method_field('PATCH')}}
	@endif
	{{csrf_field()}}
	
	<div class="form-group">
		<label for="" class="control-label col-md-2">Código</label>
		<div class="col-md-4">
			<input type="text" id="codigo" name="codigo" class="form-control" readonly="" required="" value="{{$orden->codigo ? $orden->codigo : $codigo }}">
		</div>
		<label for="" class="control-label col-md-2">Nº Control *</label>
		<div class="col-md-4">
			<input type="number" id="numero_control" name="numero_control" class="form-control" required="" pattern="[0-9] {1, 10}" value="{{$orden->numero_control}}">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Nº Requisición</label>
		<div class="col-md-4">
			<input type="text" id="com_requisiciones_codigo" name="com_requisiciones_codigo" class="form-control" readonly="" required="" value="{{$orden->com_requisiciones_codigo}}">
		</div>
		<label for="" class="control-label col-md-2">Concepto Requisición</label>
		<div class="col-md-4">
			<input type="text" id="com_requisicion_concepto" name="com_requisicion_concepto" class="form-control" readonly="" required="" value="{{$orden->com_requisicion_concepto}}">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Fecha Requisición</label>
		<div class="col-md-4">
			<input type="text" id="fecha_requisicion" name="fecha_requisicion" class="form-control" readonly="" required="" value="{{$orden->fecha_requisicion}}">
		</div>
		<label for="" class="control-label col-md-2">Escoger Requisición</label>
		<div class="col-md-4">
			<select id="buscar_requisicion" required="" class="form-control">
				<option value=""></option>
				@foreach($requisiciones as $row)
					@if($orden->com_requisiciones_codigo == $row->codigo)
						<option value="{{$row->codigo}}" selected="" data-programatica="{{$row->departamento->programatica}}" data-unidad="{{$row->departamento->unidad_departamento}}" data-fecha="{{$row->fecha}}" data-concepto="{{$row->descripcion}}">{{$row->codigo}}</option>
					@else
						<option value="{{$row->codigo}}" data-programatica="{{$row->departamento->programatica}}" data-unidad="{{$row->departamento->unidad_departamento}}" data-fecha="{{$row->fecha}}" data-concepto="{{$row->descripcion}}">{{$row->codigo}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Prográmatica</label>
		<div class="col-md-4">
			<input type="text" id="com_departamento_programatica" name="com_departamento_programatica" class="form-control" readonly="" required="" value="{{$orden->com_departamento_programatica}}">
		</div>
		<label for="" class="control-label col-md-2">Unidad Solicitante</label>
		<div class="col-md-4">
			<input type="text" id="com_departamento_unidad" name="com_departamento_unidad" class="form-control" readonly="" required="" value="{{$orden->com_departamento_unidad}}">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Rif Proveedor</label>
		<div class="col-md-4">
			<input type="text" id="com_provees_rif" name="com_provees_rif" class="form-control" readonly="" required="" value="{{$orden->com_provees_rif}}">
		</div>
		<label for="" class="control-label col-md-2">Proveedor</label>
		<div class="col-md-4">
			<input type="text" id="com_provees_razon_social" name="com_provees_razon_social" class="form-control" readonly="" required="" value="{{$orden->com_provees_razon_social}}">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Proveedor Dirección</label>
		<div class="col-md-4">
			<input type="text" id="com_provees_direccion" name="com_provees_direccion" class="form-control" readonly="" required="" value="{{$orden->com_provees_direccion}}">
		</div>
		<label for="" class="control-label col-md-2">Escoger Proveedor</label>
		<div class="col-md-4">
			<select id="buscar_proveedor" required="" class="form-control">
				<option value=""></option>
				@foreach($provees as $row)
					@if($orden->com_provees_rif == $row->rif_cedula)
						<option value="{{$row->rif_cedula}}" selected="" data-razon="{{$row->razon_social}}" data-direccion="{{$row->direccion}}">{{$row->razon_social}}</option>
					@else
						<option value="{{$row->rif_cedula}}" data-razon="{{$row->razon_social}}" data-direccion="{{$row->direccion}}">{{$row->razon_social}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Tipo Orden</label>
		<div class="col-md-4">
			<select name="tipo_orden" id="tipo_orden" required="" class="form-control">
				<option value=""></option>
				<option value="Compra" <? if($orden->tipo_orden == "Compra"){ echo 'selected'; } ?>>Compra</option>
				<option value="Servicio" <? if($orden->tipo_orden == "Servicio"){ echo 'selected'; } ?>>Servicio</option>
				<option value="Donación" <? if($orden->tipo_orden == "Donación" ){ echo 'selected'; } ?>>Donación</option>
			</select>
		</div>
		<label for="" class="control-label col-md-2">Forma de Pago</label>
		<div class="col-md-4">
			<select name="forma_pago" id="forma_pago" required="" class="form-control">
				<option value=""></option>
				<option value="Credito" <? if($orden->forma_pago == "Credito"){ echo 'selected'; } ?>>Credito</option>
				<option value="Efectivo" <? if($orden->forma_pago == "Efectivo"){ echo 'selected'; } ?>>Efectivo</option>
				<option value="Cheque" <? if($orden->forma_pago == "Cheque"){ echo 'selected'; } ?>>Cheque</option>
				<option value="Debito" <? if($orden->forma_pago == "Debito"){ echo 'selected'; } ?>>Debito</option>
				<option value="Transferencia" <? if($orden->forma_pago == "Transferencia"){ echo 'selected'; } ?>>Transferencia</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Condición de Compra</label>
		<div class="col-md-4">
			<input type="text" id="condicion_compra" name="condicion_compra" required="" class="form-control" value="{{$orden->condicion_compra}}">
		</div>
		<label for="" class="control-label col-md-2">Lugar Entrega</label>
		<div class="col-md-4">
			<input type="text" id="lugar_entrega" name="lugar_entrega" required="" class="form-control" value="{{$orden->lugar_entrega}}">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Plazo Entrega</label>
		<div class="col-md-4">
			<input type="text" id="plazo_entrega" name="plazo_entrega" required="" class="form-control" value="{{$orden->plazo_entrega}}">
		</div>
		<label for="" class="control-label col-md-2">Fecha Orden</label>
		<div class="col-md-4">
			<input type="text" id="fecha_orden" name="fecha_orden" required="" class="form-control" value="{{$orden->fecha_orden}}">
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-success btn-block" {{ Auth::user()->restringido()?'':'disabled' }}>Registrar&nbsp;&nbsp;<i class="fa fa-thumbs-up"></i></button>
		</div>
		<div class="col-md-offset-1 col-md-3">
			<a href="{{ route('com_ordenes.index')}}">Regresar al Listado de Ordenes</a>
		</div>
	</div>
</form>