<?php
require_once '../../db.php';

$id = $_POST['id'];
$inputName = $_POST['inputName'];
$inputBeneficiary = $_POST['inputBeneficiary'];
$inputStartDate = $_POST['inputStartDate'];
$inputWeight = $_POST['inputWeight'];
$inputHeight = $_POST['inputHeight'];
$inputSummaryHC = $_POST['inputSummaryHC'];
$inputRFactor = $_POST['inputRFactor'];
$inputVSG = $_POST['inputVSG'];
$inputPCR = $_POST['inputPCR'];
$inputCPP = $_POST['inputCPP'];
$inputFarmaco = json_encode($_POST['inputFarmaco'], JSON_UNESCAPED_UNICODE);
$inputPresentation = json_encode($_POST['inputPresentation'], JSON_UNESCAPED_UNICODE);
$inputDosisFarmaco = json_encode($_POST['inputDosisFarmaco'], JSON_UNESCAPED_UNICODE);
$monoDrug = ($_POST['monoDrug'] == 'Sí' ) ? 1 : 0;
$inputRelatedTo = $_POST['inputRelatedTo'];
$shoulder = json_encode($_POST['shoulder']);
$elbow = json_encode($_POST['elbow']);
$wrists = json_encode($_POST['wrists']);
$mcf1 = json_encode($_POST['mcf1']);
$mcf2 = json_encode($_POST['mcf2']);
$mcf3 = json_encode($_POST['mcf3']);
$mcf4 = json_encode($_POST['mcf4']);
$mcf5 = json_encode($_POST['mcf5']);
$ifp1 = json_encode($_POST['ifp1']);
$ifp2 = json_encode($_POST['ifp2']);
$ifp3 = json_encode($_POST['ifp3']);
$ifp4 = json_encode($_POST['ifp4']);
$ifp5 = json_encode($_POST['ifp5']);
$knee = json_encode($_POST['knee']);
$subtotales = json_encode($_POST['subtotales']);
$dolorosasTotal = $_POST['dolorosasTotal'];
$inflamadasTotal = $_POST['inflamadasTotal'];
$das28 = $_POST['das28'];
$haq = $_POST['haq'];
$vasRadio = $_POST['vasRadio'];
$inputPlace = $_POST['inputPlace'];
$inputDate = $_POST['inputDate'];
$inputPhone = $_POST['inputPhone'];
$inputEmail = $_POST['inputEmail'];

