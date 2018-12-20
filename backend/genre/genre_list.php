<h1>Lista de Géneros</h1>

<?php $result = $mysqli->query("SELECT * FROM Genre"); ?>

<table class="table table-striped">
	<tr>
		<th>GéneroID</th>
		<th>Género</th>
	</tr>
	<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
		<tr>
			<td><?php echo $row['GenreID']; ?></td>
			<td><?php echo $row['Genre']; ?></td>
		</tr>
	<?php } ?>
</table>

<?php $result->close(); ?>
