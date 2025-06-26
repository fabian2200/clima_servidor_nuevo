<template lang="">
    <div>
        <loading :active="loading" 
            :can-cancel="true"
            loader="bars" 
            color="#38b4c5"
            :height=100
            :width=200
            :on-cancel="onCancel"
            :is-full-page="true">
        </loading>
        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
            <div style="width: 1000px" class="card">
                <br>
                <div class="row" style="padding: 10px">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-3" style="text-align: right">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="generarPDF"
                        >
                            Descargar este Informe <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                    <div class="col-lg-3" style="text-align: left">
                        <button
                            data-toggle="modal" data-target="#modalInformes"
                            type="button"
                            class="btn btn-warning"
                        >
                            Descargar otro Informe    <i class="fas fa-file-pdf"></i>
                        </button>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="modalInformes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Seleccione un tipo de informe</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button @click="irPaginaInforme('/informe-socio/'+id_empresa)" type="button" class="btn_informe btn btn-outline-primary">Informe <br> Sociodemográfico</button>
                                    </div>  
                                    <div class="col-lg-6">
                                        <button @click="irPaginaInforme('/informe-general-dimensiones/'+id_empresa)" type="button" class="btn_informe btn btn-outline-success">Informe General <br> de Dimensiones</button>
                                    </div> 
                                    <div class="col-lg-6">
                                        <button @click="irPaginaInforme('/comparacion-dimensiones/'+id_empresa)" type="button" class="btn_informe btn btn-outline-info">Comparación <br> de Dimensiones</button>
                                    </div>  
                                    <div class="col-lg-6">
                                        <button @click="irPaginaInforme('/fortalezas-debilidades-fortalecer/'+id_empresa)" type="button" class="btn_informe btn btn-outline-secondary">Fortalezas <br> y <br> Debilidades</button>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="loading2 == false" id="area_informe" class="card-content" style="padding: 0px 100px 90px 110px; margin-right: 70px">
                    <br>
                    <h3 style="font-weight: bold">Informe sociodemográfico</h3>
                    <hr>
                    <div style="text-align: left">
                        <br><br>
                        <h4 style="width: 100%; text-align: left">De un total de  ({{total_personas}}) Empleados que respondieron el test, se tiene que: </h4>
                        <br><br>
                        <strong><p style='margin: 0px;'>Figura 1</p></strong>
                        <p style='margin-right: 40px'><i>Población distribuida por  sexo</i></p>
                        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                            <div id="grafica_sexo" style="height: 260px; width: 600px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 2</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  edad</i></p>
                            <br>
                        <div>
                            <div id="grafica_edad" style="height: 290px; width: 800px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 3</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  nivel de educación</i></p>
                            <br>
                        <div>
                            <div id="grafica_nivel_educacion" style="height: 360px; width: 800px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 4</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  estado civil</i></p>
                            <br>
                        <div>
                            <div id="grafica_estado_civil" style="height: 360px; width: 800px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 5</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  tiempo que lleva en el cargo</i></p>
                            <br>
                        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                            <div id="grafica_tiempo_cargo" style="height: 260px; width: 600px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 6</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  tiempo de antigüedad en el cargo</i></p>
                            <br>
                        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                            <div id="grafica_tiempo_antiguedad" style="height: 260px; width: 600px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 7</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  salario</i></p>
                            <br>
                        <div>
                            <div id="grafica_salario" style="height: 360px; width: 800px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 8</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  estrato socioeconómico</i></p>
                            <br>
                        <div>
                            <div id="grafica_estrato" style="height: 360px; width: 800px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 9</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  ciudad donde trabaja</i></p>
                            <br>
                        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                            <div id="grafica_ciudad" style="height: 260px; width: 600px;"></div>
                            <br><br>
                        </div>
                        <strong><p style='margin: 0px;'>Figura 10</p></strong>
                            <p style='margin-right: 40px'><i>Población distribuida por  departamento/area</i></p>
                            <br>
                        <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
                            <div id="grafica_area" style="height: 260px; width: 700px;"></div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div> 
        </div>       
    </div>
