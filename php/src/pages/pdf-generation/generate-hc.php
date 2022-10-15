<?php
use mikehaertl\pdftk\Pdf;
require_once '../../vendor/autoload.php';

date_default_timezone_set('America/Argentina/Salta');

//It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
//It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default mode

$nombre = $_POST['inputName'];
$hc_nro = $_POST['inputHCNumber'];
$apellido = $_POST['inputLastName'];
$afiliado_nro = $_POST['inputAffiliateNumber'];
$edad = $_POST['inputAge'];
$estado_civil = $_POST['inputCivilState'];
$sexo = ($_POST['gridGender'] == 'H') ? 'Hombre' : 'Mujer';
$servicio = $_POST['inputService'];
$medico = $_POST['inputMedic'];
$fecha_entrada = $_POST['inputEntryDate'];

$fecha = explode("-",$fecha_entrada);
$fecha_entrada = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

$estado_alta = $_POST['inputEntryState'];
$diag_entrada = $_POST['inputEntryDiag'];
$diag_definitivo = $_POST['inputFinalDiag'];

$diag_definitivo1 = substr($diag_definitivo, 0, 70);
$diag_definitivo2 = substr($diag_definitivo, 70, 46);

$fecha_alta = $_POST['inputDischargeDate'];

$fecha = explode("-",$fecha_alta);
$fecha_alta = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

$antec_hereditarios = $_POST['inputHereditaryBackground'];

$antec_hereditarios1 = substr($antec_hereditarios, 0, 78);
$antec_hereditarios2 = substr($antec_hereditarios, 78, 109);
$antec_hereditarios3 = substr($antec_hereditarios, 187, 109);

$antec_personales = $_POST['inputPersonalBackground'];

$antec_personales1 = substr($antec_personales, 0, 78);
$antec_personales2 = substr($antec_personales, 78, 109);
$antec_personales3 = substr($antec_personales, 187, 109);
$antec_personales4 = substr($antec_personales, 196, 109);

$enfer_actual = $_POST['inputCurrentDisease'];

$enfer_actual1 = substr($enfer_actual, 0, 88);
$enfer_actual2 = substr($enfer_actual, 88, 109);

$psiquiatria = $_POST['inputPsychiatry'];
$respiracion = $_POST['inputBreathing'];
$pulso = $_POST['inputPulse'];
$temperatura = $_POST['inputTemperature'];
$cabeza = $_POST['inputHead'];

$cabeza1 = substr($cabeza, 0, 105);
$cabeza2 = substr($cabeza, 105, 109);

$cuello = $_POST['inputNeck'];
$torax = $_POST['inputThorax'];

$torax1 = substr($torax, 0, 104);
$torax2 = substr($torax, 104, 109);

$corazon = $_POST['inputHeart'];
$pulmones = $_POST['inputLungs'];
$abdomen = $_POST['inputAbdomen'];

$abdomen1 = substr($abdomen, 0, 103);
$abdomen2 = substr($abdomen, 103, 109);

$sisNervioso = $_POST['inputNervousSystem'];
$apaUrogenital = $_POST['inputUrogenitalSystem'];
$apaLocomotor = $_POST['inputLocomotorSystem'];

$apaLocomotor1 = substr($apaLocomotor, 0, 88);
$apaLocomotor2 = substr($apaLocomotor, 88, 109);

$eval_tratamiento = $_POST['inputEvaluation'];

$eval_tratamiento1 = substr($eval_tratamiento, 0, 83);
$eval_tratamiento2 = substr($eval_tratamiento, 83, 115);
$eval_tratamiento3 = substr($eval_tratamiento, 198, 115);
$eval_tratamiento4 = substr($eval_tratamiento, 313, 106);

$fields = array(
  'nombre'                => $apellido.', '.$nombre,
  'afiliado'              => $afiliado_nro,
  'hc'                    => $hc_nro,
  'edad'                  => $edad,
  'estadoCivil'           => $estado_civil,
  'sexo'                  => $sexo,
  'servicio'              => $servicio,
  'medico'                => $medico,
  'estadoAlta'            => $estado_alta,
  'fechaEntrada'          => $fecha_entrada,
  'diagEntrada'           => $diag_entrada,
  'diagDefinitivo1'       => $diag_definitivo1,
  'diagDefinitivo2'       => $diag_definitivo2,
  'fechaAlta'             => $fecha_alta,
  'antesHereditarios1'    => $antec_hereditarios1,
  'antesHereditarios2'    => $antec_hereditarios2,
  'antesHereditarios3'    => $antec_hereditarios3,
  'antesPersonales1'      => $antec_personales1,
  'antesPersonales2'      => $antec_personales2,
  'antesPersonales3'      => $antec_personales3,
  'antesPersonales4'      => $antec_personales4,
  'enfermedadActual1'     => $enfer_actual1,
  'enfermedadActual2'     => $enfer_actual2,
  'cabeza1'               => $cabeza1,
  'cabeza2'               => $cabeza2,
  'abdomen1'              => $abdomen1,
  'abdomen2'              => $abdomen2,
  'evalTratamiento1'      => $eval_tratamiento1,
  'evalTratamiento2'      => $eval_tratamiento2,
  'evalTratamiento3'      => $eval_tratamiento3,
  'evalTratamiento4'      => $eval_tratamiento4,
  'psiquiatria'           => $psiquiatria,
  'pulso'                 => $pulso,
  'respiracion'           => $respiracion,
  'temperatura'           => $temperatura,
  'cuello'                => $cuello,
  'torax1'                => $torax1,
  'torax2'                => $torax2,
  'corazon'               => $corazon,
  'pulmones'              => $pulmones,
  'sisNervioso'           => $sisNervioso,
  'apaUrogenital'         => $apaUrogenital,
  'apaLocomotor1'         => $apaLocomotor1,
  'apaLocomotor2'         => $apaLocomotor2,
);

$pdf = new FPDM('../../forms/hc.pdf');

$fileName = 'temp.pdf';

$pdf->Load($fields, true);
$pdf->Merge();
$pdf->Output('D',$fileName);