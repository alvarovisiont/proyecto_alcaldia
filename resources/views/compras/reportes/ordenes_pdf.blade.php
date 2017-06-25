<?
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$fecha = $dias[date('w',strtotime("- 6 hour"))]." ".date('d',strtotime("- 6 hour"))." de ".$meses[date('n')-1]. " del ".date('Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href=" {{asset('assets/css/bootstrap.min.css')}} " />
	<style>
		table 
		{     
			font-family: "Arial", "Lucida Grande", Sans-Serif;
    				font-size: 12px;    margin: 45px;     width: 480px; text-align: center;    border-collapse: collapse; width: 100%
    	}

		th 
		{
		     font-size: 13px;     font-weight: bold;     padding: 8px;
		    border-top: 4px solid #aabcfe;    border-bottom: 1px solid black; 
		}

		td 
		{
		    padding: 8px; border-bottom: 1px solid black;
		    border-top: 1px solid black; 
		}
	</style>
</head>
<body>
	<div class="row">
			<div class="col-md-12">
				<div class="page-header" style="text-align: right">
	    		Fecha: {{$fecha}}
				</div>
				<table class="">
            		<thead>
            			<tr>
            				<td colspan="8"><h3>Ordenes Registradas</h3></td>
            			</tr>
		                <tr>
		                    <th class="text-center">Código</th>
							<th class="text-center">Fecha</th>
							<th class="text-center">Nº Control</th>
							<th class="text-center">Forma de Pago</th>
							<th class="text-center">Condición Compra</th>
							<th class="text-center">Lugar Entrega</th>
							<th class="text-center">Plazo Entrega</th>
							<th class="text-center">Detalles</th>
		                </tr>
		            </thead>
            		<tbody class="text-center">
		                @foreach($datos as $row)
		                    <tr>
		                        <td>{{$row->codigo}}</td>
								<td>{{date('d-m-Y', strtotime($row->fecha_orden))}}</td>
								<td>{{$row->numero_control}}</td>
								<td>{{$row->forma_pago}}</td>
								<td>{{$row->condicion_compra}}</td>
								<td>{{$row->lugar_entrega}}</td>
								<td>{{$row->plazo_entrega}}</td>
								<td>{{$row->detalle_orden->count()}}</td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		</div>
	</div>
</body>
</html>