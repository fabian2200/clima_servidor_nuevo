<!DOCTYPE html>
<html lang="en">
@include('plantilla.head')
<body>
    <div id="test_icp" class="text-center" style="display: flex; text-align: center;flex-direction: column; width: 100%;justify-content: center;align-items: center; padding: 40px">
        <div class="card" style="width: 95%; padding: 37px;">
            <h2>Institulo Colombiano de Psicometría</h2>
            <h3>Test De Clima Laboral</h3>
            <br>
            <h2 style="font-weight: bold"><span id="nombre_empresa"></span></h2>
            <br>
            <hr>
            <div id="paso1" class="text-left" style="display: block">
                <br>
                <h6 style="font-weight: bold"> De antemano agradecemos su colaboración en brindar los siguientes datos sociodemográficos que totalmente anónimos.</h6>
                <br>
                <form action="" id="paso1Form">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="sexo">Sexo</label>
                            <select name="sexo" class="form-control" id="sexo">
                                <option value="">Seleccione.....</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label style="font-weight: bold" for="edad">Grupo de Edad</label>
                            <select name="edad" class="form-control" id="edad">
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
                            <select name="nivel_educacion" class="form-control" id="nivel_educacion">
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
                            <select name="estado_civil" class="form-control" id="estado_civil">
                                <option value="">Seleccione.....</option>
                                <option value="Casado/a">Casado/a</option>
                                <option value="Unión Libre ">Unión Libre</option>
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
                            <select name="tiempo_cargo" class="form-control" id="tiempo_cargo">
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
                            <select name="tiempo_entidad" class="form-control" id="tiempo_entidad">
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
                            <select name="salario_actual" class="form-control" id="salario_actual">
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
                            <select name="estrato" class="form-control" id="estrato">
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
                            <input type="text" value="" name="ciudad" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="area">Área o Departamento donde labora</label>
                            <select name="area" class="form-control" id="area">
                                <option value="">Seleccione.....</option>
                                @foreach ($areas as $item)
                                    <option value="{{$item->id}}">{{$item->nombre_area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 text-center">
                            <button  type="submit" style="width: 40%" class="btn btn-success">Guardar y Continuar <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="paso2" class="text-left" style="display: none">
                <br>
                <h3 style="font-weight: bold">El siguiente cuestionario se compone de 50 (cincuenta) preguntas, porfavor sea sincero en sus respuestas.</h3>
                <h4>sus respuestas son totalmente anónimas</h4>
                <br>
                <form id="paso2Form" action="">
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
                            <td><input type="radio" name="preg1" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg1" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg1" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg1" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>Mi jefe inmediato supervisa mis funciones de forma constante</td>
                            <td><input type="radio" name="preg2" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg2" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg2" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg2" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>Cuando se comete un error y  el jefe inmediato lo percibe, conversa amablemente para evitar que vuelva a ocurrir.</td>
                            <td><input type="radio" name="preg3" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg3" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg3" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg3" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <td>Siento temor ante la presencia de mi jefe o algún compañero/a.</td>
                            <td><input type="radio" name="preg4" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg4" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg4" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg4" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>5</th>
                            <td>Mis compañeros/as están ocupados cuando los necesito.</td>
                            <td><input type="radio" name="preg5" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg5" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg5" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg5" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>6</th>
                            <td>Las opiniones se pueden expresar sin temor.</td>
                            <td><input type="radio" name="preg6" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg6" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg6" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg6" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>7</th>
                            <td>La misión de la entidad es fácil de entender.</td>
                            <td><input type="radio" name="preg7" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg7" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg7" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg7" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>8</th>
                            <td>La entidad ofrece mecanismos de ascenso de acuerdo a los conocimientos y desempeño laboral de sus empleados.</td>
                            <td><input type="radio" name="preg8" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg8" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg8" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg8" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>9</th>
                            <td>Tengo algunas funciones que no me gustan.</td>
                            <td><input type="radio" name="preg9" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg9" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg9" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg9" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>10</th>
                            <td>Sé a dónde debo acudir cuando tengo una dificultad laboral.</td>
                            <td><input type="radio" name="preg10" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg10" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg10" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg10" value="1" class="form-control"></td>
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
                            <td><input type="radio" name="preg11" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg11" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg11" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg11" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>Mi cargo requiere de mayor libertad para tomar decisiones.</td>
                            <td><input type="radio" name="preg12" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg12" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg12" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg12" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>MI jefe inmediato reconoce las cosas buenas que hago.</td>
                            <td><input type="radio" name="preg13" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg13" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg13" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg13" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>En mi equipo de trabajo se presentan discusiones innecesarias.</td>
                            <td><input type="radio" name="preg14" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg14" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg14" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg14" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>Se puede contar con la ayuda de mi jefe inmediato.</td>
                            <td><input type="radio" name="preg15" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg15" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg15" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg15" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>Opinar es exponerse a posibles represalias.</td>
                            <td><input type="radio" name="preg16" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg16" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg16" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg16" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>Comparto los principios y valores de esta empresa.</td>
                            <td><input type="radio" name="preg17" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg17" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg17" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg17" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>En la entidad se reconoce y se premia  a los mejores empleados.</td>
                            <td><input type="radio" name="preg18" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg18" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg18" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg18" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>Mi empleo en esta entidad me ha brindado satisfacciones.</td>
                            <td><input type="radio" name="preg19" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg19" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg19" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg19" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>Tengo acceso a los comunicados generales de la entidad.</td>
                            <td><input type="radio" name="preg20" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg20" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg20" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg20" value="1" class="form-control"></td>
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
                            <td><input type="radio" name="preg21" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg21" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg21" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg21" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>22</th>
                            <td>Las decisiones que puedo tomar son coherentes con el cargo que desempeño.</td>
                            <td><input type="radio" name="preg22" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg22" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg22" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg22" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>23</th>
                            <td>Mi jefe inmediato se fija ante todo en mis errores.</td>
                            <td><input type="radio" name="preg23" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg23" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg23" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg23" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>24</th>
                            <td>Entre los compañeros de trabajo se hacen comentarios negativos del jefe inmediato u otros compañeros.</td>
                            <td><input type="radio" name="preg24" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg24" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg24" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg24" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>25</th>
                            <td>Hay voluntad de colaboración  entre los compañeros/as de trabajo.</td>
                            <td><input type="radio" name="preg25" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg25" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg25" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg25" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>26</th>
                            <td>El jefe inmediato considera que siempre tiene la razón.</td>
                            <td><input type="radio" name="preg26" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg26" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg26" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg26" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>27</th>
                            <td>Participo en reuniones para definir aspectos relevantes para mi cargo.</td>
                            <td><input type="radio" name="preg27" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg27" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg27" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg27" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>28</th>
                            <td>De haber algún evento de integración, sería invitado/a.</td>
                            <td><input type="radio" name="preg28" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg28" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg28" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg28" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>29</th>
                            <td>Mis funciones son acorde a mis conocimientos.</td>
                            <td><input type="radio" name="preg29" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg29" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg29" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg29" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>30</th>
                            <td>El jefe inmediato se  asegura de que tenga la  información emitida por la entidad y que compete a mi cargo.</td>
                            <td><input type="radio" name="preg30" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg30" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg30" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg30" value="1" class="form-control"></td>
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
                            <td><input type="radio" name="preg31" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg31" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg31" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg31" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>32</th>
                            <td>Todas las decisiones las debo consultar con el jefe inmediato.</td>
                            <td><input type="radio" name="preg32" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg32" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg32" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg32" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>33</th>
                            <td>Mi jefe inmediato me halaga o felicita  verbalmente cuando hago bien mi trabajo</td>
                            <td><input type="radio" name="preg33" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg33" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg33" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg33" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>34</th>
                            <td>Se promueve el trato respetuoso entre todos los empleados.</td>
                            <td><input type="radio" name="preg34" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg34" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg34" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg34" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>35</th>
                            <td>Los empleados cooperan en los eventos que desarrolla la entidad.</td>
                            <td><input type="radio" name="preg35" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg35" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg35" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg35" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>36</th>
                            <td>Puedo expresar mis  ideas o sugerencias aunque sean contrarias a las del jefe inmediato.</td>
                            <td><input type="radio" name="preg36" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg36" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg36" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg36" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>37</th>
                            <td>Las conversaciones de mis compañeros son poco interesantes.</td>
                            <td><input type="radio" name="preg37" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg37" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg37" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg37" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>38</th>
                            <td>La entidad ofrece mecanismos de capacitación y desarrollo personal a sus empleados.</td>
                            <td><input type="radio" name="preg38" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg38" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg38" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg38" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>39</th>
                            <td>Le recomendaría a un amigo/a, familiar o conocido/a trabajar en esta empresa.</td>
                            <td><input type="radio" name="preg39" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg39" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg39" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg39" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>40</th>
                            <td>La entidad nos informa por diferentes medios (carteleras, intranet, internet) sobre aspectos que conciernen a sus empleados.</td>
                            <td><input type="radio" name="preg40" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg40" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg40" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg40" value="1" class="form-control"></td>
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
                            <td><input type="radio" name="preg41" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg41" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg41" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg41" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>42</th>
                            <td>Tomo decisiones que son de mi responsabilidad.</td>
                            <td><input type="radio" name="preg42" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg42" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg42" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg42" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>43</th>
                            <td>MI jefe inmediato  busca la manera de  estimularme a realizar mi trabajo lo mejor posible.</td>
                            <td><input type="radio" name="preg43" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg43" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg43" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg43" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>44</th>
                            <td>Se hacen comentarios negativos de compañeros de trabajo.</td>
                            <td><input type="radio" name="preg44" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg44" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg44" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg44" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>45</th>
                            <td>Me siento solo/a en este trabajo.</td>
                            <td><input type="radio" name="preg45" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg45" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg45" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg45" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>46</th>
                            <td>A los compañeros/as no les interesa lo que pienso.</td>
                            <td><input type="radio" name="preg46" value="1" class="form-control"></td>
                            <td><input type="radio" name="preg46" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg46" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg46" value="4" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>47</th>
                            <td>Cuando hay eventos institucionales, los empleados participan activamente.</td>
                            <td><input type="radio" name="preg47" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg47" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg47" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg47" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>48</th>
                            <td>La entidad  implementa mecanismos para estimular a sus empleados.</td>
                            <td><input type="radio" name="preg48" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg48" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg48" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg48" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>49</th>
                            <td>Dispongo del tiempo necesario para cumplir mis funciones.</td>
                            <td><input type="radio" name="preg49" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg49" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg49" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg49" value="1" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>50</th>
                            <td>Puedo conversar abierta y sinceramente con mi jefe inmediato sobre hechos que afectan positiva o negativamente a la entidad.</td>
                            <td><input type="radio" name="preg50" value="4" class="form-control"></td>
                            <td><input type="radio" name="preg50" value="3" class="form-control"></td>
                            <td><input type="radio" name="preg50" value="2" class="form-control"></td>
                            <td><input type="radio" name="preg50" value="1" class="form-control"></td>
                        </tr>
                    </table>
                    <br><br>
                    <div class="row">
                        <div class="form-group col-lg-12 text-center">
                            <button  type="submit" style="width: 40%" class="btn btn-success">Guardar y Continuar <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="respondio_test" style="display: none; text-align: center;flex-direction: column; width: 100%; height: 100%; justify-content: center;align-items: center; padding: 40px">
        <div class="card text-center" style="padding: 40px; display: flex; align-items: center; justify-content: center">
            <br>
            <img width="200" src="/imagenes/success.png" alt="">
            <hr>
            <h2>Encuesta no disponible</h2>
            <br>
        </div>
    </div>
    @include('plantilla.footer')

    <script>
        var id_empresa = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
        $.ajax({
            url: '/api/info-empresa?id='+id_empresa,
            type: 'GET',
            success: function(response) {
                if(response != null){
                    document.getElementById("nombre_empresa").textContent = response.nombre;
                }
            },
            error: function(error) {
                toastr.warning(error);
            }
        });

        var paso1 = null;
        var paso2 = null;

        $(document).ready(function() {
            $('#paso1Form').submit(function(event) {
                event.preventDefault();
                
                var camposLlenos = true;
                $('#paso1Form input, #paso1Form select').each(function() {
                    if ($(this).val() === '') {
                        camposLlenos = false;
                        return false; 
                    }
                });
                
                if (!camposLlenos) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Por favor, llene todos los campos antes de enviar el formulario.",
                        showConfirmButton: false,
                        timer: 2500
                    });
                    return;
                }

                Swal.fire({
                    title: "¿Esta seguro de guardar sus respuestas?",
                    text: "Por favor revise antes de guardar, no podra cambiar las respuestas guardadas",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, guardar",
                    cancelButtonText: "No, cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formDataArray = $('#paso1Form').serializeArray();

                        paso1 = {};
                        $.each(formDataArray, function() {
                            paso1[this.name] = this.value;
                        });
                        document.getElementById("paso1").style.display = "none";
                        document.getElementById("paso2").style.display = "block";
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#paso2Form').submit(function(event) {
                event.preventDefault();
                
                var radiosSeleccionados = false;
                var groupName = false;
                var numeroPregunta = 1;

                for (var i = 1; i <= 50; i++) {
                    radiosSeleccionados = false;
                    groupName = 'preg' + i;
                    numeroPregunta = i;
                    $('input[name="' + groupName + '"]').each(function() {
                        if ($(this).is(':checked')) {
                            radiosSeleccionados = true;
                            return false;
                        }
                    });

                    if (!radiosSeleccionados) {
                        break;
                    }
                }
                
                if (!radiosSeleccionados) {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Conteste la pregunta #"+numeroPregunta,
                        showConfirmButton: false,
                        timer: 2500
                    });
                    return;
                }
                
                Swal.fire({
                    title: "¿Esta seguro de guardar sus respuestas?",
                    text: "Por favor revise antes de guardar, no podra cambiar las respuestas guardadas",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, guardar",
                    cancelButtonText: "No, cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formDataArray = $('#paso2Form').serializeArray();

                        paso2 = {};
                        $.each(formDataArray, function() {
                            paso2[this.name] = this.value;
                        });

                        var datos_enviar = {
                            empresa: id_empresa,
                            datos_socio: paso1,
                            respuestas: paso2
                        }

                        $.ajax({
                            url: '/api/guardar-test',
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify(datos_enviar),
                            beforeSend: function() {
                                swal.fire({
                                    html: '<h5>Guardando los datos...</h5>',
                                    showConfirmButton: false,
                                    onRender: function() {
                                        $('.swal2-content').prepend(sweet_loader);
                                    }
                                });
                            },
                            success: function(response) {
                                if (response[1] == 1) {
                                    Swal.fire({
                                        position: "center",
                                        icon: "success",
                                        title: response[0],
                                        showConfirmButton: false,
                                        timer: 2500
                                    });

                                    setTimeout(() => {
                                        localStorage.setItem('respondio', true);
                                        location.reload();
                                    }, 2500);
                                } else {
                                    Swal.fire({
                                        position: "center",
                                        icon: "error",
                                        title: response[0],
                                        showConfirmButton: false,
                                        timer: 2500
                                    });
                                }
                            },
                            error: function(error) {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: error,
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            }
                        });
                    }
                });                
            });
        });

        $(document).ready(function() {
            var valorRecuperado = localStorage.getItem('respondio');
            if (valorRecuperado !== null) {
                document.getElementById("test_icp").style.display = "none";
                document.getElementById("respondio_test").style.display = "flex";
            } 
        });

    </script>
</body>
</html>