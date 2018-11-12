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
	<link rel="stylesheet" type="text/css" href="./assets/material-kit/assets/css/material-kit.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/styles.css">
	<title>Ingreso</title>
</head>

<body class="login-page">
	<div class="page-header header-filter login-bg" style="background-image: url('./assets/img/01.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-5 mr-auto ml-auto">
					<div class="card card-login">
						<div class="card-header card-header-primary">
							<div class="nav-tabs-navigation">
								<div class="nav-tabs-wrapper">
									<ul class="nav nav-tabs justify-content-center" data-tabs="tabs">
										<li class="nav-item">
											<a class="nav-link active" href="#switchLogin" data-toggle="tab">Login</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#switchRegistro" data-toggle="tab">Registrarse</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content">
								<div class="tab-pane active" id="switchLogin">
									<form class="formLogin">
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">mail</i>
												</span>
											</div>
											<input class="form-control userLogin" type="text" placeholder="Usuario o correo electrónico" autocomplete="off" required>
										</div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">lock_outline</i>
												</span>
											</div>
											<input class="form-control passLogin" type="password" placeholder="Contraseña" required>
										</div>
										<div class="row">
											<div class="col text-center">
												<label class="err loginErr"></label>
											</div>
										</div>
										<div class="input-group justify-content-center">
											<button class="btn btn-primary">Ingresar</button>
										</div>
									</form>
								</div>
								<div class="tab-pane" id="switchRegistro">
									<form class="formRegister">
										<div class="row">
											<div class="col">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">
															<i class="material-icons">face</i>
														</span>
													</div>
													<input class="form-control regName" type="text" placeholder="Nombre" autocomplete="off" required>
												</div>
											</div>
											<div class="col">
												<div class="input-group">
													<input class="form-control regApell" type="text" placeholder="Apellidos" autocomplete="off" required>
												</div>
											</div>
										</div>
										<div class="input-group userInput">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">account_circle</i>
												</span>
											</div>
											<input class="form-control regUsuario" type="text" placeholder="Usuario" autocomplete="off" required>
											<span class="form-control-feedback">
												<i class="material-icons userErr"></i>
											</span>
										</div>
										<div class="input-group emailInput">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">mail</i>
												</span>
											</div>
											<input class="form-control regCorreo" type="email" placeholder="Correo" autocomplete="off" required>
											<span class="form-control-feedback">
												<i class="material-icons emailErr"></i>
											</span>
										</div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">lock_outline</i>
												</span>
											</div>
											<input class="form-control regPass" type="password" placeholder="Contraseña" required>
										</div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">lock_outline</i>
												</span>
											</div>
											<input class="form-control regConfPass" type="password" placeholder="Confirma tu contraseña" required>
                    </div>
                    <div class="row">
                      <div class="col text-center">
                        <label class="err regErr"></label>
                      </div>
                    </div>
										<div class="input-group justify-content-center">
											<button class="btn btn-primary">Registrarse</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	 crossorigin="anonymous"></script>
	<script src="./assets/material-kit/assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="./assets/material-kit/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="./assets/material-kit/assets/js/plugins/moment.min.js"></script>
	<script src="./assets/material-kit/assets/js/material-kit.min.js" type="text/javascript"></script>
	<script src="./assets/material-dashboard/assets/js/plugins/bootstrap-notify.js"></script>
	<script src="./assets/scripts.js" type="text/javascript"></script>
</body>

</html>
