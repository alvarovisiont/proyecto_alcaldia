	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Libro Mayor</title>
		<style type="text/css">
		table{
			border-collapse: collapse;
			text-align: center;
			width: 100%;
		}
		th{
			border: 1px solid;
			background-color: lightgray; 
		}
		td{
			border: 1px solid;
		}
		body{

			text-align: center;
		}
		.text-center{
			text-align: center;
		}
		.no-borders{
			border: 0px white solid;
		}
	</style>
</head>

<body>
   <h3 style="text-align: center">Balance General</h3>
   <h4 style="text-align: center">Al {{$hasta}}</h4>
	<table>
	  	<thead style="background-color: skyblue">
			<tr>
				<th class="text-center">Activos</th>
				<th class="text-center">Total</th>
				<th class="text-center">Pasivos</th>
				<th class="text-center">Total</th>
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($balance as $row)
				@php
					$total_pasivo_1 = $row->sal101 + $row->sal103 + $row->sal109 + $row->sal133
								 + $row->sal199;

					$total_pasivo_2 = $row->sal299;

					$total_pasivo_3 = $row->sal301 + $row->sal303;

					$total_activo_1 = $row->sal102 + $row->sal122 + $row->sal126 + $row->sal128 + $row->sal132;
					
					$total_activo_2 = $row->sal200 + $row->sal212 + $row->sal214 + $row->sal220 + $row->sal240;

					$total_activo_3 = $row->sal300;
				@endphp
				<tr>
					<!-- === DEBEEEEEEE ==================== -->
					<td>102: TESORERIA MUNICIPAL</td>
					<td>{{ number_format($row->sal102,2,',','.') }}</td>
					<td>101: ORDENES DE PAGO</td>
					<td>{{ number_format($row->sal101,2,',','.') }}</td>
				</tr>
				<tr>
					<td>122: INGRESOS POR RECAUDAR</td>
					<td>{{ number_format($row->sal122,2,',','.') }}</td>
					<td>103: GASTOS POR PAGAR</td>
					<td>{{ number_format($row->sal103,2,',','.') }}</td>
				</tr>
				<tr>
					<td>126: FONDO EN AVANCE</td>
					<td>{{ number_format($row->sal126,2,',','.') }}</td>
					<td>109: PRESTAMOS A CORTO PLAZO</td>
					<td>{{ number_format($row->sal109,2,',','.') }}</td>
				</tr>
				<tr>
					<td>128: ANTICIPOS A CONTRATISTAS</td>
					<td>{{ number_format($row->sal128,2,',','.') }}</td>
					<td>133: DEPOSITOS DE TERCEROS</td>
					<td>{{ number_format($row->sal133,2,',','.') }}</td>
				</tr>
				<tr>
					<td>132: FONDO DE TERCEROS</td>
					<td>{{ number_format($row->sal132,2,',','.') }}</td>
					<td>199: SITUACIÓN FINANCIERA DEL TESORO</td>
					<td>{{ number_format($row->sal199,2,',','.') }}</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>{{ number_format($total_activo_1,2,',','.') }}</td>
					<td>Total</td>
					<td>{{ number_format($total_pasivo_1,2,',','.') }}</td>
				</tr>
				<!-- ================== HABER ====================== -->
				<tr>
					<td colspan="4" align="center"><b>CUENTAS DE LA HACIENDA</b></td>
				</tr>
				<tr>
					<td>200: SITUACIÓN FÍSCAL DEL TESORO</td>
					<td>{{ number_format($row->sal200,2,',','.') }}</td>
					<td>299: HACIENDA MUNICIPAL</td>
					<td>{{ number_format($row->sal299,2,',','.') }}</td>
				</tr>
				<tr>
					<td>212: BIENES INMUEBLES</td>
					<td>{{ number_format($row->sal212,2,',','.') }}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>214: BIENES MUEBLES</td>
					<td>{{ number_format($row->sal214,2,',','.') }}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>220: INGRESOS DE LENTA Y DIF.RECAUD</td>
					<td>{{ number_format($row->sal220,2,',','.') }}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>240: OTROS ACTIVOS</td>
					<td>{{ number_format($row->sal240,2,',','.') }}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Total</td>
					<td>{{ number_format($total_activo_2,2,',','.') }}</td>
					<td>Total</td>
					<td>{{ number_format($total_pasivo_2,2,',','.') }}</td>
				</tr>
				<tr>
					<td colspan="4" align="center"><b>CUENTAS DEL PRESUPUESTO</b></td>
				</tr>
				<tr>
					<td>300: GASTOS PRESUPUESTARIOS</td>
					<td>{{ number_format($row->sal300,2,',','.') }}</td>
					<td>301: INGRESOS</td>
					<td>{{ number_format($row->sal301,2,',','.') }}</td>
				</tr>
				<tr>
					<td>Total</td>
					<td>{{ number_format($total_activo_3,2,',','.') }}</td>
					<td>Total</td>
					<td>{{ number_format($total_pasivo_3,2,',','.') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<br /><br />
	<table border="0">
		<tbody class="text-center">
			<td colspan="2" class="no-borders">{{ $config->alcalde }}<br /> Alcalde del Municipio</td>
			<td colspan="2" class="no-borders">{{ $config->coordinador }} <br /> Contador Público <br /> CPC34742</td>
		</tbody>
	</table>
</body>
</html>