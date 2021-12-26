<?php
session_start();
require_once("../php/conexionBD.php");

if (isset($_POST['iniciarSesion'])) {

  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $user=$_POST['user'];
    $password=$_POST['password'];
    $password = md5($password);

    $query = $conn->prepare("SELECT * FROM usuario WHERE user_usuario=:user AND pass_usuario=:password");
    $query->bindParam("user", $user, PDO::PARAM_STR);
    $query->bindParam("password", $password, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_OBJ);

    if (!$result) {
      $message="El usuario o la contraseña son invalidos";
    } else {
      $_SESSION["nombre_usuario"] = $result->nom_usuario;
      $_SESSION["apellido_usuario"] = $result->ap_usuario;
      $_SESSION["usuario_usuario"] = $result->user_usuario;
      $_SESSION["contrasenia_usuario"] = $result->pass_usuario;
      $_SESSION["usuario_valido"] = true;

      header('Location: panel.php');
      mysqli_close($conn);
    }
  } else {
    $message="Todos los campos son requeridos";
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <form class="logeo" action="login.php" method="post">
    <h1>Iniciar Sesion</h1>

    <?php if (!empty($message)) {
      echo "<p>Mensaje: ".$message."</p>";
    } ?>

    <input type="text" name="user" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <input type="submit" name="iniciarSesion" value="Iniciar sesión">
  </form>
</body>
</html>
