<div class="container dispEspec">
	<div class="row">
		<div class="col">
			<div class="card card-chart">
				<div class="card-header card-header-info">
					<?php echo $serial ?>
					<canvas id="lineGraph"></canvas>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div id="datePicker" data-language="es"></div>
						</div>
						<div class="col-md-6 mt-auto mb-auto">
							<canvas id="filterGraph" style="display: block"></canvas>
							<canvas id="barGraph" style="display: none"></canvas>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card card-nav-tabs text-center">
								<div class="card-header card-header-info">
									Rango de horas
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col">
											<div class="form-group bdm-form-group">
												<input type="text" id="timeFrom" class="form-control text-center hFrom" data-language="es">
											</div>
										</div>
										<div class="col">
											<div class="form-group bdm-form-group">
												<input type="text" id="timeTo" class="form-control text-center hTo" data-language="es">
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer justify-content-center">
									<button class="btn btn-warning btnHoras">Filtrar</button>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="row">
								<div class="col">
									<div class="card card-nav-tabs text-center">
										<div class="card-header card-header-info">
											Rango de fechas
										</div>
										<div class="card-body">
											<div class="form-group bdm-form-group mt-auto mb-auto">
												<input type="text" class="dayRange form-control text-center" data-range="true"
												 data-multiple-dates-separator=" - " data-language="es">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<button class="btn btn-warning btn-lg btnFiltrar">Resumen de todos los dias registrados</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="./assets/disp.js"></script>
