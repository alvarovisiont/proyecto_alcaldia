<form action="{{ url('com_ordenes_detalle') }}" class="form-horizontal" id="form_detalle" method="POST">

	{{csrf_field()}}
	<input type="hidden" id="descripcion" name="descripcion">
	<input type="hidden" id="unidad" name="unidad">
	<div class="form-group">
		<label for="" class="control-label col-md-2">Ordenes</label>
		<div class="col-md-4">
			<select name="com_ordenes_id" id="com_ordenes_id" required="" class="form-control">
				<option value=""></option>
				@foreach($ordenes as $row)
					@if($row->id == $orden)
						<option value="{{$row->id}}" selected="">{{$row->codigo}}</option>
					@else
						<option value="{{$row->id}}">{{$row->codigo}}</option>
					@endif
				@endforeach
			</select>
		</div>
		<label for="" class="control-label col-md-2">Insumos</label>
		<div class="col-md-4">
			<select name="item_insumo" id="item_insumo" required="" class="form-control">
				<option value=""></option>
				@foreach($insumos as $row)
					<option value="{{$row->id}}" data-descripcion="{{$row->descripcion}}" data-unidad="{{$row->unidades->descripcion}}">{{$row->descripcion}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="control-label col-md-2">Cantidad</label>
		<div class="col-md-2">
			<input type="number" class="form-control" id="cantidad" name="cantidad" required="">
		</div>
		<label for="" class="control-label col-md-2">Base Imponible</label>
		<div class="col-md-2">
			<input type="number" step="any" class="form-control" id="base" name="base" required="">
		</div>
		<label for="" class="control-label col-md-2">Iva</label>
		<div class="col-md-2">
			<select name="iva_porcentaje" id="iva_porcentaje" required="" class="form-control">
				<option value=""></option>
				<option value="12">12</option>
				<option value="8">8</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-md-offset-4">
			<button type="submit" class="btn btn-danger btn-block">Agregar&nbsp;&nbsp;<i class="fa fa-save"></i></button>
		</div>
		<div class="col-md-offset-1 col-md-3">
			<a href="{{ route('com_ordenes.index') }}" class="btn btn-link">Regresar al listado de Ordenes</a>
		</div>
	</div>
</form>	