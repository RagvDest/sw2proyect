<?php include "../templategenre/header.php" ?>

<?php

if(isset($_POST['SubmitGenreUpdate'])){ //check if form was submitted
	if($_POST['Genre']){
		$result = $mysqli->query(" UPDATE Genre SET Genre=\"" . $_POST['Genre'] . "\" WHERE GenreID=" . $_POST['GenreID']);
	};
	echo "<meta http-equiv='refresh' content='0'>";
}
?>


<?php $result = $mysqli->query("SELECT * FROM Genre"); ?>
<form action="" method="post">
	<div class="col-md-11">

		<h1>Actualizar Género</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Género</th>
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
	<div class="col-md-1">
		<br><br><br><br>
	</div>

	<div class="col-md-11">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Género</th>
				</tr>
				<tr>
					<td><input type="text" name="Genre"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br>
		<button type="submit" class="btn btn-default btn-lg" name="SubmitGenreUpdate">Update</button>
	</div>
</form>

<?php $result->close(); ?>