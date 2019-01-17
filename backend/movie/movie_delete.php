<?php include '../templatemovie/header.php'; ?>

<?php
if(isset($_POST['SubmitMovieDelete'])) { //check if form was submitted
	$result = $mysqli->query("DELETE FROM GenreMap WHERE MovieID=" . $_POST['MovieID']);
	$result = $mysqli->query("DELETE FROM Movie WHERE MovieID=" . $_POST['MovieID']);
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Movie"); ?>

<form action="" method="post">
	<div class="col-md-11">
		<div class="row">
			<br>
			<h1>Eliminar película</h1>
		</div>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Película</th>
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
	<div class="col-md-2">
		<button type="submit" class="btn btn-default btn-lg" name="SubmitMovieDelete">Borrar</button>
	</div>
</form>

<?php $result->close(); ?>

<?php include '../templatemovie/footer.php'; ?>