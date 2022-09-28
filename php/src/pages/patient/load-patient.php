<?php
require_once '../../db.php';

$inputName = $_POST['inputName'];
$inputHCNumber = $_POST['inputHCNumber'];
$inputLastName = $_POST['inputLastName'];
$inputAffiliateNumber = $_POST['inputAffiliateNumber'];
$inputAge = $_POST['inputAge'];
$inputCivilState = $_POST['inputCivilState'];
$gridGender = $_POST['gridGender'];
$gridGender = $_POST['gridGender'];
$inputService = $_POST['inputService'];
$inputMedic = $_POST['inputMedic'];
$inputEntryDate = $_POST['inputEntryDate'];
$inputEntryState = $_POST['inputEntryState'];
$inputEntryDiag = $_POST['inputEntryDiag'];
$inputFinalDiag = $_POST['inputFinalDiag'];
$inputDischargeDate = $_POST['inputDischargeDate'];
$inputHereditaryBackground = $_POST['inputHereditaryBackground'];
$inputPersonalBackground = $_POST['inputPersonalBackground'];
$inputCurrentDisease = $_POST['inputCurrentDisease'];
$inputPsychiatry = $_POST['inputPsychiatry'];
$inputBreathing = $_POST['inputBreathing'];
$inputPulse = $_POST['inputPulse'];
$inputTemperature = $_POST['inputTemperature'];
$inputHead = $_POST['inputHead'];
$inputNeck = $_POST['inputNeck'];
$inputThorax = $_POST['inputThorax'];
$inputHeart = $_POST['inputHeart'];
$inputLungs = $_POST['inputLungs'];
$inputAbdomen = $_POST['inputAbdomen'];
$inputNervousSystem = $_POST['inputNervousSystem'];
$inputUrogenitalSystem = $_POST['inputUrogenitalSystem'];
$inputLocomotorSystem = $_POST['inputLocomotorSystem'];
$inputEvaluation = $_POST['inputEvaluation'];

$sql = "insert into Paciente (nombre, apellido, afiliado_nro, hc_nro, edad, estado_civil, sexo, servicio, medico_tratante, fecha_entrada, estado_alta, diag_entrada, diag_definitivo, fecha_alta, antec_hereditarios, antec_personales, enfer_actual, psiquiatria, respiracion, pulso, temperatura, cabeza, cuello, torax, corazon, pulmones, abdomen, sis_nervioso, apar_urogenital, apar_locomotor, eval_tratamiento, estado) values (
  "."'$inputName'".",
  "."'$inputLastName'".",
  ".$inputAffiliateNumber.",
  $inputHCNumber,
  $inputAge,
  "."'$inputCivilState'".",
  "."'$gridGender'".",
  "."'$inputService'".",
  "."'$inputMedic'".",
  "."'$inputEntryDate'".",
  "."'$inputEntryState'".",
  "."'$inputEntryDiag'".",
  "."'$inputFinalDiag'".",
  "."'$inputDischargeDate'".",
  "."'$inputHereditaryBackground'".",
  "."'$inputPersonalBackground'".",
  "."'$inputCurrentDisease'".",
  "."'$inputPsychiatry'".",
  "."'$inputBreathing'".",
  "."'$inputPulse'".",
  "."'$inputTemperature'".",
  "."'$inputHead'".",
  "."'$inputNeck'".",
  "."'$inputThorax'".",
  "."'$inputHeart'".",
  "."'$inputLungs'".",
  "."'$inputAbdomen'".",
  "."'$inputNervousSystem'".",
  "."'$inputUrogenitalSystem'".",
  "."'$inputLocomotorSystem'".",
  "."'$inputEvaluation'".",
  1
  )";

if ($conn->query($sql) === TRUE) {
  echo "True";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

