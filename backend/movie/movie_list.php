<h1>Lista de películas</h1>

<?php $result = $mysqli->query("SELECT * FROM Movie"); ?>

<table class="table table-striped">
    <tr>
        <th>MovieName</th>
        <th>ReleaseYear</th>
        <th>Genre</th>
    </tr>
    <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
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

<?php $result->close(); ?>