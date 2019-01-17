<?php include '../templatesh/header.php' ?>

<?php

if(isset($_POST['SubmitShowingUpdate'])){ //check if form was submitted
	if($_POST['MovieID']){
		$result = $mysqli->query(" UPDATE Showing SET MovieID=\"" . $_POST['MovieID'] . "\" WHERE ShowingID=" . $_POST['ShowingID']);
	};
    if($_POST['RoomNumber']){
        $result = $mysqli->query(" UPDATE Showing SET RoomNumber=\"" . $_POST['RoomNumber'] . "\" WHERE ShowingID=" . $_POST['ShowingID']);
    };
    if($_POST['Date']){
        $result = $mysqli->query(" UPDATE Showing SET Date=\"" . $_POST['Date'] . "\" WHERE ShowingID=" . $_POST['ShowingID']);
    };
    if($_POST['Time']){
        $result = $mysqli->query(" UPDATE Showing SET Time=\"" . $_POST['Time'] . "\" WHERE ShowingID=" . $_POST['ShowingID']);
    };
	echo "<meta http-equiv='refresh' content='0'>";
}
?>


<?php $result = $mysqli->query("SELECT * FROM Showing"); ?>
<form action="" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">

		<h1>Actualizar Proyecciones</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Proyecciones</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="ShowingID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<?php
								$result2 = $mysqli->query("SELECT MovieName FROM Movie WHERE MovieID=" . $row['MovieID']);
								$value2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
								?>
								<option value="<?php echo $row['ShowingID'] ?>"><?php echo $row['ShowingID'] . " - " . $value2['MovieName'] . " - " . $row['RoomNumber'] . " - " . $row['Date'] . " - " . $row['Time']  ?></option>
							<?php } ?>
						</select></th>
				</tr>
				<tr>
					
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-4" style="height: 200px;">
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
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
					<th><input id="datetimepicker2" type="text" class="form-control" name="Date"></th>
				</tr>
				<tr>
					<th>Time</th>
					<th><input id="timepicker2" type="text" name="Time"/></th>
				</tr>
					
					
					
				</tr>
				<tr>
					<td>
						<button type="submit" class="btn btn-default btn-lg" name="SubmitShowingUpdate">Update</button>
					</td>
					
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		
	</div>
</form>

<?php $result->close(); ?>

<script type="text/javascript">
	$('#timepicker2').timepicker({
		'timeFormat': 'H:i'
	});
</script>
<script type="text/javascript">
	$(function () {
		$('#datetimepicker2').datepicker({
			format: 'yyyy-mm-dd'
		});
	});
</script>