</template>
<script>
import * as clienteService from "../../services/cliente_service";
import Loading from 'vue3-loading-overlay';
import Swal from 'sweetalert2';

import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import html2canvas from 'html2canvas';

am4core.useTheme(am4themes_animated);

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            loading2: true,
            data_informe: {},
            id_empresa: null,
            chart_sexo: null,
            total_personas: 0,
            chart1: null, 
            chart2: null, 
            chart3: null, 
            chart4: null, 
            chart5: null, 
            chart6: null, 
            chart7: null, 
            chart8: null, 
            chart9: null, 
            chart10: null
        }
    },
    mounted() {
        this.id_empresa = this.$route.params.id;
        this.consultarDatosInformeSocio();
    },
    methods: {
        async consultarDatosInformeSocio(){
            this.loading = true;
            this.loading2 = true;
            await clienteService.consultarDatosInformeSocio(this.id_empresa).then(respuesta => {
                this.data_informe = respuesta.data;
                this.loading = false;
                this.loading2 = false;
                setTimeout(()=>{
                    this.generarGraficoSexo();
                    this.generarGraficoEdad();
                    this.generarGraficoEducacion();
                    this.generarGraficoEstadoCivil();
                    this.generarGraficoTiempoCargo();
                    this.generarGraficoTiempoAntiguedad();
                    this.generarGraficoSalario();
                    this.generarGraficoEstrato();
                    this.generarGraficoCiudad();
                    this.generarGraficoArea();
                }, 500)
            });
        },
        generarGraficoSexo() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#47cf73")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);
            var chart = am4core.create("grafica_sexo", am4charts.PieChart3D);
            this.total_personas = parseInt(this.data_informe.por_sexo[0].total) + parseInt(this.data_informe.por_sexo[1].total);
            // Add data
            chart.data = [
                {
                    "country": this.data_informe.por_sexo[0].sexo,
                    "litres": this.data_informe.por_sexo[0].total,
                },
                {
                    "country": this.data_informe.por_sexo[1].sexo,
                    "litres": this.data_informe.por_sexo[1].total,
                }
            ];

            var pieSeries = chart.series.push(new am4charts.PieSeries3D());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart1 = chart;

            this.agregardivblanco("grafica_sexo");
        },
        generarGraficoEdad() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_edad', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_informe.por_edad.forEach(element => {
                chart.data.push({
                    country: element.edad + " Años",
                    visits: Math.round((element.total / this.total_personas) * 1000) / 10,
                });
            });

            // Create axes
            let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.inversed = true; // Invierte el eje para hacerlo horizontal
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.fontSize = 12;

            let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.max = 100;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueX = "visits"; // Use valueX en lugar de valueY
            series.dataFields.categoryY = "country"; // Use categoryY en lugar de categoryX
            series.name = "Visits";
            series.tooltipText = "{categoryY} Años: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 2;
            series.columns.template.strokeOpacity = 1;
            series.columns.template.stroke = am4core.color("#FFFFFF");
            series.columns.template.fillOpacity = 0.8;
            series.columns.template.maxHeight = 40;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueX}%";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.fontSize = 14;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.width = 70;
            labelBullet.label.dy = -7;
            labelBullet.label.dx = 38;
            labelBullet.label.truncate = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart2 = chart;

            this.agregardivblanco("grafica_edad");
        },
        generarGraficoEducacion() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#ff7588")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_nivel_educacion', am4charts.XYChart3D);

            chart.data = [];

            this.data_informe.por_nivel_educacion.forEach(element => {
                chart.data.push({
                    country: element.nivel_educacion,
                    visits: Math.round((element.total / this.total_personas) * 1000) / 10,
                });
            });

            // Create axes
            let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.inversed = true; // Invierte el eje para hacerlo horizontal
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.fontSize = 12;

            let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueX = "visits"; // Use valueX en lugar de valueY
            series.dataFields.categoryY = "country"; // Use categoryY en lugar de categoryX
            series.name = "Visits";
            series.tooltipText = "{categoryY} Años: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 2;
            series.columns.template.strokeOpacity = 1;
            series.columns.template.stroke = am4core.color("#FFFFFF");
            series.columns.template.fillOpacity = 0.8;
            series.columns.template.maxHeight = 40;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueX}%";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.fontSize = 14;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.width = 70;
            labelBullet.label.dy = -7;
            labelBullet.label.dx = 38;
            labelBullet.label.truncate = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart3 = chart;

            this.agregardivblanco("grafica_nivel_educacion");
        },
        generarGraficoEstadoCivil() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#ff7588")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_estado_civil', am4charts.XYChart3D);

            chart.data = [];

            this.data_informe.por_estado_civil.forEach(element => {
                chart.data.push({
                    country: element.estado_civil,
                    visits: Math.round((element.total / this.total_personas) * 1000) / 10,
                });
            });

            // Create axes
            let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.inversed = true; // Invierte el eje para hacerlo horizontal
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.fontSize = 12;
            categoryAxis.renderer.labels.template.wrap = true; // Permite que las etiquetas se envuelvan en múltiples líneas
            categoryAxis.renderer.labels.template.maxWidth = 120;

            let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueX = "visits"; // Use valueX en lugar de valueY
            series.dataFields.categoryY = "country"; // Use categoryY en lugar de categoryX
            series.name = "Visits";
            series.tooltipText = "{categoryY} Años: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 2;
            series.columns.template.strokeOpacity = 1;
            series.columns.template.stroke = am4core.color("#FFFFFF");
            series.columns.template.fillOpacity = 0.8;
            series.columns.template.maxHeight = 40;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueX}%";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.fontSize = 14;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.width = 70;
            labelBullet.label.dy = -7;
            labelBullet.label.dx = 38;
            labelBullet.label.truncate = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart4 = chart;

            this.agregardivblanco("grafica_estado_civil");
        },
        generarGraficoTiempoCargo() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#47cf73")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);
            var chart = am4core.create("grafica_tiempo_cargo", am4charts.PieChart3D);
            // Add data
            chart.data = [];

            
            this.data_informe.por_tiempo_cargo.forEach(element => {
                chart.data.push({
                    country: element.tiempo_cargo,
                    litres: element.total,
                });
            });

            var pieSeries = chart.series.push(new am4charts.PieSeries3D());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart5 = chart;

            this.agregardivblanco("grafica_tiempo_cargo")
        },
        generarGraficoTiempoAntiguedad() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#47cf73")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);
            var chart = am4core.create("grafica_tiempo_antiguedad", am4charts.PieChart3D);
            // Add data
            chart.data = [];

            
            this.data_informe.por_tiempo_antiguedad.forEach(element => {
                chart.data.push({
                    country: element.tiempo_entidad,
                    litres: element.total,
                });
            });


            var pieSeries = chart.series.push(new am4charts.PieSeries3D());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart6 = chart;

            this.agregardivblanco("grafica_tiempo_antiguedad");
        },
        generarGraficoSalario() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#ff7588")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_salario', am4charts.XYChart3D);

            chart.data = [];

            this.data_informe.por_salario.forEach(element => {
                chart.data.push({
                    country: element.salario_actual,
                    visits: Math.round((element.total / this.total_personas) * 1000) / 10,
                });
            });


            // Create axes
            let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.inversed = true; // Invierte el eje para hacerlo horizontal
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.fontSize = 12;
            categoryAxis.renderer.labels.template.wrap = true; // Permite que las etiquetas se envuelvan en múltiples líneas
            categoryAxis.renderer.labels.template.maxWidth = 120;

            let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueX = "visits"; // Use valueX en lugar de valueY
            series.dataFields.categoryY = "country"; // Use categoryY en lugar de categoryX
            series.name = "Visits";
            series.tooltipText = "{categoryY}: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 2;
            series.columns.template.strokeOpacity = 1;
            series.columns.template.stroke = am4core.color("#FFFFFF");
            series.columns.template.fillOpacity = 0.8;
            series.columns.template.maxHeight = 40;
            

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueX}%";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.fontSize = 14;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.width = 70;
            labelBullet.label.dy = -7;
            labelBullet.label.dx = 38;
            labelBullet.label.truncate = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart7 = chart;

            this.agregardivblanco("grafica_salario");
        },
        generarGraficoEstrato() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_estrato', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_informe.por_estrato.forEach(element => {
                chart.data.push({
                    country: element.estrato,
                    visits: Math.round((element.total / this.total_personas) * 1000) / 10,
                });
            });


            // Create axes
            let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.inversed = true; // Invierte el eje para hacerlo horizontal
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.fontSize = 12;

            let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.max = 100;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueX = "visits"; // Use valueX en lugar de valueY
            series.dataFields.categoryY = "country"; // Use categoryY en lugar de categoryX
            series.name = "Visits";
            series.tooltipText = "{categoryY} Años: [bold]{valueX}[/]";
            series.columns.template.strokeWidth = 2;
            series.columns.template.strokeOpacity = 1;
            series.columns.template.stroke = am4core.color("#FFFFFF");
            series.columns.template.fillOpacity = 0.8;
            series.columns.template.maxHeight = 40;

            var columnTemplate = series.columns.template;
            columnTemplate.strokeWidth = 2;
            columnTemplate.strokeOpacity = 1;
            columnTemplate.stroke = am4core.color("#FFFFFF");

            columnTemplate.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            columnTemplate.adapter.add("stroke", function(stroke, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })

            var labelBullet = series.bullets.push(new am4charts.LabelBullet());
            labelBullet.label.text = "{valueX}%";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.fontSize = 14;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.width = 70;
            labelBullet.label.dy = -7;
            labelBullet.label.dx = 38;
            labelBullet.label.truncate = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart8 = chart;

            this.agregardivblanco("grafica_estrato");
        },
        generarGraficoCiudad() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#47cf73")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);
            var chart = am4core.create("grafica_ciudad", am4charts.PieChart3D);
            // Add data
            chart.data = [];

            
            this.data_informe.por_ciudad.forEach(element => {
                chart.data.push({
                    country: element.ciudad,
                    litres: element.total,
                });
            });


            var pieSeries = chart.series.push(new am4charts.PieSeries3D());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart9 = chart;

            this.agregardivblanco("grafica_ciudad");
        },
        generarGraficoArea() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#47cf73")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);
            var chart = am4core.create("grafica_area", am4charts.PieChart3D);
            // Add data
            chart.data = [];

            
            this.data_informe.por_area.forEach(element => {
                chart.data.push({
                    country: element.nombre_area,
                    litres: element.total,
                });
            });

            var pieSeries = chart.series.push(new am4charts.PieSeries3D());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;

            pieSeries.hiddenState.properties.opacity = 1;
            pieSeries.hiddenState.properties.endAngle = -90;
            pieSeries.hiddenState.properties.startAngle = -90;

            chart.hiddenState.properties.radius = am4core.percent(0);

            this.chart10 = chart;

            this.agregardivblanco("grafica_area");
        },
        agregardivblanco(id){
            var div = document.getElementById(id);
            div.style.position = "relative";
            var divBlanco = document.createElement("div");
            divBlanco.style.width = "77px";
            divBlanco.style.height = "31px";
            divBlanco.style.backgroundColor = "white";
            divBlanco.style.position = "absolute";
            divBlanco.style.left = "0";
            divBlanco.style.bottom = "-2px";
            div.appendChild(divBlanco);
        },
        async generarPDF(){
            Swal.fire({
                title: 'Generando informe',
                html: '<p>Por favor espera, este proceso puede tardar varios minutos, no cierre esta ventana...</p> <br> <div class="progress" style="margin-bottom: 5px !important"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="barra_progreso" style="width: 0%"></div></div><div><h3 style="font-weight: bold" id="letras_progreso">0%</h3></div>',
                allowOutsideClick: false,
                showConfirmButton: false,
            });
           
            document.getElementById("barra_progreso").style.width = "5%";
            document.getElementById("letras_progreso").innerText = "5%";
            
            setTimeout(()=>{
                this.GPDF();
            }, 500)
        },
        async GPDF(){
            try {
                
                var base1 = "";
                var base2 = "";
                var base3 = "";
                var base4 = "";
                var base5 = "";
                var base6 = "";
                var base7 = "";
                var base8 = "";
                var base9 = "";
                var base10 = "";

                await this.chart1.exporting.getImage("png").then((dataUrl) => {
                    base1 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "10%";
                    document.getElementById("letras_progreso").innerText = "10%";
                });

                // Exportar el segundo gráfico
                await this.chart2.exporting.getImage("png").then((dataUrl) => {
                    base2 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "20%";
                    document.getElementById("letras_progreso").innerText = "20%";
                });

                // Exportar el tercer gráfico
                await this.chart3.exporting.getImage("png").then((dataUrl) => {
                    base3 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "30%";
                    document.getElementById("letras_progreso").innerText = "30%";
                });

                // Exportar el cuarto gráfico
                await this.chart4.exporting.getImage("png").then((dataUrl) => {
                    base4 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "40%";
                    document.getElementById("letras_progreso").innerText = "40%";
                });

                // Exportar el quinto gráfico
                await this.chart5.exporting.getImage("png").then((dataUrl) => {
                    base5 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "50%";
                    document.getElementById("letras_progreso").innerText = "50%";
                });

                // Exportar el sexto gráfico
                await this.chart6.exporting.getImage("png").then((dataUrl) => {
                    base6 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "60%";
                    document.getElementById("letras_progreso").innerText = "60%";
                });

                // Exportar el séptimo gráfico
                await this.chart7.exporting.getImage("png").then((dataUrl) => {
                    base7 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "70%";
                    document.getElementById("letras_progreso").innerText = "70%";
                });

                // Exportar el octavo gráfico
                await this.chart8.exporting.getImage("png").then((dataUrl) => {
                    base8 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "80%";
                    document.getElementById("letras_progreso").innerText = "80%";
                });

                // Exportar el noveno gráfico
                await this.chart9.exporting.getImage("png").then((dataUrl) => {
                    base9 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "90%";
                    document.getElementById("letras_progreso").innerText = "90%";
                });

                // Exportar el décimo gráfico
                await this.chart10.exporting.getImage("png").then((dataUrl) => {
                    base10 = dataUrl;
                    document.getElementById("barra_progreso").style.width = "100%";
                    document.getElementById("letras_progreso").innerText = "100%";
                });

                var bases = {
                    base1: base1,
                    base2: base2,
                    base3: base3,
                    base4: base4,
                    base5: base5,
                    base6: base6,
                    base7: base7,
                    base8: base8,
                    base9: base9,
                    base10: base10,
                    total_personas: this.total_personas,
                    fileName: "Informe_Socio_"+this.id_empresa,
                };

                await clienteService.generarPDFSocio(bases).then(respuesta => {
                    var url = respuesta.data.url; 
                    if (url) {
                        Swal.fire({
                            title: 'Descargar PDF',
                            text: 'El PDF está listo para descargar. ¿Deseas proceder?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonText: 'Descargar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var enlace = document.createElement('a');
                                enlace.href = url;
                                enlace.download = "Informe_Socio.pdf";
                                enlace.click();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Advertencia',
                            text: 'No se recibió una URL para descargar el PDF.',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                    this.loading = false;                   
                });
                
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo generar el PDF. Por favor, inténtelo de nuevo más tarde.',
                    confirmButtonText: 'Aceptar'
                });
            }  finally {
                this.loading = false;
            }
        },
        irPaginaInforme(ruta){
            $("#modalInformes").modal('hide');
            location.href = ruta;
        }
    },
}
</script>
<style>
    .pagina-salto {
        page-break-after: always;
    }
</style>