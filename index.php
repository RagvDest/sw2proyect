<!DOCTYPE html>
<html>
	<head>
		<title>Proyecto Software</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
				<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<style>
		body{
			background-image: url("img/bginicio.jpg");
			background-size: cover;
			background-repeat: no-repeat;
		}
		#titulo{
			color: white;
			font-weight: 400;
		}
		#opciones{
			color: white;
			font-weight: 400;
		}




	</style>

	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <a class="navbar-brand" href="index.php">Avance Software</a>
		    </div>
		  </div><!-- /.container-fluid -->
		  </div>
		</nav>
		<div class="container" id="fondo">

			<h1 id="titulo">MovStar</h1>
			<p id="opciones">Seleccione una opción:</p>
			<a class="btn btn-default btn-lg" href="backend/landing.php" role="button">Backend</a>
			<a class="btn btn-default btn-lg" href="#" role="button">Frontend</a>

		</div>
	</body>
</html>
