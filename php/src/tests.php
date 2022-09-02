<?php
require_once './db.php';
?>
<!doctype html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <style>
        .img {
            position: absolute;
            background-image: url("forms/pami-artritis-reumatoidea-inicio.png");
            background-repeat: no-repeat;
            background-size: 100%;
            height: 297mm;
            width: 210mm;
            margin-left: 0; 
            margin-right: 0;
        }

        .fullname {
            position: absolute;
            left: 135px;
            top: 78px;
            font-size: 13pt;
        }
        .fechaNac1 {
            position: absolute;
            left: 552px;
            top: 78px;
            font-size: 13pt;
        }
        .fechaNac2 {
            position: absolute;
            left: 608px;
            top: 78px;
            font-size: 13pt;
        }
        .fechaNac3 {
            position: absolute;
            left: 680px;
            top: 78px;
            font-size: 13pt;
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/customs/dashboard.css" rel="stylesheet">
    </head>
    <body>
    <div class="img">
        <p class="fullname">Joe Doe</p>
        <p class="fechaNac1">28</p><p class="fechaNac2">05</p><p class="fechaNac3">1993</p>
    </div>
    <img src="forms/dompdf_simple.png">
    </body>
</html>