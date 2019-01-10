<?php
if(isset($_POST['SubmitMovieAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Movie(MovieID, MovieName, ReleaseYear) VALUES (" . $_POST['MovieID'] . ",\"" . $_POST['MovieName'] . "\",\"" . $_POST['ReleaseYear'] . "\")");
    $result = $mysqli->query("SELECT MAX( MapID ) AS max FROM GenreMap");
	$max_query = max(mysqli_fetch_array($result, MYSQLI_ASSOC));
	$max_id = $max_query + 1;
	$result = $mysqli->query("INSERT INTO GenreMap(MapID, MovieID, GenreID) VALUES (" . $max_id . "," . $_POST['MovieID'] . "," . $_POST['GenreID'] .")");
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Genre"); ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-11">
		<br><br>
		<h1>Movie Add</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>MovieID</th>
					<th>MovieName</th>
					<th>ReleaseYear</th>
					<th>Genre</th>
				</tr>
				<tr>
					<td><input type="text" name="MovieID"/></td>
					<td><input type="text" name="MovieName"/></td>
					<td><input type="text" name="ReleaseYear"/></td>
					<td>
					<select class="btn btn-default dropdown-toggle" type="button"  name="GenreID">
						<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
							<option value="<?php echo $row['GenreID'] ?>"><?php echo $row['GenreID'] . " - " . $row['Genre'] ?></option>
						<?php } ?>
					</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br><br>
		<td><button type="submit" class="btn btn-default btn-lg" name="SubmitMovieAdd">Add</button>
	</div>
</form>