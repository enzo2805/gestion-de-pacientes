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
      * {
        font-family: Roboto, sans-serif
      }
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
      .beneficiario {
        position: absolute;
        left: 112px;
        top: 103px;
        font-size: 13pt;
      }
      .inicio_enfermedad1 {
        position: absolute;
        left: 220px;
        top: 132px;
        font-size: 13pt;
      }
      .inicio_enfermedad2 {
        position: absolute;
        left: 269px;
        top: 132px;
        font-size: 13pt;
      }
      .inicio_enfermedad3 {
        position: absolute;
        left: 303px;
        top: 132px;
        font-size: 13pt;
      }
      .peso {
        position: absolute;
        left: 415px;
        top: 132px;
        font-size: 13pt;
      }
      .talla {
        position: absolute;
        left: 550px;
        top: 132px;
        font-size: 13pt;
      }
      .resumenHC {
        position: absolute;
        left: 28px;
        top: 189px;
        font-size: 10pt;
        line-height: 1.6;
      }
      .tratamientos1 {
        position: absolute;
        left: 28px;
        top: 337px;
        font-size: 10pt;
      }
      .tratamientos2 {
        position: absolute;
        left: 412px;
        top: 337px;
        font-size: 10pt;
      }
      td.tratamiento1 {
        width: 95px;
      }
      td.tratamiento2 {
        width: 70px;
      }
      td.tratamiento3 {
        width: 80px;
      }
      td.tratamiento4 {
        width: 100px;
      }
      .laboratorio {
        position: absolute;
        left: 76px;
        top: 445px;
        font-size: 10pt;
      }
      td.laboratorio1 {
        width: 102px;
        padding-right: 65px;
      }
      td.laboratorio2 {
        width: 90px;
        padding-right: 90px;
      }
      td.laboratorio3 {
        width: 80px;
        padding-right: 120px;
      }
      td.laboratorio4 {
        width: 100px;
      }
      .farmacos {
        position: absolute;
        left: 25px;
        top: 565px;
        font-size: 10pt;
      }
      td.farmacos1 {
        width: 240px;
      }
      td.farmacos2 {
        width: 255px;
      }
      td.farmacos3 {
        width: 230px;
      }
      .monodrogaSi {
        position: absolute;
        left: 94px;
        top: 593px;
        font-size: 80pt;
        margin-top: 1px;
        margin-bottom: 1px;
      }
      .monodrogaNo {
        display: none;
        position: absolute;
        left: 142px;
        top: 593px;
        font-size: 80pt;
        margin-top: 1px;
        margin-bottom: 1px;
      }
      .asociada {
        position: absolute;
        left: 310px;
        top: 633px;
      }
      .lugar {
        position: absolute;
        left: 35px;
        top: 980px;
      }
      .fecha {
        position: absolute;
        left: 68px;
        top: 1022px;
      }
      .shoulder {
        position: absolute;
        top: 698px;
      }
      .iDolorosas {
        position: absolute;
        left: 150px;
        top: 910px;
      }
      .iInflamadas {
        position: absolute;
        left: 235px;
        top: 910px;
      }
      .dDolorosas {
        position: absolute;
        left: 320px;
        top: 910px;
      }
      .dInflamadas {
        position: absolute;
        left: 405px;
        top: 910px;
      }
      .dolorosas {
        position: absolute;
        left: 650px;
        top: 705px;
      }
      .inflamadas {
        position: absolute;
        left: 650px;
        top: 730px;
      }
      .das28 {
        position: absolute;
        left: 650px;
        top: 755px;
      }
      .haq {
        position: absolute;
        left: 650px;
        top: 780px;
      }
      .vas {
        position: absolute;
        left: 94px;
        top: 780px;
        font-size: 80pt;
        margin-top: 1px;
        margin-bottom: 1px;
      }
      .tel {
        position: absolute;
        left: 580px;
        top: 975px;
      }
      .email {
        position: absolute;
        left: 580px;
        top: 1000px;
      }
    </style>

  
    <!-- Custom styles for this template -->
    <link href="/css/customs/dashboard.css" rel="stylesheet">
  </head>
  <body>
  <div class="img">
    <p class="fullname">Joe Doe</p>
    <p class="fechaNac1">28</p><p class="fechaNac2">05</p><p class="fechaNac3">1993</p>
    <p class="beneficiario">#########</p>
    <p class="inicio_enfermedad1">15</p><p class="inicio_enfermedad2">9</p><p class="inicio_enfermedad3">2015</p>
    <p class="peso">72</p><p class="talla">175</p>
    <p class="resumenHC">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
    <table class="tratamientos1">
      <tr>
        <td class="tratamiento1">droga</td>
        <td class="tratamiento2">dosis</td>
        <td class="tratamiento3">tiempo</td>
        <td class="tratamiento4">resultado</td>
      </tr>
    </table>
    <table class="tratamientos2">
      <tr>
        <td class="tratamiento1">droga2</td>
        <td class="tratamiento2">dosis2</td>
        <td class="tratamiento3">tiempo2</td>
        <td class="tratamiento4">resultado2</td>
      </tr>
    </table>
    <table class="laboratorio">
      <tr>
        <td class="laboratorio1">Positivo</td>
        <td class="laboratorio2">VSG</td>
        <td class="laboratorio3">RH</td>
        <td class="laboratorio4">CCP</td>
      </tr>
    </table>
    <table class="farmacos">
      <tr>
        <td class="farmacos1">Droga</td>
        <td class="farmacos2">Presentación</td>
        <td class="farmacos3">Dosis</td>
      </tr>
    </table>
    <p class="monodrogaSi">·</p>
    <p class="monodrogaNo">·</p>
    <p class="asociada">Asociada con?</p>
    <p class="iDolorosas">'.$iDolorosas.'</p>
    <p class="iInflamadas">'.$iInflamadas.'</p>
    <p class="dDolorosas">'.$dDolorosas.'</p>
    <p class="dInflamadas">'.$dInflamadas.'</p>
    <p class="dolorosas">4</p>
    <p class="inflamadas">4</p>
    <p class="das28">4</p>
    <p class="haq">4</p>
    <p class="vas">·</p>
    <p class="lugar">Centro Médico Salta</p>
    <p class="fecha">23/09/2022</p>
    <p class="tel">'.$inputPhone.'</p>
    <p class="email">'.$inputEmail.'</p>
<?php
  for ($i = 0; $i <= 3; $i++)
    echo '<p class="shoulder" style="left: '.(151 + 85 * $i).'px;">x</p>';
?>
  </div>
  <img src="forms/dompdf_simple.png">
  </body>
</html>