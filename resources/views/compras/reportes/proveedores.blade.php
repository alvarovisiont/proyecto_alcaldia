<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de proveedores</title>
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
   <h3>LISTADO DE PROVEEDORES</h3>
		<table>
		  <thead>
		  	<tr style="background-color: skyblue">
				<th>RIF_CEDULA</th>
				<th>RAZON SOCIAL</th>
				<th>DIRECCION</th>
				<th>TELEFONO</th>
				<th>DESCRIPCION</th>
			</tr>
		  </thead>
		  <tbody>
		  	<tr>
		  	@foreach($proveedores as $pro)
		  		<td>{{$pro->rif_cedula}}</td>
		  		<td>{{$pro->razon_social}}</td>
		  		<td>{{$pro->direccion}}</td>
		  		<td>{{$pro->telefono}}</td>
		  		<td>{{$pro->descripcion}}</td>
		  	@endforeach
		  	</tr>
		  </tbody>
		</table>
</body>
</html>