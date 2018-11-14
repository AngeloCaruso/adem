$(function () {
	var dispositivos = []
	var chartList = []
	var lastData = []
	var dispUpdater

	$('.content').load('dashboard/showAllDisp', function (m) {
		laEscoba()
		cargarDisp()
		dispUpdater = setInterval(updateCharts, 4000)
	})

	//Seleccion dinamica del sidebar
	$('.btnDashboard').on('click', function () {
		if (!$('.btnDashboard').hasClass('active')) {
			$('.nav').find('li.active').removeClass('active')
			$('.btnDashboard').addClass('active')
			$('.panelTitle').text('Dashboard');
		}
		$('.content').load('dashboard/showAllDisp', function (m) {
			laEscoba()
			cargarDisp()
			chartList.map(x => {
				console.log(x.data.datasets)
			})
			dispUpdater = setInterval(updateCharts, 4000)
		})
	})
	$('.btnProfile').on('click', function () {
		if (!$('.btnProfile').hasClass('active')) {
			$('.nav').find('li.active').removeClass('active')
			$('.btnProfile').addClass('active')
			$('.panelTitle').text('Perfil de usuario');
		}
		laEscoba()
		clearInterval(dispUpdater)
		$('.content').load('dashboard/showProfile')
	})
	$('.btnSettings').on('click', function () {
		if (!$('.btnSettings').hasClass('active')) {
			$('.nav').find('li.active').removeClass('active')
			$('.btnSettings').addClass('active')
			$('.panelTitle').text('Configuración de dispositivos');
		}
		laEscoba()
		clearInterval(dispUpdater)
		$('.content').load('dashboard/showSettings')
	})
	$('.btnLogout').on('click', function () {
		if (!$('.btnLogout').hasClass('active')) {
			$('.nav').find('li.active').removeClass('active')
			$('.btnLogout').addClass('active')
		}
		laEscoba()
		clearInterval(dispUpdater)
	})
	$('.btnAdmin').on('click', function () {
		if (!$('.btnAdmin').hasClass('active')) {
			$('.nav').find('li.active').removeClass('active')
			$('.btnAdmin').addClass('active')
			$('.panelTitle').text('Administrador de usuarios');
		}
		laEscoba()
		clearInterval(dispUpdater)
		$('.content').load('dashboard/showAdmin')
	})

	function laEscoba(){
		for (var i = 1; i < 99999; i++)
        window.clearInterval(i);
	}
	var options = {
		elements: {
			line: {
				tension: 0.1
			}
		},
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}],
			xAxes: [{
				ticks: {
					source: 'data'
				},
				type: 'time',
				distribution: 'series',
				time: {
					displayFormats: {
						day: 'MMM D'
					}
				}
			}]
		}
	}

	function cargarDisp() {
		$.ajax({
			type: "post",
			url: "dashboard/dispositivos",
			success: function (res) {
				dispositivos = JSON.parse(res)
				chartList = []
				dispositivos.map(disp => {
					crearDispositivo(disp.serial, disp.nombre, disp.descripcion)
				});
			}
		});
	}

	//Cargar dispositivos
	function crearDispositivo(id, nombre, desc) {
		let disp = `
        <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header card-header-info">
                <canvas id="${id}"></canvas>
              </div>
			  <div class="card-body">
				  <div class="row">
					  <div class="col">
					  	<h4>Nombre: ${nombre}</h4>
					  </div>
					  <div class="col text-right">
					  	<button class="btn btn-info btnDetalles" serial="${id}">Detalles</button>
					  </div>
				  </div>
              </div>
              <div class="card-footer">
                <p>${desc}</p>
              </div>
            </div>
        </div>
		`
		$('.dispContainer').append(disp);
		crearChart(id, (chart) => {
			llenarDatos(id, chart)
		})
	}

	function crearChart(id, chart) {
		var ctx = $('#' + id)
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				datasets: [{
					label: 'vatios medidos',
					borderWidth: 1,
					backgroundColor: 'rgba(66,66,66,0.4)',
					pointBackgroundColor: 'rgba(33,33,33,1)',
					borderColor: 'rgba(33,33,33,1)'
				}]
			},
			options: options
		});
		chart(myChart)
		chartList.push(myChart)
	}

	function llenarDatos(id, chart) {
		$.ajax({
			type: "get",
			url: "dashboard/datos",
			data: {
				serial: id
			},
			success: function (res) {
				let data = []
				JSON.parse(res).reverse().map(d => {
					let newData = {
						x: new Date(d.fecha),
						y: d.vatios
					}
					data.push(newData)
					lastData[id] = d.id
				})
				chart.data.datasets[0].data = data
				chart.update()
			}
		});
	}
	
	function updateData(chart) {
		let serial = chart.canvas.id
		let lastId = lastData[serial]
		//console.log(lastId)
		$.ajax({
			type: "get",
			url: "dashboard/datos",
			data: {
				serial: serial,
				id: lastId
			},
			success: function (res) {
				let actualDatasetsArray = chart.data.datasets[0].data
				JSON.parse(res).reverse().map(d => {
					let newData = {
						x: new Date(d.fecha),
						y: d.vatios
					}
					arrayBuffer(actualDatasetsArray, newData)
					lastData[serial] = d.id
				})
				console.log(lastData[serial])
				chart.update()
			}
		});
	}

	function arrayBuffer(array, newData) {
		if (array.length == 10) {
			array.shift()
			array.push(newData)
		} else {
			array.push(newData)
		}
	}

	function updateCharts() {
		chartList.map(chart => {
			updateData(chart)
		})
	}
	//login - registro
	$('.formLogin').on('submit', function (e) {
		e.preventDefault()
		$('.loginErr').text('')
		$.ajax({
			type: "post",
			url: "login/iniciarSesion",
			data: {
				email: $('.userLogin').val(),
				password: $('.passLogin').val()
			},
			success: function (res) {
				if (res == 'Ok') {
					window.location.href = 'dashboard'
				} else {
					$('.loginErr').text('Error al ingresar, por favor revisa tus credenciales')
				}
			}
		});
	})
	$('.regUsuario').on('focusout', function () {
		if ($('.regUsuario').val()) {
			$.ajax({
				type: "post",
				url: "registro/verificar_nombre_usuario",
				data: {
					username: $('.regUsuario').val()
				},
				success: function (res) {
					if (res == '1') {
						$('.regUsuario').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
						$('.userErr').text('clear')
						$('.userInput').removeClass('has-success')
						$('.userInput').addClass('has-danger')
					} else {
						$('.regUsuario').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #4caf50 1px, rgba(210, 210, 210, 0) 1px)')
						$('.userErr').text('done')
						$('.userInput').removeClass('has-danger')
						$('.userInput').addClass('has-success')
					}
				}
			});
		}
	});
	$('.regCorreo').on('focusout', function () {
		if ($('.regCorreo').val()) {
			$.ajax({
				type: "post",
				url: "registro/verificar_email",
				data: {
					email: $('.regCorreo').val()
				},
				success: function (res) {
					if (res == '1') {
						$('.regCorreo').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
						$('.emailErr').text('clear')
						$('.emailInput').removeClass('has-success')
						$('.emailInput').addClass('has-danger')
					}
				}
			});
		}
	});

	$('.formRegister').on('submit', function (e) {
		e.preventDefault()
		$('.regErr').text('')
		var pass1 = $('.regPass').val()
		var pass2 = $('.regConfPass').val()
		if ((pass1 && pass2) && pass1 == pass2) {
			$.ajax({
				type: "post",
				url: "registro",
				data: {
					nombre: $('.regName').val(),
					apellidos: $('.regApell').val(),
					username: $('.regUsuario').val(),
					email: $('.regCorreo').val(),
					password: $('.regPass').val()
				},
				success: function (res) {
					if (res == 'Ok') {
						window.location.href = 'registro/sendEmailView'
					}
				}
			});
		} else {
			$('.regErr').text('Las contraseñas no coinciden')
			$('.regPass').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
			$('.regConfPass').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
		}
	})
	$('.content').on('click', '.btnAgregar', function (e) {
		e.preventDefault()
		let nombre = $('.addDispNombre').val()
		let serial = $('.addDispSerial').val()
		let desc = $('.addDispDesc').val()
		$.ajax({
			type: "post",
			url: "dashboard/agregar",
			data: {
				nombre: nombre,
				serial: serial,
				descripcion: desc,
				intervalo: '',
			},
			success: function (res) {
				console.log(res)
				if (res == 'Ok') {
					crearDispositivo(serial, nombre, desc)
				}
			}
		});
	})
	$('.content').on('focusout', '.addDispSerial', function () {
		$.ajax({
			type: "get",
			url: "dashboard/dispositivo_disponible",
			data: {
				serial: $('.addDispSerial').val()
			},
			success: function (res) {
				if (res == 'Disponible') {
					$('.addDispSerial').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #4caf50 1px, rgba(210, 210, 210, 0) 1px)')
					$('.errMsg').text('done')
					$('.serialMsg').removeClass('has-danger')
					$('.serialMsg').addClass('has-success')
				} else if (res == 'No disponible') {
					$('.addDispSerial').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
					$('.errMsg').text('clear')
					$('.serialMsg').removeClass('has-success')
					$('.serialMsg').addClass('has-danger')
				} else {
					$('.addDispSerial').css('background-image', 'linear-gradient(to top, #9c27b0 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #f44336 1px, rgba(210, 210, 210, 0) 1px)')
					$('.errMsg').text('clear')
					$('.serialMsg').removeClass('has-success')
					$('.serialMsg').addClass('has-danger')
				}
			}
		});
	})
	$('.content').on('click', '.btnDetalles', function () {
		let id = $(this).attr('serial')
		clearInterval(dispUpdater)
		$('.content').load('dashboard/loadDisp/'+id)
	})
})
