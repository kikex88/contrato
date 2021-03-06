<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar cliente</title>

	<!--*******************************************************
		Agregamos la libreria para poder utilizar bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

		<script src="<?php echo base_url('assets/dist/sweetalert2.min.js') ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/dist/sweetalert2.min.css') ?>">

		<style>
			.container{
				width: 90%;
				padding: 60px;
				margin: auto;
			}
		</style>
</head>
<body>
	<?php if($this->session->flashdata('exito_agregar')){ ?>
		<script>
			Swal(
			  'Éxito!',
			  'El usuario fue agregado!',
			  'success'
			);
		</script>
	<?php } ?>

	<?php if($this->session->flashdata('error_agregar')){ ?>
		<script>
			Swal(
			  'Atención!',
			  'El usuario no fue agregado!',
			  'warning'
			);
		</script>
	<?php } ?>

	<div class="container">
		<form action="<?php echo site_url()?>Contrato_controller/agregar_cliente" method="post">
			<div class="row">
				<h3>Agregar Cliente</h3>
			</div>
			<div class="row">
				<div class="col-md-6">
					Nombre:
					<input class="form-control" type="text" name="nombre_cli" id="nombre_cli" required="">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					Apellido:
					<input class="form-control" type="text" name="apellido_cli" id="apellido_cli" required="">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					Dirección:
					<textarea class="form-control" name="direccion_cli" id="direccion_cli" cols="20" rows="1" required=""></textarea>
				</div>
			</div>
			<div class="row" >
				<a class="btn btn-danger" style="margin-left: 15px; margin-top: 15px" href="<?php echo site_url() ?>">Cancelar</a>
				<button type="submit" style="margin-left: 15px; margin-top: 15px" class="btn btn-success">Agregar</button>
			</div>
		</form>
	</div>
	
</body>
</html>