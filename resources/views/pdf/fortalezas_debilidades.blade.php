<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .informe_fortalezas {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0;
            font-size: 14px;
            text-align: left;
        }
        .informe_fortalezas th, .informe_fortalezas td {
            border: 1px solid #c9c9c9;
            padding: 12px;
            text-align: center;
        }
        .informe_fortalezas th {
            background-color: #009199;
            color: #ffff;
        }
        .informe_fortalezas tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .informe_fortalezas tr:hover {
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
    </style>
</head>
<body>
    {!! $contenido !!}
</body>
</html>
