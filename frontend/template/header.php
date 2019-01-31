<head>
	<title>FrontEnd</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="../../js/jquery-2.1.4.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-datepicker.min.js"></script>
	<script src="../../js/jquery.timepicker.min.js"></script>
</head>

<?php
$mysqli = new mysqli("localhost", "root", "", "smackie6db");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
?>

<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Avance Software</a>
				<a class="navbar-brand" href="sell_ticket.php">Vender Ticket</a>
				<a class="navbar-brand" href="sales_list.php">Mostrar Ventas</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="landing.php">Go Back</a></li>

				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</div>
</nav>
<div class="container">