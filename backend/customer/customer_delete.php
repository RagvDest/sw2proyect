<?php include '../template/header.php' ?>
<?php
if(isset($_POST['SubmitCustomerDelete'])) { //check if form was submitted
    $result = $mysqli->query("DELETE FROM Customer WHERE CustomerID=" . $_POST['CustomerID']);

    if(!$result){
        echo "<script>alert('No se pudo eliminar el Cliente, revise si existe en otro registro')</script>";
    }else{
        echo "<script>alert('Cliente eliminado')</script>";   
    }
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
    <div class="col-md-4" ></div>
    <div class="col-md-4">
        <div class="row">
        
        <h1>Customer Delete</h1>
        </div>
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
            <tr>
                <th>
                    <button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerDelete">Delete</button>
                </th>
            </tr>
        </table>
        </div>
    </div>
    <div class="col-md-1">
        <br><br><br><br><br>
    </div>
</form>

<?php $result->close(); ?>
<?php include '../template/footer.php' ?>