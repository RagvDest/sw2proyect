
<?php
include '../templategenre/header.php'; 

if(isset($_POST['SubmitGenreAdd'])) { //check if form was submitted
	$result = $mysqli->query("INSERT INTO Genre(Genre) VALUES (\"" . $_POST['Genre'] . "\")");
	echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="col-md-4"></div>
    <div class="col-md-4">
		
		<h1>Añadir Género</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Género</th>
					<th><input type="text" name="Genre"/></th>
				</tr>
				<tr>
					<th><button type="submit" class="btn btn-default btn-lg" name="SubmitGenreAdd">Add</button></th>
				</tr>
			</table>
		</div>
	</div>
	
</form>
