<?php
//incluimos el archivo de conexion a la base de datos
include_once("../php/conexionBD.php");
//creamos una variable ($sentencia) para guardar la consulta a la base de datos,
// para ello usamos la variable ($conn) que es la que guarda la conexion, con el comando query indicamos la consulta
$sentencia = $conn->query("SELECT * FROM usuario;");
//con la funcion (fetchAll) para guardar toda la consulta en un formato de objeto, en este caso es un arreglo
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<script src="../js/eliminar.js"></script>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Listado de Usuarios</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>C.I:</th>
          <th>NOMBRE</th>
          <th>APELLIDO</th>
          <th>EMAIL</th>
          <th>USUARIO</th>
          <th>EDITAR</th>
          <th>ELIMINAR</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // el foreach va a recorrer cada uno de los objetos del arreglo y los pasamos como la variable ($dato)
        foreach ($usuarios as $dato) {
          ?>
          <tr>
            <!-- la variable ($dato) apuntara a cada clolumna de la tabla -->
            <td><?php echo $dato->Id_usuario; ?></td>
            <td><?php echo $dato->ci_usuario; ?></td>
            <td><?php echo $dato->nom_usuario; ?></td>
            <td><?php echo $dato->ap_usuario; ?></td>
            <td><?php echo $dato->email_usuario; ?></td>
            <td><?php echo $dato->user_usuario; ?></td>
            <td><a href="panel.php?modulo=editarUsuarios&id=<?php echo $dato->Id_usuario; ?>">EDITAR</a></td>
            <td><a href="../php/eliminarUsuario.php?id=<?php echo $dato->Id_usuario; ?>" onclick="return confirmarEliminacion()">ELIMINAR</a></td>
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
</div>
