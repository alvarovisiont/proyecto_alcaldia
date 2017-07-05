<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de insumos</title>
		<style type="text/css">
		table{
			border-collapse: collapse;
			text-align: center;
			padding-left: 6em;
		}
		td,th{
			border: 1px solid;
		}
		body{

			text-align: center;
		}
	</style>
</head>

<body>
   <h3>LISTADO DE INSUMOS</h3>
		<table>
		  <thead style="background-color: skyblue">
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Codigo</th>
				<th class="text-center">Descripcion</th>
				<th class="text-center">Cantidad</th>
				<th class="text-center">Unidad</th>
				
			</tr>
		</thead>
		<tbody class="text-center">
			@php $i=1; @endphp
			@foreach($insumos as $in)
				<tr>
					<td>{{$i}}</td>
					<td>00{{$in->codigo}}</td>
					<td>{{$in->descripcion}}</td>
					<td>{{$in->cantidad}}</td>
					<td>{{$in->unidades->descripcion}}</td>
					
				</tr>
				@php $i++; @endphp
			@endforeach
		</tbody>
		</table>
</body>
</html>