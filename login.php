<?php
//conectar a la base de datos
$db=mysqli_connect("localhost","root","","iest_deportes");
if($db) {
  if(isset($_POST['login-btn']))
  {
      $usuario=mysqli_real_escape_string($db,$_POST['usuario']);
      $contraseña=mysqli_real_escape_string($db,$_POST['contraseña']);
      $sql="SELECT * FROM usuario WHERE usuario ='$usuario' AND contraseña = '$contraseña'";
      $result=mysqli_query($db,$sql);

      if($result) {

        if(mysqli_num_rows($result)>=1)
        {
          session_start();
          while($fila=$result->fetch_assoc()){
            $_SESSION['tipo']=$fila['tipo'];
            $_SESSION['id']=$fila['id'];
            $_SESSION['usuario']=$fila['usuario'];

          }
          switch(intval($_SESSION['tipo'])){
            case 1:
              header("Location: admin\admin_index.php");
              break; 
            case 2:
                header("Location: coordinador\coordinador_index.php");
                break; 
            case 3:
              header("Location: alumno\alumno_index.php");
              break;
             
          }
       }
    } else {
       $_SESSION['alert']="Usuario o contraseña incorrecta";
    }
  }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="css/login_css.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
    if(isset($_SESSION['message']))
    {
         echo "<div>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Login </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images\logo.jpg" id="icon">
    </div>

    <!-- Login Form -->
    <form method="post" action="login.php">
      <input type="text" class="fadeIn second" name="usuario" placeholder="usuario">
      <input type="password" class="fadeIn third" name="contraseña" placeholder="contraseña">
      <input type="submit" class="fadeIn fourth" name="login-btn" value="Ingresar">
    </form>
  </div>
</div>
</body>
</html>