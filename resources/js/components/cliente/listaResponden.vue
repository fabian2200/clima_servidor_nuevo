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
                <h3>Lista de Respuestas </h3>
                <h4><strong>Empresa ({{datos_empresa.nombre}})</strong></h4>
                <hr>
                <div class="table-responsive">
                    <table id="tablaRespuestas" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: center">Sexo</th>
                                <th style="text-align: center">Edad</th>
                                <th style="text-align: center">Area</th>
                                <th style="text-align: center">Fecha</th>
                                <th style="text-align: center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in datos_empresa.responden" :key="index">
                                <td style="text-align: center">{{item.sexo}}</td>
                                <td style="text-align: center">{{item.edad}}</td>
                                <td style="text-align: center">{{item.nombre_area}}</td>
                                <td style="text-align: center">{{item.fecha_respondio}}</td>
                                <td style="display: flex; justify-content: space-around;">
                                    <router-link :to="'/respuesta/'+item.id">
                                        <button data-toggle="tooltip" data-placement="top" title="Ver respuesta" type="button" class="btn btn-info">
                                            <i style="font-size: 13px" class="fas fa-eye"></i>
                                        </button>
                                    </router-link>
                                </td>
                            </tr>
                        </tbody>
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
           id_empresa: null,
           datos_empresa: {
            nombre: ''
           },
           loading: false
        }
    },
    mounted() {
        this.id_empresa = this.$route.params.id;
        this.consultarEmpresa();
    },
    methods: {
        async consultarEmpresa(){
            this.loading = true;
            await clienteService.datosEmpresa(this.id_empresa).then(respuesta => {
                this.datos_empresa = respuesta.data;
                this.dataTables('tablaRespuestas');
            });
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
    }
}
</script>
<style lang="">
    
</style>