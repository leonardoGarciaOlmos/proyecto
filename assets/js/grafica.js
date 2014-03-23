$(document).ready(function()
{

	var GRAPHICS = parseInt($('#graphics').val());

	switch(GRAPHICS)
	{
		case 1: //Alumnos por carrera
			

			$.getJSON(base_url+'grafica/json_all_alumno_carrera', function(dataCarrera)
			{

				// $( "#container" ).append('<div class="row-fluid">'
				// 		+'<div class="span12">'
				// 			+'<div id="allEstudianteCarrera"></div>'
				// 		+'</div>'
				// 	+'</div>'
				// 	+'<div class="row-fluid">'
				// 		+'<div class="span6"><div id="estudianteSexoCarrera"></div></div>'
				// 		+'<div class="span6"><div id="estudianteSexo"></div></div>'
				// 	+'</div>');

				// Total de alumnos por carrera
				$(function () {
					$('#allEstudianteCarrera').highcharts({
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false
						},
						title: {
							text: 'Total Estudiante por Carrera'
						},
						tooltip: {
							pointFormat: '{series.name}: <b>{point.y}</b>'
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								format: '<b>{point.name}</b>: {point.percentage:.1f} %'
								},
								showInLegend: true
							}
						},
						series: [{
							type: 'pie',
							name: 'Estudiantes',
							data: dataCarrera
						}]
					});
				});

				// Total de alumnos por sexo en carrera
				$(function () {
			        $('#estudianteSexoCarrera').highcharts({
			            chart: {
			                type: 'column'
			            },
			            title: {
			                text: 'Stacked column chart'
			            },
			            xAxis: {
			                categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
			            },
			            yAxis: {
			                min: 0,
			                title: {
			                    text: 'Total fruit consumption'
			                },
			                stackLabels: {
			                    enabled: true,
			                    style: {
			                        fontWeight: 'bold',
			                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
			                    }
			                }
			            },
			            legend: {
			                align: 'right',
			                x: -70,
			                verticalAlign: 'top',
			                y: 20,
			                floating: true,
			                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
			                borderColor: '#CCC',
			                borderWidth: 1,
			                shadow: false
			            },
			            tooltip: {
			                formatter: function() {
			                    return '<b>'+ this.x +'</b><br/>'+
			                        this.series.name +': '+ this.y +'<br/>'+
			                        'Total: '+ this.point.stackTotal;
			                }
			            },
			            plotOptions: {
			                column: {
			                    stacking: 'normal',
			                    dataLabels: {
			                        enabled: true,
			                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
			                        style: {
			                            textShadow: '0 0 3px black, 0 0 3px black'
			                        }
			                    }
			                }
			            },
			            series: [{
			                name: 'John',
			                data: [5, 3, 4, 7, 2]
			            }, {
			                name: 'Jane',
			                data: [2, 2, 3, 2, 1]
			            }, {
			                name: 'Joe',
			                data: [3, 4, 4, 2, 5]
			            }]
			        });
			    });





				$(function () {
			        $('#estudianteSexo').highcharts({
			            chart: {
			                type: 'column'
			            },
			            title: {
			                text: 'Stacked column chart'
			            },
			            xAxis: {
			                categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
			            },
			            yAxis: {
			                min: 0,
			                title: {
			                    text: 'Total fruit consumption'
			                },
			                stackLabels: {
			                    enabled: true,
			                    style: {
			                        fontWeight: 'bold',
			                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
			                    }
			                }
			            },
			            legend: {
			                align: 'right',
			                x: -70,
			                verticalAlign: 'top',
			                y: 20,
			                floating: true,
			                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
			                borderColor: '#CCC',
			                borderWidth: 1,
			                shadow: false
			            },
			            tooltip: {
			                formatter: function() {
			                    return '<b>'+ this.x +'</b><br/>'+
			                        this.series.name +': '+ this.y +'<br/>'+
			                        'Total: '+ this.point.stackTotal;
			                }
			            },
			            plotOptions: {
			                column: {
			                    stacking: 'normal',
			                    dataLabels: {
			                        enabled: true,
			                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
			                        style: {
			                            textShadow: '0 0 3px black, 0 0 3px black'
			                        }
			                    }
			                }
			            },
			            series: [{
			                name: 'John',
			                data: [5, 3, 4, 7, 2]
			            }, {
			                name: 'Jane',
			                data: [2, 2, 3, 2, 1]
			            }, {
			                name: 'Joe',
			                data: [3, 4, 4, 2, 5]
			            }]
			        });
			    });

			});
		break;
	}

});