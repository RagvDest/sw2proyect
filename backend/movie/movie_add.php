<?php include '../templatemovie/header.php'; ?>
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
		<h1>Añadir película</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Nombre de la película:</th>
					<th><input type="text" name="MovieName"></th>
				</tr>
				<tr>
					<th>Año de lanzamiento:</th>
					<th><input type="text" name="MovieName"></th>
				</tr>	
					<th>Genre</th>
				</tr>
				<tr>
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
	<div class="col-md-2">
		<td><button type="submit" class="btn btn-default btn-lg" name="SubmitMovieAdd">Añadir</button>
	</div>
</form>

<?php include '../templatemovie/footer.php'; ?>