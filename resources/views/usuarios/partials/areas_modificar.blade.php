<div class="form-group">
		<label for="cedula" class="control-label col-md-2">Departamento</label>
		<div class="col-md-10">
			@foreach($departamentos as $depar)
				<!-- Departamentos ===================== -->
				<div class="col-md-2">
					@if($acceso->departamento_id == $depar->id_departamento)
						<label for="{{'depar'.$depar->id_departamento}}" class="checkbox-inline"><input type="checkbox" id="{{'depar'.$depar->id_departamento}}" name="depar[]" value="{{$depar->id_departamento}}" class="departamento" checked="">
						{{$depar->nombre}}</label>
					@else
						<label for="{{'depar'.$depar->id_departamento}}" class="checkbox-inline"><input type="checkbox" id="{{'depar'.$depar->id_departamento}}" name="depar[]" value="{{$depar->id_departamento}}" class="departamento">
						{{$depar->nombre}}</label>
					@endif
				</div>
				<div class="form-group" id="{{'section_area'.$depar->id_departamento}}" style="display:none">
					<div class="col-md-12">
						@php
							//area id para modificar
							$area_explode = explode(',', $acceso->area_id);
						@endphp
						@foreach($areas->areas_por_departamentos($depar->id_departamento) as $area)
						@php
							$cont = 0;
						@endphp
						<!-- Areas ===================== -->
							@if($area != "")
								<div class="col-md-2">
									@if($area_explode[$cont] == $area->id_area)
										<label for="{{'area'.$area->id_area}}" class="checkbox-inline"><input type="checkbox" id="{{'area'.$area->id_area}}" name="{{'area_'.$depar->id_departamento.'[]'}}" value="{{$area->id_area}}" class="area" checked="">
										{{$area->nombre}}</label>	
									@else
										<label for="{{'area'.$area->id_area}}" class="checkbox-inline"><input type="checkbox" id="{{'area'.$area->id_area}}" name="{{'area_'.$depar->id_departamento.'[]'}}" value="{{$area->id_area}}" class="area">
										{{$area->nombre}}</label>	
									@endif
								</div>
							@endif
							@php
								$cont++;
								$sub_area_explode = explode(',', $acceso->sub_area_id);
							@endphp
							<div class="form-group" id="{{'section_sub_area'.$area->id_area}}" style="display:none">
								<div class="col-md-12">
									@foreach($sub_areas->sub_areas_por_areas($area->id_area) as $sub)
									@php
										$cont_sub = 0;
									@endphp
										<!-- Sub Areas ===================== -->
											@if($sub != "")
												<div class="col-md-2">
													@if($sub_area_explode[$cont_sub] == $sub->id_sub_area)
														<label for="{{'sub_area'.$sub->id_sub_area}}" class="checkbox-inline"><input type="checkbox" id="{{'sub_area'.$sub->id_sub_area}}" name="{{'sub_area_'.$area->id_area.'[]'}}" value="{{$sub->id_sub_area}}" class="sub_area" checked="">
														{{$sub->nombre}}</label>	
													@else
														<label for="{{'sub_area'.$sub->id_sub_area}}" class="checkbox-inline"><input type="checkbox" id="{{'sub_area'.$sub->id_sub_area}}" name="{{'sub_area_'.$area->id_area.'[]'}}" value="{{$sub->id_sub_area}}" class="sub_area">
														{{$sub->nombre}}</label>	
													@endif
												</div>
											@endif
									@endforeach
								</div>
							</div>
						@endforeach
					</div>	
				</div>
			@endforeach
		</div>
	</div>