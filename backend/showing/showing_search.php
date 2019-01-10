<?php include '../templatesh/header.php' ?>
<h1>Lista de Proyecciones</h1>

<?php
	if(isset($_POST['search'])){
		$valueToSearch=$_POST['myInput'];
		$query="select movieId from movie where movieName LIKE '%".$valueToSearch."%'";
		$resul=$mysqli->query($query);

		

		$qry="select * from showing where movieName LIKE '%".$valueToSearch."%'";
		$search_result=filterTable($mysqli,$qry);
	}
	else{
		$qry="Select * from showing";
		$search_result=filterTable($mysqli,$qry);
	}

	function filterTable($mysqli,$qry){
		$filter_result = $mysqli->query($qry);
		return $filter_result;
	}
	
?>


<?php  ?>

<form action="" method="post">
	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Proyeccion..." title="Buscar Proyeccion">
	<input type="submit" name="search" value="Filtrar">
	<br><br>
	<table class="table table-striped">
	    <tr>
	        <th>ProyeccionId</th>
	        <th>Nombre de la Pelicula</th>
	        <th>Numero de Sala</th>
	        <th>Fecha</th>
	        <th>Hora</th>
	    </tr>
		<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
			<tr>
				<?php $res=$mysqli->query("select MovieName from Movie where movieId='".$row['MovieID']."'"); 
					$nombre=mysqli_fetch_array($res,MYSQLI_ASSOC);
				?>
				<td><?php echo $row['ShowingID']; ?></td>
				<td><?php echo $nombre['MovieName']; ?></td>
	            <td><?php echo $row['MovieID']; ?></td>
	            <td><?php echo $row['Date']; ?></td>
	            <td><?php echo $row['Time']; ?></td>
	        </tr>
		<?php } ?>
	</table>
</form>
<?php $search_result->close(); ?>

<?php include '../template/footer.php' ?>