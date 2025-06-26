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
            <div class="card-content" style="padding: 20px; min-height: 500px">
                <h3>Seleccione una empresa</h3>
                <div class="form-group">
                    <select  @change="onChangeEmpresa($event)" id="my-select" class="form-control" name="">
                        <option value="">Seleccione....</option>
                        <option v-for="(item, index) in lista_empresas" :value="item.id" :key="index">{{item.nombre}}</option>
                    </select>
                </div>
                <hr>
                
                <div v-if="lista_areas.length > 0" class="text-center">
                    <br>
                    <div class="row">
                        <div class="col-lg-12 text-left">
                            <button data-toggle="modal" data-target="#modalRegistroArea" class="btn btn-success">Registrar Nueva Area <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row" style="padding-bottom: 15px">
                        <div class="col-lg-5 text-center">
                            <h4>Nombre Actual</h4>
                        </div>
                        <div class="col-lg-5 text-center">
                            <h4>Modificar Nombre</h4>
                        </div>
                        <div class="col-lg-2">
                            
                        </div>
                    </div>
                    <div v-for="(item, index) in lista_areas" :key="index" class="row" style="padding-bottom: 15px">
                        <div class="col-lg-5">
                            <input class="form-control" disabled :value="item.nombre_area_actual" type="text" name="">
                        </div>  
                        <div class="col-lg-5">
                            <input class="form-control" v-model="item.nombre_area" type="text" name="">
                        </div>    
                        <div class="col-lg-2 text-center">
                            <button @click="eliminarArea(item.id)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                    <hr>
                    <button
                        style="width: 40%"
                        type="button"
                        class="btn btn-success"
                        @click="editarAreas"
                    >
                        Guardar Cambios <i class="fas fa-save"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalRegistroArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registro de  Departamento/Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="area">Nombre del Departamento/Area</label>
                        <input type="text" class="form-control" v-model="nombre_nueva_area" id="area" placeholder="ej: Recursos Humanos">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="guardarArea()" class="btn btn-success">Guardar</button>                
                    <button type="button" class="btn btn-danger" @click="nombre_nueva_area = ''" data-dismiss="modal">Cerrar</button>
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

export default {
    components: {
        Loading
    },
    data() {
        return {
            lista_areas: [],
            loading: false,
            lista_empresas:[],
            id_empresa_seleccionada: 0,
            nombre_nueva_area: ''
        }
    },
    mounted() {
        this.consultarEmpresas();
    },
    methods: {
        async consultarEmpresas(){
            this.loading = true;
            try {
                await clienteService.verEmpresas().then(respuesta => {
                    this.lista_empresas = respuesta.data;
                    this.loading = false;
                });
            
            } catch (error) {
                console.log(error);
            }
        },
        onChangeEmpresa(event){
            this.id_empresa_seleccionada = event.target.value;
            this.buscarAreasEmpresa(this.id_empresa_seleccionada);
        },
        async buscarAreasEmpresa(id_empresa){
            this.loading = true;
            await clienteService.verAreas(id_empresa).then(respuesta => {
                this.lista_areas = respuesta.data;
                this.loading = false;
            });
        },
        async editarAreas(){
            var bandera = false;

            this.lista_areas.forEach(Element => {
                if(Element.nombre_area == ''){
                    bandera = true;
                }
            });

            if(bandera){
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Ningún nombre de los departamentos puede ir en blanco",
                    showConfirmButton: false,
                    timer: 2000
                });
            }else{
                this.loading = true;
                
                var datos_areas = {
                    areas: this.lista_areas
                };

                await clienteService.editarAreas(datos_areas).then(respuesta => {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: respuesta.data[0],
                        showConfirmButton: false,
                        timer: 2500
                    });
                    this.loading = false;
                    this.buscarAreasEmpresa(this.id_empresa_seleccionada);
                });
            }
        },
        eliminarArea(id_area){
            Swal.fire({
                title: "¿Desea eliminar este departamento/area?",
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "No",
                cancelButtonColor: "#ff7588",
                confirmButtonColor: "#16d39a"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.eliminarAreaOK(id_area);
                }
            });
        },
        async eliminarAreaOK(id_area){
            this.loading = true;
            await clienteService.eliminarArea(id_area).then(respuesta => {
                var respuesta_data = respuesta.data;
                this.loading = false;
                if(respuesta_data[1] == 1){
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: respuesta_data[0],
                        showConfirmButton: false,
                        timer: 3000
                    });
                    setTimeout(()=>{
                        this.buscarAreasEmpresa(this.id_empresa_seleccionada);
                    }, 3000)
                }else{
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: respuesta_data[0],
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        },
        async guardarArea(){
            if (this.nombre_nueva_area == '') {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Debe ingresar el nombre del departamento",
                    showConfirmButton: false,
                    timer: 2000
                });
            }else{
                this.loading = true;
                var datos = {
                    area: this.nombre_nueva_area,
                    id_empresa: this.id_empresa_seleccionada
                };
                await clienteService.guardarArea(datos).then(respuesta => {
                    this.loading = false;
                    var respuesta_data = respuesta.data;
                    if(respuesta_data[1] == 1){
                        $('#modalRegistroArea').modal('hide');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: respuesta_data[0],
                            showConfirmButton: false,
                            timer: 3000
                        });
                        this.nombre_nueva_area = '';
                        setTimeout(()=>{
                            this.buscarAreasEmpresa(this.id_empresa_seleccionada);
                        }, 3000)
                    }else{
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: respuesta_data[0],
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            }
        }
    }
}
</script>
<style lang="">
    
</style>