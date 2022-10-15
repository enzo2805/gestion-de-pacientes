<?php
require_once '../../db.php';

$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
  0 => 'id',
  1 => 'nombre',              
  2 => 'apellido',            
  3 => 'afiliado_nro',        
  4 => 'hc_nro',              
  5 => 'edad',                
  6 => 'estado_civil',        
  7 => 'sexo',                
  8 => 'servicio',            
  9 => 'medico_tratante',     
  10 => 'fecha_entrada',
  11 => 'estado_alta',         
  12 => 'diag_entrada',        
  13 => 'diag_definitivo',     
  14 => 'fecha_alta',
  15 => 'antec_hereditarios',  
  16 => 'antec_personales',    
  17 => 'enfer_actual',        
  18 => 'psiquiatria',         
  19 => 'respiracion',         
  20 => 'pulso',               
  21 => 'temperatura',         
  22 => 'cabeza',              
  23 => 'cuello',              
  24 => 'torax',               
  25 => 'corazon',             
  26 => 'pulmones',            
  27 => 'abdomen',             
  28 => 'sis_nervioso',        
  29 => 'apar_urogenital',     
  30 => 'apar_locomotor',      
  31 => 'eval_tratamiento',    
  32 => 'estado',
);
// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM Paciente";
$query=mysqli_query($conn, $sql) or die("get-patient.php: get patients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT * ";
    $sql.=" FROM Paciente";
    $sql.=" WHERE nombre LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR apellido LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR hc_nro LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("get-patient.php: get patients");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("get-patient.php: get patients"); // again run query with limit
     
} else {    
    $sql = "SELECT * ";
    $sql.=" FROM Paciente";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($conn, $sql) or die("get-patient.php: get patients");
     
}
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 
    $nestedData['id'] = $row['id'];
    $nestedData['nombre'] = $row['nombre'];
    $nestedData['apellido'] = $row['apellido'];
    $nestedData['afiliado_nro'] = $row['afiliado_nro'];
    $nestedData['hc_nro'] = $row['hc_nro'];
    $nestedData['edad'] = $row['edad'];
    $nestedData['estado_civil'] = $row['estado_civil'];
    $nestedData['sexo'] = $row['sexo'];
    $nestedData['servicio'] = $row['servicio'];
    $nestedData['medico_tratante'] = $row['medico_tratante'];
    $nestedData['fecha_entrada'] = $row['fecha_entrada'];
    $nestedData['estado_alta'] = $row['estado_alta'];
    $nestedData['diag_entrada'] = $row['diag_entrada'];
    $nestedData['diag_definitivo'] = $row['diag_definitivo'];
    $nestedData['fecha_alta'] = $row['fecha_alta'];
    $nestedData['antec_hereditarios'] = $row['antec_hereditarios'];
    $nestedData['antec_personales'] = $row['antec_personales'];
    $nestedData['enfer_actual'] = $row['enfer_actual'];
    $nestedData['psiquiatria'] = $row['psiquiatria'];
    $nestedData['respiracion'] = $row['respiracion'];
    $nestedData['pulso'] = $row['pulso'];
    $nestedData['temperatura'] = $row['temperatura'];
    $nestedData['cabeza'] = $row['cabeza'];
    $nestedData['cuello'] = $row['cuello'];
    $nestedData['torax'] = $row['torax'];
    $nestedData['corazon'] = $row['corazon'];
    $nestedData['pulmones'] = $row['pulmones'];
    $nestedData['abdomen'] = $row['abdomen'];
    $nestedData['sis_nervioso'] = $row['sis_nervioso'];
    $nestedData['apar_urogenital'] = $row['apar_urogenital'];
    $nestedData['apar_locomotor'] = $row['apar_locomotor'];
    $nestedData['eval_tratamiento'] = $row['eval_tratamiento'];
    $nestedData['estado'] = $row['estado'];
     
    $data[] = $nestedData;
}
$json_data = array(
  "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
  "recordsTotal"    => intval( $totalData ),  // total number of records
  "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
  "data"            => $data   // total data array
  );
echo json_encode($json_data);  // send data as json format