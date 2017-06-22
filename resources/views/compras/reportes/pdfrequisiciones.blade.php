<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de requisiciones</title>
		<style type="text/css">
		table{
			border-collapse: collapse;
			text-align: center;
			margin: auto;
			
		}
		td,th{
			border: 1px solid;
		}
		body{

			text-align: center;
		}


		#tabla{
			

		}
	</style>
</head>

<body>
   <h3>LISTADO DE REQUISICIONES DESDE: {{$desde}}   HASTA: {{$hasta}}   </h3>
		<table>
		  <thead>
		  	<tr style="background-color: skyblue">
				<th>CODIGO</th>
				<th>DESCRIPCION</th>
				<th>FECHA</th>
				<th>STATUS</th>
				<th>DEPARTAMENTO</th>
				<th>AÑO</th>
			</tr>
			<tbody>
			@foreach($requisicion as $req)
				<tr>
					<td>{{$req->codigo}}</td>
					<td>{{$req->descripcion}}</td>
					<td>{{$req->fecha}}</td>
					<td>{{$req->status}}</td>
					<td>{{$req->departamento->programatica}}</td>
					<td>{{$req->ano}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
</body>
</html>