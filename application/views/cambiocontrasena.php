<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/material-dashboard/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/material-dashboard/assets/img/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="../assets/material-kit/assets/css/material-kit.min.css">
</head>

<body class="login-page">
	<div class="page-header header-filter login-bg" style="background-image: url('../assets/img/01.jpg');">
		<div class="container">
			<?php 
            if(isset($confirm)){
                echo $confirm;
            }else{            
            echo '
			<div class="row">
				<div class="col-md-5 mr-auto ml-auto">
					<div class="card card-login">
						<div class="card-header card-header-primary">
							<div class="nav-tabs-navigation">
								<h4 class="card-title ml-3">Reestablecer contraseña</h4>
								<p class="category ml-3">Escribe tu nueva contraseña</p>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<form action="" method="POST">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">lock_outline</i>
												</span>
											</div>
											<input class="form-control" name="password" type="password" placeholder="Nueva contraseña"
											 autocomplete="off" required>
										</div>
										<div class="input-group justify-content-center">
											<button class="btn btn-primary">Cambiar contraseña</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
            }
            ?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>
	<script src="../assets/material-kit/assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="../assets/material-kit/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="../assets/material-kit/assets/js/plugins/moment.min.js"></script>
	<script src="../assets/material-kit/assets/js/material-kit.min.js" type="text/javascript"></script>
	<script src="../assets/material-dashboard/assets/js/plugins/bootstrap-notify.js"></script>
</body>

</html>
