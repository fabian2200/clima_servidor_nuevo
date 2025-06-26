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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height: fit-content !important;">
                        <div class="card-header">
                            <h4 class="card-title">Listado de Clientes</h4>
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
                                <table id="tablaClientes" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Identificación</th>
                                            <th>Cliente</th>
                                            <th>Pines Comprados</th>
                                            <th>Pines Borrados</th>
                                            <th>Pines Utilizados</th>
                                            <th style="text-align: center">Editar Cantidad de Pines</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in lista_clientes" :key="index">
                                            <td>{{ item.cedula }}</td>
                                            <td>{{ item.nombres}} {{item.apellidos}}</td>
                                            <td>{{ item.pines_comprados }}</td>
                                            <td>{{ item.pines_borrados }}</td>
                                            <td>{{ item.pines_utilizados }}</td>
                                            <td style="text-align: center">
                                                <button type="button" @click="editarDataDisminuir(item.id, item.pines_comprados)" data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger">
                                                    Disminuir
                                                </button>
                                                <button @click="editarIdCliente(item.id)" type="button" data-toggle="modal" data-target="#exampleModal" style="margin-left: 10px" href="venta-existente" class="btn btn-success">
                                                    Vender 
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Venta Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id_cliente">Seleccione el cliente</label>
                            <select disabled id="id_cliente" v-model="datos_venta.id_cliente" class="form-control" name="">
                                <option value=''>Seleccione un cliente...</option>
                                <option v-for="(item, index) in lista_clientes" :key="index" :value="item.id">{{item.nombres}} {{item.apellidos}}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pines Vendidos</label>
                                    <input type="number" class="form-control" v-model="datos_venta.pines_comprados" name="pines_comprados">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Precio x Pin</label>
                                    <input type="number" class="form-control" v-model="datos_venta.precio_pin" name="precio_pin">
                                </div>
                            </div>
                        </div>
                    <div class="text-center" style="display: flex; justify-content: space-around;">
                            <button
                                @click="guardarVenta()"
                                style="width: 40%"
                                type="button"
                                class="btn btn-success"
                            >
                                Guardar Venta <i class="fas fa-save"></i>
                            </button>
                            <button  style="width: 40%" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Disminuir Pines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="id_cliente">Seleccione el cliente</label>
                            <select disabled id="id_cliente" v-model="datos_disminuir.id_cliente" class="form-control" name="">
                                <option value=''>Seleccione un cliente...</option>
                                <option v-for="(item, index) in lista_clientes" :key="index" :value="item.id">{{item.nombres}} {{item.apellidos}}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pines actuales</label>
                                    <input disabled type="number" class="form-control" v-model="datos_disminuir.pines_actuales" name="pines_comprados">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Pines que desea disminuir</label>
                                    <input type="number" class="form-control" v-model="datos_disminuir.pines_disminuir" name="precio_pin">
                                </div>
                            </div>
                        </div>
                    <div class="text-center" style="display: flex; justify-content: space-around;">
                            <button
                                @click="disminuirPines()"
                                style="width: 40%"
                                type="button"
                                class="btn btn-success"
                            >
                                Guardar  <i class="fas fa-save"></i>
                            </button>
                            <button  style="width: 40%" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    </template>
    <script>
    import Loading from 'vue3-loading-overlay';
    import 'vue3-loading-overlay/dist/vue3-loading-overlay.css';
    import * as adminService from "../../services/admin_service";
    import Swal from 'sweetalert2';

    export default {
        components: {
            Loading
        },
        data() {
            return {
                loading: false,
                lista_clientes: [],
                datos_venta: {
                    id_cliente: '',
                    pines_comprados: '',
                    precio_pin: ''
                },
                datos_disminuir: {
                    id_cliente: '',
                    pines_disminuir: '',
                    pines_actuales: ''
                }
            }
        },
        mounted() {
           this.consultarClientes();
        },
        methods: {
            editarIdCliente(id){
                this.datos_venta.id_cliente = id;
            },
            editarDataDisminuir(id, pines_actuales){
                this.datos_disminuir.id_cliente = id;
                this.datos_disminuir.pines_actuales = pines_actuales;
                this.datos_disminuir.pines_disminuir = 0;
            },
            dataTables() {
                setTimeout(() => {
                    $("#tablaClientes").DataTable({
                        ordering: true,
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
            async consultarClientes(){
                this.loading = true;
                try {
                    await adminService.listarClientes().then(respuesta => {
                        this.lista_clientes = respuesta.data;
                        setTimeout(()=>{
                            this.dataTables();
                        }, 500)
                    });
                   
                } catch (error) {
                    console.log(error);
                }
            },
            async guardarVenta(){
                this.loading = true;
                try {
                    await adminService.registrarCompraExistente(this.datos_venta).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 0){
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                title: respuesta.data[0],
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        setTimeout(()=>{
                            location.reload();
                        }, 1500)
                    });
                } catch (error) {
                    console.log(error);
                }
            },
            async disminuirPines(){
                if(this.datos_disminuir.pines_disminuir > this.datos_disminuir.pines_actuales || this.datos_disminuir.pines_disminuir <= 0 || this.datos_disminuir.pines_disminuir == ''){
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "El numero de pines a disminuir no puede ser negativo, o mayor a la cantidad de pines actuales",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }else{
                    this.loading = true;
                    try {
                        await adminService.disminuirPines(this.datos_disminuir).then(respuesta => {
                            this.loading = false;
                            if(respuesta.data[1] == 0){
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: respuesta.data[0],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }else{
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    title: respuesta.data[0],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                            setTimeout(()=>{
                                location.reload();
                            }, 1500)
                        });
                    } catch (error) {
                        console.log(error);
                    }
                }
            },
        }
    }
    </script>
    <style >
        i {
            line-height: 1.45;
        }
    </style>