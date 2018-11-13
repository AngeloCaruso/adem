<h3 align="center"><?php echo $name ?></h3>
<div class="row">
	<div class="col">
		<div class="card card-chart">
			<div class="card-header card-header-info">
				<canvas id=""></canvas>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col mt-auto mb-auto">
						<div class="section">
							<button class="btn btn-primary btnFiltrar dia">Filtrar por dias</button>
						</div>
						<div class="section">
							<button class="btn btn-primary btnFiltrar mes">Filtrar por mes</button>
						</div>
						<div class="section">
							<div id="datePicker" data-language="es"></div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col">
								<div class="card card-nav-tabs text-center">
									<div class="card-header card-header-primary">
										Rango de fechas
									</div>
									<div class="card-body">
                                        <input type="text" name="" id="">
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <button class="btn btn-primary">Filtrar</button>
                                    </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="card card-nav-tabs text-center">
									<div class="card-header card-header-primary">
										Rango de fechas
									</div>
									<div class="card-body">
                                        <input type="text" name="" id="">
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <button class="btn btn-primary">Filtrar</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<canvas id="filterGraph"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="./assets/disp.js"></script>
