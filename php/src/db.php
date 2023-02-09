<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'db';

// Database use name
$user = 'root';

//database user password
$pass = 'norteP2023'; //p4c1nt35@2022

// database name
$mydatabase = 'gestion_pacientes';
// check the mysql connection status

$conn = new mysqli($host, $user, $pass, $mydatabase);

?>