<?php

require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$name = $_POST['inputName'];
$birthDate = $_POST['inputBirthDate'];
$birthDateExploted = explode("-",$birthDate);
$beneficiary = $_POST['inputBeneficiary'];
$startDate = $_POST['inputStartDate'];
$startDateExploted = explode("-",$startDate);
$weight = $_POST['inputWeight'];
$height = $_POST['inputHeight'];
$summaryHC = $_POST['inputSummaryHC'];
$inputDrug = $_POST['inputDrug'];
$inputDosis = $_POST['inputDosis'];
$inputTime = $_POST['inputTime'];
$inputResults = $_POST['inputResults'];
$RFactor = $_POST['inputRFactor'];
$VSG = $_POST['inputVSG'];
$PSR = $_POST['inputPCR'];
$CPP = $_POST['inputCPP'];
$drugFarmaco = $_POST['inputFarmaco'];
$presentation = $_POST['inputPresentation'];
$dosisFarmaco = $_POST['inputDosisFarmaco'];
$monodrug = $_POST['monoDrug'];
$relatedTo = $_POST['inputRelatedTo'];
$shoulder = $_POST['shoulder'];
$elbow = $_POST['elbow'];
$wrists = $_POST['wrists'];
$mcf1 = $_POST['mcf1'];
$mcf2 = $_POST['mcf2'];
$mcf3 = $_POST['mcf3'];
$mcf4 = $_POST['mcf4'];
$mcf5 = $_POST['mcf5'];
$ifp1 = $_POST['ifp1'];
$ifp2 = $_POST['ifp2'];
$ifp3 = $_POST['ifp3'];
$ifp4 = $_POST['ifp4'];
$ifp5 = $_POST['ifp5'];
$knee = $_POST['knee'];
$iDolorosas = $_POST['iDolorosas'];
$iInflamadas = $_POST['iInflamadas'];
$dDolorosas = $_POST['dDolorosas'];
$dInflamadas = $_POST['dInflamadas'];
$dolorosasTotal = $_POST['dolorosasTotal'];
$inflamadasTotal = $_POST['inflamadasTotal'];
$das28 = $_POST['das28'];
$haq = $_POST['haq'];
$vasRadio = $_POST['vasRadio'];
$inputPlace = $_POST['inputPlace'];
$inputDate = $_POST['inputDate'];
$inputDateExploted = explode("-",$inputDate);
$inputPhone = $_POST['inputPhone'];
$inputEmail = $_POST['inputEmail'];

$displaySi = ($monodrug == "Si") ? "block" : "none";
$displayNo = ($monodrug == "No") ? "block" : "none";

$displayVas = isset($vasRadio) ? 'block' : 'none';
switch ($vasRadio) {
  case 0:
    $vas = 169 + $vasRadio * 17;
    break;
  case 1:
    $vas = 169 + $vasRadio * 17 + $vasRadio;
    break;
  case 2:
    $vas = 168 + $vasRadio * 17 + $vasRadio;
    break;
  case 3:
    $vas = 168 + $vasRadio * 17 + $vasRadio;
    break;
  case 4:
    $vas = 167 + $vasRadio * 17 + $vasRadio;
    break;
  case 5:
    $vas = 167 + $vasRadio * 17 + $vasRadio;
    break;
  case 6:
    $vas = 167 + $vasRadio * 17 + $vasRadio;
    break;
  case 7:
    $vas = 168 + $vasRadio * 17 + $vasRadio;
    break;
  case 8:
    $vas = 168 + $vasRadio * 17 + $vasRadio;
    break;
  case 9:
    $vas = 169 + $vasRadio * 17 + $vasRadio;
    break;
  case 10:
    $vas = 172 + $vasRadio * 17 + $vasRadio;
    break;
}

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->getOptions()->setChroot('/var/www/html/forms');

