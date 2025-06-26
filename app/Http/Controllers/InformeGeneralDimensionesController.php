<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\EmailController;

use \PDF;
use Illuminate\Support\Facades\Storage;

class InformeGeneralDimensionesController extends Controller
{
    public function informeGeneralDimensiones(Request $request){
        $id_empresa = $request->input('id_empresa');

        $respuestas = DB::connection("mysql")->table("respuestas")
        ->where("id_empresa", $id_empresa)
        ->get();

        $numero_respuestas = count($respuestas);

        $dimension1 = 0;
        $dimension2 = 0;
        $dimension3 = 0;
        $dimension4 = 0;
        $dimension5 = 0;
        $dimension6 = 0;
        $dimension7 = 0;
        $dimension8 = 0;
        $dimension9 = 0;
        $dimension10 = 0;

        foreach ($respuestas as $key) {
           $dimension1 += ($key->preg1 + $key->preg11 + $key->preg21 + $key->preg31 + $key->preg41);
           $dimension2 += ($key->preg2 + $key->preg12 + $key->preg22 + $key->preg32 + $key->preg42);
           $dimension3 += ($key->preg3 + $key->preg13 + $key->preg23 + $key->preg33 + $key->preg43);
           $dimension4 += ($key->preg4 + $key->preg14 + $key->preg24 + $key->preg34 + $key->preg44);
           $dimension5 += ($key->preg5 + $key->preg15 + $key->preg25 + $key->preg35 + $key->preg45);
           $dimension6 += ($key->preg6 + $key->preg16 + $key->preg26 + $key->preg36 + $key->preg46);
           $dimension7 += ($key->preg7 + $key->preg17 + $key->preg27 + $key->preg37 + $key->preg47);
           $dimension8 += ($key->preg8 + $key->preg18 + $key->preg28 + $key->preg38 + $key->preg48);
           $dimension9 += ($key->preg9 + $key->preg19 + $key->preg29 + $key->preg39 + $key->preg49);
           $dimension10 += ($key->preg10 + $key->preg20 + $key->preg30 + $key->preg40 + $key->preg50);
        }

        $dim1_promedios = [
            [
                "pregunta" => "Al iniciar este empleo, tuve inducción al cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Desarrollo más actividades de las que competen a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las  actividades que realizo están en el marco de mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Recibo entrenamiento en los aspectos concernientes a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato me brinda instrucciones precisas acerca de mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim2_promedios = [
            [
                "pregunta" => "Mi jefe inmediato supervisa mis funciones de forma constante",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi cargo requiere de mayor libertad para tomar decisiones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las decisiones que puedo tomar son coherentes con el cargo que desempeño",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Todas las decisiones las debo consultar con el jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Tomo decisiones que son de mi responsabilidad",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim3_promedios = [
            [
                "pregunta" => "Cuando se comete un error y  el jefe inmediato lo percibe, conversa amablemente para evitar que vuelva a ocurrir",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "MI jefe inmediato reconoce las cosas buenas que hago",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato se fija ante todo en mis errores",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato me halaga o felicita  verbalmente cuando hago bien mi trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "MI jefe inmediato  busca la manera de  estimularme a realizar mi trabajo lo mejor posible",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim4_promedios = [
            [
                "pregunta" => "Siento temor ante la presencia de mi jefe o algún compañero/a",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "En mi equipo de trabajo se presentan discusiones innecesarias",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Entre los compañeros de trabajo se hacen comentarios negativos del jefe inmediato u otros compañeros",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se promueve el trato respetuoso entre todos los empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se hacen comentarios negativos de compañeros de trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim5_promedios = [
            [
                "pregunta" => "Mis compañeros/as están ocupados cuando los necesito",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se puede contar con la ayuda de mi jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Hay voluntad de colaboración  entre los compañeros/as de trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Los empleados cooperan en los eventos que desarrolla la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Me siento solo/a en este trabajo.",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim6_promedios = [
            [
                "pregunta" => "Las opiniones se pueden expresar sin temor",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Opinar es exponerse a posibles represalias.",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "El jefe inmediato considera que siempre tiene la razón.",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Puedo expresar mis  ideas o sugerencias aunque sean contrarias a las del jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "A los compañeros/as no les interesa lo que pienso.",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim7_promedios = [
            [
                "pregunta" => "La misión de la entidad es fácil de entender",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Comparto los principios y valores de esta empresa",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Participo en reuniones para definir aspectos relevantes para mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las conversaciones de mis compañeros son poco interesantes",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Cuando hay eventos institucionales, los empleados participan activamente",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim8_promedios = [
            [
                "pregunta" => "La entidad ofrece mecanismos de ascenso de acuerdo a los conocimientos y desempeño laboral de sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "En la entidad se reconoce y se premia  a los mejores empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "De haber algún evento de integración, sería invitado/a",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad ofrece mecanismos de capacitación y desarrollo personal a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad  implementa mecanismos para estimular a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim9_promedios = [
            [
                "pregunta" => "Tengo algunas funciones que no me gustan",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi empleo en esta entidad me ha brindado satisfacciones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mis funciones son acorde a mis conocimientos",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Le recomendaría a un amigo/a, familiar o conocido/a trabajar en esta empresa",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Dispongo del tiempo necesario para cumplir mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim10_promedios = [
            [
                "pregunta" => "Sé a dónde debo acudir cuando tengo una dificultad laboral",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Tengo acceso a los comunicados generales de la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "El jefe inmediato se  asegura de que tenga la  información emitida por la entidad y que compete a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad nos informa por diferentes medios (carteleras, intranet, internet) sobre aspectos que conciernen a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Puedo conversar abierta y sinceramente con mi jefe inmediato sobre hechos que afectan positiva o negativamente a la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        foreach ($respuestas as $key) {
            $dim1_promedios[0]["suma_total"] += $key->preg1;
            $dim1_promedios[1]["suma_total"] += $key->preg11;
            $dim1_promedios[2]["suma_total"] += $key->preg21;
            $dim1_promedios[3]["suma_total"] += $key->preg31;
            $dim1_promedios[4]["suma_total"] += $key->preg41;

            $dim2_promedios[0]["suma_total"] += $key->preg2;
            $dim2_promedios[1]["suma_total"] += $key->preg12;
            $dim2_promedios[2]["suma_total"] += $key->preg22;
            $dim2_promedios[3]["suma_total"] += $key->preg32;
            $dim2_promedios[4]["suma_total"] += $key->preg42;

            $dim3_promedios[0]["suma_total"] += $key->preg3;
            $dim3_promedios[1]["suma_total"] += $key->preg13;
            $dim3_promedios[2]["suma_total"] += $key->preg23;
            $dim3_promedios[3]["suma_total"] += $key->preg33;
            $dim3_promedios[4]["suma_total"] += $key->preg43;

            $dim4_promedios[0]["suma_total"] += $key->preg4;
            $dim4_promedios[1]["suma_total"] += $key->preg14;
            $dim4_promedios[2]["suma_total"] += $key->preg24;
            $dim4_promedios[3]["suma_total"] += $key->preg34;
            $dim4_promedios[4]["suma_total"] += $key->preg44;

            $dim5_promedios[0]["suma_total"] += $key->preg5;
            $dim5_promedios[1]["suma_total"] += $key->preg15;
            $dim5_promedios[2]["suma_total"] += $key->preg25;
            $dim5_promedios[3]["suma_total"] += $key->preg35;
            $dim5_promedios[4]["suma_total"] += $key->preg45;

            $dim6_promedios[0]["suma_total"] += $key->preg6;
            $dim6_promedios[1]["suma_total"] += $key->preg16;
            $dim6_promedios[2]["suma_total"] += $key->preg26;
            $dim6_promedios[3]["suma_total"] += $key->preg36;
            $dim6_promedios[4]["suma_total"] += $key->preg46;

            $dim7_promedios[0]["suma_total"] += $key->preg7;
            $dim7_promedios[1]["suma_total"] += $key->preg17;
            $dim7_promedios[2]["suma_total"] += $key->preg27;
            $dim7_promedios[3]["suma_total"] += $key->preg37;
            $dim7_promedios[4]["suma_total"] += $key->preg47;

            $dim8_promedios[0]["suma_total"] += $key->preg8;
            $dim8_promedios[1]["suma_total"] += $key->preg18;
            $dim8_promedios[2]["suma_total"] += $key->preg28;
            $dim8_promedios[3]["suma_total"] += $key->preg38;
            $dim8_promedios[4]["suma_total"] += $key->preg48;

            $dim9_promedios[0]["suma_total"] += $key->preg9;
            $dim9_promedios[1]["suma_total"] += $key->preg19;
            $dim9_promedios[2]["suma_total"] += $key->preg29;
            $dim9_promedios[3]["suma_total"] += $key->preg39;
            $dim9_promedios[4]["suma_total"] += $key->preg49;

            $dim10_promedios[0]["suma_total"] += $key->preg10;
            $dim10_promedios[1]["suma_total"] += $key->preg20;
            $dim10_promedios[2]["suma_total"] += $key->preg30;
            $dim10_promedios[3]["suma_total"] += $key->preg40;
            $dim10_promedios[4]["suma_total"] += $key->preg50;
        }

        $dim1_promedios[0]["promedio"] = round(($dim1_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[1]["promedio"] = round(($dim1_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[2]["promedio"] = round(($dim1_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[3]["promedio"] = round(($dim1_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[4]["promedio"] = round(($dim1_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim2_promedios[0]["promedio"] = round(($dim2_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[1]["promedio"] = round(($dim2_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[2]["promedio"] = round(($dim2_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[3]["promedio"] = round(($dim2_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[4]["promedio"] = round(($dim2_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim3_promedios[0]["promedio"] = round(($dim3_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[1]["promedio"] = round(($dim3_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[2]["promedio"] = round(($dim3_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[3]["promedio"] = round(($dim3_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[4]["promedio"] = round(($dim3_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim4_promedios[0]["promedio"] = round(($dim4_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[1]["promedio"] = round(($dim4_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[2]["promedio"] = round(($dim4_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[3]["promedio"] = round(($dim4_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[4]["promedio"] = round(($dim4_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim5_promedios[0]["promedio"] = round(($dim5_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[1]["promedio"] = round(($dim5_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[2]["promedio"] = round(($dim5_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[3]["promedio"] = round(($dim5_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[4]["promedio"] = round(($dim5_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim6_promedios[0]["promedio"] = round(($dim6_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[1]["promedio"] = round(($dim6_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[2]["promedio"] = round(($dim6_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[3]["promedio"] = round(($dim6_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[4]["promedio"] = round(($dim6_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim7_promedios[0]["promedio"] = round(($dim7_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[1]["promedio"] = round(($dim7_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[2]["promedio"] = round(($dim7_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[3]["promedio"] = round(($dim7_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[4]["promedio"] = round(($dim7_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim8_promedios[0]["promedio"] = round(($dim8_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[1]["promedio"] = round(($dim8_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[2]["promedio"] = round(($dim8_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[3]["promedio"] = round(($dim8_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[4]["promedio"] = round(($dim8_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim9_promedios[0]["promedio"] = round(($dim9_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[1]["promedio"] = round(($dim9_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[2]["promedio"] = round(($dim9_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[3]["promedio"] = round(($dim9_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[4]["promedio"] = round(($dim9_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim10_promedios[0]["promedio"] = round(($dim10_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[1]["promedio"] = round(($dim10_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[2]["promedio"] = round(($dim10_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[3]["promedio"] = round(($dim10_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[4]["promedio"] = round(($dim10_promedios[4]["suma_total"] / $numero_respuestas), 1);

       
        $datos_general = [
            "dim1" => round(($dimension1 / (5 * $numero_respuestas)), 1),
            "dim2" => round(($dimension2 / (5 * $numero_respuestas)), 1),
            "dim3" => round(($dimension3 / (5 * $numero_respuestas)), 1),
            "dim4" => round(($dimension4 / (5 * $numero_respuestas)), 1),
            "dim5" => round(($dimension5 / (5 * $numero_respuestas)), 1),
            "dim6" => round(($dimension6 / (5 * $numero_respuestas)), 1),
            "dim7" => round(($dimension7 / (5 * $numero_respuestas)), 1),
            "dim8" => round(($dimension8 / (5 * $numero_respuestas)), 1),
            "dim9" => round(($dimension9 / (5 * $numero_respuestas)), 1),
            "dim10" => round(($dimension10 / (5 * $numero_respuestas)), 1),
        ];

        $datos = [
            "general" => $datos_general,
            "dim1_promedios" => $dim1_promedios,
            "dim2_promedios" => $dim2_promedios,
            "dim3_promedios" => $dim3_promedios,
            "dim4_promedios" => $dim4_promedios,
            "dim5_promedios" => $dim5_promedios,
            "dim6_promedios" => $dim6_promedios,
            "dim7_promedios" => $dim7_promedios,
            "dim8_promedios" => $dim8_promedios,
            "dim9_promedios" => $dim9_promedios,
            "dim10_promedios" => $dim10_promedios,
        ];

        return response()->json($datos, 200);
    }

    public function comparacionDimensiones(Request $request){
        $id_empresa = $request->input('id_empresa');

        $data_area_trabajo = DB::connection("mysql")->select(
            "SELECT 
                SUM(preg1+preg11+preg21+preg31+preg41) AS dim1, 
                SUM(preg2+preg12+preg22+preg32+preg42) AS dim2, 
                SUM(preg3+preg13+preg23+preg33+preg43) AS dim3, 
                SUM(preg4+preg14+preg24+preg34+preg44) AS dim4,
                SUM(preg5+preg15+preg25+preg35+preg45) AS dim5,  
                SUM(preg6+preg16+preg26+preg36+preg46) AS dim6, 
                SUM(preg7+preg17+preg27+preg37+preg47) AS dim7,
                SUM(preg8+preg18+preg28+preg38+preg48) AS dim8,
                SUM(preg9+preg19+preg29+preg39+preg49) AS dim9,
                SUM(preg10+preg20+preg30+preg40+preg50) AS dim10,  
                5*COUNT(ds.area) AS cantidad, 
                ds.area 
            FROM respuestas r 
            INNER JOIN datos_socio ds 
            ON r.id_contesto = ds.id
            WHERE ds.id_empresa = ".$id_empresa."
            GROUP BY ds.area"
        );

        foreach ($data_area_trabajo as $key) {
            $key->promedio1 = round(($key->dim1 / $key->cantidad), 1);
            $key->promedio2 = round(($key->dim2 / $key->cantidad), 1);
            $key->promedio3 = round(($key->dim3 / $key->cantidad), 1);
            $key->promedio4 = round(($key->dim4 / $key->cantidad), 1);
            $key->promedio5 = round(($key->dim5 / $key->cantidad), 1);
            $key->promedio6 = round(($key->dim6 / $key->cantidad), 1);
            $key->promedio7 = round(($key->dim7 / $key->cantidad), 1);
            $key->promedio8 = round(($key->dim8 / $key->cantidad), 1);
            $key->promedio9 = round(($key->dim9 / $key->cantidad), 1);
            $key->promedio10 = round(($key->dim10 / $key->cantidad), 1);

            $key->area = DB::connection("mysql")->table("empresa_area")
            ->select("id","nombre_area")
            ->where("id", $key->area)
            ->first();
        }

        $data_sexo = DB::connection("mysql")->select(
            "SELECT 
                SUM(preg1+preg11+preg21+preg31+preg41) AS dim1, 
                SUM(preg2+preg12+preg22+preg32+preg42) AS dim2, 
                SUM(preg3+preg13+preg23+preg33+preg43) AS dim3, 
                SUM(preg4+preg14+preg24+preg34+preg44) AS dim4,
                SUM(preg5+preg15+preg25+preg35+preg45) AS dim5,  
                SUM(preg6+preg16+preg26+preg36+preg46) AS dim6, 
                SUM(preg7+preg17+preg27+preg37+preg47) AS dim7,
                SUM(preg8+preg18+preg28+preg38+preg48) AS dim8,
                SUM(preg9+preg19+preg29+preg39+preg49) AS dim9,
                SUM(preg10+preg20+preg30+preg40+preg50) AS dim10,  
                5*COUNT(ds.sexo) AS cantidad, 
	            ds.sexo 
            FROM respuestas r 
            INNER JOIN datos_socio ds 
            ON r.id_contesto = ds.id
            WHERE ds.id_empresa = ".$id_empresa."
            GROUP BY ds.sexo"
        );

        foreach ($data_sexo as $key) {
            $key->promedio1 = round(($key->dim1 / $key->cantidad), 1);
            $key->promedio2 = round(($key->dim2 / $key->cantidad), 1);
            $key->promedio3 = round(($key->dim3 / $key->cantidad), 1);
            $key->promedio4 = round(($key->dim4 / $key->cantidad), 1);
            $key->promedio5 = round(($key->dim5 / $key->cantidad), 1);
            $key->promedio6 = round(($key->dim6 / $key->cantidad), 1);
            $key->promedio7 = round(($key->dim7 / $key->cantidad), 1);
            $key->promedio8 = round(($key->dim8 / $key->cantidad), 1);
            $key->promedio9 = round(($key->dim9 / $key->cantidad), 1);
            $key->promedio10 = round(($key->dim10 / $key->cantidad), 1);
        }

        $data_edad = DB::connection("mysql")->select(
            "SELECT 
                SUM(preg1+preg11+preg21+preg31+preg41) AS dim1, 
                SUM(preg2+preg12+preg22+preg32+preg42) AS dim2, 
                SUM(preg3+preg13+preg23+preg33+preg43) AS dim3, 
                SUM(preg4+preg14+preg24+preg34+preg44) AS dim4,
                SUM(preg5+preg15+preg25+preg35+preg45) AS dim5,  
                SUM(preg6+preg16+preg26+preg36+preg46) AS dim6, 
                SUM(preg7+preg17+preg27+preg37+preg47) AS dim7,
                SUM(preg8+preg18+preg28+preg38+preg48) AS dim8,
                SUM(preg9+preg19+preg29+preg39+preg49) AS dim9,
                SUM(preg10+preg20+preg30+preg40+preg50) AS dim10,  
                5*COUNT(ds.edad) AS cantidad, 
	            ds.edad 
            FROM respuestas r 
            INNER JOIN datos_socio ds 
            ON r.id_contesto = ds.id
            WHERE ds.id_empresa = ".$id_empresa."
            GROUP BY ds.edad"
        );

        foreach ($data_edad as $key) {
            $key->promedio1 = round(($key->dim1 / $key->cantidad), 1);
            $key->promedio2 = round(($key->dim2 / $key->cantidad), 1);
            $key->promedio3 = round(($key->dim3 / $key->cantidad), 1);
            $key->promedio4 = round(($key->dim4 / $key->cantidad), 1);
            $key->promedio5 = round(($key->dim5 / $key->cantidad), 1);
            $key->promedio6 = round(($key->dim6 / $key->cantidad), 1);
            $key->promedio7 = round(($key->dim7 / $key->cantidad), 1);
            $key->promedio8 = round(($key->dim8 / $key->cantidad), 1);
            $key->promedio9 = round(($key->dim9 / $key->cantidad), 1);
            $key->promedio10 = round(($key->dim10 / $key->cantidad), 1);
        }

        $data_tiempo_cargo = DB::connection("mysql")->select(
            "SELECT 
                SUM(preg1+preg11+preg21+preg31+preg41) AS dim1, 
                SUM(preg2+preg12+preg22+preg32+preg42) AS dim2, 
                SUM(preg3+preg13+preg23+preg33+preg43) AS dim3, 
                SUM(preg4+preg14+preg24+preg34+preg44) AS dim4,
                SUM(preg5+preg15+preg25+preg35+preg45) AS dim5,  
                SUM(preg6+preg16+preg26+preg36+preg46) AS dim6, 
                SUM(preg7+preg17+preg27+preg37+preg47) AS dim7,
                SUM(preg8+preg18+preg28+preg38+preg48) AS dim8,
                SUM(preg9+preg19+preg29+preg39+preg49) AS dim9,
                SUM(preg10+preg20+preg30+preg40+preg50) AS dim10,  
                5*COUNT(ds.tiempo_cargo) AS cantidad, 
	            ds.tiempo_cargo 
            FROM respuestas r 
            INNER JOIN datos_socio ds 
            ON r.id_contesto = ds.id
            WHERE ds.id_empresa = ".$id_empresa."
            GROUP BY ds.tiempo_cargo"
        );

        foreach ($data_tiempo_cargo as $key) {
            $key->promedio1 = round(($key->dim1 / $key->cantidad), 1);
            $key->promedio2 = round(($key->dim2 / $key->cantidad), 1);
            $key->promedio3 = round(($key->dim3 / $key->cantidad), 1);
            $key->promedio4 = round(($key->dim4 / $key->cantidad), 1);
            $key->promedio5 = round(($key->dim5 / $key->cantidad), 1);
            $key->promedio6 = round(($key->dim6 / $key->cantidad), 1);
            $key->promedio7 = round(($key->dim7 / $key->cantidad), 1);
            $key->promedio8 = round(($key->dim8 / $key->cantidad), 1);
            $key->promedio9 = round(($key->dim9 / $key->cantidad), 1);
            $key->promedio10 = round(($key->dim10 / $key->cantidad), 1);
        }

        $data_tiempo_entidad = DB::connection("mysql")->select(
            "SELECT 
                SUM(preg1+preg11+preg21+preg31+preg41) AS dim1, 
                SUM(preg2+preg12+preg22+preg32+preg42) AS dim2, 
                SUM(preg3+preg13+preg23+preg33+preg43) AS dim3, 
                SUM(preg4+preg14+preg24+preg34+preg44) AS dim4,
                SUM(preg5+preg15+preg25+preg35+preg45) AS dim5,  
                SUM(preg6+preg16+preg26+preg36+preg46) AS dim6, 
                SUM(preg7+preg17+preg27+preg37+preg47) AS dim7,
                SUM(preg8+preg18+preg28+preg38+preg48) AS dim8,
                SUM(preg9+preg19+preg29+preg39+preg49) AS dim9,
                SUM(preg10+preg20+preg30+preg40+preg50) AS dim10,  
                5*COUNT(ds.tiempo_entidad) AS cantidad, 
	            ds.tiempo_entidad 
            FROM respuestas r 
            INNER JOIN datos_socio ds 
            ON r.id_contesto = ds.id
            WHERE ds.id_empresa = ".$id_empresa."
            GROUP BY ds.tiempo_entidad"
        );

        foreach ($data_tiempo_entidad as $key) {
            $key->promedio1 = round(($key->dim1 / $key->cantidad), 1);
            $key->promedio2 = round(($key->dim2 / $key->cantidad), 1);
            $key->promedio3 = round(($key->dim3 / $key->cantidad), 1);
            $key->promedio4 = round(($key->dim4 / $key->cantidad), 1);
            $key->promedio5 = round(($key->dim5 / $key->cantidad), 1);
            $key->promedio6 = round(($key->dim6 / $key->cantidad), 1);
            $key->promedio7 = round(($key->dim7 / $key->cantidad), 1);
            $key->promedio8 = round(($key->dim8 / $key->cantidad), 1);
            $key->promedio9 = round(($key->dim9 / $key->cantidad), 1);
            $key->promedio10 = round(($key->dim10 / $key->cantidad), 1);
        }

        $data= [
            "data_area_trabajo" => $data_area_trabajo,
            "data_sexo" => $data_sexo,
            "data_edad" => $data_edad,
            "data_tiempo_cargo"  => $data_tiempo_cargo,
            "data_tiempo_entidad" => $data_tiempo_entidad
        ];

        return response()->json($data, 200);
    }

    public function fortalezas(Request $request){
        $id_empresa = $request->input('id_empresa');

        $respuestas = DB::connection("mysql")->table("respuestas")
        ->where("id_empresa", $id_empresa)
        ->get();

        $numero_respuestas = count($respuestas);

        $dimensiones = [
            [
                "dim" => "FUNCIONES Y ENTRENAMIENTO",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "AUTONOMÍA",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "RECOMPENSA DIRECTA",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "RELACIONES INTERPERSONALES",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "COOPERACIÓN",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "LIBRE EXPRESIÓN",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "IDENTIDAD ",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "MOTIVACIÓN INSTITUCIONAL",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "SATISFACCIÓN LABORAL",
                "suma_total" => 0,
                "promedio" => 0,
            ],
            [
                "dim" => "COMUNICACIÓN",
                "suma_total" => 0,
                "promedio" => 0,
            ],
        ];

        $aspectos = [
            "fortalezas_aspectos" => [],
            "fortalecer_aspectos" => [],
            "debilidades_aspectos" => []
        ];


        foreach ($respuestas as $key) {
           $dimensiones[0]["suma_total"] += ($key->preg1 + $key->preg11 + $key->preg21 + $key->preg31 + $key->preg41);
           $dimensiones[1]["suma_total"] += ($key->preg2 + $key->preg12 + $key->preg22 + $key->preg32 + $key->preg42);
           $dimensiones[2]["suma_total"] += ($key->preg3 + $key->preg13 + $key->preg23 + $key->preg33 + $key->preg43);
           $dimensiones[3]["suma_total"] += ($key->preg4 + $key->preg14 + $key->preg24 + $key->preg34 + $key->preg44);
           $dimensiones[4]["suma_total"] += ($key->preg5 + $key->preg15 + $key->preg25 + $key->preg35 + $key->preg45);
           $dimensiones[5]["suma_total"] += ($key->preg6 + $key->preg16 + $key->preg26 + $key->preg36 + $key->preg46);
           $dimensiones[6]["suma_total"] += ($key->preg7 + $key->preg17 + $key->preg27 + $key->preg37 + $key->preg47);
           $dimensiones[7]["suma_total"] += ($key->preg8 + $key->preg18 + $key->preg28 + $key->preg38 + $key->preg48);
           $dimensiones[8]["suma_total"] += ($key->preg9 + $key->preg19 + $key->preg29 + $key->preg39 + $key->preg49);
           $dimensiones[9]["suma_total"] += ($key->preg10 + $key->preg20 + $key->preg30 + $key->preg40 + $key->preg50);
        }

        foreach ($dimensiones as &$key) {
            $color = self::generarColorPastelHex();
            $key["color"] = $color;
            $key["promedio"] = round(($key["suma_total"] / (5 * $numero_respuestas)), 1);
        }

        unset($key);
      
        $fortalezas_dimensiones = [];
        $debilidades_dimensiones = [];
        $fortalecer_dimensiones = [];

        foreach ($dimensiones as $key) {
            if($key["promedio"] <= 2.9){
                array_push($debilidades_dimensiones, $key);
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    array_push($fortalecer_dimensiones, $key);
                }else{
                    array_push($fortalezas_dimensiones, $key);
                }
            }
        }

        $dim1_promedios = [
            [
                "pregunta" => "Al iniciar este empleo, tuve inducción al cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Desarrollo más actividades de las que competen a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las  actividades que realizo están en el marco de mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Recibo entrenamiento en los aspectos concernientes a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato me brinda instrucciones precisas acerca de mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim2_promedios = [
            [
                "pregunta" => "Mi jefe inmediato supervisa mis funciones de forma constante",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi cargo requiere de mayor libertad para tomar decisiones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las decisiones que puedo tomar son coherentes con el cargo que desempeño",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Todas las decisiones las debo consultar con el jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Tomo decisiones que son de mi responsabilidad",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim3_promedios = [
            [
                "pregunta" => "Cuando se comete un error y  el jefe inmediato lo percibe, conversa amablemente para evitar que vuelva a ocurrir",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "MI jefe inmediato reconoce las cosas buenas que hago",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato se fija ante todo en mis errores",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi jefe inmediato me halaga o felicita  verbalmente cuando hago bien mi trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "MI jefe inmediato  busca la manera de  estimularme a realizar mi trabajo lo mejor posible",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim4_promedios = [
            [
                "pregunta" => "Siento temor ante la presencia de mi jefe o algún compañero/a",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "En mi equipo de trabajo se presentan discusiones innecesarias",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Entre los compañeros de trabajo se hacen comentarios negativos del jefe inmediato u otros compañeros",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se promueve el trato respetuoso entre todos los empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se hacen comentarios negativos de compañeros de trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim5_promedios = [
            [
                "pregunta" => "Mis compañeros/as están ocupados cuando los necesito",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Se puede contar con la ayuda de mi jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Hay voluntad de colaboración  entre los compañeros/as de trabajo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Los empleados cooperan en los eventos que desarrolla la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Me siento solo/a en este trabajo.",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim6_promedios = [
            [
                "pregunta" => "Las opiniones se pueden expresar sin temor",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Opinar es exponerse a posibles represalias.",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "El jefe inmediato considera que siempre tiene la razón.",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Puedo expresar mis  ideas o sugerencias aunque sean contrarias a las del jefe inmediato",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "A los compañeros/as no les interesa lo que pienso.",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim7_promedios = [
            [
                "pregunta" => "La misión de la entidad es fácil de entender",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Comparto los principios y valores de esta empresa",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Participo en reuniones para definir aspectos relevantes para mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Las conversaciones de mis compañeros son poco interesantes",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Cuando hay eventos institucionales, los empleados participan activamente",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim8_promedios = [
            [
                "pregunta" => "La entidad ofrece mecanismos de ascenso de acuerdo a los conocimientos y desempeño laboral de sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "En la entidad se reconoce y se premia  a los mejores empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "De haber algún evento de integración, sería invitado/a",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad ofrece mecanismos de capacitación y desarrollo personal a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad  implementa mecanismos para estimular a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim9_promedios = [
            [
                "pregunta" => "Tengo algunas funciones que no me gustan",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mi empleo en esta entidad me ha brindado satisfacciones",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Mis funciones son acorde a mis conocimientos",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Le recomendaría a un amigo/a, familiar o conocido/a trabajar en esta empresa",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Dispongo del tiempo necesario para cumplir mis funciones",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        $dim10_promedios = [
            [
                "pregunta" => "Sé a dónde debo acudir cuando tengo una dificultad laboral",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Tengo acceso a los comunicados generales de la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "El jefe inmediato se  asegura de que tenga la  información emitida por la entidad y que compete a mi cargo",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "La entidad nos informa por diferentes medios (carteleras, intranet, internet) sobre aspectos que conciernen a sus empleados",
                "suma_total" => 0,
                "promedio" => 0
            ],
            [
                "pregunta" => "Puedo conversar abierta y sinceramente con mi jefe inmediato sobre hechos que afectan positiva o negativamente a la entidad",
                "suma_total" => 0,
                "promedio" => 0
            ]
        ];

        foreach ($respuestas as $key) {
            $dim1_promedios[0]["suma_total"] += $key->preg1;
            $dim1_promedios[1]["suma_total"] += $key->preg11;
            $dim1_promedios[2]["suma_total"] += $key->preg21;
            $dim1_promedios[3]["suma_total"] += $key->preg31;
            $dim1_promedios[4]["suma_total"] += $key->preg41;

            $dim2_promedios[0]["suma_total"] += $key->preg2;
            $dim2_promedios[1]["suma_total"] += $key->preg12;
            $dim2_promedios[2]["suma_total"] += $key->preg22;
            $dim2_promedios[3]["suma_total"] += $key->preg32;
            $dim2_promedios[4]["suma_total"] += $key->preg42;

            $dim3_promedios[0]["suma_total"] += $key->preg3;
            $dim3_promedios[1]["suma_total"] += $key->preg13;
            $dim3_promedios[2]["suma_total"] += $key->preg23;
            $dim3_promedios[3]["suma_total"] += $key->preg33;
            $dim3_promedios[4]["suma_total"] += $key->preg43;

            $dim4_promedios[0]["suma_total"] += $key->preg4;
            $dim4_promedios[1]["suma_total"] += $key->preg14;
            $dim4_promedios[2]["suma_total"] += $key->preg24;
            $dim4_promedios[3]["suma_total"] += $key->preg34;
            $dim4_promedios[4]["suma_total"] += $key->preg44;

            $dim5_promedios[0]["suma_total"] += $key->preg5;
            $dim5_promedios[1]["suma_total"] += $key->preg15;
            $dim5_promedios[2]["suma_total"] += $key->preg25;
            $dim5_promedios[3]["suma_total"] += $key->preg35;
            $dim5_promedios[4]["suma_total"] += $key->preg45;

            $dim6_promedios[0]["suma_total"] += $key->preg6;
            $dim6_promedios[1]["suma_total"] += $key->preg16;
            $dim6_promedios[2]["suma_total"] += $key->preg26;
            $dim6_promedios[3]["suma_total"] += $key->preg36;
            $dim6_promedios[4]["suma_total"] += $key->preg46;

            $dim7_promedios[0]["suma_total"] += $key->preg7;
            $dim7_promedios[1]["suma_total"] += $key->preg17;
            $dim7_promedios[2]["suma_total"] += $key->preg27;
            $dim7_promedios[3]["suma_total"] += $key->preg37;
            $dim7_promedios[4]["suma_total"] += $key->preg47;

            $dim8_promedios[0]["suma_total"] += $key->preg8;
            $dim8_promedios[1]["suma_total"] += $key->preg18;
            $dim8_promedios[2]["suma_total"] += $key->preg28;
            $dim8_promedios[3]["suma_total"] += $key->preg38;
            $dim8_promedios[4]["suma_total"] += $key->preg48;

            $dim9_promedios[0]["suma_total"] += $key->preg9;
            $dim9_promedios[1]["suma_total"] += $key->preg19;
            $dim9_promedios[2]["suma_total"] += $key->preg29;
            $dim9_promedios[3]["suma_total"] += $key->preg39;
            $dim9_promedios[4]["suma_total"] += $key->preg49;

            $dim10_promedios[0]["suma_total"] += $key->preg10;
            $dim10_promedios[1]["suma_total"] += $key->preg20;
            $dim10_promedios[2]["suma_total"] += $key->preg30;
            $dim10_promedios[3]["suma_total"] += $key->preg40;
            $dim10_promedios[4]["suma_total"] += $key->preg50;
        }

        $dim1_promedios[0]["promedio"] = round(($dim1_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[1]["promedio"] = round(($dim1_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[2]["promedio"] = round(($dim1_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[3]["promedio"] = round(($dim1_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim1_promedios[4]["promedio"] = round(($dim1_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim2_promedios[0]["promedio"] = round(($dim2_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[1]["promedio"] = round(($dim2_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[2]["promedio"] = round(($dim2_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[3]["promedio"] = round(($dim2_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim2_promedios[4]["promedio"] = round(($dim2_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim3_promedios[0]["promedio"] = round(($dim3_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[1]["promedio"] = round(($dim3_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[2]["promedio"] = round(($dim3_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[3]["promedio"] = round(($dim3_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim3_promedios[4]["promedio"] = round(($dim3_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim4_promedios[0]["promedio"] = round(($dim4_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[1]["promedio"] = round(($dim4_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[2]["promedio"] = round(($dim4_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[3]["promedio"] = round(($dim4_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim4_promedios[4]["promedio"] = round(($dim4_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim5_promedios[0]["promedio"] = round(($dim5_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[1]["promedio"] = round(($dim5_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[2]["promedio"] = round(($dim5_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[3]["promedio"] = round(($dim5_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim5_promedios[4]["promedio"] = round(($dim5_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim6_promedios[0]["promedio"] = round(($dim6_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[1]["promedio"] = round(($dim6_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[2]["promedio"] = round(($dim6_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[3]["promedio"] = round(($dim6_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim6_promedios[4]["promedio"] = round(($dim6_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim7_promedios[0]["promedio"] = round(($dim7_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[1]["promedio"] = round(($dim7_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[2]["promedio"] = round(($dim7_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[3]["promedio"] = round(($dim7_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim7_promedios[4]["promedio"] = round(($dim7_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim8_promedios[0]["promedio"] = round(($dim8_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[1]["promedio"] = round(($dim8_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[2]["promedio"] = round(($dim8_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[3]["promedio"] = round(($dim8_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim8_promedios[4]["promedio"] = round(($dim8_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim9_promedios[0]["promedio"] = round(($dim9_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[1]["promedio"] = round(($dim9_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[2]["promedio"] = round(($dim9_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[3]["promedio"] = round(($dim9_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim9_promedios[4]["promedio"] = round(($dim9_promedios[4]["suma_total"] / $numero_respuestas), 1);

        $dim10_promedios[0]["promedio"] = round(($dim10_promedios[0]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[1]["promedio"] = round(($dim10_promedios[1]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[2]["promedio"] = round(($dim10_promedios[2]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[3]["promedio"] = round(($dim10_promedios[3]["suma_total"] / $numero_respuestas), 1);
        $dim10_promedios[4]["promedio"] = round(($dim10_promedios[4]["suma_total"] / $numero_respuestas), 1);

    
        $color = self::generarColorPastelHex();
        foreach ($dim1_promedios as $key) {
            $key["dim_padre"] = $dimensiones[0]["dim"];
            $key["color"] = $dimensiones[0]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim2_promedios as $key) {
            $key["dim_padre"] = $dimensiones[1]["dim"];
            $key["color"] = $dimensiones[1]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim3_promedios as $key) {
            $key["dim_padre"] = $dimensiones[2]["dim"];
            $key["color"] = $dimensiones[2]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim4_promedios as $key) {
            $key["dim_padre"] = $dimensiones[3]["dim"];
            $key["color"] = $dimensiones[3]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim5_promedios as $key) {
            $key["dim_padre"] = $dimensiones[4]["dim"];
            $key["color"] = $dimensiones[4]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim6_promedios as $key) {
            $key["dim_padre"] = $dimensiones[5]["dim"];
            $key["color"] = $dimensiones[5]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim7_promedios as $key) {
            $key["dim_padre"] = $dimensiones[6]["dim"];
            $key["color"] = $dimensiones[6]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim8_promedios as $key) {
            $key["dim_padre"] = $dimensiones[7]["dim"];
            $key["color"] = $dimensiones[7]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim9_promedios as $key) {
            $key["dim_padre"] = $dimensiones[8]["dim"];
            $key["color"] = $dimensiones[8]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        foreach ($dim10_promedios as $key) {
            $key["dim_padre"] = $dimensiones[9]["dim"];
            $key["color"] = $dimensiones[9]["color"];
            if($key["promedio"] <= 2.9){
                $aspectos["debilidades_aspectos"][] = $key;
            }else{
                if($key["promedio"] >= 3.0 && $key["promedio"] <= 3.8){
                    $aspectos["fortalecer_aspectos"][] = $key;
                }else{
                    $aspectos["fortalezas_aspectos"][] = $key;
                }
            }
        }

        $datos = [
            "dimensiones" => $dimensiones,
            "aspectos" => $aspectos
        ];

        return response()->json($datos, 200);
    }

    function generarColorPastelHex() {
        // Generar un color aleatorio
        $r = mt_rand(170, 255);
        $g = mt_rand(170, 255);
        $b = mt_rand(170, 255);
        
        // Mezclar el color con blanco para obtener un tono pastel
        $r = ($r + 255) / 2;
        $g = ($g + 255) / 2;
        $b = ($b + 255) / 2;
        
        // Convertir a formato hexadecimal
        $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
        
        return $hex;
    }

    public function generatePDFSocio(Request $request){
        $data = [
            'base1' => $request->input('base1'),
            'base2' => $request->input('base2'),
            'base3' => $request->input('base3'),
            'base4' => $request->input('base4'),
            'base5' => $request->input('base5'),
            'base6' => $request->input('base6'),
            'base7' => $request->input('base7'),
            'base8' => $request->input('base8'),
            'base9' => $request->input('base9'),
            'base10' => $request->input('base10'),
            'total_personas' => $request->input('total_personas')
        ];

        $pdf = PDF::loadView('pdf.prueba', $data)->setPaper('a4');

        $fileName = $request->input('fileName') . '.pdf';
        $filePath = 'informes_socio/' . $fileName;
        $pdf->save(public_path($filePath));
        $url = asset($filePath);

        return response()->json(['url' => $url]);
    }

    public function generatePDFGeneral(Request $request){
        $data = [
            'base1' => $request->input('base1'),
            'base2' => $request->input('base2'),
            'base3' => $request->input('base3'),
            'base4' => $request->input('base4'),
            'base5' => $request->input('base5'),
            'base6' => $request->input('base6'),
            'base7' => $request->input('base7'),
            'base8' => $request->input('base8'),
            'base9' => $request->input('base9'),
            'base10' => $request->input('base10'),
            'base11' => $request->input('base11'),
        ];

        $pdf = PDF::loadView('pdf.generalDimensiones', $data)->setPaper('a4');

        $fileName = $request->input('fileName') . '.pdf';
        $filePath = 'informes_socio/' . $fileName;
        $pdf->save(public_path($filePath));
        $url = asset($filePath);

        return response()->json(['url' => $url]);
    }

    public function generarPDFTablas(Request $request){
        $data = [
            'contenido' => $request->input('contenido'),
        ];

        $pdf = PDF::loadView('pdf.fortalezas_debilidades', $data)->setPaper('a4');

        $fileName = $request->input('fileName') . '.pdf';
        $filePath = 'informes_socio/' . $fileName;
        $pdf->save(public_path($filePath));
        $url = asset($filePath);

        return response()->json(['url' => $url]);
    }

    public function generarPDFComparacion(Request $request){
        $data = [
            'contenido' => $request->input('contenido'),
        ];

        $pdf = PDF::loadView('pdf.comparacion', $data)->setPaper('a4');

        $fileName = $request->input('fileName') . '.pdf';
        $filePath = 'informes_socio/' . $fileName;
        $pdf->save(public_path($filePath));
        $url = asset($filePath);

        return response()->json(['url' => $url]);
    }
}
