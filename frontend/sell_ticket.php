<?php include 'template/header.php' ?>

<?php
if(isset($_POST['SubmitSellTicket'])) { //check if form was submitted
    $result = $mysqli->query("SELECT MAX( ViewingID ) AS max FROM Viewing");
    $max_query = max(mysqli_fetch_array($result, MYSQLI_ASSOC));
    $max_id = $max_query + 1;
    $result = $mysqli->query("INSERT INTO Viewing(ViewingID, ShowingID, Rating, TicketCost, CustomerID) VALUES (" . $max_id . "," . $_POST['ShowingID'] . ",0," . $_POST['TicketCost'] . "," . $_POST['CustomerID'] . ")");
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['filtrarCl'])){
    $valueToSearch=$_POST['myInput'];
        $qry="select * from customer where CONCAT(fname,lname) LIKE '%".$valueToSearch."%'";
        $result=filterS($qry,$mysqli);
}
else{
    $qry="select * from customer";
    $result=filterS($qry,$mysqli);
}
if(isset($_POST['filtrarSh'])){
    $valueToSearch=$_POST['myInput2'];
        $query="select movieId from movie where movieName LIKE '%".$valueToSearch."%'";
        $resul=$mysqli->query($query);
        while($ros = mysqli_fetch_array($resul,MYSQLI_ASSOC)){
            $rel=$ros['movieId'];
        }

        $qry="select * from showing where movieid=".$rel;
        $result2=filterS($qry,$mysqli);
}else{
    $qry="select * from showing";
    $result2=filterS($qry,$mysqli);
}

function filterS($qry,$mysqli){
    $filter_search=$mysqli->query($qry);    
    return $filter_search;
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="col-md-11">
        <br>
        <h1>Vender Ticket</h1>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <th>CustomerId</th>
                    <th>Showing</th>
                    <th>TicketCost</th>
                </tr>
                <tr>
                    <th><input type="text" style="width: 60%;border-radius: 5px;" name="myInput" name="buscarCliente" placeholder="Buscar Cliente..." title="Buscar Cliente"><input type="submit" name="filtrarCl" value="Buscar"></th>
                    <th><input type="text" style="width: 80%;border-radius: 5px;" name="myInput2" name="buscarPelicula" placeholder="Buscar Proyeccion..." title="Buscar Proyeccion"><input type="submit" name="filtrarSh" value="Buscar"></th>
                </tr>
                <tr>
                    <td>
                        <select class="btn btn-default dropdown-toggle" type="button"  name="CustomerID">
                            <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
                                <option value="<?php echo $row['CustomerID'] ?>"><?php echo $row['CustomerID'] . " - " . $row['FName'] . " " . $row['LName'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select class="btn btn-default dropdown-toggle" type="button"  name="ShowingID">
                            <?php while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){ ?>
                                <?php
                                $result3 = $mysqli->query("SELECT MovieName FROM Movie WHERE MovieID=" . $row['MovieID']);
                                $value2 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                                ?>
                                <option value="<?php echo $row['ShowingID'] ?>"><?php echo $row['ShowingID'] . " - " . $value2['MovieName'] . " - " . $row['RoomNumber'] . " - " . $row['Date'] . " - " . $row['Time']  ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><input type="text" name="TicketCost"/></td>
                </tr>
                <tr><td><td><td><button type="submit" class="btn btn-default btn-lg" name="SubmitSellTicket">Execute</button></td></td></tr>
            </table>
        </div>
    </div>
    
</form>

<?php include 'template/footer.php'; ?>
