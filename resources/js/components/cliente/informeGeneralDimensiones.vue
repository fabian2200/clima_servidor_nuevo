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
                            Descargar otro Informe <i class="fas fa-file-pdf"></i>
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
                
                <div v-if="loading2 == false" id="area_informe" class="card-content" style="padding: 60px;">
                    <br>
                    <div style="text-align: left">
                        <br>
                        <h3><strong>VALORACIÓN DEL CLIMA ORGANIZACIONAL</strong></h3>
                        <br>
                        <h6>A continuación se presentan los resultados de la valoración del clima organizacional, de la <strong>(figura 11)</strong> hasta la <strong>(figura 21)</strong> Se presentan los promedios de todas las dimensiones y posteriormente, los de cada dimensión y de los aspectos que componen cada una de ellas.</h6>
                        <br>
                        <br>
                        <hr>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 11</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración general del clima organizacional por dimensiones</i></p>
                            <div id="grafica_general" style="height: 450px;"></div>
                            <br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 12</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Funciones y Entrenamiento</i></p>
                            <div id="grafica_dim1" style="height: 340px;"></div>
                            <br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 13</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Autonomía</i></p>
                            <div id="grafica_dim2" style="height: 340px;"></div>
                            <br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 14</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Recompensa Directa</i></p>
                            <div id="grafica_dim3" style="height: 340px;"></div>
                            <br><br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 15</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Relaciones Interpersonales</i></p>
                            <div id="grafica_dim4" style="height: 340px;"></div>
                            <br><br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 16</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Cooperación</i></p>
                            <br><br>
                            <div id="grafica_dim5" style="height: 340px;"></div>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 17</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Libre Expresión</i></p>
                            <div id="grafica_dim6" style="height: 340px;"></div>
                            <br><br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 18</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Identidad</i></p>
                            <div id="grafica_dim7" style="height: 340px;"></div>
                            <br><br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 19</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Motivación Institucional</i></p>
                            <div id="grafica_dim8" style="height: 340px;"></div>
                            <br><br>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 20</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Satisfacción Laboral</i></p>
                            <br><br>
                            <div id="grafica_dim9" style="height: 340px;"></div>
                        </div>
                        <div>
                            <strong><p style='margin: 0px;'>Figura 21</p></strong>
                            <p style='margin-right: 40px'><i>Promedio de la valoración de los  aspectos de la dimensión Comunicación</i></p>
                            <div id="grafica_dim10" style="height: 340px;"></div>
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
am4core.useTheme(am4themes_animated);
import html2canvas from 'html2canvas';

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            loading2: true,
            data_general: {},
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
            chart10: null,
            chart11: null,
        }
    },
    mounted() {
        this.id_empresa = this.$route.params.id;
        this.informeGeneralDimensiones();
    },
    methods: {
        async informeGeneralDimensiones(){
            this.loading = true;
            this.loading2 = true;
            await clienteService.informeGeneralDimensiones(this.id_empresa).then(respuesta => {
                this.data_general = respuesta.data;
                this.loading = false;
                this.loading2 = false;
                setTimeout(()=>{
                   this.generarGraficoGeneral();
                   this.generarDim1();
                   this.generarDim2();
                   this.generarDim3();
                   this.generarDim4();
                   this.generarDim5();
                   this.generarDim6();
                   this.generarDim7();
                   this.generarDim8();
                   this.generarDim9();
                   this.generarDim10();
                }, 500)
            });
        },
        generarGraficoGeneral() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_general', am4charts.XYChart3D);
            chart.data = [];
            
            chart.data.push({
                country: "1. FUNCIONES Y ENTRENAMIENTO",
                visits: this.data_general.general.dim1,
            });

            chart.data.push({
                country: "2. AUTONOMÍA",
                visits: this.data_general.general.dim2,
            });

            chart.data.push({
                country: "3. RECOMPENSA DIRECTA",
                visits: this.data_general.general.dim3,
            });

            chart.data.push({
                country: "4. RELACIONES INTERPERSONALES",
                visits: this.data_general.general.dim4,
            });

            chart.data.push({
                country: "5. COOPERACIÓN",
                visits: this.data_general.general.dim5,
            });

            chart.data.push({
                country: "6. LIBRE EXPRESIÓN",
                visits: this.data_general.general.dim6,
            });

            chart.data.push({
                country: "7. IDENTIDAD",
                visits: this.data_general.general.dim7,
            });

            chart.data.push({
                country: "8. MOTIVACIÓN INSTITUCIONAL",
                visits: this.data_general.general.dim8,
            });

            chart.data.push({
                country: "9. SATISFACCIÓN LABORAL",
                visits: this.data_general.general.dim9,
            });

            chart.data.push({
                country: "10. COMUNICACIÓN",
                visits: this.data_general.general.dim10,
            });
           

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.rotation = -65;
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.dx = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.fontSize = 10;
            categoryAxis.tooltip.label.rotation = -49;
            categoryAxis.tooltip.label.horizontalCenter = "right";
            categoryAxis.tooltip.label.verticalCenter = "middle";

            
            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
            labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 12;
            labelBullet.label.dy = -12;
            labelBullet.label.dy = 10;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart1 = chart;

           this.agregardivblanco("grafica_general");
        },
        generarDim1() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim1', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim1_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart2 = chart;

            this.agregardivblanco("grafica_dim1");
        },
        generarDim2() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#e83e8c")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim2', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim2_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });


            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart3 = chart;

            this.agregardivblanco("grafica_dim2");
        },
        generarDim3() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim3', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim3_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });


            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart4 = chart;

            this.agregardivblanco("grafica_dim3");
        },
        generarDim4() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#e83e8c")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim4', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim4_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart5 = chart;

            this.agregardivblanco("grafica_dim4");
        },
        generarDim5() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim5', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim5_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart6 = chart;

            this.agregardivblanco("grafica_dim5");
        },
        generarDim6() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#e83e8c")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim6', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim6_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;
            
            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart7 = chart;

            this.agregardivblanco("grafica_dim6");
        },
        generarDim7() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim7', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim7_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            
            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart8 = chart;

            this.agregardivblanco("grafica_dim7");
        },
        generarDim8() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#e83e8c")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim8', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim8_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart9 = chart;

            this.agregardivblanco("grafica_dim8");
        },
        generarDim9() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#63b5f7")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim9', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim9_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            
            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;


            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart10 = chart;

            this.agregardivblanco("grafica_dim9");
        },
        generarDim10() {
            function am4themes_myTheme(target) {
                if (target instanceof am4core.ColorSet) {
                    target.list = [
                    am4core.color("#e83e8c")
                    ];
                }
            }
            am4core.useTheme(am4themes_myTheme);

            var chart = am4core.create('grafica_dim10', am4charts.XYChart3D);
        
            chart.data = [];

            this.data_general.dim10_promedios.forEach(element => {
                chart.data.push({
                    country: element.pregunta,
                    visits: element.promedio,
                });
            });

            // Create axes
            let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.labels.template.hideOversized = false;
            categoryAxis.renderer.minGridDistance = 20;
            categoryAxis.renderer.labels.template.horizontalCenter = "middle";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.tooltip.label.horizontalCenter = "middle";
            categoryAxis.tooltip.label.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.wrap = true; 
            categoryAxis.renderer.labels.template.maxWidth = 130;
            categoryAxis.renderer.labels.template.textAlign = "middle";
            categoryAxis.renderer.labels.template.fontSize = 11;

            let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.title.text = "";
            valueAxis.title.fontWeight = "bold";
            valueAxis.min = 1; 
            valueAxis.max = 4; 
            valueAxis.strictMinMax = true;
            valueAxis.renderer.minGridDistance = 20;
            valueAxis.renderer.grid.template.disabled = false;

            // Configura los incrementos del eje Y
            valueAxis.renderer.grid.template.stroke = am4core.color("#000");
            valueAxis.renderer.grid.template.strokeOpacity = 0.2;
            valueAxis.renderer.grid.template.strokeWidth = 1;
            valueAxis.renderer.step = 0.5; // Incrementos de 0.5

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries3D());
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.name = "Visits";
            series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
            series.columns.template.fillOpacity = .8;
            series.columns.template.width = 40;

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
             labelBullet.label.text = "{valueY.formatNumber('#.0')}";
            labelBullet.label.fill = am4core.color("#000000");
            labelBullet.label.horizontalCenter = "middle";
            labelBullet.label.verticalCenter = "middle";
            labelBullet.label.fontSize = 13;
            labelBullet.label.dy = 15;
            labelBullet.label.fontWeight = "bold";
            labelBullet.label.hideOversized = false;

            labelBullet.label.paddingTop = 5;
            labelBullet.label.paddingBottom = 5;
            labelBullet.label.paddingLeft = 5;
            labelBullet.label.paddingRight = 5;

            chart.cursor = new am4charts.XYCursor();
            chart.cursor.lineX.strokeOpacity = 0;
            chart.cursor.lineY.strokeOpacity = 0;

            this.chart11 = chart;

            this.agregardivblanco("grafica_dim10");
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
        generarPDF(){
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
            }, 200)
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
                var base11 = "";

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
                    document.getElementById("barra_progreso").style.width = "95%";
                    document.getElementById("letras_progreso").innerText = "95%";
                });

                // Exportar el undécimo gráfico
                await this.chart11.exporting.getImage("png").then((dataUrl) => {
                    base11 = dataUrl;
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
                    base11: base11,
                    fileName: "Informe_General_Dimensiones_"+this.id_empresa,
                };

                await clienteService.generarPDFGeneral(bases).then(respuesta => {
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
                                enlace.download = "Informe_General_Dimensiones.pdf";
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

    .tapa {
        width: 100px;
        height: 40px;
    }
</style>