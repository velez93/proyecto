<?php
session_start();

if (isset($_SESSION["usuario_valido"])) {
	$message= "Sesion: ".$_SESSION["nombre_usuario"]." ".$_SESSION["apellido_usuario"];
} else {
	header("Location: login.php");
}

$modulo = $_REQUEST['modulo']??'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LA ILIADA AUTOMOTORA</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin-left: 300px" class="hold-transition sidebar-mini layout-fixed" >
	<div class="wrapper">
		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<li class="nav-item">
					<a class="nav-link"  href="../php/logout.php">Cerrar Sesion</a>
					<div class="navbar-search-block">
						<form class="form-inline">
							<div class="input-group input-group-sm">
								<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
								<div class="input-group-append">
									<button class="btn btn-navbar" type="submit">
										<i class="fas fa-search"></i>
									</button>
									<button class="btn btn-navbar" type="button" data-widget="navbar-search">
										<i class="fas fa-times"></i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</li>
			</ul>
		</nav>
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link">
				<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">LA ILIADA</span>
			</a>
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<a href="#" class="d-block"><?=$message ?></a>
					</div>
				</div>
				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
						with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="panel.php?modulo=estadisticas" <?php echo ($modulo=="estadisticas" || $modulo==""); ?> class="nav-link">
								<i class="nav-icon fas fa-chart-bar"></i>
								<p>Estadisticas</p>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" role="button" aria-expanded="false" href="#">CLIENTES</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="panel.php?modulo=ingCliente">Ingresar cliente</a></li>
								<li><a class="dropdown-item" href="panel.php?modulo=listaCliente"
									<?php echo ($modulo=="listaCliente" || $modulo=="editarCliente"); ?> >Ver listado</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" role="button" aria-expanded="false" href="#">VENDEDORES</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="panel.php?modulo=ingVendedor">Ingresar vendedor</a></li>
								<li><a class="dropdown-item" href="panel.php?modulo=listaVendedor"
									<?php echo ($modulo=="listaVendedor" || $modulo=="editarVendedor"); ?> >Ver listado</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" role="button" aria-expanded="false" href="#">VEHICULOS</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="panel.php?modulo=ingVehiculo">Ingresar vehiculo</a></li>
								<li><a class="dropdown-item" href="panel.php?modulo=listaVehiculo"
									<?php echo ($modulo=="listaVehiculo" || $modulo=="editarVehiculo"); ?> >Ver listado</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" role="button" aria-expanded="false" href="#">VENTAS</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="panel.php?modulo=">Ingresar venta</a></li>
								<li><a class="dropdown-item" href="panel.php?modulo=listaVenta"
									<?php echo ($modulo=="listaVenta"); ?> >Ver listado</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle " data-bs-toggle="dropdown" role="button" aria-expanded="false" href="#">USUARIOS</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="panel.php?modulo=ingUsuarios">Ingresar usuario</a></li>
								<li><a class="dropdown-item" href="panel.php?modulo=listausuarios"
									<?php echo ($modulo=="listausuarios" || $modulo=="editarUsuarios"); ?> >Ver listado</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<?php

		// Estadisticas
		if ($modulo=="estadisticas" || $modulo=="") {
			include_once 'estadisticas.php';
		}

		//Cliente
		// abre el formulario de ingreso cliente
		if ($modulo=="ingCliente") {
			include_once 'ingresar_Cliente.php';
		}
		// abre el listado de cliente
		if ($modulo=="listaCliente") {
			include_once 'lista_Cliente.php';
		}
		// abre el formulario de editr cliente
		if ($modulo=="editarCliente") {
			include_once 'editar_Cliente.php';
		}

		//Vendedor
		// abre el formulario de ingreso vendedor
		if ($modulo=="ingVendedor") {
			include_once 'ingresar_Vendedor.php';
		}
		// abre el listado de vendedor
		if ($modulo=="listaVendedor") {
			include_once 'lista_Vendedor.php';
		}
		// abre el formulario de editr vendedor
		if ($modulo=="editarVendedor") {
			include_once 'editar_Vendedor.php';
		}

		//Vehiculos
		// abre el formulario de ingreso vehiculo
		if ($modulo=="ingVehiculo") {
			include_once 'ingresar_Vehiculo.php';
		}
		// abre el listado de usuarios
		if ($modulo=="listaVehiculo") {
			include_once 'lista_Vehiculo.php';
		}
		// abre el formulario de editr usuarios
		if ($modulo=="editarVehiculo") {
			include_once 'editar_Vehiculo.php';
		}

		//Venta
		// abre el listado de venta
		if ($modulo=="listaVenta") {
			include_once 'lista_Venta.php';
		}

		//Usuario
		// abre el formulario de ingreso usuarios
		if ($modulo=="ingUsuarios") {
			include_once 'ingresar_Usuario.php';
		}
		// abre el listado de usuarios
		if ($modulo=="listausuarios") {
			include_once 'lista_Usuario.php';
		}
		// abre el formulario de editr usuarios
		if ($modulo=="editarUsuarios") {
			include_once 'editar_Usuario.php';
		}
		?>

		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2021 .</strong>
			All rights reserved.
		</footer>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- tablas -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
	$("#example1").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
