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
		  <thead>
		  	<tr style="background-color: skyblue">
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
				<th>CANTIDAD</th>
				<th>UNIDAD</th>
			</tr>
		  </thead>
		  <tbody>
		  	<tr>
		  	@foreach($insumos as $in)
		  		<td>00{{$in->codigo}}</td>
		  		<td>{{$in->descripcion}}</td>
		  		<td>{{$in->cantidad}}</td>
		  		<td>{{$in->unidades->descripcion}}</td>
		  	@endforeach
		  	</tr>
		  </tbody>
		</table>
</body>
</html>