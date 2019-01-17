<?php
if(isset($_POST['SubmitTheatreDelete'])) { //check if form was submitted
	$result = $mysqli->query("DELETE FROM Theatre WHERE RoomNumber=" . $_POST['RoomNumber']);
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Theatre"); ?>

<form action="" method="post">
	<div class="col-md-11">
		<div class="row">
			<br>
			<h1>Theatre Delete</h1>
		</div>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>RoomNumber</th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="RoomNumber">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['RoomNumber'] ?>"><?php echo $row['RoomNumber'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br>
		<button type="submit" class="btn btn-default btn-lg" name="SubmitTheatreDelete">Delete</button>
	</div>
</form>

<?php $result->close(); ?>
