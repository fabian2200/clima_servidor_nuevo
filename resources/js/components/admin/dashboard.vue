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
   
    <div class="content-body">
        <div v-if="this.datos_usuario.rol == '1'">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary bg-darken-2">
                                    <i class="icon-user font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h3>Clientes</h3>
                                    <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> {{datos_dashboard_admin.clientes}} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger bg-darken-2">
                                    <i style="color:white" class="fas fa-3x fa-map-pin"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h3>Pines Vendidos</h3>
                                    <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> {{datos_dashboard_admin.pines}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning bg-darken-2">
                                    <i class="fas fa-3x fa-dollar-sign white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-warning white media-body">
                                    <h3>Total ventas</h3>
                                    <h3 class="text-bold-400 mb-0">$ {{datos_dashboard_admin.total_dinero}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Recent Orders & Monthly Salse -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height: fit-content !important;">
                        <div class="card-header">
                            <h4 class="card-title">Ventas Realizadas</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="tablaVentas" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th># Venta</th>
                                            <th>Fecha Venta</th>
                                            <th>Cliente</th>
                                            <th style="text-align: center">Pines</th>
                                            <th style="text-align: center">Precio x Pin</th>
                                            <th style="text-align: center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in lista_ventas" :key="index">
                                            <td>{{ item.id }}</td>
                                            <td>{{ item.fecha }}</td>
                                            <td>{{ item.nombres}} {{item.apellidos}}</td>
                                            <td style="text-align: right">{{ item.pines_comprados }}</td>
                                            <td style="text-align: right">$ {{ item.precio_pin }}</td>
                                            <td style="text-align: right">$ {{ item.total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="this.datos_usuario.rol == '2'">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary bg-darken-2">
                                    <i class="fas  fa-3x white fa-building"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h3>Empresas</h3>
                                    <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> {{datos_dashboard_cliente.empresas}} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger bg-darken-2">
                                    <i style="color:white" class="fas fa-3x fa-map-pin"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h3>Pines Comprados</h3>
                                    <h3 class="text-bold-400 mb-0"><i class="feather icon-arrow-up"></i> {{datos_dashboard_cliente.pines_comprados}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning bg-darken-2">
                                    <i class="fas fa-3x fa-map-pin white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-warning white media-body">
                                    <h3>Pines Usados</h3>
                                    <h3 class="text-bold-400 mb-0">{{datos_dashboard_cliente.pines_usados}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Recent Orders & Monthly Salse -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height: fit-content !important;">
                        <div class="card-header">
                            <h4 class="card-title">Empresas registradas</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                </ul>
                            </div>
                            <hr>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="tablaEmpresas" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Logo</th>
                                            <th style="text-align: center">Empresa</th>
                                            <th style="text-align: center"># Empleados</th>
                                            <th style="text-align: center">Respondieron</th>
                                            <th style="text-align: center">No Respondieron</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in lista_empresas" :key="index">
                                            <td style="text-align: center"><img :src='"/imagenes_empresas/"+item.logo' width="50" alt=''></td>
                                            <td style="text-align: center">
                                                <router-link :to="'/lista-responden/' + item.id">{{ item.nombre }}</router-link>
                                            </td>
                                            <td style="text-align: center">{{ item.numero_empleados }}</td>
                                            <td style="text-align: center">{{ item.empleados_responden }}</td>
                                            <td style="text-align: center">{{ item.numero_empleados -  item.empleados_responden}}</td>
                                            <td style="display: flex; justify-content: space-around;">
                                                <button
                                                    @click="abrirModalInformes(item.id)"
                                                    v-if="item.numero_empleados -  item.empleados_responden == 0"
                                                    type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Generar Informes" 
                                                    class="btn btn-primary"
                                                >
                                                    <i style="font-size: 13px" class="fas fa-file-pdf"></i>
                                                </button>
                                                <button @click="asignarEmpresaEditar(item)" data-toggle="tooltip" data-placement="top" title="Editar Empresa" type="button" class="btn btn-info">
                                                    <i style="font-size: 13px" class="fas fa-pen"></i>
                                                </button>
                                                <button v-if="item.estado_informe_socio == 0 && item.estado_informe_general_dim == 0 && item.estado_informe_ffd == 0 && item.estado_informe_comparacion == 0" @click="obtenerBaseURL(item.id)" data-toggle="tooltip" data-placement="top" title="Link Test" type="button" class="btn btn-warning">
                                                    <i style="font-size: 13px" class="fas fa-link"></i>
                                                </button>
                                                <button v-if="item.estado_informe_socio == 0 && item.estado_informe_general_dim == 0 && item.estado_informe_ffd == 0 && item.estado_informe_comparacion == 0" @click="asignarItemDisminuir(item)" data-toggle="tooltip" data-placement="top" title="Disminuir # empleados" type="button" class="btn btn-danger">
                                                    <i style="font-size: 13px" class="fas fa-user-minus"></i>
                                                </button>
                                                <button v-if="item.estado_informe_socio == 0 && item.estado_informe_general_dim == 0 && item.estado_informe_ffd == 0 && item.estado_informe_comparacion == 0" @click="asignarItemAumentar(item)" data-toggle="tooltip" data-placement="top" title="Aumentar # empleados" type="button" class="btn btn-success">
                                                    <i style="font-size: 13px" class="fas fa-user-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDisminuirEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Disminuir numero de empleados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Empresa</label>
                        <input disabled v-model="item_disminuir.nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados actuales</label>
                        <input disabled v-model="item_disminuir.numero_empleados" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados que han respondido</label>
                        <input disabled v-model="item_disminuir.empleados_responden" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados a disminuir</label>
                        <input v-model="numero_disminuir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" @click="guardardisminucionEmpleados()" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAumentarEmpleados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aumentar numero de empleados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Empresa</label>
                        <input disabled v-model="item_aumentar.nombre" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados actuales</label>
                        <input disabled v-model="item_aumentar.numero_empleados" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados que han respondido</label>
                        <input disabled v-model="item_aumentar.empleados_responden" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
                <div style="padding: 10px">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"># de empleados que desea aumentar</label>
                        <input v-model="numero_aumentar" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" @click="guardaraumentoEmpleados()" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="padding: 10px">
                        <div style="text-align: center; width: 100%"> 
                            <img :src="imageUrl" style="border-radius: 50%;" alt="Preview" height="100" width="100">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Logo de la Empresa</label><br>
                            <input type="file" @change="handleImageChange">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre</label>
                            <input type="text" class="form-control" v-model="empresa_editar.nombre" name="nombres">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="editarEmpresa()" class="btn btn-primary">Guardar Cambios</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
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
                            <button @click="irPaginaInforme('/informe-socio/'+id_empresa_informe)" type="button" class="btn_informe btn btn-outline-primary">Informe <br> Sociodemográfico</button>
                        </div>  
                        <div class="col-lg-6">
                            <button @click="irPaginaInforme('/informe-general-dimensiones/'+id_empresa_informe)" type="button" class="btn_informe btn btn-outline-success">Informe General <br> de Dimensiones</button>
                        </div> 
                        <div class="col-lg-6">
                            <button @click="irPaginaInforme('/comparacion-dimensiones/'+id_empresa_informe)" type="button" class="btn_informe btn btn-outline-info">Comparación <br> de Dimensiones</button>
                        </div>  
                        <div class="col-lg-6">
                            <button @click="irPaginaInforme('/fortalezas-debilidades-fortalecer/'+id_empresa_informe)" type="button" class="btn_informe btn btn-outline-secondary">Fortalezas <br> y <br> Debilidades</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Loading from 'vue3-loading-overlay';
import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';
import * as usuarioService from "../../services/usuario_service.js";
import * as adminService from "../../services/admin_service";
import * as clienteService from "../../services/cliente_service";
import Swal from 'sweetalert2';

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            datos_usuario: {
                nombre: "",
                imagen: "",
                rol: ""
            },
            lista_ventas: [],
            datos_dashboard_admin: {
                clientes: 0,
                pines: 0,
                total_dinero: 0
            },
            datos_dashboard_cliente: {
                empresas: 0,
                pines_comprados: 0,
                pines_usados: 0
            },
            lista_empresas:[],
            item_disminuir: {
                nombre: '',
                numero_empleados: 0,
                empleados_responden: 0
            },
            numero_disminuir: 0,
            item_aumentar: {
                nombre: '',
                numero_empleados: 0,
                empleados_responden: 0
            },
            numero_aumentar: 0,
            imageUrl: '',
            empresa_editar: {
                nombre: ''
            },
            imagen_editada_empresa: 'No',
            imagen_editada: null,
            id_empresa_informe: 0
        }
    },
    mounted() {
       this.misDatos();
    },
    methods: {
        misDatos: async function () {
            this.loading = true;
            try {
                await usuarioService.misDatos().then(respuesta => {
                    this.datos_usuario = respuesta.data;
                    this.datosDashboard();
                    this.consultarDatosDashboard();
                });
            } catch (error) {
                console.log(error);
            }
        },
        dataTables(id_tabla) {
            setTimeout(() => {
                $("#"+id_tabla).DataTable({
                    ordering: false,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": ">>",
                            "previous": "<<"
                        },
                    },
                });
                this.loading = false;
            }, 10);
        },
        async consultarDatosDashboard(){
            if(this.datos_usuario.rol == 1){
                this.loading = true;
                try {
                    await adminService.verVentas().then(respuesta => {
                        this.lista_ventas = respuesta.data;
                        setTimeout(()=>{
                            this.dataTables('tablaVentas');
                        }, 200)
                    });
                
                } catch (error) {
                    console.log(error);
                }
            }else{
                this.loading = true;
                try {
                    await clienteService.verEmpresas().then(respuesta => {
                        this.lista_empresas = respuesta.data;
                        setTimeout(()=>{
                            this.dataTables('tablaEmpresas');
                        }, 200)
                    });
                
                } catch (error) {
                    console.log(error);
                }
            }
        },
        async datosDashboard(){
            if(this.datos_usuario.rol == 1){
                this.loading = true;
                try {
                    await adminService.datosDashboardAdmin().then(respuesta => {
                        this.datos_dashboard_admin = respuesta.data;
                    });
                } catch (error) {
                    console.log(error);
                }
            }else{
                this.loading = true;
                try {
                    await clienteService.datosDashboardCliente().then(respuesta => {
                        this.datos_dashboard_cliente = respuesta.data;
                    });
                } catch (error) {
                    console.log(error);
                }
            }
        },
        obtenerBaseURL(id_empresa){
            var urlCompleta = window.location.href;
            var urlObjeto = new URL(urlCompleta);
            var baseUrl = urlObjeto.origin+"/test/"+id_empresa;
            navigator.clipboard.writeText(baseUrl);
            toastr.success("Url Copiada: "+baseUrl);
        },
        asignarItemDisminuir(item){
            this.numero_disminuir = 0;
            this.item_disminuir = item;
            $("#modalDisminuirEmpleados").modal('show');
        },
        asignarItemAumentar(item){
            this.numero_aumentar = 0;
            this.item_aumentar = item;
            $("#modalAumentarEmpleados").modal('show');
        },
        async guardardisminucionEmpleados(){
            if(this.numero_disminuir == 0 || this.numero_disminuir == ''){
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: 'El numero a disminuir no puede ser 0',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                var quedan = this.item_disminuir.numero_empleados - this.item_disminuir.empleados_responden;
                if(this.numero_disminuir > (quedan)){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: 'El máximo valor que puede disminuir es '+quedan,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }else{
                    var datos_dis = {
                        id_empresa: this.item_disminuir.id,
                        numero_disminuir: this.numero_disminuir
                    };

                    await clienteService.disminuirEmpleadosEmpresa(datos_dis).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 0){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(()=>{
                                location.reload();
                            }, 1500)
                        }else{
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            }
        },
        async guardaraumentoEmpleados(){
            if(this.numero_aumentar == 0 || this.numero_aumentar == ''){
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: 'El numero de empleados que desea aumentar no puede ser 0',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                var maximo_numero_aumentar = this.datos_dashboard_cliente.pines_comprados - this.datos_dashboard_cliente.pines_usados;
                if(this.numero_aumentar > maximo_numero_aumentar){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: 'El máximo valor que puede aumentar es '+maximo_numero_aumentar,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }else{
                    var datos_dis = {
                        id_empresa: this.item_aumentar.id,
                        numero_aumentar: this.numero_aumentar
                    };

                    await clienteService.aumentarEmpleadosEmpresa(datos_dis).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 0){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(()=>{
                                location.reload();
                            }, 1500)
                        }else{
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            }
        },
        asignarEmpresaEditar(item){
           this.empresa_editar = item;
           this.imageUrl = '/imagenes_empresas/'+item.logo;
            $("#modalEditarEmpresa").modal('show');
        },
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.convertToBase64(file);
                this.imagen_editada = file;
                this.imagen_editada_empresa = 'Si'
            }
        },
        convertToBase64(file) {
            const reader = new FileReader();
            reader.onload = () => {
                this.imageUrl = reader.result;
            };
            reader.readAsDataURL(file);
        },
        async editarEmpresa(){
            var datos_editados = {
                id_empresa: this.empresa_editar.id,
                nombre: this.empresa_editar.nombre,
                imagen_editada_empresa: this.imagen_editada_empresa,
                imagen_editada: this.imagen_editada
            }

            await clienteService.editarEmpresa(datos_editados).then(respuesta => {
                this.loading = false;
                if(respuesta.data[1] == 0){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: respuesta.data[0],
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(()=>{
                        location.reload();
                    }, 1500)
                }else{
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: respuesta.data[0],
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        },
        abrirModalInformes(id_empresa){
            this.id_empresa_informe = id_empresa;
            $("#modalInformes").modal('show');
        },
        irPaginaInforme(ruta){
            $("#modalInformes").modal('hide');
            location.href = ruta;
        }
    },
}
</script>
<style >
    i {
        line-height: 1.45;
    }
</style>