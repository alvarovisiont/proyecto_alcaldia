	<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title></title>
	<link rel="stylesheet" href="./assets/css/estilos.css">
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
		font_size: 25px;
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
				<td  align="right"><strong></strong></td>
			</tr>
		</table>
		<hr>
		<h3 style="text-align: center">{{strtoupper($name)}} DE BIENES MUNICIPALES</h3>
		<br>
		<table width="100%" class="tablep">
			<thead>
				<tr>
					<th align="center">Código</th>
					<th align="center">Fecha</th>
					<th align="center">Unidad</th>
					<th align="center">Sección</th>
					<th align="center">Observación</th>
					<th align="center">Concepto</th>
					<th align="center"></th>
					<th align="center">Precio</th>
				</tr>
			</thead>
			<tbody align="center">
				@foreach($movimientos AS $row)
					<tr>
						<td><strong>{{$row->bien->codigo}}</strong></td>
						<td>{{$row->fecha}}</td>
						<td>{{$row->unidad->identificacion}}</td>
						<td>{{$row->unidad_detalles->descripcion}}</td>
						<td>{{$row->observacion}}</td>
						<td>{{$row->concepto->descripcion}}</td>
						<td>Bs</td>
						<td>{{number_format($row->bien->precio,2,',','.')}}</td>
					</tr>
				@endforeach
			<tr>
				<td colspan='3' style='border-top: 1px solid black;'><strong><h4>Total</h4></strong></td>
				<td colspan='4' style='border-top: 1px solid black;' align='right'>Bs</td>
				<td style='border-top: 1px solid black;'><h4>{{number_format($total,2,',','.')}}</h4></td>
			</tr>
			</tbody>
		</table>
	</body>
</html>