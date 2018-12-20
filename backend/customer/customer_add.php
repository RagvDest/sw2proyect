<?php include '../template/header.php' ?>
<?php
if(isset($_POST['SubmitCustomerAdd'])) { //check if form was submitted
    $result = $mysqli->query("INSERT INTO Customer(CustomerID, FName, LName, Gender, Email) VALUES (" . $_POST['CustomerID'] . ",\"" . $_POST['FName'] . "\",\"" . $_POST['LName'] . "\",\"" . $_POST['Gender'] . "\",\"" . $_POST['Email'] . "\")");
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="col-md-11">
        
        <h1>Añadir Cliente</h1>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>CustomerId</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Género</th>
                    <th>Correo</th>
                </tr>
                <tr>
                    <td><input type="text" name="CustomerID"/></td>
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
        <br><br><br><br><br>
        <td><button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerAdd">Add</button>
    </div>
</form>


<?php include '../template/footer.php' ?>