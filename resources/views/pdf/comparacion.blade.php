<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .informe_comparacion {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0;
            font-size: 16px;
            text-align: left;
        }
        .informe_comparacion th, .informe_comparacion td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .informe_comparacion th {
            background-color: #d2f7ef;
            color: #333;
        }
        .informe_comparacion tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .informe_comparacion tr:hover {
            background-color: #f1f1f1;
        }

        h5 {
            font-size: 15px !important;
            color: rgb(65, 64, 64)
        }

        .pagina-salto {
            page-break-after: always;
        }

        h3 {
            font-size: 22px !important;
            color: #009199;
        }

        .segunda_tabla {
            margin-top: 110px;
        }

        i {
            color: #3c3c3d;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        .tab-pane p {
            font-size: 15px;
        }

        .tab-pane i {
            font-size: 15px;
        }

        * {
            font-family: Arial, sans-serif;
        }

        @page { margin: 30px 50px; }

       
        header { position: fixed; top: -20px; left: 0px; right: 0px; background-color: transparent; height: 50px; color: #fbfbfb}
        footer { position: fixed; bottom: -20px; left: 0px; right: 0px; background-color: transparent; height: 50px; color: #fbfbfb}


    </style>
</head>
<body>

    <header>este es un encabezado</header>
    <footer>este es el pie de</footer>
    <main>
        <h3 style="color: #009199;"><strong>COMPARACIÓN DE DIMENSIONES</strong></h3>
        <hr>
        <h5>En este aparte se presentan las tablas cruzadas de cada una de las <strong style="color: #009199;"> 10 dimensiones </strong> del clima organizacional por área, sexo, edad, tiempo de antigüedad en el cargo y en la entidad.</h5>
        {!! $contenido !!}
    </main>
</body>
</html>
