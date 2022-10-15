$(document).ready( function () {
  var table = $('#table_id').DataTable({
    processing: true,
    serverSide: true,
    scrollX: true,
    ajax: '/pages/patient/get-patient.php',
    language: {
      url: '/assets/DataTables/es-ES.json',
    },
    columns: [
      { data: 'hc_nro' },
      { data: 'nombre',
        render: function ( data, type, row ) {
          return row.apellido + ', ' + row.nombre;
        }
      },
      { data: 'afiliado_nro' },
      {
        targets: -1,
        data: null,
        defaultContent: '<button class="btn btn-primary" >Ver</button>',
      },
    ],
  });

  $('#table_id tbody').on('click', 'button', function () {
    var form = document.forms.namedItem('patientForm');

    var data = table.row($(this).parents('tr')).data();
    // alert(data['nombre'] + "'s salary is: " + data['afiliado_nro']);
    form.inputName.value = data['nombre'];
    form.inputHCNumber.value = data['hc_nro'];
    form.inputLastName.value = data['apellido'];
    form.inputAffiliateNumber.value = data['afiliado_nro'];
    form.inputAge.value = data['edad'];
    form.inputCivilState.value = data['estado_civil'];
    form.gridGender.value = data['sexo'];
    form.inputService.value = data['servicio'];
    form.inputMedic.value = data['medico_tratante'];
    form.inputEntryDate.value = data['fecha_entrada'];
    form.inputEntryState.value = data['estado_alta'];
    form.inputEntryDiag.value = data['diag_entrada'];
    form.inputFinalDiag.value = data['diag_definitivo'];
    form.inputDischargeDate.value = data['fecha_alta'];
    form.inputHereditaryBackground.value = data['antec_hereditarios'];
    form.inputPersonalBackground.value = data['antec_personales'];
    form.inputCurrentDisease.value = data['enfer_actual'];
    form.inputPsychiatry.value = data['psiquiatria'];
    form.inputBreathing.value = data['respiracion'];
    form.inputPulse.value = data['pulso'];
    form.inputTemperature.value = data['temperatura'];
    form.inputHead.value = data['cabeza'];
    form.inputNeck.value = data['cuello'];
    form.inputThorax.value = data['torax'];
    form.inputHeart.value = data['corazon'];
    form.inputLungs.value = data['pulmones'];
    form.inputAbdomen.value = data['abdomen'];
    form.inputNervousSystem.value = data['sis_nervioso'];
    form.inputUrogenitalSystem.value = data['apar_urogenital'];
    form.inputLocomotorSystem.value = data['apar_locomotor'];
    form.inputEvaluation.value = data['eval_tratamiento'];

    $('#myModal').modal('show');
  });
  
});
