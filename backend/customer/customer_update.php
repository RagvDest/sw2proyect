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
?>


<?php $result = $mysqli->query("SELECT * FROM Customer"); ?>
<form action="" method="post">
	<div class="col-md-11">
        <h1>Customer Update</h1>
        <div class="row">
			<table class="table table-striped">
				<tr>
					<th>Customer</th>
				</tr>
				<tr>
					<td>
						<select class="btn btn-default dropdown-toggle" type="button"  name="CustomerID">
							<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
								<option value="<?php echo $row['CustomerID'] ?>"><?php echo $row['CustomerID'] . " - " . $row['FName'] . " " . $row['LName'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		
	</div>

	<div class="col-md-11">
		<div class="row">
			<table class="table table-striped">
				<tr>
					<th>FName</th>
					<th>LName</th>
					<th>Gender</th>
					<th>Email</th>
				</tr>
				<tr>
					<td><input type="text" name="FName"/></td>
					<td><input type="text" name="LName"/></td>
                    <td>
                    <select class="btn btn-default dropdown-toggle" type="button"  name="Gender">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                    </td>
                    <td><input type="text" name="Email"/></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="col-md-1">
		<br>
		<button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerUpdate">Update</button>
	</div>
</form>

<?php $result->close(); ?>
<?php include '../template/footer.php' ?>