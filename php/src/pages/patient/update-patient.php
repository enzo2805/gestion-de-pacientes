<?php
require_once '../../db.php';

$id = $_POST['id'];
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

$sql = "UPDATE Paciente SET nombre = "."'$inputName'".", apellido = "."'$inputLastName'";
$sql .= $_POST['inputAffiliateNumber'] ? ", afiliado_nro = ".$inputAffiliateNumber : NULL;
$sql .= $_POST['inputHCNumber'] ? ", hc_nro = $inputHCNumber" : NULL;
$sql .= $_POST['inputAge'] ? ", edad = $inputAge" : NULL;
$sql .= $_POST['inputCivilState'] ? ", estado_civil = "."'$inputCivilState'" : NULL;
$sql .= $_POST['gridGender'] ? ", sexo = '$gridGender'" : NULL;
$sql .= $_POST['inputService'] ? ", servicio = '$inputService'" : NULL;
$sql .= $_POST['inputMedic'] ? ", medico_tratante = '$inputMedic'" : NULL;
$sql .= $_POST['inputEntryDate'] ? ", fecha_entrada = '$inputEntryDate'" : NULL;
$sql .= $_POST['inputEntryState'] ? ", estado_alta = '$inputEntryState'" : NULL;
$sql .= $_POST['inputEntryDiag'] ? ", diag_entrada = '$inputEntryDiag'" : NULL;
$sql .= $_POST['inputFinalDiag'] ? ", diag_definitivo = '$inputFinalDiag'" : NULL;
$sql .= $_POST['inputDischargeDate'] ? ", fecha_alta = '$inputDischargeDate'" : NULL;
$sql .= $_POST['inputHereditaryBackground'] ? ", antec_hereditarios = '$inputHereditaryBackground'" : NULL;
$sql .= $_POST['inputPersonalBackground'] ? ", antec_personales = '$inputPersonalBackground'" : NULL;
$sql .= $_POST['inputCurrentDisease'] ? ", enfer_actual = '$inputCurrentDisease'" : NULL;
$sql .= $_POST['inputPsychiatry'] ? ", psiquiatria = '$inputPsychiatry'" : NULL;
$sql .= $_POST['inputBreathing'] ? ", respiracion = '$inputBreathing'" : NULL;
$sql .= $_POST['inputPulse'] ? ", pulso = '$inputPulse'" : NULL;
$sql .= $_POST['inputTemperature'] ? ", temperatura = '$inputTemperature'" : NULL;
$sql .= $_POST['inputHead'] ? ", cabeza = '$inputHead'" : NULL;
$sql .= $_POST['inputNeck'] ? ", cuello = '$inputNeck'" : NULL;
$sql .= $_POST['inputThorax'] ? ", torax = '$inputThorax'" : NULL;
$sql .= $_POST['inputHeart'] ? ", corazon = '$inputHeart'" : NULL;
$sql .= $_POST['inputLungs'] ? ", pulmones = '$inputLungs'" : NULL;
$sql .= $_POST['inputAbdomen'] ? ", abdomen = '$inputAbdomen'" : NULL;
$sql .= $_POST['inputNervousSystem'] ? ", sis_nervioso = '$inputNervousSystem'" : NULL;
$sql .= $_POST['inputUrogenitalSystem'] ? ", apar_urogenital = '$inputUrogenitalSystem'" : NULL;
$sql .= $_POST['inputLocomotorSystem'] ? ", apar_locomotor = '$inputLocomotorSystem'" : NULL;
$sql .= $_POST['inputEvaluation'] ? ", eval_tratamiento = '$inputEvaluation'" : NULL;
$sql .= ", estado = 1 WHERE id = $id";

header('Content-Type: text/html; charset=utf-8');

if ($conn->query($sql) === TRUE) {
  echo "True";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

