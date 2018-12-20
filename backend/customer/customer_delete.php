<?php include '../template/header.php' ?>
<?php
if(isset($_POST['SubmitCustomerDelete'])) { //check if form was submitted
    $result = $mysqli->query("DELETE FROM Customer WHERE CustomerID=" . $_POST['CustomerID']);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<?php $result = $mysqli->query("SELECT * FROM Customer"); ?>

<form action="" method="post">
    <div class="col-md-11">
        <div class="row">
        
        <h1>Customer Delete</h1>
        </div>
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
        <br><br><br><br><br>
        <button type="submit" class="btn btn-default btn-lg" name="SubmitCustomerDelete">Delete</button>
    </div>
</form>

<?php $result->close(); ?>
<?php include '../template/footer.php' ?>