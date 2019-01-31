<?php include '../templatemovie/header.php'; ?>

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


<?php $result = $mysqli->query("SELECT * FROM Movie"); ?>
<form action="" method="post">
	<div class="col-md-11">

		<h1>Actualizar película</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Película:</th>
				</tr>
				<tr>
					<th><input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Peliculas..." title="Buscar Pelicula"></th>
					<th><input type="submit" name="search" value="Filtrar"></th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="MovieID">
							<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['MovieID'] ?>"><?php echo $row['MovieID'] . " - " . $row['MovieName'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
	</div>

	<?php $result = $mysqli->query("SELECT * FROM Genre"); ?>


	<div class="col-md-11">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Nombre de la película:</th>
					<th><input type="text" name="MovieName"></th>
				</tr>
				<tr>
					<th>Año de lanzamiento:</th>
					<th><input type="text" name="ReleaseYear"></th>
				</tr>
					<th>Género:</th>
				</tr>
				<tr>
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
	<div class="col-md-2">
		<button type="submit" class="btn btn-default btn-lg" name="SubmitMovieUpdate">Actualizar</button>
	</div>
</form>

<?php $search_result->close(); ?>

<?php include '../templatemovie/footer.php'; ?>