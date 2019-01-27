<?php include '../templatesh/header.php' ?>
<?php
if(isset($_POST['SubmitShowingAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Showing(MovieID, Date, Time, RoomNumber) VALUES (" . $_POST['MovieID'] . ",\"" . $_POST['Date'] . "\",\"" . $_POST['Time'] . "\"," . $_POST['RoomNumber'] . ")");
	echo "<script>alert('Proyección Guardada')</script>";
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['search'])){
        $valueToSearch=$_POST['myInput'];
        $qry="select * from movie where MovieName LIKE '%".$valueToSearch."%'";
        $search_result=filterTable($mysqli,$qry);
    }
    else{
        $qry="Select * from Movie";
        $search_result=filterTable($mysqli,$qry);
    }

    function filterTable($mysqli,$qry){
        $filter_result = $mysqli->query($qry);
        return $filter_result;
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
				</tr>
				<tr>
					<th><input type="text" style="width: 70%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Peliculas..." title="Buscar Pelicula"></th>
					<th><input type="submit" name="search" value="Filtrar"></th>

				</tr>
				<tr>
					<th></th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="MovieID">
							<?php
							$result1 = $search_result;
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