<?php
include_once("../php/conexionBD.php");

$sentencia = $conn->query("SELECT * FROM cliente;");
$clientes = $sentencia->fetchALL(PDO::FETCH_OBJ);
?>
<script src="../js/eliminar.js"></script>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Listado de Clientes</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>DOCUMENTO</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>DIRECCION</th>
          <th>TELEFONO</th>
          <th>EDITAR</th>
          <th>ELIMINAR</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($clientes as $dato) {
          ?>
          <tr>
            <td><?php echo $dato->id_Cliente; ?></td>
            <td><?php echo $dato->cli_ci; ?></td>
            <td><?php echo $dato->cli_nombre; ?></td>
            <td><?php echo $dato->cli_apellido; ?></td>
            <td><?php echo $dato->cli_direccion; ?></td>
            <td><?php echo $dato->cli_telefono; ?></td>
            <td><a href="panel.php?modulo=editarCliente&?id=<?php echo $dato->id_Cliente; ?>">EDITAR</a></td>
            <td><a href="../php/eliminarCliente.php?id=<?php echo $dato->id_Cliente; ?>" onclick="return confirmarEliminacion()">ELIMINAR</a></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
