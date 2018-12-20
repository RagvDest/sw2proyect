
<?php
include '../templategenre/header.php'; 

if(isset($_POST['SubmitGenreAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Genre(GenreID, Genre) VALUES (" . $_POST['GenreID'] . ",\"" . $_POST['Genre'] . "\")");
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-11">
		
		<h1>Añadir Género</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>GéneroID</th>
					<th>Género</th>
				</tr>
				<tr>
					<td><input type="text" name="GenreID"/></td>
					<td><input type="text" name="Genre"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br><br><br><br><br>
		<td><button type="submit" class="btn btn-default btn-lg" name="SubmitGenreAdd">Add</button>
	</div>
</form>
