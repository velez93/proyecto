<?php
include_once("../php/conexionBD.php");
$sentencia = $conn->query("SELECT c.id_comisiones, v.vend_nombre, v.vend_telefono,c.comision,c.fecha
FROM comisiones c, vendedor v
WHERE c.id_vendedor=v.id_vend;");
$comisiones = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<script src="../js/eliminar.js"></script>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Listado de Comisiones</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>VENDEDOR</th>
          <th>TELEFONO</th>
          <th>COMISIÓN</th>
          <th>FECHA</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($comisiones as $dato) {
          ?>
          <tr>
            <!-- la variable ($dato) apuntara a cada columna de la tabla -->
            <td><?php echo $dato->id_comisiones; ?></td>
            <td><?php echo $dato->vend_nombre; ?></td>
            <td><?php echo $dato->vend_telefono; ?></td>
            <td><?php echo $dato->comision; ?></td>
            <td><?php echo $dato->fecha; ?></td>
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

        </tr>
      </tfoot>
    </table>
  </div>
</div>
