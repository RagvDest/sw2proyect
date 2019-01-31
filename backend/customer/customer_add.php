<?php include '../template/header.php' ?>
<?php
if(isset($_POST['SubmitCustomerAdd'])) { //check if form was submitted
    $result = $mysqli->query("INSERT INTO Customer( FName, LName, Gender, Email) VALUES (\"" . $_POST['FName'] . "\",\"" . $_POST['LName'] . "\",\"" . $_POST['Gender'] . "\",\"" . $_POST['Email'] . "\")");

    echo "<script>alert('Cliente creado')</script>";
    

    echo "<meta http-equiv='refresh' content='0'>";
}
?>




<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        
        <h1>Añadir Cliente</h1>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>Nombre:</th>
                    <th><input type="text" name="FName"/></th>
                </tr>
                <tr>
                    <th>Apellido:</th>
                    <th><input type="text" name="LName"/></th>
                </tr>
                <tr>
                    <th>Género:</th>
                    <th><select class="btn btn-default dropdown-toggle" type="button"  name="Gender">
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select></th>
                </tr>
                <tr>
                    <th>Correo:</th>
                    <th><input type="text" name="Email"/></th>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerAdd">Añadir</button>
                </tr>
                    
            </table>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</form>


<?php include '../template/footer.php' ?>