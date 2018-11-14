<div class="container">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 mt-auto mb-auto">
				<div class="card">
					<div class="card-header card-header-rose">
						<h4 class="card-title">Editar perfil</h4>
						<p class="card-category">Actualiza tus datos</p>
					</div>
					<div class="card-body">
						<form>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group bmd-form-group">
                                        <?='<input type="text" id="editUser" value="'.$user.'" class="form-control" placeholder="Usuario">'?>
									</div>
								</div>
								<div class="col-md-7">
									<div class="form-group bmd-form-group">
										<?='<input type="email" id="editEmail" value="'.$email.'" class="form-control" placeholder="Correo electrónico">'?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group bmd-form-group">
										<?='<input type="text" id="editName" value="'.$name.'"class="form-control" placeholder="Nombre">'?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group bmd-form-group">
										<?='<input type="text" id="editLastN" value="'.$lastN.'"class="form-control" placeholder="Apellidos">'?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<div class="form-group bmd-form-group">
										<input type="text" id="editDirec" class="form-control" placeholder="Direccion">
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group bmd-form-group">
										<input type="text" id="editCountry" class="form-control" placeholder="Ciudad">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-rose pull-right btnUpdate">Actualizar datos</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-auto mb-auto">
				<div class="card">
					<div class="card-header card-header-rose">
						<div class="card-title">
                            <h3>Feedback</h3>
                        </div>
						<p>¡Dinos lo que más te gusta de la plataforma!</p>
					</div>
					<div class="card-body">
						<div class="input-group">
							<input type="email" class="form-control feedback" placeholder="Correo electrónico">
						</div>
						<div class="form-group bdm-form-group">
							<textarea class="form-control feedback" cols="1" rows="5" placeholder="Detalles de las observaciones"></textarea>
						</div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button class="btn btn-rose btn-lg">Enviar</button>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
