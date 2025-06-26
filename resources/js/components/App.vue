<template>
    <div>
        <div>
            <nav style="min-height: 4rem;" class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
                <div class="navbar-wrapper">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                            <li class="nav-item"><a class="navbar-brand" href="html/ltr/vertical-menu-template/index.html"><img class="brand-logo" alt="stack admin logo" src="/app-assets/images/logo/stack-logo.png">
                                    <h2 class="brand-text">Stack</h2>
                                </a></li>
                            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                        </ul>
                    </div>
                    <div class="navbar-container content">
                        <div class="collapse navbar-collapse" id="navbar-mobile">
                            <ul class="nav navbar-nav mr-auto float-left">
                                <li class="nav-item d-none d-md-block">
                                    <a class="nav-link nav-menu-main menu-toggle hidden-xs is-active" href="#">
                                        <i class="feather icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav float-right">
                                <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                        <div class="avatar avatar-online"><img :src="'/imagenes_usuarios/'+datos.imagen" alt="avatar"><i></i></div><span class="user-name">{{ datos.nombre }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <router-link to="mi-perfil">
                                            <a class="dropdown-item" href="mi-perfil">
                                                <i class="feather icon-user"></i> Mi Perfil
                                            </a>
                                        </router-link>
                                        <div class="dropdown-divider"></div>
                                        <a style="color: red" class="dropdown-item" @click="cerrarSesion()" href="#">
                                            <i class="feather icon-power"></i> Cerrar Sesión
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="main-menu-content ps ps--active-y">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class=" navigation-header"><span>Menu de Opciones</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="Apps"></i>
                        </li>
                        <li :class="tipo_ruta == '/dashboard' ? 'nav-item open' : 'nav-item'">
                            <router-link to="/dashboard">
                                <a href="#">
                                    <i class="fas fa-home"></i>
                                    <span class="menu-title" data-i18n="Email Application">Dashboard</span>
                                </a>
                            </router-link>
                        </li>
                        
                        <li :class="tipo_ruta == '/nueva-venta' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '1'">
                            <router-link to="/nueva-venta">
                                <a href="#">
                                    <i class="fas fa-user-plus"></i>
                                    <span class="menu-title" data-i18n="Email Application">Nueva venta</span>
                                </a>
                            </router-link>
                        </li>

                        <li :class="tipo_ruta == '/venta-existente' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '1'">
                            <router-link to="/venta-existente">
                                <a href="#">
                                    <i class="fas fa-user-check"></i>
                                    <span class="menu-title" data-i18n="Email Application">Venta Existente</span>
                                </a>
                            </router-link>
                        </li>

                        <li :class="tipo_ruta == '/clientes' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '1'">
                            <router-link to="/clientes">
                                <a href="#">
                                    <i class="fas fa-user-tie"></i>
                                    <span class="menu-title" data-i18n="Email Application">Clientes</span>
                                </a>
                            </router-link>
                        </li>

                        <li :class="tipo_ruta == '/paquetes' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '1'">
                            <router-link to="/paquetes">
                                <a href="#">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span class="menu-title" data-i18n="Email Application">Paquetes</span>
                                </a>
                            </router-link>
                        </li>

                        <li :class="tipo_ruta == '/nueva-empresa' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '2'">
                            <router-link to="/nueva-empresa">
                                <a href="#">
                                    <i class="fas fa-plus-square"></i>
                                    <span class="menu-title" data-i18n="Email Application">Nueva Empresa</span>
                                </a>
                            </router-link>
                        </li>

                        <li :class="tipo_ruta == '/areas-empresa' ? 'nav-item open' : 'nav-item'" v-if="datos.rol == '2'">
                            <router-link to="/areas-empresa">
                                <a href="#">
                                    <i class="fas fa-laptop-house"></i>
                                    <span class="menu-title" data-i18n="Email Application">Areas Empresa</span>
                                </a>
                            </router-link>
                        </li>

                        <li class="nav-item" v-if="datos.rol == '2'">
                            <a href="https://www.ilovepdf.com/es/pdf_a_word" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                                <span class="menu-title" data-i18n="Email Application">Convertidor PDF a DOC</span>
                            </a>
                        </li>

                        <hr>
                        <div style="justify-content: center; display: flex; width: 100%;">
                            <button v-if="datos.rol == '2'" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success"><i class="fas fa-laptop-house"></i> Ficha técnica</button>     
                        </div>                        
                    </ul>
                    <img src="/imagenes/logo_icp.png" id="logo_alcaldia" alt="">
                </div>
            </div>
        </div>
        <div class="app-content content" style="padding-top: 4rem;">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <router-view to="/"></router-view>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="color: #009199; font-weight: bold;" id="exampleModalLongTitle">Test de Valoración de Clima Organizacional D 10</h3>
                    <button style="background-color: #f71333;color: white;width: 50px;height: 50px;border-radius: 50%;position: absolute;right: 4px;top: 4px;opacity: 1;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body no-select" style="padding: 40px;">
                    <h3 style="width: 100%; text-align: center; font-weight: bold;">Ficha técnica</h3>
                    <br>
                    <h4 style="color: #009199; font-weight: bold;">Cuestionario de Clima Organizacional</h4>
                    <p><strong>Autor:</strong> Antonio del Cristo Martínez Suárez</p>
                    <p><strong>Constructo evaluado:</strong> Clima Organizacional</p>
                    <h4 style="color: #009199; font-weight: bold;">Dimensiones</h4>
                    <ol>
                        <li>Funciones y Entrenamiento</li>
                        <li>Autonomía</li>
                        <li>Recompensa Directa</li>
                        <li>Relaciones Interpersonales</li>
                        <li>Cooperación</li>
                        <li>Libre Expresión</li>
                        <li>Identidad</li>
                        <li>Motivación Institucional</li>
                        <li>Satisfacción Laboral</li>
                        <li>Comunicación</li>
                    </ol>
                    <p><strong>Cantidad de ítems:</strong> 50</p>
                    <h4 style="color: #009199; font-weight: bold;">Opciones de respuesta</h4>
                    <ul>
                        <li>Totalmente de acuerdo (Siempre)</li>
                        <li>Parcialmente de acuerdo (Muchas veces)</li>
                        <li>Parcialmente en desacuerdo (Pocas veces)</li>
                        <li>Totalmente en desacuerdo (Nunca)</li>
                    </ul>
                    <p><strong>Validez:</strong></p>
                    <p style="text-align: justify;">En el procedimiento para validar las diez dimensiones del Test de Valoración de Clima Organizacional D 10, como primer paso, se realizó la KMO que arrojó un valor de .876, que es aceptable y el de Bartlett, que presentó una resultado de p de 0.001, valores que indican que se puede realizar un análisis factorial AF, con lo cual se podría validar la pertinencia de la estructura interna del instrumento (Macia, 2010).</p>
                    <p style="text-align: justify;">El AFE, sirvió de referencia para la eliminación de los ítems que poco ayudaban a la explicación de las dimensiones (&lt; 0.45). Seguidamente por intermedio del AFC se buscó, por prueba y error obtener ecuaciones estructurales que soporten el contenido de los ítems.</p>
                    <p style="text-align: justify;">En el AFC se tomó como referente el método de componentes principales con rotación varimax y para de cada dimensión se analizó la chi cuadrado, el índice GFI, NNFI, CFI, los cuales arrojaron valores que oscilan entre 0.91 y 0.94, lo cual muestra un ajuste considerar un ajuste aceptable (Hoyle,1995) y también se tuvo en cuenta RMSEA, cuyo valor fluctúa entre 0.07 y 0.02.</p>
                    <p style="text-align: justify;">Los pesos factoriales de los reactivos oscila entre  0,72 y 0.89  y su comunalidad varía entre .586 a .842. Al analizar la varianza explicado por los cinco reactivos que conforman cada dimensión, se obtuvo valores que fluctúan entre el 48.92% y el 59.37% de la varianza, lo cual muestra valores aceptables y confirman la validez factorial del Test de Valoración de Clima Organizacional D 10. </p>
                    <p><strong>Confiabilidad:</strong></p>
                    <p style="text-align: justify;">En referencia al cálculo de los índices de confiabilidad del Test de Valoración de Clima Organizacional D 10 se tomaron como técnicas estadísticas el alfa de Cronbach acompañado del omega de McDonald, ya que las dos permiten establecer la precisión de aquellos resultados producto de la aplicación de un determinado instrumento de medición.</p>
                    <p style="text-align: justify;">En ese sentido, el índice del alfa de Cronbach arroja información con respecto a la consistencia interna, expresando la magnitud de covarianza que presentan los ítems, y el valor del coeficiente omega, es utilizado como una fuente confirmatoria y de estabilidad de los resultados obtenidos. Los valores en ambas técnicas son aceptables cuando se encuentra en los rangos de 0.70 y 0.90.</p>
                    <p style="text-align: justify;">Los cálculos realizados para las diez dimensiones del Test de Valoración de Clima Organizacional D 10 por intermedio del alfa de Cronbach  arrojaron valores 0.78 y 0.89, mientras que en omega de McDonald se presentaron puntajes valores 0.81 y 0.92, lo cual indica que la prueba presenta unos niveles excelentes de consistencia interna.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import * as usuarioService from "../services/usuario_service.js";


export default {
    data() {
        return {
            tipo_ruta: "",
            datos: {
                nombre: "",
                imagen: "",
                rol: ""
            },
            loading: false
        }
    },
    mounted() {
        this.verificarTamanio();
        this.verificarLogin();
        this.misDatos();
        setTimeout(()=>{
            const rutaActual = this.$route.path;
            console.log("Ruta actual:", rutaActual);
            this.tipo_ruta = rutaActual;
        }, 500)
    },
    methods: {
        misDatos: async function () {
            this.loading = true;
            try {
                await usuarioService.misDatos().then(respuesta => {
                    this.datos = respuesta.data;
                    this.loading = false;
                });
            } catch (error) {
                console.log(error);
            }
        },
        async cerrarSesion(){
            this.loading = true;
            await usuarioService.cerrarSesion().then(respuesta => {
                this.loading = false;
                setTimeout(() => {
                    location.href = "/";
                }, 1000);
            });
        },
        verificarTamanio(){
            var screenHeight = window.screen.height;
            if(screenHeight <= 740){
                document.body.style.zoom = "75%";
            }
        },
        async verificarLogin(){
            await usuarioService.verificarLogin().then(respuesta => {
                if(respuesta.data == 0){
                    window.location.href = '/';
                }
            });
        },
    }
}
</script>
<style>
    .vld-overlay {
        z-index: 99999999 !important;
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100% !important;
        height: 100% !important;
        background-color: #000;
    }

    #logo_alcaldia {
       position: absolute;
        bottom: 4%;
        left: 8%;
        opacity: .6;
        z-index: -1;
        width: 81%;
    }

    .no-select {
        user-select: none; /* Evita la selección en navegadores modernos */
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* Internet Explorer */
        -moz-user-select: none; /* Firefox */
        pointer-events: none; /* Desactiva los clics en el contenido */
    }
</style>