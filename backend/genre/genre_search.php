<?php include '../templategenre/header.php' ?>
<h1>Lista de Géneros</h1>

<?php
	if(isset($_POST['search'])){
		$valueToSearch=$_POST['myInput'];
		$qry="select * from genre where genre LIKE '%".$valueToSearch."%'";
		$search_result=filterTable($mysqli,$qry);
	}
	else{
		$qry="Select * from genre";
		$search_result=filterTable($mysqli,$qry);
	}

	function filterTable($mysqli,$qry){
		$filter_result = $mysqli->query($qry);
		return $filter_result;
	}
	
?>


<?php  ?>

<form action="" method="post">
	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Género..." title="Buscar Género">
	<input type="submit" name="search" value="Filtrar">
	<br><br>
	<table class="table table-striped">
	    <tr>
	        <th>GeneroId</th>
	        <th>Nombre del Genero</th>
	    </tr>
		<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
			<tr>
				<td><?php echo $row['GenreID']; ?></td>
				<td><?php echo $row['Genre']; ?></td>
	        </tr>
		<?php } ?>
	</table>
</form>
<?php $search_result->close(); ?>

<?php include '../template/footer.php' ?>