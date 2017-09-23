
@php
	$conn = 0;
@endphp

@foreach($areas->areas_por_departamentos($depar->id_departamento) as $area)
<!-- Areas ===================== -->
	@if($area != "")
	@if($conn == 0)
		<div class="row">
	@endif
		<div class="col-md-3">
			<label for="{{'area'.$area->id_area}}" class="checkbox-inline">
				<input type="checkbox" id="{{'area'.$area->id_area}}" name="{{'area_'.$depar->id_departamento.'[]'}}" value="{{$area->id_area}}" class="area_checkbox" data-departamento="{{ $depar->id_departamento }}"
				>
				<strong>{{$area->nombre}}</strong>
			</label>	
			<div class="form-group div_sub_{{$area->id_area}}" style="display: none">
				@foreach($sub_areas->sub_areas_por_areas($area->id_area) as $sub)
					<!-- Sub Areas ===================== -->
					@if($sub != "")
						<div class="col-md-12">
							<label for="{{'sub_area'.$sub->id_sub_area}}" class="checkbox-inline"><input type="checkbox" id="{{'sub_area'.$sub->id_sub_area}}" name="{{'sub_area_'.$area->id_area.'[]'}}" value="{{$sub->id_sub_area}}" class="sub_area">
							{{$sub->nombre}}</label>	
						</div>
					@endif
				@endforeach
			</div>
		</div>
	@endif
	@php
		$conn++;
		
		if($conn == 4)
		{
			// div del row
			echo '</diV>';
			$conn = 0;
		}
	@endphp
@endforeach
	@php
		
		if($conn != '0')
		{
			// div del row
			echo '</diV>';
		}
	@endphp