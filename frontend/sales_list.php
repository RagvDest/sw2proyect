<?php include 'template/header.php' ?>
<h1>Ventas</h1>

<?php
	if(isset($_POST['search'])){
		if(isset($_POST['myInput'])){
		$valueToSearch=$_POST['myInput'];
		$query="select movieId from movie where movieName LIKE '%".$valueToSearch."%'";
		$resul=$mysqli->query($query);
		while($ros = mysqli_fetch_array($resul,MYSQLI_ASSOC)){
			$rel=$ros['movieId'];
		}

		$qry="select * from showing where movieid=".$rel;
		$search_result=filterTable($mysqli,$qry);
	}else{
		$qry="Select * from viewing";
		$search_result=filterTable($mysqli,$qry);
	}
	}else{
		$qry="Select * from viewing";
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
	        <th>VentaId</th>
	        <th>Cliente</th>
	        <th>Proyección</th>
	        <th>Fecha</th>
	        <th>Hora</th>
	    </tr>
		<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
			<tr>
				<?php $res=$mysqli->query("select * from customer  where customerId='".$row['CustomerID']."'"); 
					$nombre=mysqli_fetch_array($res,MYSQLI_ASSOC);
					$pro=$mysqli->query("select * from showing where showingId='".$row['ShowingID']."'");
					$proyeccion=mysqli_fetch_array($pro,MYSQLI_ASSOC);
					$movname=$mysqli->query("select * from movie  where movieId='".$proyeccion['MovieID']."'");
					$mov=mysqli_fetch_array($movname,MYSQLI_ASSOC);

				?>
				<td><?php echo $row['ViewingID']; ?></td>
				<td><?php echo $nombre['FName']." ".$nombre['LName']; ?></td>
	            <td><?php echo $proyeccion['ShowingID']."-".$mov['MovieName']." ".$proyeccion['Date']." ".$proyeccion['Time']; ?></td>
	            <td><?php echo $row['Date']; ?></td>
	            <td><?php echo $row['Time']; ?></td>
	        </tr>
		<?php } ?>
	</table>
</form>
<?php $search_result->close(); ?>

<?php include 'template/footer.php' ?>