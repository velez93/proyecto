<?php
include_once("../php/conexionBD.php");

$cliente_sql = $conn->query("SELECT * FROM cliente;");
$clientes = $cliente_sql->fetchALL(PDO::FETCH_OBJ);

$vendedor_sql = $conn->query("SELECT * FROM vendedor;");
$vendedores = $vendedor_sql->fetchALL(PDO::FETCH_OBJ);

$vehiculo_sql = $conn->query("SELECT * FROM vehiculos;");
$vehiculos = $vehiculo_sql->fetchALL(PDO::FETCH_OBJ);

?>
<script src="../js/conf_Venta.js"></script>
<form class="" action="" method="post">
<div class="title_page">
  <h1>FACTURA</h1>
</div>

<!-- Trae los datos del cliente-->
<div class="datos_venta">
  <div class="">
    <h4>Datos del Cliente</h4>
  </div>
  <div class="wd60">
    <select class="" name="cliente">
      <?php
      foreach ($clientes as $datocli) {
        ?>
        <option value=""></option>
        <option value="<?php echo $datocli->id_Cliente; ?>">CI:<?php echo $datocli->cli_ci ; ?> Nombre:<?php echo $datocli->cli_nombre ; ?> <?php echo $datocli->cli_apellido; ?></option>
      <?php
    }
    ?>
    </select>
  </div>
</div>
</div>

<!-- Trae los datos del vendedor-->
<div class="datos_venta">
  <div class="">
    <h4>Datos del Vendedor</h4>
  </div>
  <div class="wd60">
    <select class="" name="vendedor">
      <?php
      foreach ($vendedores as $datoven) {
        ?>
        <option value=""></option>
      <option value="<?php echo $datoven->id_vend; ?>"><?php echo $datoven->vend_ci; ?></option>
      <?php
    }
    ?>
    </select>
  </div>
</div>
</div>

<!-- Trae los datos del vehiculo-->
<div class="datos_venta">
  <div class="">
    <h4>Datos del Vehiculo</h4>
  </div>
  <div class="wd60">
    <select class="" name="vehiculo">
      <?php
      foreach ($vehiculos as $datovehi) {
        ?>
        <option value=""></option>
        <option value="<?php echo $datovehi->id_vehi; ?>"><?php echo $datovehi->vehi_matricula; ?></option>
        <?php
        }
        ?>
    </select>
  </div>
</div>
</div>
<!-- hacer un insert into para guardar los datos que tenemos-->

<div class="col-12">
  <button type="submit" class="btn btn-primary" name="registrar" onclick="return confirmarVenta()">Registrar</button>
</div>
<div class="col-12">
  <button type="submit" class="btn btn-primary" name="cancelar">Cancelar</button>
</div>
</form>
