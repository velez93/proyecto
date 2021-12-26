<?php
include_once("../php/conexionBD.php");

if (!isset($_GET['id'])) {
  header('Location: panel.php?modulo=listausuarios');
}

$id = $_GET['id'];
$sql = $conn->prepare("SELECT * FROM usuario WHERE Id_usuario = ?;");
$sql->execute([$id]);
$usuario = $sql->fetch(PDO::FETCH_OBJ);

if (isset($_POST['editar'])) {
  $iduser = $_POST['id1'];
  $doc_usu = $_POST['doc_usuario'];
  $nom_usu = $_POST['nombre_usuario'];
  $ap_usu = $_POST['apellido_usuario'];
  $mail_usu = $_POST['mail_usuario'];
  $user_usu = $_POST['usu_usuario'];

  $query = $conn->prepare("UPDATE usuario
    SET ci_usuario = ?, nom_usuario= ?, ap_usuario = ?, email_usuario = ?, user_usuario = ?
    WHERE Id_usuario = ?;");

    $editUsuario = $query->execute([$doc_usu, $nom_usu, $ap_usu, $mail_usu, $user_usu, $iduser]);

    if ($editUsuario === TRUE) {
      $message_usu = "Se actualizaron los datos exitosamente";
      header('Location: panel.php?modulo=listausuarios');
      mysqli_close($conn);
    } else {
      $message_usu = "Error al cargar los datos";
    }
  }

  if (isset($_POST['cancelar'])) {
    header('Location: panel.php?modulo=listausuarios');
    mysqli_close($conn);
  }
?>

<div class="ancho">
  <form class="row g-3" action="editar_Usuario.php" method="post">
    <h1>Editar Usuario</h1>

    <?php if (!empty($message_usu)) {
      echo "<p>Mensaje: ".$message_usu."</p>";
    } ?>

    <div class="col-md-6">
      <label>Documento</label>
      <input type="text" class="form-control" id="inputEmail4"
      name="doc_usuario" value="<?php echo $usuario->ci_usuario?>">
    </div>
    <div class="col-6">
      <label>Nombre</label>
      <input type="text" class="form-control" id="inputAddress"
      name="nombre_usuario" value="<?php echo $usuario->nom_usuario?>">
    </div>
    <div class="col-6">
      <label>Apellido</label>
      <input type="text" class="form-control" id="inputAddress"
      name="apellido_usuario" value="<?php echo $usuario->ap_usuario?>">
    </div>
    <div class="col-md-6">
      <label>Email</label>
      <input type="email" class="form-control" id="inputPassword4"
      name="mail_usuario" value="<?php echo $usuario->email_usuario?>">
    </div>
    <div class="col-6">
      <label>Usuario</label>
      <input type="text" class="form-control" id="inputAddress"
      name="usu_usuario" value="<?php echo $usuario->user_usuario?>">
    </div>
    <input type="hidden" name="id1" value="<?php echo $usuario->Id_usuario?>">
    <div class="col-12">
      <button type="submit" class="btn btn-primary" name="editar">Editar</button>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary" name="cancelar">Cancelar</button>
    </div>
  </form>
</div>
