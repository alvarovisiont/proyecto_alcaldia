@extends('layouts.app')

@section('view_descrip')
		<h3 class="text-center">Reporte Balance Comprobación</h3>
@endsection

@section('content')
	<form action="{{ url('/cont_balance_comprobacion_pdf') }}" class="form-horizontal"  id="form_pdf">
		<div class="form-group">
			<label for="" class="col-md-2 col-md-offset-2">Hasta</label>
			<div class="col-md-4">
				<input type="text" name="hasta" class="form-control fecha" required="">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button class="btn btn-danger btn-block">Generar&nbsp;<i class="fa fa-file-pdf-o"></i></button>
			</div>
		</div>
	</form>
@endsection

@section('script')
	<script>
		$(function(){
			$('#form_pdf').submit(function(e) {
				e.preventDefault()
				var ruta = e.target.getAttribute('action'),
					data = $(this).serialize()

				ruta = ruta + '?'+data

				window.open(ruta,'_blank')

			});
		})
	</script>
@endsection