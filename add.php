<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar Datos<</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos de Producto &raquo; Agregar Producto</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$idproducto		     = mysqli_real_escape_string($con,(strip_tags($_POST["idproducto"],ENT_QUOTES)));//Escanpando caracteres 
				$producto		     = mysqli_real_escape_string($con,(strip_tags($_POST["producto"],ENT_QUOTES)));//Escanpando caracteres 
				$idmarca	 = mysqli_real_escape_string($con,(strip_tags($_POST["idmarca"],ENT_QUOTES)));//Escanpando caracteres 
				$descripcion	 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));//Escanpando caracteres 
				$precio_costo	     = mysqli_real_escape_string($con,(strip_tags($_POST["precio_costo"],ENT_QUOTES)));//Escanpando caracteres 
				$precio_venta		 = mysqli_real_escape_string($con,(strip_tags($_POST["precio_venta"],ENT_QUOTES)));//Escanpando caracteres 
				$existencia		 = mysqli_real_escape_string($con,(strip_tags($_POST["existencia"],ENT_QUOTES)));//Escanpando caracteres 
				$estado			 = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
				
			

				$cek = mysqli_query($con, "SELECT * FROM productos WHERE idproducto='$idproducto'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con, "INSERT INTO productos(idproducto, producto, idmarca, descripcion, precio_costo, precio_venta, existencia, estado)
															VALUES('$idproducto','$producto', '$idmarca', '$descripcion', '$precio_costo', '$precio_venta', '$existencia', '$estado')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Código</label>
					<div class="col-sm-2">
						<input type="text" name="idproducto" class="form-control" placeholder="Código" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Producto</label>
					<div class="col-sm-4">
						<input type="text" name="producto" class="form-control" placeholder="Producto" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Marca</label>
					<div class="col-sm-4">
						<input type="text" name="idmarca" class="form-control" placeholder="Marca" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripcion</label>
					<div class="col-sm-4">
						<input type="text" name="descripcion" class="form-control" placeholder="Descripcion" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Precio Costo</label>
					<div class="col-sm-4">
						<input type="text" name="precio_costo" class="form-control" placeholder="Precio Costo" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Precio Venta</label>
					<div class="col-sm-3">
						<input type="text" name="precio_venta" class="form-control" placeholder="Precio Venta" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Existencias</label>
					<div class="col-sm-3">
						<input type="text" name="existencia" class="form-control" placeholder="Existencias" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Estado</label>
					<div class="col-sm-3">
						<select name="estado" class="form-control">
							<option value=""> ----- </option>
                           <option value="1">Disponible</option>
							<option value="2">Reservado</option>
							
							 <option value="3">Vendido</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>
