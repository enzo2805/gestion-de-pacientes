<?php
require_once '../../db.php';

$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
  0 => 'id',
  1 => 'nombre',              
  2 => 'descrip',            
  3 => 'user_id',      
  4 => 'form_id',
  5 => 'fecha',
);
// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM Formulario";
$sql.=" WHERE descrip = 'PAMI: inicio'";
$query=mysqli_query($conn, $sql) or die("get-list-reumatoidea-inicio.php: get list PAMI reumatoidea inicio");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
if( !empty($requestData['search']['value']) ) {
    // if there is a search parameter
    $sql = "SELECT * ";
    $sql.=" FROM Formulario";
    $sql.=" WHERE descrip = 'PAMI: inicio' ";
    $sql.=" AND nombre LIKE '%".$requestData['search']['value']."%' ";  
    $sql.=" OR (fecha LIKE '%".$requestData['search']['value']."%' AND descrip = 'PAMI: inicio')";  
    $query=mysqli_query($conn, $sql) or die("get-list-reumatoidea-inicio.php: get list PAMI reumatoidea inicio");
    $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
    $query=mysqli_query($conn, $sql) or die("get-list-reumatoidea-inicio.php: get list PAMI reumatoidea inicio"); // again run query with limit
     
} else {    
    $sql = "SELECT * ";
    $sql.=" FROM Formulario";
    $sql.=" WHERE descrip = 'PAMI: inicio'";
    $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
    $query=mysqli_query($conn, $sql) or die("get-list-reumatoidea-inicio.php: get list PAMI reumatoidea inicio");
     
}
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
    $nestedData=array(); 
    $nestedData['id'] = $row['id'];
    $nestedData['nombre'] = $row['nombre'];
    $nestedData['descrip'] = $row['descrip'];
    $nestedData['user_id'] = $row['user_id'];
    $nestedData['form_id'] = $row['form_id'];
    $nestedData['fecha'] = $row['fecha'];
     
    $data[] = $nestedData;
}
$json_data = array(
  "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
  "recordsTotal"    => intval( $totalData ),  // total number of records
  "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
  "data"            => $data   // total data array
  );
echo json_encode($json_data);  // send data as json format