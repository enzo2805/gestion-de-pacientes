<?php
require_once '../../db.php';

// select query
/*$sql = 'SELECT * FROM users';

if ($result = $conn->query($sql)) {
  while ($data = $result->fetch_object()) {
    $users[] = $data;
  }
}

foreach ($users as $user) {
  echo "<br>";
  echo $user->username . " " . $user->password;
  echo "<br>";
}*/
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Enzo Rodriguez">
    <title>Gestión de pacientes</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.css" rel="stylesheet">

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/DataTables/datatables.min.css"/>
    <style>
      .icono {
        width: 90% !important;
        margin: 0 auto; 
      }
      .vertical-heigth-card{
        height: 9rem !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/customs/dashboard.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../.">Gestión de pacientes</a>
      </div>
    </nav>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../.">Gestión de Pacientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lista de Pacientes</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <h1 class="display-6">LISTA DE PACIENTES</h1>
      <div class="container-fluid bg-dark text-white py-2 px-3 rounded">
        <table id="table_id" class="display nowrap responsive table-striped bg-light text-dark" style="width:100%">
            <thead>
                <tr>
                    <th class="bg-primary text-white">Nombre</th>
                    <th class="bg-primary text-white">Apellido</th>
                    <th class="bg-primary text-white">Nº Afiliado</th>
                    <th class="bg-primary text-white">Nº HC</th>
                    <th class="bg-primary text-white">Edad</th>
                    <th class="bg-primary text-white">Estado civil</th>
                    <th class="bg-primary text-white">Sexo</th>
                    <th class="bg-primary text-white">Servicio</th>
                    <th class="bg-primary text-white">Medico tratante</th>
                    <th class="bg-primary text-white">Fecha de entrada</th>
                    <th class="bg-primary text-white">Estado de alta</th>
                    <th class="bg-primary text-white">diagnóstico de entrada</th>
                    <th class="bg-primary text-white">diagnóstico definitivo</th>
                    <th class="bg-primary text-white">Fecha de alta</th>
                    <th class="bg-primary text-white">Antecedentes hereditarios</th>
                    <th class="bg-primary text-white">Antecedentes personales</th>
                    <th class="bg-primary text-white">Enfermedad actual</th>
                    <th class="bg-primary text-white">Psiquiatria</th>
                    <th class="bg-primary text-white">Respiración</th>
                    <th class="bg-primary text-white">Pulso</th>
                    <th class="bg-primary text-white">Temperatura</th>
                    <th class="bg-primary text-white">Cabeza</th>
                    <th class="bg-primary text-white">Cuello</th>
                    <th class="bg-primary text-white">Torax</th>
                    <th class="bg-primary text-white">Corazón</th>
                    <th class="bg-primary text-white">Pulmones</th>
                    <th class="bg-primary text-white">Abdomen</th>
                    <th class="bg-primary text-white">Sist. Nervioso</th>
                    <th class="bg-primary text-white">Aprto. Urogenital</th>
                    <th class="bg-primary text-white">Aprto. Locomotor</th>
                    <th class="bg-primary text-white">Evaluación y Tratamiento</th>
                    <th class="bg-primary text-white">Estado</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
      
    <footer>
      <div class="fixed-bottom bd-highlight bg-dark text-white text-center">© 2022, Realizado por Rodriguez Family Soft</div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script type="text/javascript" src="/assets/DataTables/datatables.min.js"></script>
      <script src="patient-list.js"></script>
  </body>
</html>