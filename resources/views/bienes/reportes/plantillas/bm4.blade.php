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
	
	.tablep tbody tr { padding: 8px;}

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
			</p>
		</div>
		<table width="100%">
			<tr>
				<td  align="left"><strong>Desde: {{$desde}}</strong></td>
				<td  align="right"><strong>Unidad: {{$unidad_detalle->unidad->identificacion}}</strong></td>
			</tr>
			<tr>
				<td  align="left"><strong>Hasta: {{$hasta}}</strong></td>
				<td  align="right"><strong>Sección: {{$unidad_detalle->descripcion}} </strong></td>
			</tr>
		</table>
		<hr>
		<h3 style="text-align: center">RESUMEN DE BIENES MUEBLES EN CADA UNIDAD DE TRABAJO</h3>
		<br>
		<table class="tablep">
			<tbody class="centrado">
				<tr>
					<td align="left"><h3>Existencia Anterior</h3></td>
					<td align="right">{{number_format($exis_anterior,2,',','.')}}</td>
				</tr>
				<tr>
					<td align="left"><h3>Incorporación en el mes de la cuenta</h3></td>
					<td align="right">{{number_format($incorporacion,2,',','.')}}</td>
				</tr>
				<tr>
					<td align="left"><h3>Desincorporaciones en el mes de la cuenta por todos los conceptos, con excepción del 60 <br> 
						"Faltantes de bienes por investigar"</h3>
					</td>
					<td align="right">{{number_format($desincorporacionMenos60,2,',','.')}}</td>
				</tr>
				<tr>
					<td align="left"><h3>Desincorporaciones en el mes de la cuenta por el concepto 60 "Faltantes de Bienes por Investigar"</h3></td>
					<td align="right">{{number_format($desincorporacion60,2,',','.')}}</td>
				</tr>
				<tr>
					<td align="left"><h3>Existencia Final</h3></td>
					<td align="right">{{number_format($total,2,',','.')}}</td>
				</tr>
			</tbody>	
		</table>
	</body>
</html>