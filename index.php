<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="css/login_css.css" as="style">
    <link href="css/login_css.css" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>

<body>

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Login </h2>

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images\logo.jpg" id="icon">
      </div>

      <!-- Login Form -->
      <form id="form_login" onsubmit="form_login(event)">
        <input id="usuario" type="text" class="fadeIn second" name="usuario" placeholder="ID" required>
        <input type="password" class="fadeIn third" name="contraseña" placeholder="contraseña" id="pass" required>
        <input type="submit" class="fadeIn fourth" value="Ingresar">
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/login.js"></script>

</body>
</html>