<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Enzo Rodriguez">
    <title>Gestión de pacientes</title>
    <link rel="icon" href="/images/logo.png">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.css" rel="stylesheet">

    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/assets/DataTables/datatables.min.css"/>
    <style>
      .icono {
        width: 42px;
        margin: 0 auto; 
        padding: 5px;
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
    <nav class="mt-2 mx-2" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../../." class=" badge bg-primary text-white">Gestión de Pacientes</a></li>
        <li class="breadcrumb-item badge bg-light active" aria-current="page">Lista de pacientes</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <h1 class="display-6 text-uppercase">Lista de pacientes</h1>
      <div class="container-fluid bg-dark text-white py-2 px-3 rounded">
        <table id="table_id" class="display nowrap responsive table-striped bg-light text-dark" style="width:100%">
            <thead>
                <tr>
                    <th class="bg-primary text-white">Nº HC</th>
                    <th class="bg-primary text-white">Apellido y nombre</th>
                    <th class="bg-primary text-white">Nº Afiliado</th>
                    <!-- <th class="bg-primary text-white">Edad</th>
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
                    <th class="bg-primary text-white">Estado</th> -->
                    <th class="bg-primary text-white">Acción</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>

    <div id="myModal" class="modal" tabindex="-1">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header bg-dark text-white">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body bg-dark text-white">
            <form id="patientForm" name="patientForm" method="POST" action="/pages/pdf-generation/generate-hc.php">
              <fieldset class="row mb-2">
                <input type="hidden" name="id" id="id">
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
                  <textarea class="form-control" name="inputHereditaryBackground" id="inputHereditaryBackground" rows="4" wrap="hard" maxlength="296"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPersonalBackground" class="col-sm-2 col-form-label">Antecedentes Personales</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="inputPersonalBackground" id="inputPersonalBackground" rows="4" wrap="hard" maxlength="296"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputCurrentDisease" class="col-sm-2 col-form-label">Enfermedad Actual</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="inputCurrentDisease" id="inputCurrentDisease" rows="4" wrap="hard" maxlength="197"></textarea>
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
                  <textarea class="form-control" name="inputHead" id="inputHead" rows="4" wrap="hard" maxlength="210"></textarea>
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
                  <textarea class="form-control" name="inputAbdomen" id="inputAbdomen" rows="4" wrap="hard" maxlength="208"></textarea>
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
                  <textarea class="form-control" name="inputEvaluation" id="inputEvaluation&Treatment" rows="4" wrap="hard" maxlength="402"></textarea>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer bg-dark text-white">
            <button id="makePDF" form="patientForm" type="submit" class="btn">
              <span style="font-size: 2em; color: Tomato;">
                <i class="fa-solid fa-file-pdf"></i>
              </span>
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button id="btnUpdate" type="button" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
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