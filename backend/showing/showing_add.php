<?php include '../templatesh/header.php' ?>
<?php
if(isset($_POST['SubmitShowingAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Showing(MovieID, Date, Time, RoomNumber) VALUES (" . $_POST['MovieID'] . ",\"" . $_POST['Date'] . "\",\"" . $_POST['Time'] . "\"," . $_POST['RoomNumber'] . ")");
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h1>Showing Add</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Movie</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="MovieID">
							<?php
							$result1 = $mysqli->query("SELECT * FROM Movie");
							while($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
							?>
								<option value="<?php echo $row['MovieID'] ?>"><?php echo $row['MovieID'] . " - " . $row['MovieName'] ?></option>
							<?php } ?>
						</select></th>
				</tr>
				<tr>
					<th>RoomNumber</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="RoomNumber">
							<?php
							$result2 = $mysqli->query("SELECT * FROM Theatre");
							while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
								?>
								<option value="<?php echo $row['RoomNumber'] ?>"><?php echo $row['RoomNumber'] ?></option>
							<?php } ?>
						</select></th>
				</tr>
				<tr>
					<th>Date</th>
					<th>
						<input id="datetimepicker" type="text" class="form-control" name="Date">
					</th>
				</tr>
				<tr>
					<th>Time</th>
					<th>
						<input id="timepicker" type="text" name="Time"/>
					</th>
				</tr>
				<tr>
					<th></th>
					<th><button type="submit" class="btn btn-default btn-lg" name="SubmitShowingAdd">Add</button></th>
				</tr>
					
					
				
			</table>
		</div>
	</div>
	
</form>

<script type="text/javascript">
    $('#timepicker').timepicker({
        'timeFormat': 'H:i'
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>