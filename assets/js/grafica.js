$(document).ready(function()
{

	var GRAPHICS = parseInt($('#graphics').val());

	switch(GRAPHICS)
	{
		case 1: //Alumnos por carrera
			var tag =  '<div class="row-fluid">';
				tag +=  '<div class="span12">';
				tag +=  '<div id="allEstudianteCarrera"></div>';
				tag +=  '</div>';
				tag +=  '</div>';
				tag +=  '<hr>';

				tag +=	'<div class="row-fluid">';
				tag +=  '<div class="span12">';
				tag +=  '<div id="allEstudianteEdad"></div>';
				tag +=  '</div>';
				tag +=	'</div>';
				tag +=  '<hr>';

				tag +=  '<div class="row-fluid">';
				tag +=  '<div class="span6">';
				tag +=  '<div id="estudianteSexoCarrera"></div>';
				tag +=  '</div>';
				tag +=  '<div class="span6">';
				tag +=  '<div id="estudianteNivelCarrera"></div>';
				tag +=  '</div>';
				tag +=  '</div>';
				tag +=  '<hr>';

				tag +=  '<div class="row-fluid">';
				tag +=  '<div class="span6">';
				tag +=  '<div id="tipoUsuario"></div>';
				tag +=  '</div>';
				tag +=  '<div class="span6">';
				tag +=  '<div id="estudianteNivelCarrera"></div>';
				tag +=  '</div>';
				tag +=  '</div>';
				tag +=  '<hr>';

			$('#container').append(tag);


			// Total de alumnos por carrera
			$.getJSON(base_url+'grafica/json_all_alumno_carrera', function(dataCarrera)
			{
				pieChart('Total Estudiante por Carrera', dataCarrera, $('#allEstudianteCarrera'));
			});

			// Total de alumnos de edad
			$.getJSON(base_url+'grafica/json_all_alumno_edad', function(dataCarrera)
			{
				pieChart('Total Estudiante por Edad', dataCarrera, $('#allEstudianteEdad'));
			});

			// Total de alumnos por carrera por sexo
			$.getJSON(base_url+'grafica/json_all_alumno_carrera_sexo', function(dataCarrera)
			{
				var carrera = new Array();
				var sexo = new Array();
				var infoSexoM = new Object();
				var infoSexoF = new Object();
				infoSexoM.data = new Array();
				infoSexoF.data = new Array();
				var ind = 0;

				$.each(dataCarrera, function(key, value)
				{
					if(value.carrera != carrera[ind])
					{ carrera[ind] = value.carrera; }
					else
						ind++;

					if(value.sexo == 'F')
					{
						infoSexoF.name = 'Femenino';
						infoSexoF.data.push(parseInt(value.estudiante));
						sexo[0] = infoSexoF;
					}
					else if(value.sexo == 'M')
					{
						infoSexoM.name = 'Masculino';
						infoSexoM.data.push(parseInt(value.estudiante));
						sexo[1] = infoSexoM;
					}
				});

				stackedColumn('Total estudiante por carrera', carrera, sexo, $('#estudianteSexoCarrera'));

			});

			// Total de alumnos por carrera por nivel
			$.getJSON(base_url+'grafica/json_all_alumno_nivel', function(dataCarrera)
			{
				pieChart('Total Estudiante por Carrera Nivel', dataCarrera, $('#estudianteNivelCarrera'));
			});

			// Total de usuarios tipo
			$.getJSON(base_url+'grafica/json_all_tipo_usuario_tipo', function(dataCarrera)
			{
				pieChart('Total Usuario tipo', dataCarrera, $('#tipoUsuario'));
			});
			
		break;
	}

});




function stackedColumn(title, valueX, valueY, container)
{
		container.highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: title
			},
			xAxis: {
				categories: valueX//['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
			},
			yAxis: {
				min: 0,
				title: {
					text: title
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
			series: valueY
			// [{
			// 	name: 'John',
			// 	data: [5, 3, 4, 7, 2]
			// }, 
			// {
			// 	name: 'Jane',
			// 	data: [2, 2, 3, 2, 1]
			// }, 
			// {
			// 	name: 'Joe',
			// 	data: [3, 4, 4, 2, 5]
			// }]
		});
}


function pieChart(title, data, tag)
{
	tag.highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false
		},
		title: {
			text: title
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
			data: data
		}]
	});
}



function semiCircleDonut(title, data, tag)
{
    tag.highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: title,
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '50%',
            data: data
        }]
    });
}