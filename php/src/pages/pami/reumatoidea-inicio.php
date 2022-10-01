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
      * {
        
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
        <li class="breadcrumb-item active" aria-current="page">PAMI Reumatoidea inicio</li>
      </ol>
    </nav>
    <div class="container-fluid">
      <h1 class="display-6">PAMI Reumatoidea inicio</h1>
      <div class="container-fluid w-75 mb-5 border p-3 bg-dark text-white rounded border-info">
        <form name="pamiReumatoideaInicioForm" id="pamiReumatoideaInicioForm" method="post" action="http://localhost:8000/pages/pdf-generation/generate-pami-artritis-reumatoidea-inicio.php">
          <h5 class="h5 mb-2">DATOS PERSONALES</h5>
          <fieldset class="row mb-2">
            <label for="inputName" class="col-sm-2 col-form-label">Nombre y apellido</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="inputName" id="inputName">
            </div>
            <label for="inputBirthDate" class="col-sm-1 col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" name="inputBirthDate" id="inputBirthDate">
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputBeneficiary" class="col-sm-2 col-form-label">Beneficiario Nº</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="inputBeneficiary" id="inputBeneficiary">
            </div>
          </div>
          <fieldset class="row mb-2">
            <label for="inputStartDate" class="col-sm-2 col-form-label">Fecha inicio</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" name="inputStartDate" id="inputStartDate">
            </div>
            <label for="inputWeight" class="col-sm-1 col-form-label">Peso</label>
            <div class="col-sm-3">
              <input type="number" min="0" max="999999" class="form-control" name="inputWeight" id="inputWeight">
            </div>
            <label for="inputHeight" class="col-sm-1 col-form-label">Talla</label>
            <div class="col-sm-2">
              <input type="number" min="0" max="999999" class="form-control" name="inputHeight" id="inputHeight">
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputSummaryHC" class="col-sm-2 col-form-label">Resumen de HC</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="inputSummaryHC" id="inputSummaryHC" rows="4" wrap="hard" maxlength="380"></textarea>
            </div>
          </div>
          <!-- TRATAMIENTOS FARMACOLOGICOS PREVIOS
              TABLA -->
          <h5 class="h5 mb-2">TRATAMIENTOS FARMACOLÓGICOS PREVIOS</h5>
          <div id="drugs">
            <fieldset class="row mb-2" name="tableTFP">
              <label for="inputDrug" class="col-sm-1 col-form-label">Droga</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="inputDrug[]" id="inputDrug">
              </div>
              <label for="inputDosis" class="col-sm-1 col-form-label">Dosis</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="inputDosis[]" id="inputDosis">
              </div>
              <label for="inputTime" class="col-sm-1 col-form-label">Tiempo</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="inputTime[]" id="inputTime">
              </div>
              <label for="inputResults" class="col-sm-1 col-form-label">Resultados</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="inputResults[]" id="inputResults">
              </div>
            </fieldset>
          </div>
          <div class="row my-3 justify-content-md-center">
            <button id="btnAddDrug" type="button" class="btn col-2 bg-success text-white mx-2"><i class="fa-solid fa-plus" alt="icono de paciente"></i></button>
            <button id="btnDropDrug" type="button" class="btn col-2 bg-danger text-white mx-2"><i class="fa-solid fa-minus" alt="icono de paciente"></i></button>
          </div>
          <h5 class="h5 my-2">LABORATORIO ESPECÍFICO ACTUAL: SEROLOGÍA REUMÁTICA Y REACTANTES DE FASE AGUDA</h5>
          <fieldset class="row my-2" name="tableTFP">
            <label for="inputRFactor" class="col-sm-1 col-form-label">Factor R</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="inputRFactor" id="inputRFactor">
            </div>
            <label for="inputVSG" class="col-sm-1 col-form-label">VSG</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="inputVSG" id="inputVSG">
            </div>
            <label for="inputPCR" class="col-sm-1 col-form-label">PCR</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="inputPCR" id="inputPCR">
            </div>
            <label for="inputCPP" class="col-sm-1 col-form-label">Anti-CCP</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="inputCPP" id="inputCPP">
            </div>
          </fieldset>
          <h5 class="h5 my-2">FÁRMACO SOLICITADO POR VÍA DE EXCEPCIÓN</h5>
          <div id="farmacos" class="my-2">
            <fieldset class="row mb-2" name="tableFarmaco">
              <label for="inputFarmaco" class="col-sm-1 col-form-label">Droga</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="inputFarmaco[]" id="inputFarmaco">
              </div>
              <label for="inputPresentation" class="col-sm-1 col-form-label">Presentación</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="inputPresentation[]" id="inputPresentation">
              </div>
              <label for="inputDosisFarmaco" class="col-sm-1 col-form-label">Dosis</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="inputDosisFarmaco[]" id="inputDosisFarmaco">
              </div>
            </fieldset>
          </div>
          <div class="row my-3 justify-content-md-center">
            <button id="btnAddFarmaco" type="button" class="btn col-2 bg-success text-white mx-2"><i class="fa-solid fa-plus" alt="icono de paciente"></i></button>
            <button id="btnDropFarmaco" type="button" class="btn col-2 bg-danger text-white mx-2"><i class="fa-solid fa-minus" alt="icono de paciente"></i></button>
          </div>
          <fieldset class="row mb-2">
            <legend class="col-form-label col-sm-1 offset-1 pt-0">Monodroga</legend>
            <div class="col-sm-1">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="monoDrug" id="monoDrug1" value="Si" checked="">
                <label class="form-check-label" for="monoDrug1">
                  Si
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="monoDrug" id="monoDrug2" value="No">
                <label class="form-check-label" for="monoDrug2">
                  No
                </label>
              </div>
            </div>
            <label for="inputRelatedTo" class="col-sm-2 col-form-label">Asociado con</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="inputRelatedTo" id="inputRelatedTo">
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <div class="container-fluid w-50">
              <div class="row text-center">
                <div class="col-4 border">Articulaciones</div>
                <div class="col-4">
                  <div class="row justify-content-md-center border">
                    Izquierdo
                  </div>
                  <div class="row text-center">
                    <div class="col-6 border">Dolorosas</div>
                    <div class="col-6 border">Inflamadas</div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="row justify-content-md-center border">
                    Derecho
                  </div>
                  <div class="row text-center">
                    <div class="col-6 border">Dolorosas</div>
                    <div class="col-6 border">Inflamadas</div>
                  </div>
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  Hombros
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="shoulder[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="shoulder[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="shoulder[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="shoulder[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  Codos
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="elbow[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="elbow[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="elbow[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="elbow[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  Muñecas
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="wrists[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="wrists[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="wrists[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="wrists[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  MCF 1
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf1[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="mcf1[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf1[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf1[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  MCF 2
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf2[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="mcf2[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf2[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf2[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  MCF 3
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf3[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="mcf3[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf3[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf3[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  MCF 4
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf4[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="mcf4[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf4[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf4[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  MCF 5
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf5[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="mcf5[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf5[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="mcf5[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  IFP 1
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp1[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="ifp1[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp1[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp1[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  IFP 2
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp2[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="ifp2[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp2[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp2[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  IFP 3
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp3[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="ifp3[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp3[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp3[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  IFP 4
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp4[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="ifp4[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp4[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp4[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  IFP 5
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp5[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="ifp5[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp5[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="ifp5[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top">
                <div class="col-4">
                  Rodillas
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="knee[]" value="1">
                </div>
                <div class="col-2 border-end">
                  <input class="form-check-input" type="checkbox" name="knee[]" value="2">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="knee[]" value="3">
                </div>
                <div class="col-2">
                  <input class="form-check-input" type="checkbox" name="knee[]" value="4">
                </div>
              </div>
              <div class="row text-center border-top ">
                <div class="col-4">
                  Subtotal
                </div>
                <div class="col-2">
                  <label id="iDolorosasLabel">0</label>
                  <input type="hidden" class="form-control" name="iDolorosas" id="iDolorosas" value="0">
                </div>
                <div class="col-2 border-end">
                  <label id="iInflamadasLabel">0</label>
                  <input type="hidden" class="form-control" name="iInflamadas" id="iInflamadas" value="0">
                </div>
                <div class="col-2">
                  <label id="dDolorosasLabel">0</label>
                  <input type="hidden" class="form-control" name="dDolorosas" id="dDolorosas" value="0">
                </div>
                <div class="col-2">
                  <label id="dInflamadasLabel">0</label>
                  <input type="hidden" class="form-control" name="dInflamadas" id="dInflamadas" value="0">
                </div>
              </div>
            </div>
            <div class="col-5 offset-1">
              <label class="col-sm-1 col-form-label ">Total</label>
              <div class="row my-2">
                <label for="dolorosasTotal" class="col-sm-3 col-form-label">Dolorosas</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control text-center" name="dolorosasTotal" id="dolorosasTotal" value="0" readonly>
                </div>
              </div>
              <div class="row my-2">
                <label for="inflamadasTotal" class="col-sm-3 col-form-label">Inflamadas</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control text-center" name="inflamadasTotal" id="inflamadasTotal" value="0" readonly>
                </div>
              </div>
              <div class="row my-2">
                <label for="das28" class="col-sm-3 col-form-label">DAS 28</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control text-center" name="das28" id="das28">
                </div>
              </div>
              <div class="row my-2">
                <label for="haq" class="col-sm-3 col-form-label">HAQ</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control text-center" name="haq" id="haq">
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset class="container-fluid text-center my-3">
            <label class="col-sm-12 col-form-label ">VAS global del paciente</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio0" value="0">
              <label class="form-check-label" for="vasRadio0">0</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio1" value="1">
              <label class="form-check-label" for="vasRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio2" value="2">
              <label class="form-check-label" for="vasRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio3" value="3">
              <label class="form-check-label" for="vasRadio3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio4" value="4">
              <label class="form-check-label" for="vasRadio4">4</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio5" value="5">
              <label class="form-check-label" for="vasRadio5">5</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio6" value="6">
              <label class="form-check-label" for="vasRadio6">6</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio7" value="7">
              <label class="form-check-label" for="vasRadio7">7</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio8" value="8">
              <label class="form-check-label" for="vasRadio8">8</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio9" value="9">
              <label class="form-check-label" for="vasRadio9">9</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="vasRadio" id="vasRadio10" value="10">
              <label class="form-check-label" for="vasRadio10">10</label>
            </div>
          </fieldset>
          <fieldset class="row mb-2">
            <label for="inputPlace" class="col-sm-1 col-form-label">Lugar</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="inputPlace" id="inputPlace">
            </div>
            <label for="inputDate" class="col-sm-1 col-form-label">Fecha</label>
            <div class="col-sm-3">
              <input type="date" class="form-control" name="inputDate" id="inputDate">
            </div>
            <label for="inputPhone" class="col-sm-1 col-form-label">Tel</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="inputPhone" id="inputPhone">
            </div>
          </fieldset>
          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-11">
              <input type="email" class="form-control" name="inputEmail" id="inputEmail">
            </div>
          </div>
          <button type="submit" id="saveBtn" class="btn btn-primary">Guardar</button>
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

      <script src="reumatoidea-inicio.js"></script>
  </body>
</html>