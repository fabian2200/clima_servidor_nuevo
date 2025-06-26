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
            <div class="card-content" style="padding: 20px">
                <h3>Ingrese los siguientes Campos</h3>
                <hr>
                <div style="text-align: center; width: 100%"> 
                    <img :src="imageUrl" style="border-radius: 50%;" alt="Preview" height="100" width="100">
                </div>
                <br>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Logo de la Empresa</label><br>
                        <input type="file" @change="handleImageChange">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre</label>
                        <input type="text" class="form-control" v-model="datos.nombre" name="nombres">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Numero de empleados</label>
                        <input type="number" class="form-control" v-model="datos.numero_empleados" name="apellidos">
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" style="font-weight: bold">Se creara la empresa con las siguientes areas por defecto</label>
                        <div class="row">
                            <div class="col-lg-4" style="padding: 15px" v-for="(item, index) in lista_areas" :key="index">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <input type='text' class="form-control" v-model="lista_areas[index]">
                                    </div> 
                                    <div class="col-lg-3">
                                        <button
                                            @click="eliminarArea(index)"
                                            style="width: 100%"
                                            type="button"
                                            class="btn btn-outline-danger"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button
                            @click="guardarEmpresa()"
                            style="width: 100%"
                            type="button"
                            class="btn btn-success"
                        >
                            Guardar Empresa <i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
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
            imageUrl: '/imagenes_empresas/default.png',
            loading: false,
            datos: {
                nombre: '',
                logo: '',
                numero_empleados: '',
                areas: [],
                imagen_propia: 'No'
            },
            lista_areas: [
                "Recursos Humanos",
                "Finanzas",
                "Ventas",
                "Marketing",
                "Operaciones",
                "Tecnología de la Información",
                "Servicio al Cliente",
                "Logística",
                "Administración",
                "Comunicaciones",
                "Gestión de Proyectos",
                "Diseño",
                "Relaciones Públicas",
                "Consultoría",
            ]
        }
    },
    methods: {
        async guardarEmpresa(){
            this.loading = true;
            try {
                this.datos.areas = this.lista_areas;
                await clienteService.registrarEmpresa(this.datos).then(respuesta => {
                    this.loading = false;
                    if(respuesta.data[1] == 0){
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: respuesta.data[0],
                            showConfirmButton: false,
                            timer: 2500
                        });
                        setTimeout(()=>{
                            location.href = "/dashboard";
                        }, 2500)
                    }else{
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: respuesta.data[0],
                            showConfirmButton: false,
                            timer: 2500
                        });
                    }
                });
            } catch (error) {
                console.log(error);
            }
        },
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.convertToBase64(file);
                this.datos.imagen_propia = "Si";
                this.datos.logo = file;
            }
        },
        convertToBase64(file) {
            const reader = new FileReader();
            reader.onload = () => {
                this.imageUrl = reader.result;
            };
            reader.readAsDataURL(file);
        },
        eliminarArea(index){
            this.lista_areas.splice(index, 1);
        }
    },
}
</script>
<style lang="">
    
</style>