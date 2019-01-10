<?php
if(isset($_POST['SubmitMovieUpdate'])){ //check if form was submitted
	if($_POST['MovieName']){
		$result = $mysqli->query(" UPDATE Movie SET MovieName=\"" . $_POST['MovieName'] . "\" WHERE MovieID=" . $_POST['MovieID']);
	};
	if($_POST['ReleaseYear']){
		$result = $mysqli->query(" UPDATE Movie SET ReleaseYear=\"" . $_POST['ReleaseYear'] . "\" WHERE MovieID=" . $_POST['MovieID']);
	};
	if($_POST['GenreID']){
		$result = $mysqli->query(" UPDATE GenreMap SET GenreID=\"" . $_POST['GenreID'] . "\" WHERE MovieID=" . $_POST['MovieID']);
	};
	echo "<meta http-equiv='refresh' content='0'>";
}
?>


<?php $result = $mysqli->query("SELECT * FROM Movie"); ?>
<form action="" method="post">
	<div class="col-md-11">
		<br><br>

		<h1>Movie Update</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Movie</th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="MovieID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['MovieID'] ?>"><?php echo $row['MovieID'] . " - " . $row['MovieName'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br>
	</div>

	<?php $result = $mysqli->query("SELECT * FROM Genre"); ?>


	<div class="col-md-11">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>MovieName</th>
					<th>ReleaseYear</th>
					<th>Genre</th>
				</tr>
				<tr>
					<td><input type="text" name="MovieName"/></td>
					<td><input type="text" name="ReleaseYear"/></td>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="GenreID">
							<option value="">-</option>
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
		<button type="submit" class="btn btn-default btn-lg" name="SubmitMovieUpdate">Update</button>
	</div>
</form>

<?php $result->close(); ?>