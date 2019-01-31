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
  <title>Registrar</title>

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
          <h2 style="color: black;margin-left: 10%;font-family: Arial,Helvetica, sans-serif;
"><strong>Crear Nuevo Usuario</strong></h2>
      </div>
    </nav>
<div id="nombre">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
  <div class="imgcontainer">
    <img src="user.png" alt="Avatar" style="height: 120px; width: 120px;" class="avatar">
  </div>

  <div class="container" style="width: 100%;">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
  <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <label for="tipo">Tipo de Usuario</label><br>
    <select name="tipo">
      <option>back</option>
      <option>front</option>
    </select>
    </label>
        
    <button type="submit" name="enviar">Registrar</button>
    <br>
    
    
  </div>
<?php
  if(isset($_POST['enviar'])){
    
    $user=$_POST['uname'];
    $pass=$_POST['psw'];
    $tipo=$_POST['tipo'];
    $qry="INSERT INTO users (username,passwd,tipo) VALUES ('".$user."','".$pass."','".$tipo."')"; 
    $stm=$con->query($qry);
    if(!$stm){
      echo "<script>alert('Utilice otro usuario y/o contraseña')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }else{
          echo "<script>alert('Usuario Registrado con Exito')</script>";

          echo "<script>window.location.href='login.php'</script>";
      } 
    }
    
  
?>

</form>
</div>
  </body>
</html>
  
</body>
</html>