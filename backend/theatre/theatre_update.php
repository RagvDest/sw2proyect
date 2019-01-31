<?php include '../templatet/header.php' ?>

<?php

if(isset($_POST['SubmitTheatreUpdate'])){ //check if form was submitted
	if($_POST['Capacity']){
		$result = $mysqli->query(" UPDATE Theatre SET Capacity=" . $_POST['Capacity'] . " WHERE RoomNumber=" . $_POST['RoomNumber']);
	};
	echo "<meta http-equiv='refresh' content='0'>";
}
?>


<?php $result = $mysqli->query("SELECT * FROM Theatre"); ?>
<form action="" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">

		<h1>Actualizar Sala</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Sala:</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="RoomNumber">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['RoomNumber'] ?>"><?php echo $row['RoomNumber'] ?></option>
							<?php } ?>
						</select></th>
				</tr>
				
			</table>
		</div>
	</div>
	<div class="col-md-4" style="height: 160px;">
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Capacidad</th>
				</tr>
				<tr>
					<td><input type="text" name="Capacity"/></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-default btn-lg" name="SubmitTheatreUpdate">Actualizar</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
</form>

<?php $result->close(); ?>