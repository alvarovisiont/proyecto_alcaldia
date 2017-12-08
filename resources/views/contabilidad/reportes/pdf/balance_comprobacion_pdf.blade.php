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
	</style>
</head>

<body>
   <h3 style="text-align: center">Balance de Comprobación</h3>
   <h4 style="text-align: center">Al {{$hasta}}</h4>
	<table>
	  	<thead style="background-color: skyblue">
			<tr>
				<th class="text-center">Cuentas</th>
				<th class="text-center">Debe</th>
				<th class="text-center">Haber</th>	
			</tr>
		</thead>
		<tbody class="text-center">
			@foreach($balance as $row)
				@php
					$total_debe = $total_debe + $row->debe;
					$total_haber = $total_haber + $row->haber;	
				@endphp
				<tr>
					<td>{{$row->p21.': '.$row->cuenta}}</td>
					<td>{{number_format($row->debe,2,',','.')}}</td>
					<td>{{number_format($row->haber,2,',','.')}}</td>
				</tr>
			@endforeach
			<tr>
				<td><b>Total:</b></td>
				<td>{{number_format($total_debe,2,',','.')}}</td>
				<td>{{number_format($total_haber,2,',','.')}}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>