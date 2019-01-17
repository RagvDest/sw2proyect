<?php include '../templatet/header.php' ?>
<?php
if(isset($_POST['SubmitTheatreDelete'])) { //check if form was submitted
	$result = $mysqli->query("DELETE FROM Theatre WHERE RoomNumber=" . $_POST['RoomNumber']);
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Theatre"); ?>

<form action="" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="row">
			<br>
			<h1>Eliminar Sala</h1>
		</div>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>RoomNumber</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="RoomNumber">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['RoomNumber'] ?>"><?php echo $row['RoomNumber'] ?></option>
							<?php } ?>
						</select></th>
				</tr>
				<tr>
					<td>
						<button type="submit" class="btn btn-default btn-lg" name="SubmitTheatreDelete">Delete</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
</form>

<?php $result->close(); ?>
