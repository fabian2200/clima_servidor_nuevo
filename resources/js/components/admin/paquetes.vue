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
                            <h4 class="card-title">Listado de Paquetes</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                </ul>
                            </div>
                            <hr>
                            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fas fa-plus-circle"></i> Registrar Paquete</button>
                            <br>
                            <br>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="tablaPaquetes" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Cantidad de pines</th>
                                            <th>Valor por pin</th>
                                            <th>Subtotal</th>
                                            <th>Descuento</th>
                                            <th>Total</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in lista_paquetes" :key="index">
                                            <td>{{ item.id }}</td>
                                            <td>{{ item.nombre }}</td>
                                            <td>{{ item.numero_pines }}</td>
                                            <td>{{ item.precio_pin }}</td>
                                            <td>{{ item.subtotal }}</td>
                                            <td>{{ item.descuento }}%</td>
                                            <td>{{ item.total }}</td>
                                            <td style="text-align: center">
                                                <button type="button" @click="editarPaquete(item)" data-toggle="modal" data-target="#exampleModal2" class="btn btn-danger">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button @click="eliminarPaquete(item.id, item.nombre)" type="button" style="margin-left: 10px" href="venta-existente" class="btn btn-warning">
                                                    <i class="fas fa-trash"></i> 
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
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Paquete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nombre_paquete">Nombre del paquete</label>
                            <input type="text" class="form-control" v-model="paquete.nombre" name="nombre_paquete">
                        </div>
                        <div class="form-group">
                            <label for="numero_pines">Numero de pines</label>
                            <input type="number" class="form-control" v-model="paquete.numero_pines" name="numero_pines">
                        </div>
                        <div class="form-group">
                            <label for="precio_pin">Valor del pin</label>
                            <input type="number" class="form-control" v-model="paquete.precio_pin" name="precio_pin">
                        </div>
                        <div class="form-group">
                            <label for="precio_pin">Descuento en porcentaje (0-100%)</label>
                            <input type="number" class="form-control" v-model="paquete.descuento" name="descuento">
                        </div>
                    <div class="text-center" style="display: flex; justify-content: space-around;">
                            <button
                                @click="guardarPaquete()"
                                style="width: 40%"
                                type="button"
                                class="btn btn-success"
                            >
                                Guardar Paquete <i class="fas fa-save"></i>
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
                    <h5 class="modal-title" id="exampleModalLabel">Editar Paquete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nombre_paquete">Nombre del paquete</label>
                            <input type="text" class="form-control" v-model="paquete.nombre" name="nombre_paquete">
                        </div>
                        <div class="form-group">
                            <label for="numero_pines">Numero de pines</label>
                            <input type="number" class="form-control" v-model="paquete.numero_pines" name="numero_pines">
                        </div>
                        <div class="form-group">
                            <label for="precio_pin">Valor del pin</label>
                            <input type="number" class="form-control" v-model="paquete.precio_pin" name="precio_pin">
                        </div>
                        <div class="form-group">
                            <label for="precio_pin">Descuento en porcentaje (0-100%)</label>
                            <input type="number" class="form-control" v-model="paquete.descuento" name="descuento">
                        </div>
                    <div class="text-center" style="display: flex; justify-content: space-around;">
                            <button
                                @click="guardarEditarPaquete()"
                                style="width: 40%"
                                type="button"
                                class="btn btn-success"
                            >
                                Editar Paquete <i class="fas fa-save"></i>
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
                lista_paquetes: [],
                paquete: {
                    nombre: '',
                    numero_pines: '',
                    precio_pin: '',
                    descuento: 0
                }
            }
        },
        mounted() {
           this.consultarPaquetes();
        },
        methods: {
            dataTables() {
                setTimeout(() => {
                    $("#tablaPaquetes").DataTable({
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
            async consultarPaquetes(){
                this.loading = true;
                try {
                    await adminService.listarPaquetes().then(respuesta => {
                        this.lista_paquetes = respuesta.data;
                        setTimeout(()=>{
                            this.dataTables();
                        }, 500)
                    });
                   
                } catch (error) {
                    console.log(error);
                }
            },
            async guardarPaquete(){
                this.loading = true;
                try {
                    await adminService.guardarPaquete(this.paquete).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 1){
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
            editarPaquete(item){
                this.paquete = item;
            },
            async guardarEditarPaquete(){
                this.loading = true;
                try {
                    await adminService.editarPaquete(this.paquete).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 1){
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
            eliminarPaquete(id, nombre){
                Swal.fire({
                    title: "¿Esta seguro de eliminar el paquete, "+nombre+"?",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: "Si",
                    denyButtonText: `No`
                }).then((result) => {
                    if (result.isConfirmed) {
                       this.eliminar(id);
                    } 
                });
            },
            async eliminar(id){
                this.loading = true;
                try {
                    await adminService.eliminarPaquete(id).then(respuesta => {
                        this.loading = false;
                        if(respuesta.data[1] == 1){
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
        }
    }
</script>
<style >
    i {
        line-height: 1.45;
    }
</style>