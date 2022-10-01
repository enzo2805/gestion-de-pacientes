<?php
require_once './db.php';

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
        <a class="navbar-brand" href="#">Gestión de pacientes</a>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row justify-content-md-center my-3">
        <div class="col-md-3">
          <a href="pages/patient/new-patient.php" class="text-primary">
            <div class="card bg-primary text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <i class="fa-solid fa-user fa-6x" alt="icono de paciente"></i>
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body ">
                    <h5 class="card-title">Nuevo Paciente</h5>
                    <p class="card-text">Cargar datos de un nuevo paciente</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="pages/patient/patient-list.php" class="text-primary">
            <div class="card bg-primary text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <i class="fa-solid fa-rectangle-list fa-5x" alt="icono de paciente"></i>
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body ">
                    <h5 class="card-title">Lista de Pacientes</h5>
                    <p class="card-text">Lista de todos los pacientes cargados</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="pages/pami/reumatoidea-inicio.php" class="text-dark">
            <div class="card bg-dark text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <img src="images/pami-logo.png" class="img-fluid icono" alt="icono pami">
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body">
                    <h5 class="card-title">PAMI</h5>
                    <p class="card-text">Formulario de <b>inicio</b> de Artritis Reumatoidea</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row justify-content-md-center my-3">
        <div class="col-md-3">
          <a href="" class="text-dark">
            <div class="card bg-dark text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <img src="images/pami-logo.png" class="img-fluid icono" alt="icono pami">
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body">
                    <h5 class="card-title">PAMI</h5>
                    <p class="card-text">Formulario de <b>renovación</b> de Artritis Reumatoidea</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="" class="text-success">
            <div class="card bg-success text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <img src="images/pormassalud-logo.png" class="img-fluid icono" alt="icono por más salud`">
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body">
                    <h5 class="card-title">Por + Salud</h5>
                    <p class="card-text">Pedido de práctica: Resonancia magnética 1.5 T</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="" class="text-secondary">
            <div class="card bg-secondary text-white vertical-heigth-card">
              <div class="row g-0">
                <div class="col-5 col-sm-4 align-self-center text-center">
                  <img src="images/imagenes-jaraba-logo.png" class="img-fluid icono" alt="icono por más salud`">
                </div>
                <div class="col-7 col-sm-8">
                  <div class="card-body">
                    <h5 class="card-title">Imágenes Jaraba</h5>
                    <p class="card-text">Pedido de TAC (Tomografía Axial Computarizada)</p>
                    <p class="card-text"><small class="text-white">Entrar</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <footer>
      <div class="fixed-bottom bd-highlight bg-dark text-white text-center">© 2022, Realizado por Rodriguez Family Soft</div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="/js/customs/dashboard.js"></script>
  </body>
</html>