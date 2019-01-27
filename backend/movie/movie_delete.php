<?php include '../templatemovie/header.php'; ?>

<?php
if(isset($_POST['SubmitMovieDelete'])) { //check if form was submitted
	try{
	$result = $mysqli->query("DELETE FROM GenreMap WHERE MovieID=" . $_POST['MovieID']);
	$result1 = $mysqli->query("DELETE FROM Movie WHERE MovieID=" . $_POST['MovieID']);
	}catch(Exeption $e){
		echo $e->getMessage();
	}
	
		if(!$result1){
			echo "<script>alert('No se pudo eliminar la Pelicula, revise si existe en otro registro')</script>";
		}else if(!$result){
			echo "<script>alert('No se pudo eliminar la Pelicula, revise si existe en otro registro')</script>";
		}
		else{
			echo "<script>alert('Pelicula Eliminada')</script>";
			
		}
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


<form action="" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">
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
					<th><input type="text" style="width: 70%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Peliculas..." title="Buscar Pelicula"></th>
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
				<tr><td></td><td><button type="submit" class="btn btn-default btn-lg" name="SubmitMovieDelete">Borrar</button></td></tr>
			</table>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</form>

<?php $search_result->close(); ?>

<?php include '../templatemovie/footer.php'; ?>