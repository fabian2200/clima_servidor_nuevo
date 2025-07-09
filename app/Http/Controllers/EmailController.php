<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function enviarCorreo($asunto, $email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total, $orden) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
    
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.icp360rh.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'clima@icp360rh.com';
            $mail->Password = 'clima2025@';
            $mail->SMTPSecure = 'ssl'; // CAMBIADO de 'tls' a 'ssl'
            $mail->Port = 465;         // CAMBIADO de 587 a 465
            
            $mail->setFrom('clima@icp360rh.com', 'Instituto Colombiano de Psicometria');
            $mail->addAddress($email);
            $mail->SMTPKeepAlive = true;  
            $mail->Mailer = "smtp"; 
            $mail->isHTML(true);
            $subject = $asunto.' - ICP';
            $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');
            $mail->Subject = $encoded_subject;

            switch ($asunto) {
                case 'Activación de cuenta':
                    $mail->Body = self::mapearPlantilla($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total);
                    $pdfPath = public_path('manual_usuario.pdf');
                    if (file_exists($pdfPath)) {
                        $mail->addAttachment($pdfPath, 'manual_usuario.pdf');
                    } else {
                        return "El archivo PDF de activación de cuenta no se encuentra en la ruta especificada.";
                    }
                    break;
                case 'Compra de pines':
                    $mail->Body = self::mapearPlantilla2($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total);
                    break;
                case 'Compra de pines 2':
                    $subject = 'Compra de pines - ICP';
                    $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');
                    $mail->Subject = $encoded_subject;
                    $mail->Body = self::mapearPlantilla3($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total);
                    break;
                case 'Pago rechazado':
                    $subject = 'Pago rechazado - ICP';
                    $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');
                    $mail->Subject = $encoded_subject;
                    $mail->Body = self::mapearPlantilla4($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total, $orden);
                    break;
            }
        
            if ($mail->send()) {
                return "Mensaje enviado correctamente.";
            } else {
                return "Error al enviar: " . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            return "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    public function mapearPlantilla($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total){
       return  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1' />
                <title>Narrative Invitation Email</title>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                <style type='text/css'>

                /* Take care of image borders and formatting */

                img {
                max-width: 600px;
                outline: none;
                text-decoration: none;
                -ms-interpolation-mode: bicubic;
                }

                a {
                border: 0;
                outline: none;
                }

                a img {
                border: none;
                }

                /* General styling */

                td, h1, h2, h3  {
                font-family: Helvetica, Arial, sans-serif;
                font-weight: 400;
                }

                td {
                font-size: 13px;
                line-height: 19px;
                text-align: left;
                }

                body {
                -webkit-font-smoothing:antialiased;
                -webkit-text-size-adjust:none;
                width: 100%;
                height: 100%;
                color: #37302d;
                background: #ffffff;
                }

                table {
                border-collapse: collapse !important;
                }


                h1, h2, h3, h4 {
                padding: 0;
                margin: 0;
                color: #444444;
                font-weight: 400;
                line-height: 110%;
                }

                h1 {
                font-size: 35px;
                }

                h2 {
                font-size: 30px;
                }

                h3 {
                font-size: 24px;
                }

                h4 {
                font-size: 18px;
                font-weight: normal;
                }

                .important-font {
                color: #21BEB4;
                font-weight: bold;
                }

                .hide {
                display: none !important;
                }

                .force-full-width {
                width: 100% !important;
                }

                </style>

                <style type='text/css' media='screen'>
                    @media screen {
                    @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

                    /* Thanks Outlook 2013! */
                    td, h1, h2, h3 {
                        font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                    }
                    }
                </style>

                <style type='text/css' media='only screen and (max-width: 600px)'>
                /* Mobile styles */
                @media only screen and (max-width: 600px) {

                    table[class='w320'] {
                    width: 320px !important;
                    }

                    table[class='w300'] {
                    width: 300px !important;
                    }

                    table[class='w290'] {
                    width: 290px !important;
                    }

                    td[class='w320'] {
                    width: 320px !important;
                    }

                    td[class~='mobile-padding'] {
                    padding-left: 14px !important;
                    padding-right: 14px !important;
                    }

                    td[class*='mobile-padding-left'] {
                    padding-left: 14px !important;
                    }

                    td[class*='mobile-padding-right'] {
                    padding-right: 14px !important;
                    }

                    td[class*='mobile-padding-left-only'] {
                    padding-left: 14px !important;
                    padding-right: 0 !important;
                    }

                    td[class*='mobile-padding-right-only'] {
                    padding-right: 14px !important;
                    padding-left: 0 !important;
                    }

                    td[class*='mobile-block'] {
                    display: block !important;
                    width: 100% !important;
                    text-align: left !important;
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                    padding-bottom: 15px !important;
                    }

                    td[class*='mobile-no-padding-bottom'] {
                    padding-bottom: 0 !important;
                    }

                    td[class~='mobile-center'] {
                    text-align: center !important;
                    }

                    table[class*='mobile-center-block'] {
                    float: none !important;
                    margin: 0 auto !important;
                    }

                    *[class*='mobile-hide'] {
                    display: none !important;
                    width: 0 !important;
                    height: 0 !important;
                    line-height: 0 !important;
                    font-size: 0 !important;
                    }

                    td[class*='mobile-border'] {
                    border: 0 !important;
                    }
                }
                </style>
            </head>
            <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
            <div style='padding: 2%; text-align: center'>
                <img style='width: 114px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMH35LoELuTjL6_P4iBqIDza9nfGfKw-tT2kGv0f1cnA&s' width = '60%' alt='Your Logo'/>
            </div>
            <div class='row' style='padding-top: 20px'>
                <div class='col-lg-9' style= 'padding-left: 10%; padding-right: 10%;border-right: 3px solid gray;border-left: 3px solid gray;'>
                    <h3><b>Cuenta Creada</b></h3>
                    <br>
                    <h4>Cordial saludo $nombres_apellidos:</h4>
                    <h4 style='text-align: justify;'>Usted ha adquirido nuestro servicio</h4>
                    <br>
                    <h4 style='color: #d10808; font-weight: bold'>Datos de Acceso</h4>
                    <hr>
                    <p style='font-weight: bold; margin: 4px;'>Su usuario es: $usuario</p>
                    <p style='font-weight: bold; margin: 4px;'>Su clave es: $password</p>
                    <p style='font-weight: bold; margin: 4px;'>El enlace de inicio es: https://climalaboral.icp360rh.com/</p>
                    <br>
                    <h4>Resumen de su compra</h4>
                    <br>
                    <table style='width: 100% !important; border: 1px solid;'>
                    <tr style='border: 1px solid;'>
                    <td style='font-weight: bold; border: 1px solid;'>Pines Comprados</td>
                    <td style='font-weight: bold; border: 1px solid;'>Precio Pin</td>
                    <td style='font-weight: bold; border: 1px solid;'>Total</td>
                    </tr>
                    <tr style='border: 1px solid;'>
                    <td style='font-weight: bold; border: 1px solid;'>$pines</td>
                    <td style='font-weight: bold; border: 1px solid;'>$ $precio</td>
                    <td style='font-weight: bold; border: 1px solid;'>$ $total</td>
                    </tr>
                    </table>
                    <br>
                    <h4 style='text-align:justify; color: #d10808;'>En este correo se adjunta el manual de usuario del programa, por favor descargarlo.</h4>
                    <h4 style='text-align:justify;'>De antemano agradecemos la confianza depositada en nosotros.</h4>
                    <br>
                    <h4>Atentamente</b></h4>
                    <br>
                    <p style='margin: 4px;'>Instituto Colombiano de Psicometría.</p>
                    <p style='margin: 4px;'>Ps. Mgr. Antonio Martínez, Gerente</p>
                    <p style='margin: 4px;'>Correo: incolpsicometria@gmail.com - Celular (WhatsApp): 3012990890</p>
                </div>
            </div>
            </body>
        </html>";
    }

    public function mapearPlantilla2($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total){
        return  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
             <html xmlns='http://www.w3.org/1999/xhtml'>
             <head>
                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                 <meta name='viewport' content='width=device-width, initial-scale=1' />
                 <title>Narrative Invitation Email</title>
                 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
                 <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                 <style type='text/css'>
 
                 /* Take care of image borders and formatting */
 
                 img {
                 max-width: 600px;
                 outline: none;
                 text-decoration: none;
                 -ms-interpolation-mode: bicubic;
                 }
 
                 a {
                 border: 0;
                 outline: none;
                 }
 
                 a img {
                 border: none;
                 }
 
                 /* General styling */
 
                 td, h1, h2, h3  {
                 font-family: Helvetica, Arial, sans-serif;
                 font-weight: 400;
                 }
 
                 td {
                 font-size: 13px;
                 line-height: 19px;
                 text-align: left;
                 }
 
                 body {
                 -webkit-font-smoothing:antialiased;
                 -webkit-text-size-adjust:none;
                 width: 100%;
                 height: 100%;
                 color: #37302d;
                 background: #ffffff;
                 }
 
                 table {
                 border-collapse: collapse !important;
                 }
 
 
                 h1, h2, h3, h4 {
                 padding: 0;
                 margin: 0;
                 color: #444444;
                 font-weight: 400;
                 line-height: 110%;
                 }
 
                 h1 {
                 font-size: 35px;
                 }
 
                 h2 {
                 font-size: 30px;
                 }
 
                 h3 {
                 font-size: 24px;
                 }
 
                 h4 {
                 font-size: 18px;
                 font-weight: normal;
                 }
 
                 .important-font {
                 color: #21BEB4;
                 font-weight: bold;
                 }
 
                 .hide {
                 display: none !important;
                 }
 
                 .force-full-width {
                 width: 100% !important;
                 }
 
                 </style>
 
                 <style type='text/css' media='screen'>
                     @media screen {
                     @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
 
                     /* Thanks Outlook 2013! */
                     td, h1, h2, h3 {
                         font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                     }
                     }
                 </style>
 
                 <style type='text/css' media='only screen and (max-width: 600px)'>
                 /* Mobile styles */
                 @media only screen and (max-width: 600px) {
 
                     table[class='w320'] {
                     width: 320px !important;
                     }
 
                     table[class='w300'] {
                     width: 300px !important;
                     }
 
                     table[class='w290'] {
                     width: 290px !important;
                     }
 
                     td[class='w320'] {
                     width: 320px !important;
                     }
 
                     td[class~='mobile-padding'] {
                     padding-left: 14px !important;
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left'] {
                     padding-left: 14px !important;
                     }
 
                     td[class*='mobile-padding-right'] {
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left-only'] {
                     padding-left: 14px !important;
                     padding-right: 0 !important;
                     }
 
                     td[class*='mobile-padding-right-only'] {
                     padding-right: 14px !important;
                     padding-left: 0 !important;
                     }
 
                     td[class*='mobile-block'] {
                     display: block !important;
                     width: 100% !important;
                     text-align: left !important;
                     padding-left: 0 !important;
                     padding-right: 0 !important;
                     padding-bottom: 15px !important;
                     }
 
                     td[class*='mobile-no-padding-bottom'] {
                     padding-bottom: 0 !important;
                     }
 
                     td[class~='mobile-center'] {
                     text-align: center !important;
                     }
 
                     table[class*='mobile-center-block'] {
                     float: none !important;
                     margin: 0 auto !important;
                     }
 
                     *[class*='mobile-hide'] {
                     display: none !important;
                     width: 0 !important;
                     height: 0 !important;
                     line-height: 0 !important;
                     font-size: 0 !important;
                     }
 
                     td[class*='mobile-border'] {
                     border: 0 !important;
                     }
                 }
                 </style>
             </head>
             <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
             <div style='padding: 2%; text-align: center'>
                 <img style='width: 114px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMH35LoELuTjL6_P4iBqIDza9nfGfKw-tT2kGv0f1cnA&s' width = '60%' alt='Your Logo'/>
             </div>
             <div class='row' style='padding-top: 20px'>
                 <div class='col-lg-9' style= 'padding-left: 10%; padding-right: 10%;border-right: 3px solid gray;border-left: 3px solid gray;'>
                     <h3><b>Compra de Pines</b></h3>
                     <br>
                     <h4>Cordial saludo $nombres_apellidos:</h4>
                     <h4 style='text-align: justify;'>Usted ha adquirido nuestro servicio</h4>                    
                     <br>
                     <h4>Resumen de su compra</h4>
                     <br>
                     <table style='width: 100% !important; border: 1px solid;'>
                     <tr style='border: 1px solid;'>
                     <td style='font-weight: bold; border: 1px solid;'>Pines Comprados</td>
                     <td style='font-weight: bold; border: 1px solid;'>Precio Pin</td>
                     <td style='font-weight: bold; border: 1px solid;'>Total</td>
                     </tr>
                     <tr style='border: 1px solid;'>
                     <td style='font-weight: bold; border: 1px solid;'>$pines</td>
                     <td style='font-weight: bold; border: 1px solid;'>$ $precio</td>
                     <td style='font-weight: bold; border: 1px solid;'>$ $total</td>
                     </tr>
                     </table>
                     <br>
                     <h4 style='text-align:justify;'>De antemano agradecemos la confianza depositada en nosotros.</h4>
                     <br>
                     <h4>Atentamente</b></h4>
                     <br>
                     <p style='margin: 4px;'>Instituto Colombiano de Psicometría.</p>
                     <p style='margin: 4px;'>Ps. Mgr. Antonio Martínez, Gerente</p>
                     <p style='margin: 4px;'>Correo: incolpsicometria@gmail.com - Celular (WhatsApp): 3012990890</p>
                 </div>
             </div>             
             </body>
         </html>";
    }

    public function mapearPlantilla3($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total){
        return  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
             <html xmlns='http://www.w3.org/1999/xhtml'>
             <head>
                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                 <meta name='viewport' content='width=device-width, initial-scale=1' />
                 <title>Narrative Invitation Email</title>
                 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
                 <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                 <style type='text/css'>
 
                 /* Take care of image borders and formatting */
 
                 img {
                 max-width: 600px;
                 outline: none;
                 text-decoration: none;
                 -ms-interpolation-mode: bicubic;
                 }
 
                 a {
                 border: 0;
                 outline: none;
                 }
 
                 a img {
                 border: none;
                 }
 
                 /* General styling */
 
                 td, h1, h2, h3  {
                 font-family: Helvetica, Arial, sans-serif;
                 font-weight: 400;
                 }
 
                 td {
                 font-size: 13px;
                 line-height: 19px;
                 text-align: left;
                 }
 
                 body {
                 -webkit-font-smoothing:antialiased;
                 -webkit-text-size-adjust:none;
                 width: 100%;
                 height: 100%;
                 color: #37302d;
                 background: #ffffff;
                 }
 
                 table {
                 border-collapse: collapse !important;
                 }
 
 
                 h1, h2, h3, h4 {
                 padding: 0;
                 margin: 0;
                 color: #444444;
                 font-weight: 400;
                 line-height: 110%;
                 }
 
                 h1 {
                 font-size: 35px;
                 }
 
                 h2 {
                 font-size: 30px;
                 }
 
                 h3 {
                 font-size: 24px;
                 }
 
                 h4 {
                 font-size: 18px;
                 font-weight: normal;
                 }
 
                 .important-font {
                 color: #21BEB4;
                 font-weight: bold;
                 }
 
                 .hide {
                 display: none !important;
                 }
 
                 .force-full-width {
                 width: 100% !important;
                 }
 
                 </style>
 
                 <style type='text/css' media='screen'>
                     @media screen {
                     @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
 
                     /* Thanks Outlook 2013! */
                     td, h1, h2, h3 {
                         font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                     }
                     }
                 </style>
 
                 <style type='text/css' media='only screen and (max-width: 600px)'>
                 /* Mobile styles */
                 @media only screen and (max-width: 600px) {
 
                     table[class='w320'] {
                     width: 320px !important;
                     }
 
                     table[class='w300'] {
                     width: 300px !important;
                     }
 
                     table[class='w290'] {
                     width: 290px !important;
                     }
 
                     td[class='w320'] {
                     width: 320px !important;
                     }
 
                     td[class~='mobile-padding'] {
                     padding-left: 14px !important;
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left'] {
                     padding-left: 14px !important;
                     }
 
                     td[class*='mobile-padding-right'] {
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left-only'] {
                     padding-left: 14px !important;
                     padding-right: 0 !important;
                     }
 
                     td[class*='mobile-padding-right-only'] {
                     padding-right: 14px !important;
                     padding-left: 0 !important;
                     }
 
                     td[class*='mobile-block'] {
                     display: block !important;
                     width: 100% !important;
                     text-align: left !important;
                     padding-left: 0 !important;
                     padding-right: 0 !important;
                     padding-bottom: 15px !important;
                     }
 
                     td[class*='mobile-no-padding-bottom'] {
                     padding-bottom: 0 !important;
                     }
 
                     td[class~='mobile-center'] {
                     text-align: center !important;
                     }
 
                     table[class*='mobile-center-block'] {
                     float: none !important;
                     margin: 0 auto !important;
                     }
 
                     *[class*='mobile-hide'] {
                     display: none !important;
                     width: 0 !important;
                     height: 0 !important;
                     line-height: 0 !important;
                     font-size: 0 !important;
                     }
 
                     td[class*='mobile-border'] {
                     border: 0 !important;
                     }
                 }
                 </style>
             </head>
             <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
             <div style='padding: 2%; text-align: center'>
                 <img style='width: 114px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMH35LoELuTjL6_P4iBqIDza9nfGfKw-tT2kGv0f1cnA&s' width = '60%' alt='Your Logo'/>
             </div>
             <div class='row' style='padding-top: 20px'>
                 <div class='col-lg-9' style= 'padding-left: 10%; padding-right: 10%;border-right: 3px solid gray;border-left: 3px solid gray;'>
                     <h3><b>Compra de Pines</b></h3>
                     <br>
                     <h4>Cordial saludo $nombres_apellidos:</h4>
                     <h4 style='text-align: justify;'>Usted ha adquirido nuestro servicio</h4>                    
                     <br>
                     <h4>Resumen de su compra</h4>
                     <br>
                     <table style='width: 100% !important; border: 1px solid;'>
                     <tr style='border: 1px solid;'>
                     <td style='font-weight: bold; border: 1px solid;'>Pines Comprados</td>
                     <td style='font-weight: bold; border: 1px solid;'>Precio Pin</td>
                     <td style='font-weight: bold; border: 1px solid;'>Total</td>
                     </tr>
                     <tr style='border: 1px solid;'>
                     <td style='font-weight: bold; border: 1px solid;'>$pines</td>
                     <td style='font-weight: bold; border: 1px solid;'>$ $precio</td>
                     <td style='font-weight: bold; border: 1px solid;'>$ $total</td>
                     </tr>
                     </table>
                     <br>
                     <h4 style='text-align:justify;'>hemos actualizado la cantidad de pines de su cuenta, sumando ($pines) a la cantidad que ya tenia.</h4>
                     <br>
                     <h4 style='text-align:justify;'>De antemano agradecemos la confianza depositada en nosotros.</h4>
                     <br>
                     <h4>Atentamente</b></h4>
                     <br>
                     <p style='margin: 4px;'>Instituto Colombiano de Psicometría.</p>
                     <p style='margin: 4px;'>Ps. Mgr. Antonio Martínez, Gerente</p>
                     <p style='margin: 4px;'>Correo: incolpsicometria@gmail.com - Celular (WhatsApp): 3012990890</p>
                 </div>
             </div>             
             </body>
         </html>";
    }

    public function enviarCorreoClave($nombres_apellidos, $clave, $email){
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
    
        try {
            
            $mail->isSMTP();
            $mail->Host = 'mail.icp360rh.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'clima@icp360rh.com';
            $mail->Password = 'clima2025@';
            $mail->SMTPSecure = 'ssl'; // CAMBIADO de 'tls' a 'ssl'
            $mail->Port = 465;         // CAMBIADO de 587 a 465
            
            $mail->setFrom('clima@icp360rh.com', 'Instituto Colombiano de Psicometria');
            $mail->addAddress($email);
            $mail->SMTPKeepAlive = true;  
            $mail->Mailer = "smtp"; 
            $mail->isHTML(true);
            
            $subject = 'Recuperación de clave de acceso - ICP';
            $encoded_subject = mb_encode_mimeheader($subject, 'UTF-8');
            $mail->Subject = $encoded_subject;
            $mail->Body = self::mapearPlantillaClave($nombres_apellidos, $clave);
    
            $mail->send();
            return "Correo enviado correctamente!";
        } catch (Exception $e) {
            return "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    public function mapearPlantillaClave($nombres_apellidos, $clave){
        return  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
             <html xmlns='http://www.w3.org/1999/xhtml'>
             <head>
                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                 <meta name='viewport' content='width=device-width, initial-scale=1' />
                 <title>Narrative Invitation Email</title>
                 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
                 <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                 <style type='text/css'>
 
                 /* Take care of image borders and formatting */
 
                 img {
                 max-width: 600px;
                 outline: none;
                 text-decoration: none;
                 -ms-interpolation-mode: bicubic;
                 }
 
                 a {
                 border: 0;
                 outline: none;
                 }
 
                 a img {
                 border: none;
                 }
 
                 /* General styling */
 
                 td, h1, h2, h3  {
                 font-family: Helvetica, Arial, sans-serif;
                 font-weight: 400;
                 }
 
                 td {
                 font-size: 13px;
                 line-height: 19px;
                 text-align: left;
                 }
 
                 body {
                 -webkit-font-smoothing:antialiased;
                 -webkit-text-size-adjust:none;
                 width: 100%;
                 height: 100%;
                 color: #37302d;
                 background: #ffffff;
                 }
 
                 table {
                 border-collapse: collapse !important;
                 }
 
 
                 h1, h2, h3, h4 {
                 padding: 0;
                 margin: 0;
                 color: #444444;
                 font-weight: 400;
                 line-height: 110%;
                 }
 
                 h1 {
                 font-size: 35px;
                 }
 
                 h2 {
                 font-size: 30px;
                 }
 
                 h3 {
                 font-size: 24px;
                 }
 
                 h4 {
                 font-size: 18px;
                 font-weight: normal;
                 }
 
                 .important-font {
                 color: #21BEB4;
                 font-weight: bold;
                 }
 
                 .hide {
                 display: none !important;
                 }
 
                 .force-full-width {
                 width: 100% !important;
                 }

 
                 </style>
 
                 <style type='text/css' media='screen'>
                     @media screen {
                     @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
 
                     /* Thanks Outlook 2013! */
                     td, h1, h2, h3 {
                         font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                     }
                     }
                 </style>
 
                 <style type='text/css' media='only screen and (max-width: 600px)'>
                 /* Mobile styles */
                 @media only screen and (max-width: 600px) {
 
                     table[class='w320'] {
                     width: 320px !important;
                     }
 
                     table[class='w300'] {
                     width: 300px !important;
                     }
 
                     table[class='w290'] {
                     width: 290px !important;
                     }
 
                     td[class='w320'] {
                     width: 320px !important;
                     }
 
                     td[class~='mobile-padding'] {
                     padding-left: 14px !important;
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left'] {
                     padding-left: 14px !important;
                     }
 
                     td[class*='mobile-padding-right'] {
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left-only'] {
                     padding-left: 14px !important;
                     padding-right: 0 !important;
                     }
 
                     td[class*='mobile-padding-right-only'] {
                     padding-right: 14px !important;
                     padding-left: 0 !important;
                     }
 
                     td[class*='mobile-block'] {
                     display: block !important;
                     width: 100% !important;
                     text-align: left !important;
                     padding-left: 0 !important;
                     padding-right: 0 !important;
                     padding-bottom: 15px !important;
                     }
 
                     td[class*='mobile-no-padding-bottom'] {
                     padding-bottom: 0 !important;
                     }
 
                     td[class~='mobile-center'] {
                     text-align: center !important;
                     }
 
                     table[class*='mobile-center-block'] {
                     float: none !important;
                     margin: 0 auto !important;
                     }
 
                     *[class*='mobile-hide'] {
                     display: none !important;
                     width: 0 !important;
                     height: 0 !important;
                     line-height: 0 !important;
                     font-size: 0 !important;
                     }
 
                     td[class*='mobile-border'] {
                     border: 0 !important;
                     }
                 }
                 </style>
             </head>
             <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
             <div style='padding: 2%; text-align: center'>
                 <img style='width: 114px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMH35LoELuTjL6_P4iBqIDza9nfGfKw-tT2kGv0f1cnA&s' width = '60%' alt='Your Logo'/>
             </div>
             <div class='row' style='padding-top: 20px'>
                 <div class='col-lg-9' style= 'padding-left: 10%; padding-right: 10%;border-right: 3px solid gray;border-left: 3px solid gray;'>
                     <h3><b>Contraseña actualizada</b></h3>
                     <br>
                     <h4>Cordial saludo $nombres_apellidos:</h4>
                     <h4 style='text-align: justify;'>Cambiamos tu contraseña, tal como lo solicitaste.</h4>                    
                     <br>
                     <h4>Si no solicitaste el cambio de contraseña, estamos aquí para ayudarte a proteger tu cuenta. Tan solo contáctenos.</h4>
                     <br>
                     <h4 style='text-align:justify;'>Su nueva contraseña es: <strong>$clave</strong></h4>
                     <br>
                     <h4>Atentamente</b></h4>
                     <br>
                     <p style='margin: 4px;'>Instituto Colombiano de Psicometría.</p>
                     <p style='margin: 4px;'>Ps. Mgr. Antonio Martínez, Gerente</p>
                     <p style='margin: 4px;'>Correo: incolpsicometria@gmail.com - Celular (WhatsApp): 3012990890</p>
                 </div>
             </div>             
             </body>
         </html>";
    }

    public function mapearPlantilla4($email, $nombres_apellidos, $usuario, $password, $pines, $precio, $total, $orden){
        return  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
             <html xmlns='http://www.w3.org/1999/xhtml'>
             <head>
                 <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                 <meta name='viewport' content='width=device-width, initial-scale=1' />
                 <title>Narrative Invitation Email</title>
                 <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
                 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                 <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
                 <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
                 <style type='text/css'>
 
                 /* Take care of image borders and formatting */
 
                 img {
                 max-width: 600px;
                 outline: none;
                 text-decoration: none;
                 -ms-interpolation-mode: bicubic;
                 }
 
                 a {
                 border: 0;
                 outline: none;
                 }
 
                 a img {
                 border: none;
                 }
 
                 /* General styling */
 
                 td, h1, h2, h3  {
                 font-family: Helvetica, Arial, sans-serif;
                 font-weight: 400;
                 }
 
                 td {
                 font-size: 13px;
                 line-height: 19px;
                 text-align: left;
                 }
 
                 body {
                 -webkit-font-smoothing:antialiased;
                 -webkit-text-size-adjust:none;
                 width: 100%;
                 height: 100%;
                 color: #37302d;
                 background: #ffffff;
                 }
 
                 table {
                 border-collapse: collapse !important;
                 }
 
 
                 h1, h2, h3, h4 {
                 padding: 0;
                 margin: 0;
                 color: #444444;
                 font-weight: 400;
                 line-height: 110%;
                 }
 
                 h1 {
                 font-size: 35px;
                 }
 
                 h2 {
                 font-size: 30px;
                 }
 
                 h3 {
                 font-size: 24px;
                 }
 
                 h4 {
                 font-size: 18px;
                 font-weight: normal;
                 }
 
                 .important-font {
                 color: #21BEB4;
                 font-weight: bold;
                 }
 
                 .hide {
                 display: none !important;
                 }
 
                 .force-full-width {
                 width: 100% !important;
                 }
 
                 </style>
 
                 <style type='text/css' media='screen'>
                     @media screen {
                     @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);
 
                     /* Thanks Outlook 2013! */
                     td, h1, h2, h3 {
                         font-family: 'Open Sans', 'Helvetica Neue', Arial, sans-serif !important;
                     }
                     }
                 </style>
 
                 <style type='text/css' media='only screen and (max-width: 600px)'>
                 /* Mobile styles */
                 @media only screen and (max-width: 600px) {
 
                     table[class='w320'] {
                     width: 320px !important;
                     }
 
                     table[class='w300'] {
                     width: 300px !important;
                     }
 
                     table[class='w290'] {
                     width: 290px !important;
                     }
 
                     td[class='w320'] {
                     width: 320px !important;
                     }
 
                     td[class~='mobile-padding'] {
                     padding-left: 14px !important;
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left'] {
                     padding-left: 14px !important;
                     }
 
                     td[class*='mobile-padding-right'] {
                     padding-right: 14px !important;
                     }
 
                     td[class*='mobile-padding-left-only'] {
                     padding-left: 14px !important;
                     padding-right: 0 !important;
                     }
 
                     td[class*='mobile-padding-right-only'] {
                     padding-right: 14px !important;
                     padding-left: 0 !important;
                     }
 
                     td[class*='mobile-block'] {
                     display: block !important;
                     width: 100% !important;
                     text-align: left !important;
                     padding-left: 0 !important;
                     padding-right: 0 !important;
                     padding-bottom: 15px !important;
                     }
 
                     td[class*='mobile-no-padding-bottom'] {
                     padding-bottom: 0 !important;
                     }
 
                     td[class~='mobile-center'] {
                     text-align: center !important;
                     }
 
                     table[class*='mobile-center-block'] {
                     float: none !important;
                     margin: 0 auto !important;
                     }
 
                     *[class*='mobile-hide'] {
                     display: none !important;
                     width: 0 !important;
                     height: 0 !important;
                     line-height: 0 !important;
                     font-size: 0 !important;
                     }
 
                     td[class*='mobile-border'] {
                     border: 0 !important;
                     }
                 }

                 .btn-enlace{
                    background-color: #21BEB4;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-decoration: none;
                    margin-top: 20px;
                    margin-bottom: 20px;
                 }
                 </style>
             </head>
             <body class='body' style='padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
             <div style='padding: 2%; text-align: center'>
                 <img style='width: 114px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMH35LoELuTjL6_P4iBqIDza9nfGfKw-tT2kGv0f1cnA&s' width = '60%' alt='Your Logo'/>
             </div>
             <div class='row' style='padding-top: 20px'>
                 <div class='col-lg-9' style= 'padding-left: 10%; padding-right: 10%;border-right: 3px solid gray;border-left: 3px solid gray;'>
                     <h3><b>Compra de Pines</b></h3>
                     <br>
                     <h4>Cordial saludo $nombres_apellidos:</h4>
                     <h4 style='text-align: justify;'>Información Importante</h4>                    
                     <br>
                     <h4>Pago rechazado</h4>
                     <br>
                     <h4 style='text-align:justify;'>Su pago ha sido rechazado, por favor intente nuevamente.</h4>
                     <br>
                     <h4 style='text-align:justify;'>Orden: $orden</h4>
                     <br>
                     <h4 style='text-align:justify;'>para conocer los detalles de su pago, por favor ingrese al siguiente link:</h4>
                     <br><br>
                     <a class='btn-enlace' href='https://lclima.icp360rh.com/estado-pago?payment_id=$orden'>Detalle del pago</a>
                     <br><br>
                     <h4 style='text-align:justify;'>Si tiene alguna duda, por favor contáctenos.</h4>
                     <br>
                     <h4>Atentamente</b></h4>
                     <br>
                     <p style='margin: 4px;'>Instituto Colombiano de Psicometría.</p>
                     <p style='margin: 4px;'>Ps. Mgr. Antonio Martínez, Gerente</p>
                     <p style='margin: 4px;'>Correo: incolpsicometria@gmail.com - Celular (WhatsApp): 3012990890</p>
                 </div>
             </div>             
             </body>
        </html>";
    }
}
