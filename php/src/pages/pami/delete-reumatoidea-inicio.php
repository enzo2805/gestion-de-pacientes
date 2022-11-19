<?php
require_once '../../db.php';

$id = $_POST['form_id'];

$sql = "DELETE FROM Pami_Inicio WHERE `id` = $id";

header('Content-Type: text/html; charset=utf-8');

if ($conn->query($sql) === TRUE) {
  echo "True";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>