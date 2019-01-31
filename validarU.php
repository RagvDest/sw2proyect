<?php $con=new mysqli("localhost", "root", "", "smackie6db");

/* check connection */
if ($con->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$user=$_GET['user'];
$pass=$_GET['pass'];

$qry="SELECT * FROM users WHERE username=".$user." and password=".$pass
$stm=$con->prepare($qry);
$stm->execute();



?>
