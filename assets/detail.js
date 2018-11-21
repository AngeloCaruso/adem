$(function () {
	var lastData = []
	var hFrom
	var hTo
	var onlyUpdater
	var day = $('#datePicker').datepicker().data('datepicker')
	var dayRange = $('.dayRange').datepicker().data('datepicker')
	var timeFrom = $('#timeFrom').datepicker({
		timepicker: true
	}).data('datepicker')
	var timeTo = $('#timeTo').datepicker({
		timepicker: true
	}).data('datepicker')
	var serial = $('.serial').text()
	let filterGraph = $('#filterGraph')
	let lineGraph = $('#lineGraph')
	let barGraph = $('#barGraph')
	
	function parseDate(date) {
		let newDate = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`
		return newDate
	}

	function parseDateTime(date) {
		let newDate = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`
		return newDate
	}
	var optionsLine = {
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
						hour: 'hA'
					}
				}
			}]
		}
	}

	var filterChart = new Chart(filterGraph, {
		type: 'line',
		data: {
			datasets: [{
				label: 'vatios medidos',
				borderWidth: 1,
				backgroundColor: 'rgba(66,66,66,0.4)',
				pointBackgroundColor: 'rgba(33,33,33,1)',
				borderColor: 'rgba(33,33,33,1)',
			}]
		},
		options: optionsLine
	});

	var barChart = new Chart(barGraph, {
		type: 'bar',
		data: {
			labels: [],
			datasets: [{
				label: 'Promedio por dias',
				data: [],
				backgroundColor: 'rgba(66,66,66,0.4)',
				pointBackgroundColor: 'rgba(33,33,33,1)',
				borderColor: 'rgba(33,33,33,1)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});

	var bigChart = new Chart(lineGraph, {
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
		options: optionsLine
	});

	llenarDatos(serial, bigChart)

	function llenarDatos(id, chart) {
		$.ajax({
			type: "get",
			url: "dashboard/datos",
			data: {
				serial: id,
				limit: 20
			},
			success: function (res) {
				let data = []
				JSON.parse(res).reverse().map(d => {
					let newData = {
						x: new Date(d.fecha),
						y: d.vatios
					}
					data.push(newData)
				})
				lastData[id] = JSON.parse(res)[0].id
				chart.data.datasets[0].data = data
				chart.update()
			}
		});
	}

	function updateCharts() {
		updateData(bigChart)
	}

	function updateData(chart) {
		let lastId = lastData[serial]
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
				bigChart.update()
			}
		});
	}

	function arrayBuffer(array, newData) {
		if (array.length == 25) {
			array.shift()
			array.push(newData)
		} else {
			array.push(newData)
		}
	}
	timeFrom.opts.onHide = (date, animation) => {
		if (animation) {
			hFrom = parseDateTime(date.selectedDates[0])
		}
	}
	timeTo.opts.onHide = (date, animation) => {
		if (animation) {
			hTo = parseDateTime(date.selectedDates[0])
		}
	}
	$('.btnFiltrar').on('click', function () {
		$.ajax({
			type: "get",
			url: "dashboard/prom_dias",
			data: {
				serial: serial
			},
			success: function (res) {
				let dataLabels = []
				let data = []
				JSON.parse(res).map(d => {
					dataLabels.push(d.fecha)
					data.push(d.prom_vatios)
				})
				filterGraph.hide()
				barGraph.show()
				barChart.data.labels = dataLabels
				barChart.data.datasets[0].data = data
				barChart.update()
			}
		});
	})

	$('.btnHoras').on('click', function () {
		if (hFrom != '' && hTo != '') {
			$.ajax({
				type: "get",
				url: "dashboard/loadHourRange",
				data: {
					serial: serial,
					from: hFrom,
					to: hTo
				},
				success: function (res) {
					console.log(res)
					let data = []
					JSON.parse(res).map(d => {
						let act = {
							x: d.fecha,
							y: d.vatios
						}
						data.push(act)
					})
					barGraph.hide()
					filterGraph.show()
					filterChart.data.datasets[0].data = data
					filterChart.update()
				}
			});
		}
	})

	day.opts.onSelect = (d, dateObj) => {
		let date = parseDate(dateObj)
		//console.log(date['date'],date['month'],date['year'])
		$.ajax({
			type: "get",
			url: "dashboard/loadDayFilter",
			data: {
				serial: serial,
				date: date
			},
			success: function (res) {
				console.log(res)
				let data = []
				JSON.parse(res).map(d => {
					let act = {
						x: d.fecha,
						y: d.vatios
					}
					data.push(act)
				})
				barGraph.hide()
				filterGraph.show()
				filterChart.data.datasets[0].data = data
				filterChart.update()
			}
		});
	}
	dayRange.opts.onHide = (date, animation) => {
		if (animation) {
			let from = parseDate(date.selectedDates[0])
			let to = parseDate(date.selectedDates[1])
			console.log(from, to)
			$.ajax({
				type: "get",
				url: "dashboard/loadDateRange",
				data: {
					serial: serial,
					from: from,
					to: to
				},
				success: function (res) {
					let data = []
					JSON.parse(res).map(d => {
						let act = {
							x: d.fecha,
							y: d.vatios
						}
						data.push(act)
					})
					barGraph.hide()
					filterGraph.show()
					filterChart.data.datasets[0].data = data
					console.log(filterChart.data.datasets[0].data)
					filterChart.update()
				}
			});
		}
	}

	onlyUpdater = setInterval(updateCharts, 1500)
})
