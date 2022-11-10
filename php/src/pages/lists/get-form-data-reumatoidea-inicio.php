<?php
require_once '../../db.php';

$form_id = $_POST['form_id'];

$sql = "SELECT * ";
$sql .= " FROM Pami_inicio";
$sql .= " WHERE id = ".$form_id.";";

$query=mysqli_query($conn, $sql) or die("get-form-data-reumatoidea-inicio.php: get form PAMI reumatoidea inicio");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 
    $nestedData['id']                   = $row['id'];
    $nestedData['nombre']               = $row['nombre'];
    $nestedData['id_paciente']          = $row['id_paciente'];
    $nestedData['nombre']               = $row['nombre'];
    $nestedData['fecha_nac']            = $row['fecha_nac'];
    $nestedData['beneficiario']         = $row['beneficiario'];
    $nestedData['fecha_ini_enf']        = $row['fecha_ini_enf'];
    $nestedData['peso']                 = $row['peso'];
    $nestedData['talla']                = $row['talla'];
    $nestedData['resumen_hc']           = $row['resumen_hc'];
    $nestedData['droga']                = $row['droga'];
    $nestedData['dosis']                = $row['dosis'];
    $nestedData['tiempo']               = $row['tiempo'];
    $nestedData['resultado']            = $row['resultado'];
    $nestedData['factor_r']             = $row['factor_r'];
    $nestedData['vsg']                  = $row['vsg'];
    $nestedData['pcr']                  = $row['pcr'];
    $nestedData['anti_ccp']             = $row['anti_ccp'];
    $nestedData['excep_droga']          = $row['excep_droga'];
    $nestedData['excep_present']        = $row['excep_present'];
    $nestedData['excep_dosis']          = $row['excep_dosis'];
    $nestedData['monodroga']            = $row['monodroga'];
    $nestedData['asociada_con']         = $row['asociada_con'];
    $nestedData['hombros']              = $row['hombros'];
    $nestedData['codos']                = $row['codos'];
    $nestedData['muñecas']              = $row['muñecas'];
    $nestedData['mcf_1']                = $row['mcf_1'];
    $nestedData['mcf_2']                = $row['mcf_2'];
    $nestedData['mcf_3']                = $row['mcf_3'];
    $nestedData['mcf_4']                = $row['mcf_4'];
    $nestedData['mcf_5']                = $row['mcf_5'];
    $nestedData['ifp_1']                = $row['ifp_1'];
    $nestedData['ifp_2']                = $row['ifp_2'];
    $nestedData['ifp_3']                = $row['ifp_3'];
    $nestedData['ifp_4']                = $row['ifp_4'];
    $nestedData['ifp_5']                = $row['ifp_5'];
    $nestedData['rodillas']             = $row['rodillas'];
    $nestedData['subtotales']           = $row['subtotales'];
    $nestedData['dolorosas']            = $row['dolorosas'];
    $nestedData['inflamadas']           = $row['inflamadas'];
    $nestedData['das28']                = $row['das28'];
    $nestedData['haq']                  = $row['haq'];
    $nestedData['lugar']                = $row['lugar'];
    $nestedData['fecha']                = $row['fecha'];
    $nestedData['telefono']             = $row['telefono'];
    $nestedData['email']                = $row['email'];
    $nestedData['vas']                  = $row['vas'];
    $data[] = $nestedData;
}

$json_data = array(
  "data"            => $data   // total data array
  );
echo json_encode($data);  // send data as json format
?>