<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="./assets/material-dashboard/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="./assets/material-dashboard/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="./assets/material-dashboard/assets/css/material-dashboard.min.css" rel="stylesheet" />
	<link href="./assets/dateTimePicker/datetime.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="./assets/styles.css">
	<title>Dashboard</title>
</head>

<body id="bDashboard">
	<div class="wrapper ">
		<div class="sidebar" data-color="azure" data-background-color="white" data-image="./assets/material-dashboard/assets/img/sidebar-3.jpg">
			<!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
      -->
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-normal">
					A D E M
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item btnDashboard active">
						<a class="nav-link" href="#dashboard" data-toggle="tab">
							<i class="material-icons">dashboard</i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item btnProfile">
						<a class="nav-link" href="#user_profile" data-toggle="tab">
							<i class="material-icons">person</i>
							<p>Perfil</p>
						</a>
					</li>
					<li class="nav-item btnSettings">
						<a class="nav-link" href="#settings" data-toggle="tab">
							<i class="material-icons">settings</i>
							<p>Configuración</p>
						</a>
					</li>
					<?php echo $adminBtn ?>
					<li class="nav-item btnLogout">
						<a class="nav-link" href="login/logout">
							<i class="material-icons">close</i>
							<p>Cerrar sesión</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<h3 class="panelTitle">Dashboard</h3>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
					 aria-label="Toggle navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
					</button>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<!-- page content -->
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="float-left">
						<ul>
							<li>
								<a href="https://www.cuc.edu.co/">
									Universidad de la costa CUC
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright float-right">
						&copy;2018 ADEM, derechos intelectualmente reservados
					</div>
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="./assets/material-dashboard/assets/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="./assets/material-dashboard/assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="./assets/material-dashboard/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="./assets/material-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="./assets/material-kit/assets/js/plugins/moment.min.js"></script>
	<script src="./assets/material-kit/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<!--  Notifications Plugin    -->
	<script src="./assets/material-dashboard/assets/js/plugins/bootstrap-notify.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="./assets/material-dashboard/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" type="text/javascript"></script>
	<script src="./assets/dateTimePicker/datetime.min.js"></script>
	<script src="./assets/dateTimePicker/datetime.es.js"></script>
	<script src="./assets/scripts.js" type="text/javascript"></script>
</body>

</html>
