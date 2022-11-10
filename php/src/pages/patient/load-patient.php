<?php
require_once '../../db.php';

$inputName = $_POST['inputName'];
$inputHCNumber = $_POST['inputHCNumber'];
$inputLastName = $_POST['inputLastName'];
$inputAffiliateNumber = $_POST['inputAffiliateNumber'];
$inputAge = $_POST['inputAge'];
$inputCivilState = $_POST['inputCivilState'];
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

$sql = "insert into Paciente (nombre, apellido, ";
$sql .= $_POST['inputAffiliateNumber'] ? "afiliado_nro, " : NULL;
$sql .= $_POST['inputHCNumber'] ? "hc_nro, " : NULL;
$sql .= $_POST['inputAge'] ? "edad, " : NULL;
$sql .= $_POST['inputCivilState'] ? "estado_civil, " : NULL;
$sql .= $_POST['gridGender'] ? "sexo, " : NULL;
$sql .= $_POST['inputService'] ? "servicio, " : NULL;
$sql .= $_POST['inputMedic'] ? "medico_tratante, " : NULL;
$sql .= $_POST['inputEntryDate'] ? "fecha_entrada, " : NULL;
$sql .= $_POST['inputEntryState'] ? "estado_alta, " : NULL;
$sql .= $_POST['inputEntryDiag'] ? "diag_entrada, " : NULL;
$sql .= $_POST['inputFinalDiag'] ? "diag_definitivo, " : NULL;
$sql .= $_POST['inputDischargeDate'] ? "fecha_alta, " : NULL;
$sql .= $_POST['inputHereditaryBackground'] ? "antec_hereditarios, " : NULL;
$sql .= $_POST['inputPersonalBackground'] ? "antec_personales, " : NULL;
$sql .= $_POST['inputCurrentDisease'] ? "enfer_actual, " : NULL;
$sql .= $_POST['inputPsychiatry'] ? "psiquiatria, " : NULL;
$sql .= $_POST['inputBreathing'] ? "respiracion, " : NULL;
$sql .= $_POST['inputPulse'] ? "pulso, " : NULL;
$sql .= $_POST['inputTemperature'] ? "temperatura, " : NULL;
$sql .= $_POST['inputHead'] ? "cabeza, " : NULL;
$sql .= $_POST['inputNeck'] ? "cuello, " : NULL;
$sql .= $_POST['inputThorax'] ? "torax, " : NULL;
$sql .= $_POST['inputHeart'] ? "corazon, " : NULL;
$sql .= $_POST['inputLungs'] ? "pulmones, " : NULL;
$sql .= $_POST['inputAbdomen'] ? "abdomen, " : NULL;
$sql .= $_POST['inputNervousSystem'] ? "sis_nervioso, " : NULL;
$sql .= $_POST['inputUrogenitalSystem'] ? "apar_urogenital, " : NULL;
$sql .= $_POST['inputLocomotorSystem'] ? "apar_locomotor, " : NULL;
$sql .= $_POST['inputEvaluation'] ? "eval_tratamiento, " : NULL;
$sql .= "estado) values (";
$sql .= "'$inputName' ,";
$sql .= "'$inputLastName' ,";
$sql .= $_POST['inputAffiliateNumber'] ? $inputAffiliateNumber."' ," : NULL;
$sql .= $_POST['inputHCNumber'] ? $inputHCNumber." ," : NULL; 
$sql .= $_POST['inputAge'] ? $inputAge.", " : NULL;
$sql .= $_POST['inputCivilState'] ? "'$inputCivilState' ," : NULL;
$sql .= $_POST['gridGender'] ? "'$gridGender' ," : NULL;
$sql .= $_POST['inputService'] ? "'$inputService' ," : NULL;
$sql .= $_POST['inputMedic'] ? "'$inputMedic' ," : NULL;
$sql .= $_POST['inputEntryDate'] ? "'$inputEntryDate' ," : NULL;
$sql .= $_POST['inputEntryState'] ? "'$inputEntryState' ," : NULL;
$sql .= $_POST['inputEntryDiag'] ? "'$inputEntryDiag' ," : NULL;
$sql .= $_POST['inputFinalDiag'] ? "'$inputFinalDiag' ," : NULL;
$sql .= $_POST['inputDischargeDate'] ? "'$inputDischargeDate' ," : NULL;
$sql .= $_POST['inputHereditaryBackground'] ? "'$inputHereditaryBackground' ," : NULL;
$sql .= $_POST['inputPersonalBackground'] ? "'$inputPersonalBackground' ," : NULL;
$sql .= $_POST['inputCurrentDisease'] ? "'$inputCurrentDisease' ," : NULL;
$sql .= $_POST['inputPsychiatry'] ? "'$inputPsychiatry' ," : NULL;
$sql .= $_POST['inputBreathing'] ? "'$inputBreathing' ," : NULL;
$sql .= $_POST['inputPulse'] ? "'$inputPulse' ," : NULL;
$sql .= $_POST['inputTemperature'] ? "'$inputTemperature' ," : NULL;
$sql .= $_POST['inputHead'] ? "'$inputHead' ," : NULL;
$sql .= $_POST['inputNeck'] ? "'$inputNeck' ," : NULL;
$sql .= $_POST['inputThorax'] ? "'$inputThorax' ," : NULL;
$sql .= $_POST['inputHeart'] ? "'$inputHeart' ," : NULL;
$sql .= $_POST['inputLungs'] ? "'$inputLungs' ," : NULL;
$sql .= $_POST['inputAbdomen'] ? "'$inputAbdomen' ," : NULL;
$sql .= $_POST['inputNervousSystem'] ? "'$inputNervousSystem' ," : NULL;
$sql .= $_POST['inputUrogenitalSystem'] ? "'$inputUrogenitalSystem' ," : NULL;
$sql .= $_POST['inputLocomotorSystem'] ? "'$inputLocomotorSystem' ," : NULL;
$sql .= $_POST['inputEvaluation'] ? "'$inputEvaluation' ," : NULL;
$sql .= 1;
$sql .= ")";

header('Content-Type: text/html; charset=utf-8');

if ($conn->query($sql) === TRUE) {
  echo "True";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

