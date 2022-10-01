<?php
require_once '../../db.php';

$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
  0 => 'nombre',              
  1 => 'apellido',            
  2 => 'afiliado_nro',        
  3 => 'hc_nro',              
  4 => 'edad',                
  5 => 'estado_civil',        
  6 => 'sexo',                
  7 => 'servicio',            
  8 => 'medico_tratante',     
  9 => 'fecha_entrada',
  10 => 'estado_alta',         
  11 => 'diag_entrada',        
  12 => 'diag_definitivo',     
  13 => 'fecha_alta',
  14 => 'antec_hereditarios',  
  15 => 'antec_personales',    
  16 => 'enfer_actual',        
  17 => 'psiquiatria',         
  18 => 'respiracion',         
  19 => 'pulso',               
  20 => 'temperatura',         
  21 => 'cabeza',              
  22 => 'cuello',              
  23 => 'torax',               
  24 => 'corazon',             
  25 => 'pulmones',            
  26 => 'abdomen',             
  27 => 'sis_nervioso',        
  28 => 'apar_urogenital',     
  29 => 'apar_locomotor',      
  30 => 'eval_tratamiento',    
  31 => 'estado',
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
    $nestedData[] = $row['nombre'];
    $nestedData[] = $row['apellido'];
    $nestedData[] = $row['afiliado_nro'];
    $nestedData[] = $row['hc_nro'];
    $nestedData[] = $row['edad'];
    $nestedData[] = $row['estado_civil'];
    $nestedData[] = $row['sexo'];
    $nestedData[] = $row['servicio'];
    $nestedData[] = $row['medico_tratante'];
    $nestedData[] = $row['fecha_entrada'];
    $nestedData[] = $row['estado_alta'];
    $nestedData[] = $row['diag_entrada'];
    $nestedData[] = $row['diag_definitivo'];
    $nestedData[] = $row['fecha_alta'];
    $nestedData[] = $row['antec_hereditarios'];
    $nestedData[] = $row['antec_personales'];
    $nestedData[] = $row['enfer_actual'];
    $nestedData[] = $row['psiquiatria'];
    $nestedData[] = $row['respiracion'];
    $nestedData[] = $row['pulso'];
    $nestedData[] = $row['temperatura'];
    $nestedData[] = $row['cabeza'];
    $nestedData[] = $row['cuello'];
    $nestedData[] = $row['torax'];
    $nestedData[] = $row['corazon'];
    $nestedData[] = $row['pulmones'];
    $nestedData[] = $row['abdomen'];
    $nestedData[] = $row['sis_nervioso'];
    $nestedData[] = $row['apar_urogenital'];
    $nestedData[] = $row['apar_locomotor'];
    $nestedData[] = $row['eval_tratamiento'];
    $nestedData[] = $row['estado'];
     
    $data[] = $nestedData;
}
$json_data = array(
  "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
  "recordsTotal"    => intval( $totalData ),  // total number of records
  "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
  "data"            => $data   // total data array
  );
echo json_encode($json_data);  // send data as json format