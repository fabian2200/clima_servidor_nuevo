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
                
                <div v-if="loading2 == false" id="area_informe_comparacion" class="card-content" style="padding: 60px;">
                    <br>
                    <div style="text-align: left">
                        <br>
                        <h3><strong>COMPARACIÓN DE DIMENSIONES</strong></h3>
                        <br>
                        <h6>En este aparte se presentan las tablas cruzadas de cada una de las <strong> 10 dimensiones </strong> del clima organizacional por área, sexo, edad, tiempo de antigüedad en el cargo y en la entidad.</h6>
                        <br>
                        <br>
                        <hr>
                        <br>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Area Trabajo</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sexo</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edad</a>
                                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Antigüedad en el Cargo</a>
                                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about-2" role="tab" aria-controls="nav-about" aria-selected="false">Antigüedad en la entidad</a>  
                                    </div>
                                </nav>
                                <div style="padding: 38px !important;" class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <h4 style="text-align: center; font-weight: bold; color: #009199;">COMPARACIÓN POR ÁREA DE TRABAJO</h4>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 1</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Funciones y entrenamiento</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">FUNCIONES  Y  ENTRENAMIENTO</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio1 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 2 </strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Autonomía</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">AUTONOMÍA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio2 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 3</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Recompensa Directa</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RECOMPENSA DIRECTA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio3 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 4</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Relaciones Interpersonales </i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RELACIONES INTERPERSONALES</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio4 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 5</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Cooperación</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COOPERACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio5 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 6</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Libre Expresión</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">LIBRE EXPRESIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio6 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 7</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Identidad</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">IDENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio7 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 8</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Motivación Institucional</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">MOTIVACIÓN INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio8 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 9</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Satisfacción Laboral</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">SATISFACCIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio9 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 10</strong></p>
                                        <i>Comparación entre el área de trabajo y la dimensión Comunicación</i>
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COMUNICACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Área</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_area_trabajo" :key="index">
                                                <td>{{ item.area.nombre_area }}</td>
                                                <td>{{ item.promedio10 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <h4 style="text-align: center; font-weight: bold; color: #009199;">COMPARACIÓN POR SEXO</h4>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 11</strong></p>
                                        <i>Comparación entre sexo y la dimensión Funciones y Entrenamiento</i>   
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">FUNCIONES  Y  ENTRENAMIENTO</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio1 }}</td>
                                            </tr>
                                        </table>
                                        <p class="segunda_tabla" style="margin-bottom: 5px"><strong>Tabla 12</strong></p>
                                        <i>Comparación entre sexo y la dimensión Autonomía</i>   
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">AUTONOMÍA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio2 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>    
                                        <p style="margin-bottom: 5px"><strong>Tabla 13</strong></p>
                                        <i>Comparación entre sexo y la dimensión Recompensa Directa</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RECOMPENSA DIRECTA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio3 }}</td>
                                            </tr>
                                        </table>
                                        <p class="segunda_tabla" style="margin-bottom: 5px"><strong>Tabla 14</strong></p>
                                        <i>Comparación entre sexo y la dimensión Relaciones Interpersonales</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RELACIONES INTERPERSONALES</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio4 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 15</strong></p>
                                        <i>Comparación entre sexo y la dimensión Cooperación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COOPERACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio5 }}</td>
                                            </tr>
                                        </table>
                                        <p  class="segunda_tabla" style="margin-bottom: 5px"><strong>Tabla 16</strong></p>
                                        <i>Comparación entre sexo y la dimensión Libre Expresión</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">LIBRE EXPRESIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio6 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 17</strong></p>
                                        <i>Comparación entre sexo y la dimensión Identidad</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">IDENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio7 }}</td>
                                            </tr>
                                        </table>
                                        <br>    
                                        <p class="segunda_tabla" style="margin-bottom: 5px"><strong>Tabla 18</strong></p>
                                        <i>Comparación entre sexo y la dimensión Motivación Institucional</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">MOTIVACIÓN INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio8 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 19</strong></p>
                                        <i>Comparación entre sexo y la dimensión Satisfacción Laboral</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">SATISFACCIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio9 }}</td>
                                            </tr>
                                        </table>
                                        <br>    
                                        <p class="segunda_tabla" style="margin-bottom: 5px"><strong>Tabla 20</strong></p>
                                        <i>Comparación entre sexo y la dimensión Comunicación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COMUNICACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Sexo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_sexo" :key="index">
                                                <td>{{ item.sexo }}</td>
                                                <td>{{ item.promedio10 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <br>
                                        <h4 style="text-align: center; font-weight: bold; color: #009199;">COMPARACIÓN POR GRUPO DE EDAD</h4>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 21</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Funciones y Entrenamiento</i> 
                                        <br> 
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">FUNCIONES  Y  ENTRENAMIENTO</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio1 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 22</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Autonomía</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">AUTONOMÍA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio2 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 23</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Recompensa Directa</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RECOMPENSA DIRECTA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio3 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 24</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Relaciones Interpersonales</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RELACIONES INTERPERSONALES</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio4 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 25</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Cooperación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COOPERACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio5 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 26</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Libre Expresión</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">LIBRE EXPRESIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio6 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 27</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Identidad</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">IDENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio7 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 28</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Motivación Institucional</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">MOTIVACIÓN INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio8 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 29</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Satisfacción Laboral</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">SATISFACCIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio9 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 30</strong></p>
                                        <i>Comparación entre grupo de edad y la dimensión Comunicación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COMUNICACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Grupo de Edad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_edad" :key="index">
                                                <td>{{ item.edad }} Años</td>
                                                <td>{{ item.promedio10 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <br>
                                        <h4 style="text-align: center; font-weight: bold; color: #009199;">COMPARACIÓN POR ANTIGÜEDAD EN EL CARGO</h4>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 31</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Funciones y Entrenamiento</i> 
                                        <br>  
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">FUNCIONES  Y  ENTRENAMIENTO</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio1 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 32</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Autonomía</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">AUTONOMÍA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio2 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 33</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Recompensa Directa</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RECOMPENSA DIRECTA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio3 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 34</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Relaciones Interpersonales</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RELACIONES INTERPERSONALES</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio4 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 35</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Cooperación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COOPERACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio5 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 36</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Libre Expresión</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">LIBRE EXPRESIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio6 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 37</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Identidad</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">IDENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio7 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 38</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Motivación Institucional</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">MOTIVACIÓN INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio8 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 39</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Satisfacción Laboral</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">SATISFACCIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio9 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 40</strong></p>
                                        <i>Comparación entre antigüedad en el cargo y la dimensión Comunicación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COMUNICACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en el Cargo</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_cargo" :key="index">
                                                <td>{{ item.tiempo_cargo }}</td>
                                                <td>{{ item.promedio10 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-about-2" role="tabpanel" aria-labelledby="nav-about-tab">
                                        <br>
                                        <h4 style="text-align: center; font-weight: bold; color: #009199;">COMPARACIÓN POR ANTIGÜEDAD LA ENTIDAD</h4>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 41</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Satisfacción Laboral</i> 
                                        <br>  
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">FUNCIONES  Y  ENTRENAMIENTO</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio1 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 42</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Autonomía</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">AUTONOMÍA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio2 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 43</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Recompensa Directa</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RECOMPENSA DIRECTA</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio3 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 44</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Relaciones Interpersonales</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">RELACIONES INTERPERSONALES</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio4 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 45</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Cooperación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COOPERACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio5 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 46</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Libre Expresión</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">LIBRE EXPRESIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio6 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 47</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Identidad</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">IDENTIDAD</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio7 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 48</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Motivación Institucional</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">MOTIVACIÓN INSTITUCIONAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio8 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 49</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Satisfacción Laboral</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">SATISFACCIÓN LABORAL</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio9 }}</td>
                                            </tr>
                                        </table>
                                        <div class="pagina-salto"></div>
                                        <br>
                                        <p style="margin-bottom: 5px"><strong>Tabla 50</strong></p>
                                        <i>Comparación entre la antigüedad en la entidad y la dimensión Comunicación</i> 
                                        <br>
                                        <table class="informe_comparacion">
                                            <tr>
                                                <th colspan="2">COMUNICACIÓN</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 50%">Antigüedad en la Entidad</th>
                                                <th>Promedio</th>
                                            </tr>
                                            <tr v-for="(item, index) in datos.data_tiempo_entidad" :key="index">
                                                <td>{{ item.tiempo_entidad }}</td>
                                                <td>{{ item.promedio10 }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
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

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            loading2: false,
            data_general: {},
            id_empresa: null,
            datos: []
        }
    },
    mounted() {
        this.id_empresa = this.$route.params.id;
        this.compararDimensiones();
    },
    methods: {
        async compararDimensiones(){
            this.loading = true;
            this.loading2 = true;
            await clienteService.comparacionDimensiones(this.id_empresa).then(respuesta => {
                this.datos = respuesta.data;
                this.loading = false;
                this.loading2 = false;
            });
        },
        generarPDF(){
            Swal.fire({
                title: 'Generando informe',
                html: 'Por favor espera, puede tardar varios minutos...',
                allowOutsideClick: false,  // Evita que se cierre al hacer clic fuera
                didOpen: () => {
                    Swal.showLoading()  // Muestra el indicador de carga
                }
            });
            setTimeout(()=>{
               this.GPDF();
            }, 500)
        },
        async GPDF(){
            try {
                var contenido = "";
                contenido = document.getElementById('nav-tabContent').innerHTML;
               
                var bases = {
                    contenido: contenido,
                    fileName: "Comparacion_de_Dimensiones_"+this.id_empresa,
                };

                await clienteService.generarPDFComparacion(bases).then(respuesta => {
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
                                enlace.download = "Comparacion_de_Dimensiones.pdf";
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

    .informe_comparacion {
        width: 100%;
        border-collapse: collapse;
        margin: 12px 0;
        font-size: 16px;
        text-align: left;
    }
    .informe_comparacion th, .informe_comparacion td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }
    .informe_comparacion th {
        background-color: #d2f7ef;
        color: #333;
    }
    .informe_comparacion tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .informe_comparacion tr:hover {
        background-color: #f1f1f1;
    }

    nav > .nav.nav-tabs{
        border: none;
        color:#fff;
        background:#272e38;
        border-radius:0;
    }
    nav > div a.nav-item.nav-link,
    nav > div a.nav-item.nav-link.active{
        border: none;
        padding: 18px 25px;
        color:#fff;
        background:#272e38;
        border-radius:0;
    }

    nav > div a.nav-item.nav-link.active:after{
        content: "";
        position: relative;
        bottom: -60px;
        left: -10%;
        border: 15px solid transparent;
        border-top-color: #009199  ;
    }

    .tab-content{
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top:5px solid #009199 ;
        border-bottom:5px solid #009199 ;
        padding:30px 25px;
    }

    nav > div a.nav-item.nav-link:hover,
    nav > div a.nav-item.nav-link:focus{
        border: none;
        background: #009199 ;
        color:#fff;
        border-radius:0;
        transition:background 0.20s linear;
    }
</style>