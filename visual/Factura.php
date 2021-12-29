<?php
include_once("../php/conexionBD.php");

$cliente_sql = $conn->query("SELECT * FROM cliente;");
$clientes = $cliente_sql->fetchALL(PDO::FETCH_OBJ);

$vendedor_sql = $conn->query("SELECT * FROM vendedor;");
$vendedores = $vendedor_sql->fetchALL(PDO::FETCH_OBJ);

$vehiculo_sql = $conn->query("SELECT * FROM vehiculos;");
$vehiculos = $vehiculo_sql->fetchALL(PDO::FETCH_OBJ);


if (isset($_POST['registrar'])) {


    $fecha=$_POST['fecha'];
    $id_cli = $_POST['insertCliente'];
    $id_vehi = $_POST['insertvendedor'];
    $id_vend = $_POST['insertvehiculo'];

    $query = $conn->prepare('INSERT INTO ventas
      (id_cliente, id_vendedor, id_vehiculo, fecha)
      VALUES (?,?,?,?)');
      $result = $query->execute([$fecha, $id_cli, $id_vehi, $id_vend]);

}
?>


<script src="../js/conf_Venta.js"></script>
<form class="" action="" method="post">
<div class="title_page">
  <h1>FACTURA</h1>
</div>

<?php if (!empty($message_venta)) {
   echo "<p>Mensaje: ".$message_venta."</p>";
 } ?>

<!-- Trae los datos del cliente-->
<div class="datos_venta">
  <div class="wd60">
    <h4>Fecha</h4>
    <input type="date" class="form-control" id="inputAddress" name="fecha">
  </div>
  <div class="">
    <h4>Datos del Cliente</h4>
  </div>
  <div class="wd100">
    <select class="" name="cliente" required>
      <?php
      foreach ($clientes as $datocli) {
        ?>
        <option value=""></option>
        <option value="insertCliente"><?php echo $datocli->id_Cliente; ?><?php echo $datocli->cli_ci ; ?> <?php echo $datocli->cli_nombre ; ?> <?php echo $datocli->cli_apellido; ?></option>
      <?php
    }
    ?>
    </select>
  </div>
</div>

<!-- Trae los datos del vendedor-->
<div class="datos_venta">
  <div class="">
    <h4>Datos del Vendedor</h4>
  </div>
  <div class="wd100">
    <select class="" name="vendedor" required>
      <?php
      foreach ($vendedores as $datoven) {
        ?>
        <option value=""></option>
      <option value="insertvendedor"><?php echo $datoven->id_vend; ?> <?php echo $datoven->vend_nombre; ?> <?php echo $datoven->vend_nombre; ?></option>
      <?php
    }
    ?>
    </select>
  </div>
</div>

<!-- Trae los datos del vehiculo-->
<div class="datos_venta">
  <div class="">
    <h4>Datos del Vehiculo</h4>
  </div>
  <div class="wd100">
    <select class="" name="vehiculo" required>
      <?php
      foreach ($vehiculos as $datovehi) {
        ?>
        <option value=""></option>
        <option value="insertvehiculo"><?php echo $datovehi->id_vehi; ?> <?php echo $datovehi->vehi_marca; ?>
                      <?php echo $datovehi->vehi_modelo; ?> <?php echo $datovehi->vehi_km; ?>
                      <?php echo $datovehi->vehi_precio; ?> <?php echo $datovehi->vehi_disponible; ?></option>
        <?php
        }
        ?>
    </select>
  </div>
</div>

<!-- ver
  <h5>Sub Total</h5>
  <input type="number" name="precio" value="<?php echo $datovehi->vehi_precio; ?>" disabled>
  <h5>IVA</h5>
  <input type="number" name="ivaVent" value="<?php $iva ?> ">
  <h5>Total</h5>
  <input type="number" name="totalVenta" value="<?php $Total ?>">

-->
<div class="col-12">
  <button type="submit" class="btn btn-primary" name="registrar" onclick="return confirmarVenta()">Registrar</button>
</div>
<div class="col-12">
  <button type="submit" class="btn btn-primary" name="cancelar">Cancelar</button>
</div>
</form>
