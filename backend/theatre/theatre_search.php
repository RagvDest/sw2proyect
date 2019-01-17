<?php include '../templatet/header.php' ?>
<h1>Lista de Salas</h1>

<?php
	if(isset($_POST['search'])){
		$valueToSearch=$_POST['myInput'];
		$qry="select * from Theatre where RoomNumber LIKE '%".$valueToSearch."%'";
		$search_result=filterTable($mysqli,$qry);
	}
	else{
		$qry="Select * from theatre";
		$search_result=filterTable($mysqli,$qry);
	}

	function filterTable($mysqli,$qry){
		$filter_result = $mysqli->query($qry);
		return $filter_result;
	}
	
?>


<?php  ?>

<form action="" method="post">
	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Sala..." title="Buscar Sala">
	<input type="submit" name="search" value="Filtrar">
	<br><br>
	<table class="table table-striped">
	    <tr>
	        <th>Numero de Sala</th>
	        <th>Capacidad</th>
	    </tr>
		<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
			<tr>
				<td><?php echo $row['RoomNumber']; ?></td>
				<td><?php echo $row['Capacity']; ?></td>
	        </tr>
		<?php } ?>
	</table>
</form>
<?php $search_result->close(); ?>

<?php include '../template/footer.php' ?>