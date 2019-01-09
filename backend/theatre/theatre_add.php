
<?php
if(isset($_POST['SubmitTheatreAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Theatre(RoomNumber, Capacity) VALUES (" . $_POST['RoomNumber'] . "," . $_POST['Capacity'] . ")");
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-11">
		<br><br>
		<h1>Theatre Add</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>RoomNumber</th>
					<th>Capacity</th>
				</tr>
				<tr>
					<td><input type="text" name="RoomNumber"/></td>
					<td><input type="text" name="Capacity"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br><br>
		<td><button type="submit" class="btn btn-default btn-lg" name="SubmitTheatreAdd">Add</button>
	</div>
</form>
