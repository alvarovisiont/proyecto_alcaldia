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
   <h3 style="text-align: center">Libro Mayor</h3>
   <h4 style="text-align: center">Desde: {{$desde}} hasta el {{$hasta}}</h4>
   @foreach($asientos as $row)

   @php
   		$saldo = "";

	   	if ($row->p21 == "102" or $row->p21 == "122" or $row->p21 == "126" or $row->p21 == "128" or $row->p21 == "132" or $row->p21 == "212" or $row->p21 == "214" or 	$row->p21 == "220" or $row->p21 == "240" or $row->p21 == "300"  )
	   	{
        	$saldo= $row->debe - $row->haber;	
        }
       	
       	if ($row->p21 == "101" or $row->p21 == "103" or $row->p21 == "109" or $row->p21 == "133" or $row->p21 == "299" or $row->p21 == "301")
       	{
       		$saldo= $row->haber - $row->debe;
      	}
    @endphp

   <h5 class="text-center">Cuenta: {{strtoupper($row->cuenta)}}</h5>
	<table>
	  	<thead style="background-color: skyblue">
			<tr>
				<th class="text-center">Fecha</th>
				<th class="text-center">Descripción</th>
				<th class="text-center">Cuenta</th>
				<th class="text-center">Debe</th>
				<th class="text-center">Haber</th>
				
			</tr>
		</thead>
		<tbody class="text-center">
			<tr>
				<td>{{$row->fecha}}</td>
				<td>{{$row->descripcion}}</td>
				<td>{{$row->p21}}</td>
				<td>{{number_format($row->debe,2,',','.')}}</td>
				<td>{{number_format($row->haber,2,',','.')}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>{{number_format($row->debe,2,',','.')}}</td>
				<td>{{number_format($row->haber,2,',','.')}}</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Saldo</td>
				<td>{{number_format($saldo,2,',','.')}}</td>
			</tr>
		</tbody>
	</table>
   @endforeach
</body>
</html>