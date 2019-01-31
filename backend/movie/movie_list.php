<?php include '../templatemovie/header.php' ?>
<h1>Lista de películas</h1>

<?php
    if(isset($_POST['search'])){
        $valueToSearch=$_POST['myInput'];
        $qry="select * from movie where MovieName LIKE '%".$valueToSearch."%'";
        $search_result=filterTable($mysqli,$qry);
    }
    else{
        $qry="Select * from Movie";
        $search_result=filterTable($mysqli,$qry);
    }

    function filterTable($mysqli,$qry){
        $filter_result = $mysqli->query($qry);
        return $filter_result;
    }


?>


<form action="" method="post">
<input type="text" style="width: 50%;border-radius: 5px;" name="myInput" name="valueToSearch" placeholder="Buscar Peliculas..." title="Buscar Pelicula">
    <input type="submit" name="search" value="Filtrar">

<table class="table table-striped">
    <tr>
        <th>Nombre de la película</th>
        <th>Año de lanzamiento</th>
        <th>Género</th>
    </tr>
    <?php while($row = mysqli_fetch_array($search_result, MYSQLI_ASSOC)){ ?>
        <?php
        $result2 = $mysqli->query("SELECT GenreID FROM GenreMap WHERE MovieID=" . $row['MovieID']);
        $value2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $result3 = $mysqli->query("SELECT Genre FROM Genre WHERE GenreID=" . $value2["GenreID"]);
        $value3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
        ?>
        <tr>
            <td><?php echo $row['MovieName']; ?></td>
            <td><?php echo $row['ReleaseYear']; ?></td>
            <td><?php echo $value3["Genre"]; ?></td>
        </tr>
    <?php } ?>
</table>
</form>

<?php $search_result->close(); ?>