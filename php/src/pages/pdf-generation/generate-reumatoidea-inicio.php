<?php
use mikehaertl\pdftk\Pdf;
require_once '../../vendor/autoload.php';

date_default_timezone_set('America/Argentina/Salta');

$name = $_POST['inputName'];
$birthDate = $_POST['inputBirthDate'];
$birthDateExploted = explode("-",$birthDate);
$beneficiary = $_POST['inputBeneficiary'];
$startDate = $_POST['inputStartDate'];
$startDateExploted = explode("-",$startDate);
$weight = $_POST['inputWeight'];
$height = $_POST['inputHeight'];
$summaryHC = $_POST['inputSummaryHC'];
$summary1 = substr($summaryHC, 0, 130);
$summary2 = substr($summaryHC, 130, 157);
$summary3 = substr($summaryHC, 287, 157);
$summary4 = substr($summaryHC, 444, 157);
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
$monodrug = ($_POST['monoDrug'] == "Si") ? 'Opción1' : 'Opción2';
$relatedTo = $_POST['inputRelatedTo'];
$shoulder = $_POST['shoulder'];
$shoulderChk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($shoulder)){
    foreach ($shoulder as $index => $value) {
        switch($value){
            case 1:{
                $shoulderChk[$value] = 'Sí';
                break;
            }
            case 2:{
                $shoulderChk[$value] = 'Sí';
                break;
            }
            case 3:{
                $shoulderChk[$value] = 'Sí';
                break;
            }
            case 4:{
                $shoulderChk[$value] = 'Sí';
                break;
            }
        }
    }
}
$elbow = $_POST['elbow'];
$elbowChk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($elbow)){
    foreach ($elbow as $index => $value) {
        switch($value) {
            case 1:{
                $elbowChk[$value] = 'Sí';
                break;
            }
            case 2: {
                $elbowChk[$value] = 'Sí';
                break;
            }
            case 3: {
                $elbowChk[$value] = 'Sí';
                break;
            }
            case 4: {
                $elbowChk[$value] = 'Sí';
                break;
            }
        }
    }
}
$wrists = $_POST['wrists'];
$wristsChk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($wrists)){
    foreach ($wrists as $index => $value) {
        switch($value) {
            case 1:{
                $wristsChk[$value] = 'Sí';
                break;
            }
            case 2: {
                $wristsChk[$value] = 'Sí';
                break;
            }
            case 3: {
                $wristsChk[$value] = 'Sí';
                break;
            }
            case 4: {
                $wristsChk[$value] = 'Sí';
                break;
            }
        }
    }
}
$mcf1 = $_POST['mcf1'];
$mcf1Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($mcf1)){
    foreach ($mcf1 as $index => $value) {
        switch($value) {
            case 1:{
                $mcf1Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $mcf1Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $mcf1Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $mcf1Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$mcf2 = $_POST['mcf2'];
$mcf2Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($mcf2)){
    foreach ($mcf2 as $index => $value) {
        switch($value) {
            case 1:{
                $mcf2Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $mcf2Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $mcf2Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $mcf2Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$mcf3 = $_POST['mcf3'];
$mcf3Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($mcf3)){
    foreach ($mcf3 as $index => $value) {
        switch($value) {
            case 1:{
                $mcf3Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $mcf3Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $mcf3Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $mcf3Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$mcf4 = $_POST['mcf4'];
$mcf4Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($mcf4)){
    foreach ($mcf4 as $index => $value) {
        switch($value) {
            case 1:{
                $mcf4Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $mcf4Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $mcf4Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $mcf4Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$mcf5 = $_POST['mcf5'];
$mcf5Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($mcf5)){
    foreach ($mcf5 as $index => $value) {
        switch($value) {
            case 1:{
                $mcf5Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $mcf5Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $mcf5Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $mcf5Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$ifp1 = $_POST['ifp1'];
$ifp1Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($ifp1)){
    foreach ($ifp1 as $index => $value) {
        switch($value) {
            case 1:{
                $ifp1Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $ifp1Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $ifp1Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $ifp1Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$ifp2 = $_POST['ifp2'];
$ifp2Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($ifp2)){
    foreach ($ifp2 as $index => $value) {
        switch($value) {
            case 1:{
                $ifp2Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $ifp2Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $ifp2Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $ifp2Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$ifp3 = $_POST['ifp3'];
$ifp3Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($ifp3)){
    foreach ($ifp3 as $index => $value) {
        switch($value) {
            case 1:{
                $ifp3Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $ifp3Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $ifp3Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $ifp3Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$ifp4 = $_POST['ifp4'];
$ifp4Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($ifp4)){
    foreach ($ifp4 as $index => $value) {
        switch($value) {
            case 1:{
                $ifp4Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $ifp4Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $ifp4Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $ifp4Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$ifp5 = $_POST['ifp5'];
$ifp5Chk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($ifp5)){
    foreach ($ifp5 as $index => $value) {
        switch($value) {
            case 1:{
                $ifp5Chk[$value] = 'Sí';
                break;
            }
            case 2: {
                $ifp5Chk[$value] = 'Sí';
                break;
            }
            case 3: {
                $ifp5Chk[$value] = 'Sí';
                break;
            }
            case 4: {
                $ifp5Chk[$value] = 'Sí';
                break;
            }
        }
    }
}
$knee = $_POST['knee'];
$kneeChk = array(
    1 => '',
    2 => '',
    3 => '',
    4 => ''
);
if(isset($knee)){
    foreach ($knee as $index => $value) {
        switch($value) {
            case 1:{
                $kneeChk[$value] = 'Sí';
                break;
            }
            case 2: {
                $kneeChk[$value] = 'Sí';
                break;
            }
            case 3: {
                $kneeChk[$value] = 'Sí';
                break;
            }
            case 4: {
                $kneeChk[$value] = 'Sí';
                break;
            }
        }
    }
}
$iDolorosas = $_POST['iDolorosas'];
$iInflamadas = $_POST['iInflamadas'];
$dDolorosas = $_POST['dDolorosas'];
$dInflamadas = $_POST['dInflamadas'];
$dolorosasTotal = $_POST['dolorosasTotal'];
$inflamadasTotal = $_POST['inflamadasTotal'];
$das28 = $_POST['das28'];
$haq = $_POST['haq'];
$vasRadio = $_POST['vasRadio'];
switch($vasRadio){
    case 0:{
        $vasRadio = 'Opción0';
        break;
    }
    case 1:{
        $vasRadio = 'Opción1';
        break;
    }
    case 2:{
        $vasRadio = 'Opción2';
        break;
    }
    case 3:{
        $vasRadio = 'Opción3';
        break;
    }
    case 4:{
        $vasRadio = 'Opción4';
        break;
    }
    case 5:{
        $vasRadio = 'Opción5';
        break;
    }
    case 6:{
        $vasRadio = 'Opción6';
        break;
    }
    case 7:{
        $vasRadio = 'Opción7';
        break;
    }
    case 8:{
        $vasRadio = 'Opción8';
        break;
    }
    case 9:{
        $vasRadio = 'Opción9';
        break;
    }
    case 10:{
        $vasRadio = 'Opción10';
        break;
    }
}
$inputPlace = $_POST['inputPlace'];
$inputDate = $_POST['inputDate'];
$inputPhone = $_POST['inputPhone'];
$inputEmail = $_POST['inputEmail'];

$fields = array(
    'Nombre y Apellido'       => $name,
    'Beneficiario N'          => $beneficiary,
    'fecha nac dia'           => $birthDateExploted[2],
    'fecha nac mes'           => $birthDateExploted[1],
    'fecha nac año'           => $birthDateExploted[0],
    'fecha enf dia'           => $startDateExploted[2],
    'fecha enf mes'           => $startDateExploted[1],
    'fecha enf año'           => $startDateExploted[0],
    'Peso'                    => $weight,
    'Resumen HC 1'            => $summary1,
    'Resumen HC 2'            => $summary2,
    'Resumen HC 3'            => $summary3,
    'Resumen HC 4'            => $summary4,
    'Talla'                   => $height,
    'Trata_Droga_1'           => $inputDrug[0],
    'Trata_Dosis_1'           => $inputDosis[0],
    'Trata_Tiempo_1'          => $inputTime[0],
    'Trata_Resultados_1'      => $inputResults[0],
    'Trata_Droga_2'           => $inputDrug[1],
    'Trata_Dosis_2'           => $inputDosis[1],
    'Trata_Tiempo_2'          => $inputTime[1],
    'Trata_Resultados_2'      => $inputResults[1],
    'Trata_Droga_3'           => $inputDrug[2],
    'Trata_Dosis_3'           => $inputDosis[2],
    'Trata_Tiempo_3'          => $inputTime[2],
    'Trata_Resultados_3'      => $inputResults[2],
    'Trata_Droga_4'           => $inputDrug[3],
    'Trata_Dosis_4'           => $inputDosis[3],
    'Trata_Tiempo_4'          => $inputTime[3],
    'Trata_Resultados_4'      => $inputResults[3],
    'Trata_Droga_5'           => $inputDrug[4],
    'Trata_Dosis_5'           => $inputDosis[4],
    'Trata_Tiempo_5'          => $inputTime[4],
    'Trata_Resultados_5'      => $inputResults[4],
    'Trata_Droga_6'           => $inputDrug[5],
    'Trata_Dosis_6'           => $inputDosis[5],
    'Trata_Tiempo_6'          => $inputTime[5],
    'Trata_Resultados_6'      => $inputResults[5],
    'Factor R'                => $RFactor,
    'VSG'                     => $VSG,
    'PCR'                     => $PSR,
    'CCP'                     => $CPP,
    'droga_4'                 => $drugFarmaco[0],
    'presentacion_4'          => $presentation[0],
    'dosis_4'                 => $dosisFarmaco[0],
    'droga_5'                 => $drugFarmaco[1],
    'presentacion_5'          => $presentation[1],
    'dosis_5'                 => $dosisFarmaco[1],
    'droga_6'                 => $drugFarmaco[2],
    'presentacion_6'          => $presentation[2],
    'dosis_6'                 => $dosisFarmaco[2],
    'Group1'                  => $monodrug,
    'Asociada'                => $relatedTo,
    'Check Box1'              => $shoulderChk[1],
    'Check Box2'              => $shoulderChk[2],
    'Check Box3'              => $shoulderChk[3],
    'Check Box4'              => $shoulderChk[4],
    'Check Box5'              => $elbowChk[1],
    'Check Box6'              => $elbowChk[2],
    'Check Box7'              => $elbowChk[3],
    'Check Box8'              => $elbowChk[4],
    'Check Box9'              => $wristsChk[1],
    'Check Box10'             => $wristsChk[2],
    'Check Box11'             => $wristsChk[3],
    'Check Box12'             => $wristsChk[4],
    'Check Box13'             => $mcf1Chk[1],
    'Check Box14'             => $mcf1Chk[2],
    'Check Box15'             => $mcf1Chk[3],
    'Check Box16'             => $mcf1Chk[4],
    'Check Box17'             => $mcf2Chk[1],
    'Check Box18'             => $mcf2Chk[2],
    'Check Box19'             => $mcf2Chk[3],
    'Check Box20'             => $mcf2Chk[4],
    'Check Box21'             => $mcf3Chk[1],
    'Check Box22'             => $mcf3Chk[2],
    'Check Box23'             => $mcf3Chk[3],
    'Check Box24'             => $mcf3Chk[4],
    'Check Box25'             => $mcf4Chk[1],
    'Check Box26'             => $mcf4Chk[2],
    'Check Box27'             => $mcf4Chk[3],
    'Check Box28'             => $mcf4Chk[4],
    'Check Box29'             => $mcf5Chk[1],
    'Check Box30'             => $mcf5Chk[2],
    'Check Box31'             => $mcf5Chk[3],
    'Check Box32'             => $mcf5Chk[4],
    'Check Box33'             => $ifp1Chk[1],
    'Check Box34'             => $ifp1Chk[2],
    'Check Box35'             => $ifp1Chk[3],
    'Check Box36'             => $ifp1Chk[4],
    'Check Box37'             => $ifp2Chk[1],
    'Check Box38'             => $ifp2Chk[2],
    'Check Box39'             => $ifp2Chk[3],
    'Check Box40'             => $ifp2Chk[4],
    'Check Box41'             => $ifp3Chk[1],
    'Check Box42'             => $ifp3Chk[2],
    'Check Box43'             => $ifp3Chk[3],
    'Check Box44'             => $ifp3Chk[4],
    'Check Box45'             => $ifp4Chk[1],
    'Check Box46'             => $ifp4Chk[2],
    'Check Box47'             => $ifp4Chk[3],
    'Check Box48'             => $ifp4Chk[4],
    'Check Box49'             => $ifp5Chk[1],
    'Check Box50'             => $ifp5Chk[2],
    'Check Box51'             => $ifp5Chk[3],
    'Check Box52'             => $ifp5Chk[4],
    'Check Box53'             => $kneeChk[1],
    'Check Box54'             => $kneeChk[2],
    'Check Box55'             => $kneeChk[3],
    'Check Box56'             => $kneeChk[4],
    'Subtotal_dolor_izq'      => $iDolorosas,
    'Subtotal_inflamadas_izq' => $iInflamadas,
    'Subtotal_dolor_der'      => $dDolorosas,
    'Subtotal_inflamadas_der' => $dInflamadas,
    'Dolorosas'               => $dolorosasTotal,
    'Inflamadas'              => $inflamadasTotal,
    'DAS 28'                  => $das28,
    'HAQ'                     => $haq,
    'VAS Global'              => $vasRadio,
    'Lugar'                   => $inputPlace,
    'Fecha'                   => $inputDate,
    'Tel'                     => $inputPhone,
    'Mail'                    => $inputEmail,
);

$pdf = new Pdf('../../forms/pami-artritis-reumatoidea-inicio.pdf');
$result = $pdf->fillForm($fields)
    ->needAppearances();

    // Always check for errors
if ($result === false) {
    $error = $pdf->getError();
}

$headers = array(
    'Content-Type'  => 'application/pdf',
    'Content-Disposition' => 'attachment; filename=temp.pdf'
);

$pdf->send('temp.pdf', false, $headers);
