<?php
include_once("../php/conexionBD.php");

if (!isset($_GET['id'])) {
  header('Location: panel.php?modulo=listadoCliente');
}

$id = $_GET['id'];
$sql = $conn->prepare("SELECT * FROM cliente WHERE id_Cliente = ?;");
$sql->execute([$id]);
$clientes = $sql->fetch(PDO::FETCH_OBJ);

if (isset($_POST['editar'])) {
  $idcliente = $_POST['id1'];
  $ci=$_POST['ci1'];
  $nombre=$_POST['nombre1'];
  $apellido=$_POST['apellido1'];
  $direccion=$_POST['direccion1'];
  $telefono=$_POST['telefono1'];

  $query = $conn->prepare("UPDATE cliente
  SET cli_ci = ?, cli_nombre= ?, cli_apellido = ?, cli_direccion = ?, cli_telefono = ?
  WHERE id_Cliente = ?;");

  $editCliente = $query->execute([$ci, $nombre, $apellido, $direccion, $telefono, $idcliente]);

  if ($editCliente === TRUE) {
    $message_cli = "Actualizacion exitosa";
    header('Location: panel.php?modulo=listadoCliente');
    mysqli_close($conn);
  } else {
    $message_cli = "Error al cargar los datos";
  }
}

if (isset($_POST['cancelar'])) {
  header('Location: panel.php?modulo=listadoCliente');
  mysqli_close($conn);
}
?>
<div class="ancho">
  <form class="insert" action="editar_Clientes.php" method="post">
    <h2>Editar Cliente</h2>

    <?php if (!empty($message_cli)) {
      echo "<p>Mensaje: ".$message_cli."</p>";
    } ?>

    <input type="text" name="ci1" value="<?php echo $usuario->cli_ci?>">
    <input type="text" name="nombre1" value="<?php echo $usuario->cli_nombre?>">
    <input type="text" name="apellido1" value="<?php echo $usuario->cli_apellido?>">
    <input type="text" name="direccion1" value="<?php echo $usuario->cli_direccion?>">
	  <input type="tel" name="telefono1" value="<?php echo $usuario->cli_telefono?>">
    <input type="hidden" name="id1" value="<?php echo $usuario->id_Cliente?>">

    <input type="submit" name="editar" value="EDITAR">
    <input type="submit" name="cancelar" value="CANCELAR">
  </form>
</div>