$html = '<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Template · Bootstrap v5.2</title>

  <style>
    * {
      font-family: Roboto, sans-serif;
      font-size: 10pt;
    }
    .img {
      position: absolute;
      background-image: url("../../forms/pami-artritis-reumatoidea-inicio.png");
      background-repeat: no-repeat;
      background-size: 100%;
      height: 297mm;
      width: 210mm;
      margin-left: -45px; 
      margin-top: -45px;
    }

    .fullname {
      position: absolute;
      left: 135px;
      top: 90px;
    }
    .fechaNac1 {
      position: absolute;
      left: 552px;
      top: 90px;
    }
    .fechaNac2 {
      position: absolute;
      left: 608px;
      top: 90px;
    }
    .fechaNac3 {
      position: absolute;
      left: 680px;
      top: 90px;
    }
    .beneficiario {
      position: absolute;
      left: 115px;
      top: 113px;
    }
    .inicio_enfermedad1 {
      position: absolute;
      left: 220px;
      top: 145px;
    }
    .inicio_enfermedad2 {
      position: absolute;
      left: 269px;
      top: 145px;
    }
    .inicio_enfermedad3 {
      position: absolute;
      left: 303px;
      top: 145px;
    }
    .peso {
      position: absolute;
      left: 415px;
      top: 145px;
    }
    .talla {
      position: absolute;
      left: 550px;
      top: 145px;
    }
    .resumenHC {
      position: absolute;
      left: 28px;
      top: 188px;
      line-height: 1.75;
      max-width: 740px;
    }
    .tratamientos1 {
      position: absolute;
      left: 28px;
      top: 343px;
    }
    .tratamientos2 {
      position: absolute;
      left: 412px;
      top: 343px;
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
      left: 78px;
      top: 450px;
    }
    td.laboratorio1 {
      width: 102px;
      padding-right: 62px;
    }
    td.laboratorio2 {
      width: 90px;
      padding-right: 88px;
    }
    td.laboratorio3 {
      width: 80px;
      padding-right: 122px;
    }
    td.laboratorio4 {
      width: 100px;
    }
    .farmacos {
      position: absolute;
      left: 30px;
      top: 577px;
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
      display: '.$displaySi.';
      position: absolute;
      left: 98px;
      top: 595px;
      font-size: 80pt;
      margin-top: 1px;
      margin-bottom: 1px;
      font-family: Arial;
    }
    .monodrogaNo {
      display: '.$displayNo.';
      position: absolute;
      left: 147px;
      top: 595px;
      font-size: 80pt;
      margin-top: 1px;
      margin-bottom: 1px;
      font-family: Arial;
    }
    .asociada {
      position: absolute;
      left: 310px;
      top: 639px;
    }
    .shoulder {
      position: absolute;
      top: 704px;
    }
    .elbow {
      position: absolute;
      top: 719px;
    }
    .wrists {
      position: absolute;
      top: 735px;
    }
    .mcf1 {
      position: absolute;
      top: 749px;
    }
    .mcf2 {
      position: absolute;
      top: 766px;
    }
    .mcf3 {
      position: absolute;
      top: 781px;
    }
    .mcf4 {
      position: absolute;
      top: 796px;
    }
    .mcf5 {
      position: absolute;
      top: 810px;
    }
    .ifp1 {
      position: absolute;
      top: 825px;
    }
    .ifp2 {
      position: absolute;
      top: 840px;
    }
    .ifp3 {
      position: absolute;
      top: 855px;
    }
    .ifp4 {
      position: absolute;
      top: 872px;
    }
    .ifp5 {
      position: absolute;
      top: 885px;
    }
    .knee {
      position: absolute;
      top: 900px;
    }
    .iDolorosas {
      position: absolute;
      left: 150px;
      top: 916px;
    }
    .iInflamadas {
      position: absolute;
      left: 235px;
      top: 916px;
    }
    .dDolorosas {
      position: absolute;
      left: 321px;
      top: 916px;
    }
    .dInflamadas {
      position: absolute;
      left: 408px;
      top: 916px;
    }
    .dolorosas {
      position: absolute;
      left: 564px;
      top: 712px;
    }
    .inflamadas {
      position: absolute;
      left: 570px;
      top: 737px;
    }
    .das28 {
      position: absolute;
      left: 549px;
      top: 761px;
    }
    .haq {
      position: absolute;
      left: 535px;
      top: 786px;
    }
    .vas {
      display: '.$displayVas.';
      position: absolute;
      left: '.$vas.'px;
      top: 944px;
      font-size: 60pt;
      margin-top: 1px;
      margin-bottom: 1px;
      font-family: Arial;
    }
    .lugar {
      width: 150px;
      position: absolute;
      left: 35px;
      top: 987px;
    }
    .fecha {
      position: absolute;
      left: 35px;
      top: 1029px;
    }
    .tel {
      position: absolute;
      left: 582px;
      top: 982px;
    }
    .email {
      position: absolute;
      left: 583px;
      top: 1007px;
    }
  </style>

  
  <!-- Custom styles for this template -->
  <link href="/css/customs/dashboard.css" rel="stylesheet">
