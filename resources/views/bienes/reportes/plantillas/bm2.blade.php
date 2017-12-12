<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title></title>
	<style type="text/css">
	html {
	  margin: 0;
	}
	body {
	  font-family: "Arial", serif;
	  margin: 20mm 8mm 15mm 8mm;
	}

	.tablep{     font-family: "Arial", "Lucida Grande", Sans-Serif;
	    font-size: 12px;  text-align: center;    border-collapse: collapse; width: 100%}

	.tablep th {   font-size: 13px;     font-weight: bold;     padding: 8px;
	    border-top: 4px solid #aabcfe;    border-bottom: 1px solid black; }

	.tablep td { padding: 8px;}

	.tablen{font-family: "Arial", "Lucida Grande", Sans-Serif;
	    font-size: 12px;  text-align: center;    border-collapse: collapse;}

	.tablen .th {   font-size: 13px;     font-weight: bold;     padding: 8px;
	    border-top: 4px solid #aabcfe;    border-bottom: 1px solid black; }

	.tablen .td { padding: 8px;}
	
	.letras_encabezado{
		font-size: 25px;
	}
	hr{
		border: 1px solid #aabcfe;
	}

	.centrado{
		text-align: center;
	}
	</style>
	</head>
	<body>
		<div>
			<img src="{{asset('/img/logo_gestion.jpg')}}" width="15%" style="float: left">
			<p>
				<strong class="letras_encabezado">República Bolivariana de Venezuela</strong><br>
				<strong class="letras_encabezado">Alcaldía del Municipio Sucre. Estado Aragua</strong><br>
				<strong class="letras_encabezado">DIVISIÓN DE BIENES MUNICIPALES</strong><br>
				<strong>Desde: </strong>{{$desde}}&nbsp;&nbsp;&nbsp;&nbsp;<strong>Hasta: </strong>{{$hasta}}<br>
				Calle Froilan Correa. EDIF Sede de la Alcaldía 
			</p>
		</div>
		<table width="100%">
			<tr>
				<td  align="left">{{$fecha}}</td>
				<td  align="right"><strong>Formulario del BM-2</strong></td>
			</tr>
		</table>
		<hr>
		<h3 style="text-align: center">RELACIÓN DEL MOVIMIENTO DE BIENES MUEBLES</h3>
		<br>
		<table width="100%">
			<tr>
				<td  align="left"><span style="text-decoration: underline;">Clasificación</span>: {{$unidad_detalle->unidad->identificacion}}</td>
				<td  align="right"><span style="text-decoration: underline;">Sección</span>: {{$unidad_detalle->descripcion}}</td>
			</tr>
		</table>
		<table class="tablep">
			<thead>
				<tr>
					<th class="centrado">Unidad</th>
					<th class="centrado">Sección</th>
					<th class="centrado">Grupo</th>
					<th class="centrado">Sub Grupo</th>
					<th class="centrado">Identificación</th>
					<th class="centrado">Concepto</th>
					<th class="centrado">Descripción</th>
					<th class="centrado"></th>
					<th class="centrado">Incorporación</th>
					<th class="centrado">Desincorporación</th>
				</tr>
			</thead>
			<tbody class="centrado">
					@foreach($movimientos AS $row)
						<tr>
							<td>{{$row->bien->unidad->id}}</td>
							<td>{{$row->bien->seccion->id}}</td>
							<td>{{$row->bien->tipo->nomenclatura->grupo}}</td>
							<td>{{$row->bien->tipo->nomenclatura->sub_grupo}}</td>
							<td>{{$row->bien->codigo}}</td>
							<td>{{$row->concepto->descripcion}}</td>
							<td></td>
							<td>Bs.</td>
							<td>{{$row->des_incorporacion(1)}}</td>
							<td>{{$row->des_incorporacion()}}</td>
						</tr>
					@endforeach
			</tbody>
		</table>
	</body>
	</html>