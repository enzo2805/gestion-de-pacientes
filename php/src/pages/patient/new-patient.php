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
    <div class="container-fluid">
      <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../.">Gestión de pacientes</a>
        </div>
      </nav>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../.">Gestión de Pacientes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Nuevo Paciente</li>
        </ol>
      </nav>
      <div class="container-fluid w-50 mt-3 mb-5 border p-3 bg-dark text-white rounded border-info">
        <form class="" name="patientForm" id="patientForm" method="post" action="#">
          <fieldset class="row mb-2">
            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="inputName" id="inputName">
            </div>
            <label for="inputHCNumber" class="col-sm-1 col-form-label">H.C.Nº</label>
            <div class="col-sm-2">
              <input type="number" min="0" max="999999" class="form-control" name="inputHCNumber" id="inputHCNumber">
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputLastName" class="col-sm-2 col-form-label">Apellido</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="inputLastName" id="inputLastName">
            </div>
            <label for="inputAffiliateNumber" class="col-sm-1 col-form-label">Afiliado Nº</label>
            <div class="col-sm-2">
              <input type="number" min="0" max="999999" class="form-control" name="inputAffiliateNumber" id="inputAffiliateNumber">
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputAge" class="col-sm-2 col-form-label">Edad</label>
            <div class="col-sm-2">
              <input type="number" min="0" max="120" class="form-control" name="inputAge" id="inputAge">
            </div>
            <label for="inputCivilState" class="col-sm-1 col-form-label">Estado civil</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="inputCivilState" id="inputCivilState">
            </div>
            <legend class="col-form-label col-sm-1 pt-0">Sexo</legend>
            <div class="col-sm-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridGender" id="gridGender1" value="H" checked="">
                <label class="form-check-label" for="gridGender1">
                  Hombre
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridGender" id="gridGender2" value="M">
                <label class="form-check-label" for="gridGender2">
                  Mujer
                </label>
              </div>
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputService" class="col-sm-2 col-form-label">Servicio</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="inputService" id="inputService">
            </div>
            <label for="inputMedic" class="col-sm-1 col-form-label">Médico tratante</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="inputMedic" id="inputMedic">
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputEntryDate" class="col-sm-2 col-form-label">Fecha de entrada</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" name="inputEntryDate" id="inputEntryDate">
            </div>
            <label for="inputEntryState" class="col-sm-1 col-form-label">Estado de alta</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="inputEntryState" id="inputEntryState">
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputEntryDiag" class="col-sm-2 col-form-label">Diagnóstico de entrada</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputEntryDiag" id="inputEntryDiag"></textarea>
            </div>
          </div>
          <fieldset class="row mb-2">
            <label for="inputFinalDiag" class="col-sm-2 col-form-label">Diagnóstico definitivo</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="inputFinalDiag" id="inputFinalDiag"></textarea>
            </div>
            <label for="inputDischargeDate" class="col-sm-1 col-form-label">Fecha de alta</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" name="inputDischargeDate" id="inputDischargeDate">
            </div>
          </fieldset>
          
          <div class="row mb-3">
            <label for="inputHereditaryBackground" class="col-sm-2 col-form-label">Antecedentes Hereditarios</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputHereditaryBackground" id="inputHereditaryBackground"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPersonalBackground" class="col-sm-2 col-form-label">Antecedentes Personales</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputPersonalBackground" id="inputPersonalBackground"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCurrentDisease" class="col-sm-2 col-form-label">Enfermedad Actual</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputCurrentDisease" id="inputCurrentDisease"></textarea>
            </div>
          </div>
          <fieldset class="row mb-2">
            <label for="inputPsychiatry" class="col-sm-2 col-form-label">Psiquiatría</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="inputPsychiatry" id="inputPsychiatry">
            </div>
            <label for="inputBreathing" class="col-sm-2 col-form-label">Respiración</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="inputBreathing" id="inputBreathing">
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputPulse" class="col-sm-2 col-form-label">Pulso</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="inputPulse" id="inputPulse">
            </div>
            <label for="inputTemperature" class="col-sm-2 col-form-label">Temperatura</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="inputTemperature" id="inputTemperature">
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputHead" class="col-sm-2 col-form-label">Cabeza</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputHead" id="inputHead"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNeck" class="col-sm-2 col-form-label">Cuello</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputNeck" id="inputNeck">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputThorax" class="col-sm-2 col-form-label">Tórax</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputThorax" id="inputThorax"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputHeart" class="col-sm-2 col-form-label">Corazón</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputHeart" id="inputHeart">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputLungs" class="col-sm-2 col-form-label">Pulmones</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputLungs" id="inputLungs">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputAbdomen" class="col-sm-2 col-form-label">Abdomen</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputAbdomen" id="inputAbdomen"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNervousSystem" class="col-sm-2 col-form-label">Sistema nervioso</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputNervousSystem" id="inputNervousSystem">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputUrogenitalSystem" class="col-sm-2 col-form-label">Aparato urogenital</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="inputUrogenitalSystem" id="inputUrogenitalSystem">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputLocomotorSystem" class="col-sm-2 col-form-label">Aparato locomotor</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputLocomotorSystem" id="inputLocomotorSystem"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputEvaluation&Treatment" class="col-sm-2 col-form-label">Evaluación y tratamiento</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputEvaluation" id="inputEvaluation&Treatment"></textarea>
            </div>
          </div>
          <button type="button" id="saveBtn" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>

    <footer>
      <div class="fixed-bottom bd-highlight bg-dark text-white text-center">© 2022, Realizado por Rodriguez Family Soft</div>
    </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="/js/customs/dashboard.js"></script>

      <script src="new-patient.js"></script>
  </body>
</html>