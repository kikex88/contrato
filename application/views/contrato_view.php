<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contracto</title>
	<!--*******************************************************
		Agregamos la libreria para poder utilizar bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

		<script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
		<style>
			.table{
				width: 70%;
				padding: 10px;
				margin: auto;
			}
			.msj{
				width: 100%;
				padding: 10px;
				margin-left: 50%;
			}
		</style>

</head>
<body>
	<div class="panel">
		<div class="panel-header">
			<center><h3>Clientes</h3></center>
		</div>
		<div class="panel-body">
			<div class="row">
				<a style="position: relative; left: 70%; margin-bottom: 20px; box-shadow: 3px 3px 0px #039758;" class="btn btn-success" href="<?php echo site_url('agregar-cliente') ?>">Agregar cliente</a>
			</div>
			<div class="row">
				<?php if($datos != false) {?>
				<!--Creamos la tabla donde mostraremos los clientes-->
				<table class="table" border="1">
					<thead>
						<th>NOMBRE</th>
						<th>APELLIDO</th>
						<th>ESTADO</th>
						<th>Agregar servicio</th>
						<th>MODIFICAR</th>
						<th>ELIMINAR</th>
					</thead>
					<tbody>
						<?php foreach ($datos as $key ) {?>
							<tr>
								<td> <?php echo $key->nombre_cli ?> </td>
								<td> <?php echo $key->apellido_cli ?> </td>
								<td>  </td>
								<td> <a class="btn btn-warning" href="<?php echo site_url('agregar-detalle/'.$key->id_cli) ?>">servicio</a></td>
								<td> <a class="btn btn-success" href="">Modificar</a> </td>
								<td> <a href="" class="btn btn-danger">Eliminar</a> </td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }else{ ?>
				<center><h1 class="msj">SIN REGISTROS EN LA BASE DE DATOS.</h1></center>
			<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>