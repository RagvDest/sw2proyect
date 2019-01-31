<!DOCTYPE html>
<?php 
$con=new mysqli("localhost", "root", "", "smackie6db");

/* check connection */
if ($con->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title>LogIn</title>

</head>
<style type="text/css">
	body{
			background-image: url("logt.jpg");
			background-repeat: no-repeat;
			position: relative;
    		background-size:100% 100vh;
    		font-family: Arial, Helvetica, sans-serif;
		}

	

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  align-self: center;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  height: 20%;
}

#nombre{
	margin-left: 25%;
	background-color: white;
	width: 50%
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

<body>
	<nav class="navbar navbar-default">
		  <div class="container-fluid" style="background-color: #f2f2f2;">
		    <!-- Brand and toggle get grouped for better mobile display -->
		      <h2 style="color: black;margin-left: 10%;font-family: Arial,Helvetica, sans-serif;"><strong>Ingresar</strong></h2>
    		
		  </div>
		</nav>
<div id="nombre">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
  <div class="imgcontainer">
    <img src="user.png" alt="Avatar" style="height: 120px; width: 120px;" class="avatar">
  </div>

  <div class="container" style="width: 100%;">
    <label for="uname"><b>Usuario</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<br>
    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="enviar">Login</button>
    <br>
    
  </div>
<?php
	if(isset($_POST['crear'])){
		header('Location:crearUser.php');
	}
	if(isset($_POST['enviar'])){
		
		$user=$_POST['uname'];
		$pass=$_POST['psw'];
		$qry="SELECT * FROM users WHERE username='".$user."' and passwd='".$pass."'";	
		$stm=$con->query($qry);
		$numr=$stm->num_rows;
		if($numr==0){
			echo "<script>alert('Usuario o Contraseña incorrectos')</script>";
   			echo "<meta http-equiv='refresh' content='0'>";
		}else{
			while($row = mysqli_fetch_array($stm, MYSQLI_ASSOC)){
				if($row['tipo']=="back"){
					header('Location: index.php');
				}else{
					header('Location: frontend/landing.php');
				}
			}	
		}
		
		
	}
?>

</form>
</div>
<div style="background-color: white;margin-left: 25%;width: 50%;">
	<form method="POST">
		<label style="margin-left: 70%;" for="crear">¿No tienes usuario? ¡Crealo!</label>
    		<button class="btn btn-primary" style="width: 45%;margin-left: 50%;border-radius: 5px;" type="submit" name="crear">Crear</button>
	</form>
</div>
<div style="background-color: white;margin-left: 25%;width: 50%; height: 10px;"></div>
	</body>
</html>
	
</body>
</html>