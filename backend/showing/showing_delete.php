<?php
if(isset($_POST['SubmitShowingDelete'])) { //check if form was submitted
	$result = $mysqli->query("DELETE FROM Showing WHERE ShowingID=" . $_POST['ShowingID']);
	echo "<meta http-equiv='refresh' content='1'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Showing"); ?>

<form action="" method="post">
	<div class="col-md-11">
		<div class="row">
			<br>
			<h1>Showing Delete</h1>
		</div>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Showing</th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="ShowingID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<?php
								$result2 = $mysqli->query("SELECT MovieName FROM Movie WHERE MovieID=" . $row['MovieID']);
								$value2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
								?>
                                <option value="<?php echo $row['ShowingID'] ?>"><?php echo $row['ShowingID'] . " - " . $value2['MovieName'] . " - " . $row['RoomNumber'] . " - " . $row['Date'] . " - " . $row['Time']  ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br>
		<button type="submit" class="btn btn-default btn-lg" name="SubmitShowingDelete">Delete</button>
	</div>
</form>

<?php $result->close(); ?>
