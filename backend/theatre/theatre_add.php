<?php include '../templatet/header.php' ?>
<?php
if(isset($_POST['SubmitTheatreAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Theatre(RoomNumber, Capacity) VALUES (" . $_POST['RoomNumber'] . "," . $_POST['Capacity'] . ")");
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h1>Añadir Sala</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Número de Sala:</th>
					<th><input type="text" name="RoomNumber"/></th>
				</tr>
					<tr>
						<th>Capacity:</th>
						<th><input type="text" name="Capacity"/></th>
					</tr>
				<tr>
					<th></th>
					<th>
						<button type="submit" class="btn btn-default btn-lg" name="SubmitTheatreAdd">Add</button>
					</th>
				</tr>
					
				
			</table>
		</div>
	</div>
	
</form>
