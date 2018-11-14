<div class="container allDisp">
	<div class="container-fluid">
		<div class="row dispContainer"></div>
		<div class="row">
			<div class="col text-center">
				<button class="btn btn-lg btn-warning" data-toggle="modal" data-target="#exampleModal">Agregar dispositivo</button>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content col-md-10 mr-auto ml-auto">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar dispositivo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="material-icons">tablet_android</i>
							</span>
						</div>
						<input class="form-control addDispNombre" type="text" placeholder="Nombre del dispositivo" autocomplete="off">
					</div>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="material-icons">access_time</i>
							</span>
						</div>
						<input class="form-control addDispInterv" type="text" placeholder="Intervalo de envío de datos" autocomplete="off">
					</div>
					<div class="input-group serialMsg">
						<div class="input-group-prepend">
							<span class="input-group-text">
								<i class="material-icons">memory</i>
							</span>
						</div>
						<input class="form-control addDispSerial" type="text" placeholder="Serial" autocomplete="off">
						<span class="form-control-feedback">
							<i class="material-icons errMsg"></i>
						</span>
					</div>
					<div class="input-group">
						<select class="form-control" id="selectDevice">
							<option>Aire acondicionado</option>
							<option>Nevera</option>
							<option>Televisor</option>
							<option>Lavadora</option>
							<option>Otro</option>
						</select>
					</div>
					<div class="form-group">
						<textarea class="form-control addDispDesc" cols="1" rows="5" placeholder="Descripcion"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary btnAgregar" data-dismiss="modal">Guardar cambios</button>
				</div>
			</div>
		</div>
	</div>
</div>