$sql = "insert into Pami_Renov (id_paciente, nombre, beneficiario, fecha_ini_trat, peso, talla, resumen_act_hc, factor_r, vsg, pcr, anti_ccp, excep_droga, excep_present, excep_dosis, monodroga, asociada_con, hombros, codos, muñecas, mcf_1, mcf_2, mcf_3, mcf_4, mcf_5, ifp_1, ifp_2, ifp_3, ifp_4, ifp_5, rodillas, subtotales, dolorosas, inflamadas, das28, haq, vas, lugar, fecha, telefono, email) values (
  $id,
  "."'$inputName'".",
  $inputBeneficiary,
  "."'$inputStartDate'".",
  $inputWeight,
  $inputHeight,
  "."'$inputSummaryHC'".",
  $inputRFactor,
  $inputVSG,
  $inputPCR,
  $inputCPP,
  "."'{$inputFarmaco}'".",
  "."'{$inputPresentation}'".",
  "."'{$inputDosisFarmaco}'".",
  $monoDrug,
  "."'$inputRelatedTo'".",
  "."'{$shoulder}'".",
  "."'{$elbow}'".",
  "."'{$wrists}'".",
  "."'{$mcf1}'".",
  "."'{$mcf2}'".",
  "."'{$mcf3}'".",
  "."'{$mcf4}'".",
  "."'{$mcf5}'".",
  "."'{$ifp1}'".",
  "."'{$ifp2}'".",
  "."'{$ifp3}'".",
  "."'{$ifp4}'".",
  "."'{$ifp5}'".",
  "."'{$knee}'".",
  "."'{$subtotales}'".",
  $dolorosasTotal,
  $inflamadasTotal,
  $das28,
  $haq,
  $vasRadio,
  "."'$inputPlace'".",
  "."'$inputDate'".",
  "."'$inputPhone'".",
  "."'$inputEmail'"."
  )";

  $sql = "insert into Pami_Renov (id_paciente, nombre";
  $sql .= $_POST['inputBeneficiary'] ? ", beneficiario" : NULL;
  $sql .= $_POST['inputStartDate'] ? ", fecha_ini_trat" : NULL;
  $sql .= $_POST['inputWeight'] ? ", peso" : NULL;
  $sql .= $_POST['inputHeight'] ? ", talla" : NULL;
  $sql .= $_POST['inputSummaryHC'] ? ", resumen_act_hc" : NULL;
  $sql .= $_POST['inputRFactor'] ? ", factor_r" : NULL;
  $sql .= $_POST['inputVSG'] ? ", vsg" : NULL;
  $sql .= $_POST['inputPCR'] ? ", pcr" : NULL;
  $sql .= $_POST['inputCPP'] ? ", anti_ccp" : NULL;
  $sql .= $_POST['inputFarmaco'] != [""] ? ", excep_droga" : NULL;
  $sql .= $_POST['inputPresentation'] != [""] ? ", excep_present" : NULL;
  $sql .= $_POST['inputDosisFarmaco'] != [""] ? ", excep_dosis" : NULL;
  $sql .= $_POST['monoDrug'] ? ", monodroga" : NULL;
  $sql .= $_POST['inputRelatedTo'] ? ", asociada_con" : NULL;
  $sql .= ", hombros";
  $sql .= ", codos";
  $sql .= ", muñecas";
  $sql .= ", mcf_1";
  $sql .= ", mcf_2";
  $sql .= ", mcf_3";
  $sql .= ", mcf_4";
  $sql .= ", mcf_5";
  $sql .= ", ifp_1";
  $sql .= ", ifp_2";
  $sql .= ", ifp_3";
  $sql .= ", ifp_4";
  $sql .= ", ifp_5";
  $sql .= ", rodillas";
  $sql .= $_POST['subtotales'] ? ", subtotales" : NULL;
  $sql .= $_POST['dolorosasTotal'] ? ", dolorosas" : NULL;
  $sql .= $_POST['inflamadasTotal'] ? ", inflamadas" : NULL;
  $sql .= $_POST['das28'] ? ", das28" : NULL;
  $sql .= $_POST['haq'] ? ", haq" : NULL;
  $sql .= $_POST['vasRadio'] ? ", vas" : NULL;
  $sql .= $_POST['inputPlace'] ? ", lugar" : NULL;
  $sql .= ", fecha";
  $sql .= $_POST['inputPhone'] ? ", telefono" : NULL;
  $sql .= $_POST['inputEmail'] ? ", email" : NULL;
  $sql .= ") values (";
  $sql .= "$id"; 
  $sql .= ", '$inputName'";
  $sql .= $_POST['inputBeneficiary'] ? ", $inputBeneficiary" : NULL;
  $sql .= $_POST['inputStartDate'] ? ", '$inputStartDate'" : NULL;
  $sql .= $_POST['inputWeight'] ? ", $inputWeight" : NULL;
  $sql .= $_POST['inputHeight'] ? ", $inputHeight" : NULL;
  $sql .= $_POST['inputSummaryHC'] ? ", '$inputSummaryHC'" : NULL;
  $sql .= $_POST['inputRFactor'] ? ", $inputRFactor" : NULL;
  $sql .= $_POST['inputVSG'] ? ", $inputVSG" : NULL;
  $sql .= $_POST['inputPCR'] ? ", $inputPCR" : NULL;
  $sql .= $_POST['inputCPP'] ? ", $inputCPP" : NULL;
  $sql .= $_POST['inputFarmaco'] != [""] ? ", '{$inputFarmaco}'" : NULL;
  $sql .= $_POST['inputPresentation'] != [""] ? ", '{$inputPresentation}'" : NULL;
  $sql .= $_POST['inputDosisFarmaco'] != [""] ? ", '{$inputDosisFarmaco}'" : NULL;
  $sql .= $_POST['monoDrug'] ? ", $monoDrug" : NULL;
  $sql .= $_POST['inputRelatedTo'] ? ", '$inputRelatedTo'" : NULL;
  $sql .= ", '{$shoulder}'";
  $sql .= ", '{$elbow}'";
  $sql .= ", '{$wrists}'";
  $sql .= ", '{$mcf1}'";
  $sql .= ", '{$mcf2}'";
  $sql .= ", '{$mcf3}'";
  $sql .= ", '{$mcf4}'";
  $sql .= ", '{$mcf5}'";
  $sql .= ", '{$ifp1}'";
  $sql .= ", '{$ifp2}'";
  $sql .= ", '{$ifp3}'";
  $sql .= ", '{$ifp4}'";
  $sql .= ", '{$ifp5}'";
  $sql .= ", '{$knee}'";
  $sql .= $_POST['subtotales'] ? ", '{$subtotales}'" : NULL;
  $sql .= $_POST['dolorosasTotal'] ? ", $dolorosasTotal" : NULL;
  $sql .= $_POST['inflamadasTotal'] ? ", $inflamadasTotal" : NULL;
  $sql .= $_POST['das28'] ? ", $das28" : NULL;
  $sql .= $_POST['haq'] ? ", $haq" : NULL;
  $sql .= $_POST['vasRadio'] ? ", $vasRadio" : NULL;
  $sql .= $_POST['inputPlace'] ? ", '$inputPlace'" : NULL;
  $sql .= ", '$inputDate'";
  $sql .= $_POST['inputPhone'] ? ", '$inputPhone'" : NULL;
  $sql .= $_POST['inputEmail'] ? ", '$inputEmail'" : NULL;
  $sql .= ")";

 header('Content-Type: text/html; charset=utf-8');

if ($conn->query($sql) === TRUE) {
  echo "True";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

