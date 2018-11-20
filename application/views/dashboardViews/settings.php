<div class="container">
	<div class="container-fluid">
		<div class="row">
			<div class="col ml-5 mr-5">
				<div class="card mr-auto ml-auto">
					<div class="card-header card-header-danger">
						<h4 class="card-title">Información del dispositivo</h4>
						<p class="card-category">Personaliza tu dispositivo</p>
					</div>
					<form>
						<div class="card-body">
							<div class="row mt-4">
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="material-icons">tablet_android</i>
											</span>
										</div>
										<input class="form-control devName" type="text" placeholder="Nombre del dispositivo" autocomplete="off">
									</div>
								</div>
								<div class="col">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="material-icons">access_time</i>
											</span>
										</div>
										<input class="form-control inputInterval" type="text" placeholder="Intervalo de envío de datos" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col">
									<select class="custom-select" id="selectNewDev">
                                        <option value="0">Elige el tipo de dispositivo...</option>
										<option value="1">Aire acondicionado</option>
										<option value="2">Nevera</option>
										<option value="3">Televisor</option>
										<option value="4">Lavadora</option>
										<option value="5">Otro</option>
									</select>
								</div>
								<div class="col">
									<select class="custom-select" id="selectSerial">
                                        <option>Elige el dispositivo...</option>
                                        <?php
                                            foreach ($serialList as $value) {
                                                echo '<option>'.$value->serial.'</option>';
                                            }
                                        ?>
									</select>
								</div>
							</div>
							<div class="form-group bdm-form-group">
								<textarea class="form-control newDesc" cols="1" rows="5" placeholder="Descripción del dispositivo"></textarea>
							</div>
						</div>
						<div class="card-footer justify-content-center">
							<button class="btn btn-danger btn-lg btnSettings">Guardar cambios</button>
						</div>
					</form>
				</div>
            </div>
            
			<!--<div class="col-md-5 mt-auto mb-auto">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">el wiwi</h4>
						<p class="card-category">Conecta tu medidor a otra red</p>
					</div>
					<form>
						<div class="card-body">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">network_wifi</i>
									</span>
								</div>
								<input class="form-control" type="text" placeholder="Nombre de la red" autocomplete="off">
							</div>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="material-icons">lock_outline</i>
									</span>
								</div>
								<input class="form-control" type="text" placeholder="Contraseña" autocomplete="off">
							</div>
						</div>
						<div class="card-footer justify-content-center">
							<button class="btn btn-primary">Guardar cambios</button>
						</div>
					</form>
				</div>
			</div>-->
		</div>
	</div>
</div>
