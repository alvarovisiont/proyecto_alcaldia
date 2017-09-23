@php
	$check_area = null;
	$check_sub_area = null;
	$conn = 0;
@endphp	
@foreach($areas->areas_por_departamentos($depar->id_departamento) as $area)
	@php
		foreach($acceso as $acces)
		{
			$areass = explode(',', $acces->area_id);
			
			foreach ($areass  as $ar) 
			{
				if($ar == $area->id_area)
				{
					$check_area = "checked";
				}
			}

			$valida = true;
		}
	@endphp

	<!-- Areas ===================== -->
	@if($area != "")
	
	@if($conn == 0)
		<div class="row">
	@endif
		<div class="col-md-3">
			<label for="{{'area'.$area->id_area}}" class="checkbox-inline">
				<input type="checkbox" id="{{'area'.$area->id_area}}" name="{{'area_'.$depar->id_departamento.'[]'}}" value="{{$area->id_area}}" class="area_checkbox" {{$check_area}} data-departamento="{{ $depar->id_departamento }}"
				>
				<strong>{{$area->nombre}}</strong>
			</label>	

			<div class="form-group div_sub_{{$area->id_area}}" style="{{ $check_area ? '' : 'display:none' }}">
				@foreach($sub_areas->sub_areas_por_areas($area->id_area) as $sub)
					
					@php
						foreach($acceso as $acces)
						{
							$subss = explode(',', $acces->sub_area_id);

							foreach ($subss  as $sub_area) 
							{
								if($sub_area == $sub->id_sub_area)
								{
									$check_sub_area = "checked";
								}	
							}
						}
					@endphp
					<!-- Sub Areas ===================== -->
					<div class="col-md-12">
						@if($sub != "")
								<label for="{{'sub_area'.$sub->id_sub_area}}" class="checkbox-inline">
									<input type="checkbox" id="{{'sub_area'.$sub->id_sub_area}}" name="{{'sub_area_'.$area->id_area.'[]'}}" value="{{$sub->id_sub_area}}" class="sub_area"  {{$check_sub_area}}
									>
										{{$sub->nombre}}
								</label>	
						@endif
						@php
							$check_sub_area = null;
						@endphp
					</div>
				@endforeach
			</div>
		</div>
		@php
			$check_area = null;
		@endphp
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

		if($valida)
		{
			$depars.= $depar->id_departamento.',';
		}
		$valida = false;
	@endphp

	<script>
		document.getElementById('departamentos_grabar').value = '<?= $depars; ?>'
	</script>

