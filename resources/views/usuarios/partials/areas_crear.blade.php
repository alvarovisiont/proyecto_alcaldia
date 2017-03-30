<div class="form-group">
		<label for="cedula" class="control-label col-md-2">Departamento</label>
		<div class="col-md-10">
			@foreach($departamentos as $depar)
				<!-- Departamentos ===================== -->
				<div class="col-md-2">
						<label for="{{'depar'.$depar->id_departamento}}" class="checkbox-inline"><input type="checkbox" id="{{'depar'.$depar->id_departamento}}" name="depar[]" value="{{$depar->id_departamento}}" class="departamento">
						{{$depar->nombre}}</label>
				</div>
				<div class="form-group" id="{{'section_area'.$depar->id_departamento}}" style="display:none">
					<div class="col-md-12">
						@foreach($areas->areas_por_departamentos($depar->id_departamento) as $area)
						<!-- Areas ===================== -->
							@if($area != "")
								<div class="col-md-2">
									<label for="{{'area'.$area->id_area}}" class="checkbox-inline"><input type="checkbox" id="{{'area'.$area->id_area}}" name="{{'area_'.$depar->id_departamento.'[]'}}" value="{{$area->id_area}}" class="area">
									{{$area->nombre}}</label>	
								</div>
							@endif
							<div class="form-group" id="{{'section_sub_area'.$area->id_area}}" style="display: none">
								<div class="col-md-12">
									@foreach($sub_areas->sub_areas_por_areas($area->id_area) as $sub)
										<!-- Sub Areas ===================== -->
											@if($sub != "")
												<div class="col-md-2">
													<label for="{{'sub_area'.$sub->id_sub_area}}" class="checkbox-inline"><input type="checkbox" id="{{'sub_area'.$sub->id_sub_area}}" name="{{'sub_area_'.$area->id_area.'[]'}}" value="{{$sub->id_sub_area}}" class="sub_area">
													{{$sub->nombre}}</label>	
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