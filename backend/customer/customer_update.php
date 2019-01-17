<?php include '../template/header.php' ?>


<?php

if(isset($_POST['SubmitCustomerUpdate'])){ //check if form was submitted
    if($_POST['FName']){
        $result = $mysqli->query(" UPDATE Customer SET FName=\"" . $_POST['FName'] . "\" WHERE CustomerID=" . $_POST['CustomerID']);
    };
    if($_POST['LName']){
        $result = $mysqli->query(" UPDATE Customer SET LName=\"" . $_POST['LName'] . "\" WHERE CustomerID=" . $_POST['CustomerID']);
    };
    if($_POST['Gender']){
        $result = $mysqli->query(" UPDATE Customer SET Gender=\"" . $_POST['Gender'] . "\" WHERE CustomerID=" . $_POST['CustomerID']);
    };
    if($_POST['Email']){
        $result = $mysqli->query(" UPDATE Customer SET Email=\"" . $_POST['Email'] . "\" WHERE CustomerID=" . $_POST['CustomerID']);
    };
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['filter'])){
    $valueToSearch=$_POST['myInput'];
        $qry="select * from customer where CONCAT(fname,lname) LIKE '%".$valueToSearch."%'";
        $result=filterS($qry,$mysqli);
}
else{
    $qry="select * from customer";
    $result=filterS($qry,$mysqli);
}


function filterS($qry,$mysqli){
    $filter_search=$mysqli->query($qry);    
    return $filter_search;
}

?>


<form action="" method="post">
	<div class="col-md-4"></div>
	<div class="col-md-4">
        <h1>Customer Update</h1>
        <div class="row">
			<table class="table table-striped">
				<tr>
					<th>Customer</th>
				</tr>
				<tr>
					<th>
                    	<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Cliente..." title="Buscar Cliente">
                	</th>
                	<th>
                    	<input type="submit" name="filter" value="Buscar">
                	</th>
				</tr>
				<tr>
					<th>
						<select class="btn btn-default dropdown-toggle" type="button"  name="CustomerID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['CustomerID'] ?>"><?php echo $row['CustomerID'] . " - " . $row['FName'] . " " . $row['LName'] ?></option>
							<?php } ?>
						</select>
					</th>
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
					<th>FName</th>
					<th><input type="text" name="FName"/></th>
					
				</tr>
				<tr>
					<th>LName</th>
					<th><input type="text" name="LName"/></th>
				</tr>
				<tr>
					<th>Gender</th>
					<th><select class="btn btn-default dropdown-toggle" type="button"  name="Gender">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select></th>
                <tr>
                	<th>Email</th>
                
					<th>
						<input type="text" name="Email"/>
					</th>
				</tr>

				
				<tr>
					<th><div class="col-md-1">
		<br>
		<button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerUpdate">Update</button>
	</div></th>
				</tr>
			</table>
		</div>
	</div>
	
</form>

<?php $result->close(); ?>
<?php include '../template/footer.php' ?>