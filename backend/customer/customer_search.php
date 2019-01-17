<?php include '../template/header.php' ?>
<h1>Lista de Clientes</h1>

<?php
	if(isset($_POST['search'])){
		$valueToSearch=$_POST['myInput'];
		$qry="select * from customer where CONCAT(fname,lname) LIKE '%".$valueToSearch."%'";
		$search_result=filterTable($mysqli,$qry);
	}
	else{
		$qry="Select * from customer";
		$search_result=filterTable($mysqli,$qry);
	}

	function filterTable($mysqli,$qry){
		$filter_result = $mysqli->query($qry);
		return $filter_result;
	}
	
?>


<?php  ?>

<form action="" method="post">
	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Cliente..." title="Buscar Cliente">
	<input type="submit" name="search" value="Filtrar">
	<br><br>
	<table class="table table-striped">
	    <tr>
	        <th>CustomerId</th>
	        <th>Nombre</th>
	        <th>Apellido</th>
	        <th>Género</th>
	        <th>Correo</th>
	    </tr>
		<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
			<tr>
				<td><?php echo $row['CustomerID']; ?></td>
				<td><?php echo $row['FName']; ?></td>
	            <td><?php echo $row['LName']; ?></td>
	            <td><?php echo $row['Gender']; ?></td>
	            <td><?php echo $row['Email']; ?></td>
	        </tr>
		<?php } ?>
	</table>
</form>
<?php $search_result->close(); ?>

<?php include '../template/footer.php' ?>