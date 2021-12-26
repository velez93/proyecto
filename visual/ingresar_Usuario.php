<?php
include_once("../php/conexionBD.php");

if (isset($_POST['registrar_usuario'])) {
  if (!empty($_POST['doc_usuario']) && !empty($_POST['mail_usuario']) && !empty($_POST['nombre_usuario'])
  && !empty($_POST['apellido_usuario']) && !empty($_POST['usu_usuario']) && !empty($_POST['password']) ){

    $doc_usuario = $_POST['doc_usuario'];
    $mail_usuario = $_POST['mail_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $usu_usuario = $_POST['usu_usuario'];
    $password = md5($_POST['password']);

    //creamos una variable ($query) para guardar la consulta a la base de datos,
    // para ello usamos la variable ($conn) que es la que guarda la conexion, con el comando prepare indicamos la consulta
    $query = $conn->prepare("SELECT * FROM usuario WHERE ci_usuario=:doc_usuario");
    //pasamos por parametro la variable para igualarla y luego poder verificar si ya existe
    $query->bindParam("doc_usuario", $doc_usuario, PDO::PARAM_STR);
    // ejecutamos la consulta
    $query->execute();

    if ($query->rowCount() > 0) {
      $message_usu= "El usuario ya existe";
    }
    if ($query->rowCount() == 0) {
      $query = $conn->prepare('INSERT INTO usuario
        (ci_usuario, nom_usuario, ap_usuario, email_usuario, user_usuario, pass_usuario)
        VALUES (?,?,?,?,?,?)');
        $result = $query->execute([$doc_usuario, $nombre_usuario, $apellido_usuario, $mail_usuario, $usu_usuario, $password]);

        if ($result) {
          $message_usu= "Registro creado correctamente";
          $query=null;
          $conn=null;
        } else {
          $message_usu= "Error al ingresar datos de la informacion";
          $query=null;
          $conn=null;
        }
      }
    } else {
      $message_usu="Todos los campos no deben estar vacios";
    }
  }
  ?>
<div class="ancho">
  <form class="row g-3" action="panel.php?modulo=ingUsuarios" method="post">
    <h1>Ingreso de Usuarios</h1>

    <?php if (!empty($message_usu)) {
      echo "<p>Mensaje: ".$message_usu."</p>";
    } ?>

    <div class="col-md-6">
      <label>Documento</label>
      <input type="text" class="form-control" id="inputEmail4" name="doc_usuario">
    </div>
    <div class="col-md-6">
      <label>Email</label>
      <input type="email" class="form-control" id="inputPassword4" name="mail_usuario">
    </div>
    <div class="col-6">
      <label>Nombre</label>
      <input type="text" class="form-control" id="inputAddress" name="nombre_usuario">
    </div>
    <div class="col-6">
      <label>Apellido</label>
      <input type="text" class="form-control" id="inputAddress" name="apellido_usuario">
    </div>
    <div class="col-6">
      <label>Usuario</label>
      <input type="text" class="form-control" id="inputAddress" name="usu_usuario">
    </div>
    <div class="col-md-6">
      <label>Contraseña</label>
      <input type="password" class="form-control" id="inputCity" name="password">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary" name="registrar_usuario">Registrar</button>
    </div>
  </form>
</div>
