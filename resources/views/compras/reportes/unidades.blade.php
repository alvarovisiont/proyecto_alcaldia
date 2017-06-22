<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de unidades</title>
		<style type="text/css">
		table{
			border-collapse: collapse;
			text-align: center;
			padding-left: 16em;
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
   <h3>LISTADO DE UNIDADES</h3>
		<table cellpadding="8">
		  <thead>
		  	<tr style="background-color: skyblue">
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
			</tr>
		  </thead>
		  <tbody>
		  	<tr>
		  	@foreach($unidades as $un)
		  		<td>00{{$un->codigo}}</td>
		  		<td>{{$un->descripcion}}</td>
		  	@endforeach
		  	</tr>
		  </tbody>
		</table>
</body>
</html>