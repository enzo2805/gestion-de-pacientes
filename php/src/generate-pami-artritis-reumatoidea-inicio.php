<?php

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->getOptions()->setChroot('/var/www/html/forms');

$html = '<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Template · Bootstrap v5.2</title>

  <style>
        body {
            margin-top: 0px;
            margin-left: 0px;
        }
        .img {
            position: fixed;
            background-image: url("forms/pami-artritis-reumatoidea-inicio.png");
            background-repeat: no-repeat;
            background-size: 100%;
            height: 297mm;
            width: 210mm;
            margin-left: -40px; 
            margin-top: -40px;
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
</body>
</html>';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>