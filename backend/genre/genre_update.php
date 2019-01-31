<?php include "../templategenre/header.php" ?>

<?php

if(isset($_POST['SubmitGenreUpdate'])){ //check if form was submitted
	if($_POST['Genre']){
		$result = $mysqli->query(" UPDATE Genre SET Genre=\"" . $_POST['Genre'] . "\" WHERE GenreID=" . $_POST['GenreID']);
	};
	echo "<script>alert('Género Actualizado')</script>";
	echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['filter'])){
    $valueToSearch=$_POST['myInput'];
        $qry="select * from genre where genre LIKE '%".$valueToSearch."%'";
        $result=filterS($qry,$mysqli);
}
else{
    $qry="select * from genre";
    $result=filterS($qry,$mysqli);
}


function filterS($qry,$mysqli){
    $filter_search=$mysqli->query($qry);    
    return $filter_search;
}

?>


<form action="" method="post">
	<div class=col-md-4></div>
	<div class="col-md-4">

		<h1>Actualizar Género</h1>
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Género</th>
				</tr>
				<tr>
					<th>
                    	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Género..." title="Buscar Género">
                	</th>
                	<th>
                    	<input type="submit" name="filter" value="Buscar">
                	</th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="GenreID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['GenreID'] ?>"><?php echo $row['GenreID'] . " - " . $row['Genre'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-4" style="height: 240px;">
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>Género</th>
				</tr>
				<tr>
					<td><input type="text" name="Genre"/></td>
				</tr>
				<tr>
					<th></th>
					<th><button type="submit" class="btn btn-default btn-lg" name="SubmitGenreUpdate">Actualizar</button></th>
				</tr>
			</table>
		</div>
	</div>
	
</form>

<?php $result->close(); ?>