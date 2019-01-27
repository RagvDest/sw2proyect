<?php include '../templatesh/header.php' ?>
<?php
if(isset($_POST['SubmitShowingDelete'])) { //check if form was submitted
	$result = $mysqli->query("DELETE FROM Showing WHERE ShowingID=" . $_POST['ShowingID']);
	if(!$result){
		echo "<script>alert('No es posible eliminar proyección. Verifique si existen otros registros')</script>";
	}else{
		echo "<script>alert('Proyección eliminada')</script>";
	}
	echo "<meta http-equiv='refresh' content='1'>";
}

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
		$qry="Select * from showing";
		$search_result=filterTable($mysqli,$qry);
	}
	}else{
		$qry="Select * from showing";
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
			<h1>Eliminar Proyección</h1>
		</div>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Proyección</th>
				</tr>
				<tr>
					<th><input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Proyeccion..." title="Buscar Proyeccion"><input type="submit" name="search" value="Filtrar"></th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="ShowingID">
							<?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
								<?php
								$result2 = $mysqli->query("SELECT MovieName FROM Movie WHERE MovieID=" . $row['MovieID']);
								$value2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
								?>
                                <option value="<?php echo $row['ShowingID'] ?>"><?php echo $row['ShowingID'] . " - " . $value2['MovieName'] . " - " . $row['RoomNumber'] . " - " . $row['Date'] . " - " . $row['Time']  ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>

					<th><button style="margin-left: 65%;" type="submit" class="btn btn-default btn-lg" name="SubmitShowingDelete">Delete</button></th>
				</tr>
			</table>
		</div>
	</div>
	
</form>

<?php $search_result->close(); ?>
