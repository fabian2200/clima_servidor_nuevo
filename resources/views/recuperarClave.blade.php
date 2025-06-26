<!DOCTYPE html>
<html lang="en">
@include('plantilla.head')
<body>
    <div id="segundoPaso" class="container" style="display: none; text-align: center;flex-direction: column; width: 100%;height: 95vh;justify-content: center;align-items: center;">
        <img src="/imagenes/success.png" width="200" alt="">
        <h2>Contraseña recuperada satisfactoriamente</h2>
        <h3>Su nueva contraseña fue enviada a su correo</h3>
        <br>
        <h4 style="font-weight: bold">Si no lo encuentra en la ventana principal, <br> revisar la ventana de spam o correos no deseados</h4>
        <br>
        <a href="/" style="background-color: #009c9f !important" class="btn btn-success">Ir a la ventana de login <i class="fas fa-sign-out-alt"></i></a>
    </div>
    <div id="primerPaso" class="container" style="display: flex; width: 100%;height: 95vh;display: flex;justify-content: center;align-items: center;">
        <div class="panel panel-default" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2); width: 400px;padding: 30px;background-color: #ffff;border-radius: 10px;">
            <div class="panel-body">
                <div class="text-center">
                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                    <h2 class="text-center">¿Olvidaste tu contraseña?</h2>
                    <p>Puede restablecer su contraseña aquí.</p>
                    <div class="panel-body">
                        <form id="register-form" autocomplete="off" class="form" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input  id="correousuario" name="text" placeholder="correo electronico o usuario" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button onclick="recuperarClave()" name="recover-submit" class="btn btn-lg btn-primary btn-block" type="button"> Enviar al correo </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function recuperarClave(){
            var correousuario = document.getElementById("correousuario").value;

            if(correousuario == ""){
                toastr.error("Todos los campos son obligatorios");
            }else{
                $.ajax({
                    url: '/api/recuperar-clave?correousuario='+correousuario,
                    type: 'GET',
                    success: function(response) {
                        if (response[1] == 1) {
                            document.getElementById("primerPaso").style.display = "none";
                            document.getElementById("segundoPaso").style.display = "flex";
                        } else {
                            toastr.error(response[0]);
                        }
                    },
                    error: function(error) {
                        toastr.warning(error);
                    }
                });
            }
        }
    </script>
    @include('plantilla.footer')
</body>
</html>