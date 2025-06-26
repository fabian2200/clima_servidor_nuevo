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
        <div class="card">
            <button
                type="button"
                class="btn btn-danger"
                onclick="history.back()"
                style="width: 43px;height: 40px;border-radius: 50%;position: absolute;right: 20px;top: 10px;"
            >
                <i class="fas fa-arrow-left"></i>
            </button>
            
            <div class="card-content" style="padding: 20px; min-height: 500px">
                <h3>Datos sociodemográficos</h3>
                <hr>
                <div v-if="loading == false">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="sexo">Sexo</label>
                            <select disabled  v-model="respuesta_data.sexo" name="sexo" class="form-control" id="sexo">
                                <option value="">Seleccione.....</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="edad">Grupo de Edad</label>
                            <select  disabled  v-model="respuesta_data.edad" name="edad" class="form-control" id="edad">
                                <option value="">Seleccione.....</option>
                                <option value="18-22">18-22 Años</option>
                                <option value="23-27">23-27 Años</option>
                                <option value="28-32">28-32 Años</option>
                                <option value="33-37">33-37 Años</option>
                                <option value="38-42">38-42 Años</option>
                                <option value="43-47">43-47 Años</option>
                                <option value="48 y mas">48 Años y mas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="nivel_educacion">Nivel de Educación</label>
                            <select  disabled  v-model="respuesta_data.nivel_educacion" name="nivel_educacion" class="form-control" id="nivel_educacion">
                                <option value="">Seleccione.....</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Tecnológico">Tecnológico</option>
                                <option value="Universitario">Universitario</option>
                                <option value="Postgrado">Postgrado</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="estado_civil">Estado Civil</label>
                            <select disabled  v-model="respuesta_data.estado_civil" name="estado_civil" class="form-control" id="estado_civil">
                                <option value="">Seleccione.....</option>
                                <option value="Casado/a">Casado/a</option>
                                <option value="Unión Libre">Unión Libre</option>
                                <option value="Soltero/a en una relación">Soltero/a en una relación</option>
                                <option value="Soltero/a sin relación">Soltero/a sin relación</option>
                                <option value="Divorciado/a">Divorciado/a</option>
                                <option value="Separado/a">Separado/a</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="tiempo_cargo">Tiempo de antigüedad en el cargo</label>
                            <select disabled  v-model="respuesta_data.tiempo_cargo" name="tiempo_cargo" class="form-control" id="tiempo_cargo">
                                <option value="">Seleccione.....</option>
                                <option value="Menos  de 1 año">Menos  de 1 año</option>
                                <option value="1 - 5 años">1 - 5 años</option>
                                <option value="6 - 10 años">6 - 10 años</option>
                                <option value="11 - 15 años">11 - 15 años</option>
                                <option value="16 - 20 años">16 - 20 años</option>
                                <option value="21 y más años">21 y más años</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="tiempo_entidad">Tiempo de antigüedad en la entidad</label>
                            <select disabled  v-model="respuesta_data.tiempo_entidad" name="tiempo_entidad" class="form-control" id="tiempo_entidad">
                                <option value="">Seleccione.....</option>
                                <option value="Menos  de 1 año">Menos  de 1 año</option>
                                <option value="1 - 5 años">1 - 5 años</option>
                                <option value="6 - 10 años">6 - 10 años</option>
                                <option value="11 - 15 años">11 - 15 años</option>
                                <option value="16 - 20 años">16 - 20 años</option>
                                <option value="21 y más años">21 y más años</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="salario_actual">Su salario actual es de</label>
                            <select disabled  v-model="respuesta_data.salario_actual"  name="salario_actual" class="form-control" id="salario_actual">
                                <option value="">Seleccione.....</option>
                                <option value="Un salario MLV">Un salario MLV</option>
                                <option value="Más de 1 hasta 2 salarios MLV">Más de 1 hasta 2 salarios MLV</option>
                                <option value="Más de 2 hasta 3 salarios MLV">Más de 2 hasta 3 salarios MLV</option>
                                <option value="Más de 3 hasta 4 salarios MLV ">Más de 3 hasta 4 salarios MLV </option>
                                <option value="Más de 4 salarios MLV">Más de 4 salarios MLV</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="estrato">Estrato donde vive</label>
                            <select disabled  v-model="respuesta_data.estrato" name="estrato" class="form-control" id="estrato">
                                <option value="">Seleccione.....</option>
                                <option value="Estrato 1">Estrato 1</option>
                                <option value="Estrato 2">Estrato 2</option>
                                <option value="Estrato 3">Estrato 3</option>
                                <option value="Estrato 4">Estrato 4</option>
                                <option value="Estrato 5">Estrato 5</option>
                                <option value="Estrato 6">Estrato 6</option>
                                <option value="Estrato 7">Estrato 7</option>
                                <option value="Estrato 8">Estrato 8</option>
                                <option value="Estrato 9">Estrato 9</option>
                                <option value="Estrato 10">Estrato 10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="ciudad">Ciudad donde Trabaja</label>
                            <input disabled v-model="respuesta_data.ciudad" type="text" name="ciudad" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="area">Área o Departamento donde labora</label>
                            <input class="form-control" type='' id='' name='' disabled  v-model="respuesta_data.nombre_area">
                        </div>
                    </div>
                    <br><br>
                    <h3>Respuestas test (CLIMA)</h3>
                    <hr>
                    <table id="tabla_paso_2">
                        <tr>
                            <th>Nº</th>
                            <th style="width: 300px">Item</th>
                            <th>Totalmente de acuerdo <br> (Siempre)</th>
                            <th>Parcialmente de acuerdo <br> (Muchas veces)</th>
                            <th>Parcialmente en desacuerdo <br>(Pocas veces)</th>
                            <th>Totalmente en desacuerdo (Nunca)</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <td>Al iniciar este empleo, tuve inducción al cargo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg1" type="radio" name="preg1" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg1" type="radio" name="preg1" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg1" type="radio" name="preg1" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg1" type="radio" name="preg1" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Mi jefe inmediato supervisa mis funciones de forma constante</td>
                            <td><input v-model="respuesta_data.respuestas.preg2" type="radio" name="preg2" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg2" type="radio" name="preg2" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg2" type="radio" name="preg2" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg2" type="radio" name="preg2" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Cuando se comete un error y  el jefe inmediato lo percibe, conversa amablemente para evitar que vuelva a ocurrir.</td>
                            <td><input v-model="respuesta_data.respuestas.preg3" type="radio" name="preg3" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg3" type="radio" name="preg3" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg3" type="radio" name="preg3" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg3" type="radio" name="preg3" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <td>Siento temor ante la presencia de mi jefe o algún compañero/a.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg4" type="radio" name="preg4" value="1" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg4" type="radio" name="preg4" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg4" type="radio" name="preg4" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg4" type="radio" name="preg4" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>5</th>
                            <td>Mis compañeros/as están ocupados cuando los necesito.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg5" type="radio" name="preg5" value="1" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg5" type="radio" name="preg5" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg5" type="radio" name="preg5" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg5" type="radio" name="preg5" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>6</th>
                            <td>Las opiniones se pueden expresar sin temor.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg6" type="radio" name="preg6" value="4" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg6" type="radio" name="preg6" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg6" type="radio" name="preg6" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg6" type="radio" name="preg6" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>7</th>
                            <td>La misión de la entidad es fácil de entender.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg7" type="radio" name="preg7" value="4" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg7" type="radio" name="preg7" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg7" type="radio" name="preg7" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg7" type="radio" name="preg7" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>8</th>
                            <td>La entidad ofrece mecanismos de ascenso de acuerdo a los conocimientos y desempeño laboral de sus empleados.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg8" type="radio" name="preg8" value="4" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg8" type="radio" name="preg8" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg8"  type="radio" name="preg8" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg8" type="radio" name="preg8" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>9</th>
                            <td>Tengo algunas funciones que no me gustan.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg9" type="radio" name="preg9" value="1" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg9" type="radio" name="preg9" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg9" type="radio" name="preg9" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg9" type="radio" name="preg9" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>10</th>
                            <td>Sé a dónde debo acudir cuando tengo una dificultad laboral.</td>
                            <td><input  v-model="respuesta_data.respuestas.preg10" type="radio" name="preg10" value="4" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg10" type="radio" name="preg10" value="3" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg10" type="radio" name="preg10" value="2" class="form-control"></td>
                            <td><input  v-model="respuesta_data.respuestas.preg10" type="radio" name="preg10" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Nº</th>
                            <th style="width: 300px">Item</th>
                            <th>Totalmente de acuerdo <br> (Siempre)</th>
                            <th>Parcialmente de acuerdo <br> (Muchas veces)</th>
                            <th>Parcialmente en desacuerdo <br>(Pocas veces)</th>
                            <th>Totalmente en desacuerdo (Nunca)</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>Desarrollo más actividades de las que competen a mi cargo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg11" type="radio" name="preg11" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg11" type="radio" name="preg11" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg11" type="radio" name="preg11" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg11" type="radio" name="preg11" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>Mi cargo requiere de mayor libertad para tomar decisiones.</td>
                            <td><input v-model="respuesta_data.respuestas.preg12" type="radio" name="preg12" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg12" type="radio" name="preg12" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg12" type="radio" name="preg12" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg12" type="radio" name="preg12" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>MI jefe inmediato reconoce las cosas buenas que hago.</td>
                            <td><input v-model="respuesta_data.respuestas.preg13" type="radio" name="preg13" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg13" type="radio" name="preg13" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg13" type="radio" name="preg13" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg13" type="radio" name="preg13" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>En mi equipo de trabajo se presentan discusiones innecesarias.</td>
                            <td><input v-model="respuesta_data.respuestas.preg14" type="radio" name="preg14" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg14" type="radio" name="preg14" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg14" type="radio" name="preg14" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg14" type="radio" name="preg14" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>Se puede contar con la ayuda de mi jefe inmediato.</td>
                            <td><input v-model="respuesta_data.respuestas.preg15" type="radio" name="preg15" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg15"  type="radio" name="preg15" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg15" type="radio" name="preg15" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg15" type="radio" name="preg15" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>Opinar es exponerse a posibles represalias.</td>
                            <td><input v-model="respuesta_data.respuestas.preg16" type="radio" name="preg16" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg16" type="radio" name="preg16" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg16" type="radio" name="preg16" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg16" type="radio" name="preg16" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>Comparto los principios y valores de esta empresa.</td>
                            <td><input v-model="respuesta_data.respuestas.preg17" type="radio" name="preg17" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg17" type="radio" name="preg17" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg17" type="radio" name="preg17" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg17" type="radio" name="preg17" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>En la entidad se reconoce y se premia  a los mejores empleados.</td>
                            <td><input v-model="respuesta_data.respuestas.preg18" type="radio" name="preg18" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg18" type="radio" name="preg18" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg18" type="radio" name="preg18" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg18" type="radio" name="preg18" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>Mi empleo en esta entidad me ha brindado satisfacciones.</td>
                            <td><input v-model="respuesta_data.respuestas.preg19" type="radio" name="preg19" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg19" type="radio" name="preg19" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg19" type="radio" name="preg19" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg19" type="radio" name="preg19" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>Tengo acceso a los comunicados generales de la entidad.</td>
                            <td><input v-model="respuesta_data.respuestas.preg20" type="radio" name="preg20" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg20" type="radio" name="preg20" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg20" type="radio" name="preg20" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg20" type="radio" name="preg20" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Nº</th>
                            <th style="width: 300px">Item</th>
                            <th>Totalmente de acuerdo <br> (Siempre)</th>
                            <th>Parcialmente de acuerdo <br> (Muchas veces)</th>
                            <th>Parcialmente en desacuerdo <br>(Pocas veces)</th>
                            <th>Totalmente en desacuerdo (Nunca)</th>
                        </tr>
                        <tr>
                            <th>21</th>
                            <td>Las  actividades que realizo están en el marco de mis funciones.</td>
                            <td><input v-model="respuesta_data.respuestas.preg21" type="radio" name="preg21" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg21" type="radio" name="preg21" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg21" type="radio" name="preg21" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg21" type="radio" name="preg21" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>22</th>
                            <td>Las decisiones que puedo tomar son coherentes con el cargo que desempeño.</td>
                            <td><input v-model="respuesta_data.respuestas.preg22" type="radio" name="preg22" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg22" type="radio" name="preg22" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg22" type="radio" name="preg22" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg22" type="radio" name="preg22" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>23</th>
                            <td>Mi jefe inmediato se fija ante todo en mis errores.</td>
                            <td><input v-model="respuesta_data.respuestas.preg23" type="radio" name="preg23" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg23" type="radio" name="preg23" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg23" type="radio" name="preg23" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg23" type="radio" name="preg23" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>24</th>
                            <td>Entre los compañeros de trabajo se hacen comentarios negativos del jefe inmediato u otros compañeros.</td>
                            <td><input v-model="respuesta_data.respuestas.preg24" type="radio" name="preg24" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg24" type="radio" name="preg24" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg24" type="radio" name="preg24" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg24" type="radio" name="preg24" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>25</th>
                            <td>Hay voluntad de colaboración  entre los compañeros/as de trabajo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg25" type="radio" name="preg25" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg25" type="radio" name="preg25" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg25" type="radio" name="preg25" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg25" type="radio" name="preg25" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>26</th>
                            <td>El jefe inmediato considera que siempre tiene la razón.</td>
                            <td><input v-model="respuesta_data.respuestas.preg26" type="radio" name="preg26" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg26" type="radio" name="preg26" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg26" type="radio" name="preg26" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg26" type="radio" name="preg26" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>27</th>
                            <td>Participo en reuniones para definir aspectos relevantes para mi cargo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg27" type="radio" name="preg27" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg27" type="radio" name="preg27" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg27" type="radio" name="preg27" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg27" type="radio" name="preg27" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>28</th>
                            <td>De haber algún evento de integración, sería invitado/a.</td>
                            <td><input v-model="respuesta_data.respuestas.preg28" type="radio" name="preg28" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg28" type="radio" name="preg28" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg28" type="radio" name="preg28" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg28" type="radio" name="preg28" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>29</th>
                            <td>Mis funciones son acorde a mis conocimientos.</td>
                            <td><input v-model="respuesta_data.respuestas.preg29" type="radio" name="preg29" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg29" type="radio" name="preg29" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg29" type="radio" name="preg29" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg29" type="radio" name="preg29" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>30</th>
                            <td>El jefe inmediato se  asegura de que tenga la  información emitida por la entidad y que compete a mi cargo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg30" type="radio" name="preg30" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg30" type="radio" name="preg30" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg30" type="radio" name="preg30" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg30" type="radio" name="preg30" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Nº</th>
                            <th style="width: 300px">Item</th>
                            <th>Totalmente de acuerdo <br> (Siempre)</th>
                            <th>Parcialmente de acuerdo <br> (Muchas veces)</th>
                            <th>Parcialmente en desacuerdo <br>(Pocas veces)</th>
                            <th>Totalmente en desacuerdo (Nunca)</th>
                        </tr>
                        <tr>
                            <th>31</th>
                            <td>Recibo entrenamiento en los aspectos concernientes a mi cargo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg31" type="radio" name="preg31" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg31" type="radio" name="preg31" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg31" type="radio" name="preg31" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg31" type="radio" name="preg31" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>32</th>
                            <td>Todas las decisiones las debo consultar con el jefe inmediato.</td>
                            <td><input v-model="respuesta_data.respuestas.preg32" type="radio" name="preg32" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg32" type="radio" name="preg32" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg32" type="radio" name="preg32" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg32" type="radio" name="preg32" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>33</th>
                            <td>Mi jefe inmediato me halaga o felicita  verbalmente cuando hago bien mi trabajo</td>
                            <td><input v-model="respuesta_data.respuestas.preg33" type="radio" name="preg33" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg33" type="radio" name="preg33" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg33" type="radio" name="preg33" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg33" type="radio" name="preg33" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>34</th>
                            <td>Se promueve el trato respetuoso entre todos los empleados.</td>
                            <td><input v-model="respuesta_data.respuestas.preg34" type="radio" name="preg34" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg34" type="radio" name="preg34" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg34" type="radio" name="preg34" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg34" type="radio" name="preg34" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>35</th>
                            <td>Los empleados cooperan en los eventos que desarrolla la entidad.</td>
                            <td><input v-model="respuesta_data.respuestas.preg35" type="radio" name="preg35" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg35" type="radio" name="preg35" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg35" type="radio" name="preg35" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg35" type="radio" name="preg35" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>36</th>
                            <td>Puedo expresar mis  ideas o sugerencias aunque sean contrarias a las del jefe inmediato.</td>
                            <td><input v-model="respuesta_data.respuestas.preg36" type="radio" name="preg36" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg36" type="radio" name="preg36" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg36" type="radio" name="preg36" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg36" type="radio" name="preg36" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>37</th>
                            <td>Las conversaciones de mis compañeros son poco interesantes.</td>
                            <td><input v-model="respuesta_data.respuestas.preg37" type="radio" name="preg37" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg37" type="radio" name="preg37" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg37" type="radio" name="preg37" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg37" type="radio" name="preg37" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>38</th>
                            <td>La entidad ofrece mecanismos de capacitación y desarrollo personal a sus empleados.</td>
                            <td><input v-model="respuesta_data.respuestas.preg38" type="radio" name="preg38" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg38" type="radio" name="preg38" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg38" type="radio" name="preg38" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg38" type="radio" name="preg38" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>39</th>
                            <td>Le recomendaría a un amigo/a, familiar o conocido/a trabajar en esta empresa.</td>
                            <td><input v-model="respuesta_data.respuestas.preg39" type="radio" name="preg39" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg39" type="radio" name="preg39" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg39" type="radio" name="preg39" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg39" type="radio" name="preg39" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>40</th>
                            <td>La entidad nos informa por diferentes medios (carteleras, intranet, internet) sobre aspectos que conciernen a sus empleados.</td>
                            <td><input v-model="respuesta_data.respuestas.preg40" type="radio" name="preg40" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg40" type="radio" name="preg40" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg40" type="radio" name="preg40" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg40" type="radio" name="preg40" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Nº</th>
                            <th style="width: 300px">Item</th>
                            <th>Totalmente de acuerdo <br> (Siempre)</th>
                            <th>Parcialmente de acuerdo <br> (Muchas veces)</th>
                            <th>Parcialmente en desacuerdo <br>(Pocas veces)</th>
                            <th>Totalmente en desacuerdo (Nunca)</th>
                        </tr>
                        <tr>
                            <th>41</th>
                            <td>Mi jefe inmediato me brinda instrucciones precisas acerca de mis funciones.</td>
                            <td><input v-model="respuesta_data.respuestas.preg41" type="radio" name="preg41" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg41" type="radio" name="preg41" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg41" type="radio" name="preg41" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg41" type="radio" name="preg41" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>42</th>
                            <td>Tomo decisiones que son de mi responsabilidad.</td>
                            <td><input v-model="respuesta_data.respuestas.preg42" type="radio" name="preg42" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg42" type="radio" name="preg42" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg42" type="radio" name="preg42" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg42" type="radio" name="preg42" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>43</th>
                            <td>MI jefe inmediato  busca la manera de  estimularme a realizar mi trabajo lo mejor posible.</td>
                            <td><input v-model="respuesta_data.respuestas.preg43" type="radio" name="preg43" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg43" type="radio" name="preg43" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg43" type="radio" name="preg43" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg43" type="radio" name="preg43" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>44</th>
                            <td>Se hacen comentarios negativos de compañeros de trabajo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg44" type="radio" name="preg44" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg44" type="radio" name="preg44" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg44" type="radio" name="preg44" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg44" type="radio" name="preg44" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>45</th>
                            <td>Me siento solo/a en este trabajo.</td>
                            <td><input v-model="respuesta_data.respuestas.preg45" type="radio" name="preg45" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg45" type="radio" name="preg45" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg45" type="radio" name="preg45" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg45" type="radio" name="preg45" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>46</th>
                            <td>A los compañeros/as no les interesa lo que pienso.</td>
                            <td><input v-model="respuesta_data.respuestas.preg46" type="radio" name="preg46" value="1" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg46" type="radio" name="preg46" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg46" type="radio" name="preg46" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg46" type="radio" name="preg46" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>47</th>
                            <td>Cuando hay eventos institucionales, los empleados participan activamente.</td>
                            <td><input v-model="respuesta_data.respuestas.preg47" type="radio" name="preg47" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg47" type="radio" name="preg47" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg47" type="radio" name="preg47" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg47" type="radio" name="preg47" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>48</th>
                            <td>La entidad  implementa mecanismos para estimular a sus empleados.</td>
                            <td><input v-model="respuesta_data.respuestas.preg48" type="radio" name="preg48" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg48" type="radio" name="preg48" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg48" type="radio" name="preg48" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg48" type="radio" name="preg48" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>49</th>
                            <td>Dispongo del tiempo necesario para cumplir mis funciones.</td>
                            <td><input v-model="respuesta_data.respuestas.preg49" type="radio" name="preg49" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg49" type="radio" name="preg49" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg49" type="radio" name="preg49" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg49" type="radio" name="preg49" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>50</th>
                            <td>Puedo conversar abierta y sinceramente con mi jefe inmediato sobre hechos que afectan positiva o negativamente a la entidad.</td>
                            <td><input v-model="respuesta_data.respuestas.preg50" type="radio" name="preg50" value="4" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg50" type="radio" name="preg50" value="3" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg50" type="radio" name="preg50" value="2" class="form-control"></td>
                            <td><input v-model="respuesta_data.respuestas.preg50" type="radio" name="preg50" value="1" class="form-control"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import * as clienteService from "../../services/cliente_service";
import Loading from 'vue3-loading-overlay';
import Swal from 'sweetalert2';

export default {
    components: {
        Loading
    },
    data() {
        return {
           id_respondio: null,
           loading: true,
           respuesta_data: {}
        }
    },
    mounted() {
        this.id_respondio = this.$route.params.id;
        this.dataRespuesta();
    },
    methods: {
        async dataRespuesta(){
            this.loading = true;
            await clienteService.dataRespuesta(this.id_respondio).then(respuesta => {
                this.respuesta_data = respuesta.data;
                this.loading = false;
            });
        }
    }
}
</script>
<style lang="">
    
</style>