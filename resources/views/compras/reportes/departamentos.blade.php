<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de departamentos</title>
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
   <h3>LISTADO DE DEPARTAMENTOS</h3>
		<table>
		  <thead>
		  	<tr style="background-color: skyblue">
				<th>PROGRAMATICA</th>
				<th>DESCRIPCION</th>
			</tr>
		  </thead>
		  <tbody>
		    @foreach($departamentos as $dep)
		  	<tr>
		  		<td>{{$dep->programatica}}</td>
		  		<td>{{$dep->descripcion}}</td>
		  	</tr>
		  	@endforeach
		  </tbody>
		</table>
</body>
</html>