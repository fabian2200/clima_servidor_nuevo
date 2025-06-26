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
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombres</label>
                        <input type="text" class="form-control" v-model="datos.nombres" name="nombres">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Apellidos</label>
                        <input type="text" class="form-control" v-model="datos.apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cédula</label>
                        <input type="number" class="form-control" v-model="datos.cedula" name="cedula">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Correo</label>
                        <input type="email" class="form-control" v-model="datos.correo" name="correo">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pines Vendidos</label>
                                <input type="number" class="form-control" v-model="datos.pines_comprados" name="pines_comprados">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Precio x Pin</label>
                                <input type="number" class="form-control" v-model="datos.precio_pin" name="precio_pin">
                            </div>
                        </div>
                    </div>
                   <div class="text-center">
                        <button
                            @click="guardarVenta()"
                            style="width: 100%"
                            type="button"
                            class="btn btn-success"
                        >
                            Guardar Venta <i class="fas fa-save"></i>
                        </button>
                        
                   </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import * as adminService from "../../services/admin_service";
import Loading from 'vue3-loading-overlay';
import Swal from 'sweetalert2';

export default {
    components: {
        Loading
    },
    data() {
        return {
            loading: false,
            datos: {
                nombres: '',
                apellidos: '',
                cedula: '',
                correo: '',
                pines_comprados: '',
                precio_pin: ''
            }
        }
    },
    methods: {
        async guardarVenta(){
            this.loading = true;
            try {
                await adminService.registrarCompra(this.datos).then(respuesta => {
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
                            location.href = "/dashboard";
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
            } catch (error) {
                console.log(error);
            }
        },
    },
}
</script>
<style lang="">
    
</style>