</head>
<body>
  <div class="img">
    <p class="fullname">'.$name.'</p>
    <p class="fechaNac1">'.$birthDateExploted[2].'</p><p class="fechaNac2">'.$birthDateExploted[1].'</p><p class="fechaNac3">'.$birthDateExploted[0].'</p>
    <p class="beneficiario">'.$beneficiary.'</p>
    <p class="inicio_enfermedad1"> '.$startDateExploted[2].' </p> <p class="inicio_enfermedad2"> '.$startDateExploted[1].' </p><p class="inicio_enfermedad3"> '.$startDateExploted[0].' </p>
    <p class="peso">'.$weight.'</p><p class="talla">'.$height.'</p>
    <p class="resumenHC">'.$summaryHC.'</p>';
    

    if ( count($inputDrug) > 3 ) {
      $htmlTableTratamientos .= '<table class="tratamientos1">';
      for ($i = 0 ; $i < 3 ; $i++) {
        $htmlTableTratamientos .= '
          <tr>
            <td class="tratamiento1">'.$inputDrug[$i].'</td>
            <td class="tratamiento2">'.$inputDosis[$i].'</td>
            <td class="tratamiento3">'.$inputTime[$i].'</td>
            <td class="tratamiento4">'.$inputResults[$i].'</td>
          </tr>
        ';
      }
      $htmlTableTratamientos .= '</table>';
      $htmlTableTratamientos .= '<table class="tratamientos2">';
      for ($i = 3 ; $i < count($inputDrug) ; $i++) {
        $htmlTableTratamientos .= '
          <tr>
            <td class="tratamiento1">'.$inputDrug[$i].'</td>
            <td class="tratamiento2">'.$inputDosis[$i].'</td>
            <td class="tratamiento3">'.$inputTime[$i].'</td>
            <td class="tratamiento4">'.$inputResults[$i].'</td>
          </tr>
        ';
      }
      $htmlTableTratamientos .= '</table>';
    } else {
      $htmlTableTratamientos .= '<table class="tratamientos1">';
      for ($i = 0 ; $i < count($inputDrug) ; $i++) {
        $htmlTableTratamientos .= '
        <tr>
          <td class="tratamiento1">'.$inputDrug[$i].'</td>
          <td class="tratamiento2">'.$inputDosis[$i].'</td>
          <td class="tratamiento3">'.$inputTime[$i].'</td>
          <td class="tratamiento4">'.$inputResults[$i].'</td>
        </tr>
        ';
      }
      $htmlTableTratamientos .= '</table>';
    }

    $htmlPart1 = '
    <table class="laboratorio">
      <tr>
        <td class="laboratorio1">'.$RFactor.'</td>
        <td class="laboratorio2">'.$VSG.'</td>
        <td class="laboratorio3">'.$PSR.'</td>
        <td class="laboratorio4">'.$CPP.'</td>
      </tr>
    </table>
    <table class="farmacos">';
    for ($i = 0 ; $i < count($drugFarmaco) ; $i++) {
      $htmlTableFarmacos .= '
      <tr>
        <td class="farmacos1">'.$drugFarmaco[$i].'</td>
        <td class="farmacos2">'.$presentation[$i].'</td>
        <td class="farmacos3">'.$dosisFarmaco[$i].'</td>
      </tr>
      ';
    }
    $htmlPart2 = '
    </table>
    <p class="monodrogaSi">·</p>
    <p class="monodrogaNo">·</p>
    <p class="asociada">'.$relatedTo.'</p>';
    if (isset($shoulder)) {
      foreach ($shoulder as &$valor) {
        $valor--;
        $htmlShoulder .= '<p class="shoulder" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($elbow)) {
      foreach ($elbow as &$valor) {
        $valor--;
        $htmlElbow .= '<p class="elbow" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($wrists)) {
      foreach ($wrists as &$valor) {
        $valor--;
        $htmlWrists .= '<p class="wrists" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($mcf1)) {
      foreach ($mcf1 as &$valor) {
        $valor--;
        $htmlMcf1 .= '<p class="mcf1" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($mcf2)) {
      foreach ($mcf2 as &$valor) {
        $valor--;
        $htmlMcf2 .= '<p class="mcf2" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($mcf3)) {
      foreach ($mcf3 as &$valor) {
        $valor--;
        $htmlMcf3 .= '<p class="mcf3" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($mcf4)) {
      foreach ($mcf4 as &$valor) {
        $valor--;
        $htmlMcf4 .= '<p class="mcf4" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($mcf5)) {
      foreach ($mcf5 as &$valor) {
        $valor--;
        $htmlMcf5 .= '<p class="mcf5" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($ifp1)) {
      foreach ($ifp1 as &$valor) {
        $valor--;
        $htmlIfp1 .= '<p class="ifp1" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($ifp2)) {
      foreach ($ifp2 as &$valor) {
        $valor--;
        $htmlIfp2 .= '<p class="ifp2" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($ifp3)) {
      foreach ($ifp3 as &$valor) {
        $valor--;
        $htmlIfp3 .= '<p class="ifp3" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($ifp4)) {
      foreach ($ifp4 as &$valor) {
        $valor--;
        $htmlIfp4 .= '<p class="ifp4" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($ifp5)) {
      foreach ($ifp5 as &$valor) {
        $valor--;
        $htmlIfp5 .= '<p class="ifp5" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
    if (isset($knee)) {
      foreach ($knee as &$valor) {
        $valor--;
        $htmlKnee .= '<p class="knee" style="left: '.(241 + 85 * $valor).'px;">x</p>';
      }
    }
  $htmlPart4 = '
    <p class="iDolorosas">'.$iDolorosas.'</p>
    <p class="iInflamadas">'.$iInflamadas.'</p>
    <p class="dDolorosas">'.$dDolorosas.'</p>
    <p class="dInflamadas">'.$dInflamadas.'</p>
    <p class="dolorosas">'.$dolorosasTotal.'</p>
    <p class="inflamadas">'.$inflamadasTotal.'</p>
    <p class="das28">'.$das28.'</p>
    <p class="haq">'.$haq.'</p>
    <p class="vas">·</p>
    <p class="lugar">'.$inputPlace.'</p>
    <p class="fecha">'.$inputDateExploted[2].'/'.$inputDateExploted[1].'/'.$inputDateExploted[0].'</p>
    <p class="tel">'.$inputPhone.'</p>
    <p class="email">'.$inputEmail.'</p>
  </div>
</body>
</html>';

$htmlPart3 = $htmlShoulder.$htmlElbow.$htmlWrists.$htmlMcf1.$htmlMcf2.$htmlMcf3.$htmlMcf4.$htmlMcf5.$htmlIfp1.$htmlIfp2.$htmlIfp3.$htmlIfp4.$htmlIfp5.$htmlKnee;

$dompdf->loadHtml($html.$htmlTableTratamientos.$htmlPart1.$htmlTableFarmacos.$htmlPart2.$htmlPart3.$htmlPart4);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>