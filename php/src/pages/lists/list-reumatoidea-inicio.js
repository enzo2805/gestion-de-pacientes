$(document).ready( function () {
  var table = $('#table_id').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/pages/lists/get-list-reumatoidea-inicio.php',
    language: {
      url: '/assets/DataTables/es-ES.json',
    },
    columns: [
      { data: 'nombre' },
      { data: null,
        render: function (data, type, row) {
          let date = new Date(row['fecha']);
          date.setDate(date.getDate() + 1);

          return date.toLocaleDateString();
        } 
      },
      {
        targets: -1,
        data: null,
        render: function (data, type, row) {
          return `
          <button class="btn btn-primary ver" >Ver</button>
          <button type="button" class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#confirmationModal">Borrar</button>`
        }
      },
    ],
  });

  $('#table_id tbody').on('click', 'button.ver', function () {
    
    var form = document.forms.namedItem('pamiReumatoideaInicioForm');
    
    var droga = document.getElementsByName('inputDrug[]');
    var dosis = document.getElementsByName('inputDosis[]');
    var tiempo = document.getElementsByName('inputTime[]');
    var resultados = document.getElementsByName('inputResults[]');
    var excep_droga = document.getElementsByName('inputFarmaco[]');
    var excep_present = document.getElementsByName('inputPresentation[]');
    var excep_dosis = document.getElementsByName('inputDosisFarmaco[]');
    var codos = document.getElementsByName('elbow[]');
    var hombros = document.getElementsByName('shoulder[]');
    var ifp1 = document.getElementsByName('ifp1[]');
    var ifp2 = document.getElementsByName('ifp2[]');
    var ifp3 = document.getElementsByName('ifp3[]');
    var ifp4 = document.getElementsByName('ifp4[]');
    var ifp5 = document.getElementsByName('ifp5[]');
    var mcf1 = document.getElementsByName('mcf1[]');
    var mcf2 = document.getElementsByName('mcf2[]');
    var mcf3 = document.getElementsByName('mcf3[]');
    var mcf4 = document.getElementsByName('mcf4[]');
    var mcf5 = document.getElementsByName('mcf5[]');
    var muñecas = document.getElementsByName('wrists[]');
    var knee = document.getElementsByName('knee[]');

    resetRowDrugs();
    resetRowFarmaco();
    checkCheckboxs(false);
    
    var data = table.row($(this).parents('tr')).data();
    //console.log(data);
    var formData = new FormData();
    
    formData.append('form_id', data['form_id']);
    
    const options = {
        method: 'POST',
        body: formData 
    };

    fetch('http://localhost:8000/pages/lists/get-form-data-reumatoidea-inicio.php', options)
      .then(response => response.json())
      .then(data => {
        data = data[0];
        // console.log(data);
        
        data.subtotales = JSON.parse(data.subtotales);
        one = parseInt(data.subtotales[0]);
        two = parseInt(data.subtotales[1]);
        three = parseInt(data.subtotales[2]);
        four = parseInt(data.subtotales[3]);

        if (data.droga) addRowDrugs(JSON.parse(data.droga).length);
        if (data.excep_droga)addRowFarmaco(JSON.parse(data.excep_droga).length);

        form.id.value = data.id_paciente;
        form.inputName.value = data.nombre;
        form.inputBirthDate.value = data.fecha_nac;
        form.inputBeneficiary.value = data.beneficiario;
        form.inputStartDate.value = data.fecha_ini_enf;
        form.inputWeight.value = data.peso;
        form.inputHeight.value = data.talla;
        form.inputSummaryHC.value = data.resumen_hc;

        if( data.droga ) {
          data.droga = JSON.parse(data.droga);
          for (let index = 0; index < data.droga.length; index++) {
            const element = data.droga[index];
            droga[index].value = element;
          }
        }
        if( data.dosis ) {
          data.dosis = JSON.parse(data.dosis);
          for (let index = 0; index < data.dosis.length; index++) {
            const element = data.dosis[index];
            dosis[index].value = element;
          }
        }
        if( data.tiempo ) {
          data.tiempo = JSON.parse(data.tiempo);
          for (let index = 0; index < data.tiempo.length; index++) {
            const element = data.tiempo[index];
            tiempo[index].value = element;
          }
        }
        if( data.resultado ) {
          data.resultado = JSON.parse(data.resultado);
          for (let index = 0; index < data.resultado.length; index++) {
            const element = data.resultado[index];
            resultados[index].value = element;
          }
        }
        form.inputRFactor.value = data.factor_r;
        form.inputVSG.value = data.vsg;
        form.inputPCR.value = data.pcr;
        form.inputCPP.value = data.anti_ccp;
        if( data.excep_droga ) {
          data.excep_droga = JSON.parse(data.excep_droga);
          for (let index = 0; index < data.excep_droga.length; index++) {
            const element = data.excep_droga[index];
            excep_droga[index].value = element;
          }
        }
        if( data.excep_present ) {
          data.excep_present = JSON.parse(data.excep_present);
          for (let index = 0; index < data.excep_present.length; index++) {
            const element = data.excep_present[index];
            excep_present[index].value = element;
          }
        }
        if( data.excep_dosis ) {
          data.excep_dosis = JSON.parse(data.excep_dosis);
          for (let index = 0; index < data.excep_dosis.length; index++) {
            const element = data.excep_dosis[index];
            excep_dosis[index].value = element;
          }
        }
        form.monoDrug[data.monodroga].checked = true;
        form.inputRelatedTo.value = data.asociada_con;
        if ( data.hombros != 'null' ) {
          data.hombros = JSON.parse(data.hombros);
          for (let index = 0; index < data.hombros.length; index++) {
            const element = data.hombros[index];
            if ( element )
              hombros[data.hombros[index]].checked = true;
          }
        }
        if ( data.codos != 'null' ) {
          data.codos = JSON.parse(data.codos);
          for (let index = 0; index < data.codos.length; index++) {
            const element = data.codos[index];
            if ( element )
              codos[data.codos[index]].checked = true;
          }
        }
        if ( data.muñecas != 'null' ) {
          data.muñecas = JSON.parse(data.muñecas);
          for (let index = 0; index < data.muñecas.length; index++) {
            const element = data.muñecas[index];
            if ( element )
              muñecas[data.muñecas[index]].checked = true;
          }
        }
        if ( data.ifp_1 != 'null' ) {
          data.ifp_1 = JSON.parse(data.ifp_1);
          for (let index = 0; index < data.ifp_1.length; index++) {
            const element = data.ifp_1[index];
            if ( element )
              ifp1[data.ifp_1[index]].checked = true;
          }
        }
        if ( data.ifp_2 != 'null' ) {
          data.ifp_2 = JSON.parse(data.ifp_2);
          for (let index = 0; index < data.ifp_2.length; index++) {
            const element = data.ifp_2[index];
            if ( element )
              ifp2[data.ifp_2[index]].checked = true;
          }
        }
        if ( data.ifp_3 != 'null' ) {
          data.ifp_3 = JSON.parse(data.ifp_3);
          for (let index = 0; index < data.ifp_3.length; index++) {
            const element = data.ifp_3[index];
            if ( element )
              ifp3[data.ifp_3[index]].checked = true;
          }
        }
        if ( data.ifp_4 != 'null' ) {
          data.ifp_4 = JSON.parse(data.ifp_4);
          for (let index = 0; index < data.ifp_4.length; index++) {
            const element = data.ifp_4[index];
            if ( element )
              ifp4[data.ifp_4[index]].checked = true;
          }
        }
        if ( data.ifp_5 != 'null' ) {
          data.ifp_5 = JSON.parse(data.ifp_5);
          for (let index = 0; index < data.ifp_5.length; index++) {
            const element = data.ifp_5[index];
            if ( element )
              ifp5[data.ifp_5[index]].checked = true;
          }
        }
        if ( data.mcf_1 != 'null' ) {
          data.mcf_1 = JSON.parse(data.mcf_1);
          for (let index = 0; index < data.mcf_1.length; index++) {
            const element = data.mcf_1[index];
            if ( element )
              mcf1[data.mcf_1[index]].checked = true;
          }
        }
        if ( data.mcf_2 != 'null' ) {
          data.mcf_2 = JSON.parse(data.mcf_2);
          for (let index = 0; index < data.mcf_2.length; index++) {
            const element = data.mcf_2[index];
            if ( element )
              mcf2[data.mcf_2[index]].checked = true;
          }
        }
        if ( data.mcf_3 != 'null' ) {
          data.mcf_3 = JSON.parse(data.mcf_3);
          for (let index = 0; index < data.mcf_3.length; index++) {
            const element = data.mcf_3[index];
            if ( element )
              mcf3[data.mcf_3[index]].checked = true;
          }
        }
        if ( data.mcf_4 != 'null' ) {
          data.mcf_4 = JSON.parse(data.mcf_4);
          for (let index = 0; index < data.mcf_4.length; index++) {
            const element = data.mcf_4[index];
            if ( element )
              mcf4[data.mcf_4[index]].checked = true;
          }
        }
        if ( data.mcf_5 != 'null' ) {
          data.mcf_5 = JSON.parse(data.mcf_5);
          for (let index = 0; index < data.mcf_5.length; index++) {
            const element = data.mcf_5[index];
            if ( element )
              mcf5[data.mcf_5[index]].checked = true;
          }
        }
        if ( data.rodillas != 'null' ) {
          data.rodillas = JSON.parse(data.rodillas);
          for (let index = 0; index < data.rodillas.length; index++) {
            const element = data.rodillas[index];
            if ( element )
              knee[data.rodillas[index]].checked = true;
          }
        }
        form.iDolorosas.value = parseInt(one);
        document.getElementById('iDolorosasLabel').innerText = one;
        form.iInflamadas.value = parseInt(two);
        document.getElementById('iInflamadasLabel').innerText = two;
        form.dDolorosas.value = parseInt(three);
        document.getElementById('dDolorosasLabel').innerText = three;
        form.dInflamadas.value = parseInt(four);
        document.getElementById('dInflamadasLabel').innerText = four;
        form.dolorosasTotal.value = one + three;
        form.inflamadasTotal.value = two + four;
        form.das28.value = data.das28;
        form.haq.value = data.haq;
        form.vasRadio.value = data.vas;
        form.inputPlace.value = data.lugar;
        form.inputDate.value = data.fecha;
        form.inputPhone.value = data.telefono;
        form.inputEmail.value = data.email;
        $('#myModal').modal('show');
      });

  });

  $('#table_id tbody').on('click', 'button.borrar', function (){
    var data = table.row($(this).parents('tr')).data();
    let inputFormId = document.getElementById('form_id');
    inputFormId.value = data['form_id'];
  });
  
});

const btnDeleteConfirmation = document.getElementById('btnDeleteConfirmation');
btnDeleteConfirmation.addEventListener('click', (event)=>{
  var formData = new FormData();
    
  let inputFormId = document.getElementById('form_id');
  formData.append('form_id', inputFormId.value);
  
  const options = {
      method: 'POST',
      body: formData 
  };

  fetch('http://localhost:8000/pages/pami/delete-reumatoidea-inicio.php', options)
    .then(response => response.text())
    .then(data => {
      var table = $('#table_id').DataTable();
      table.clear().draw();
    });
});

const indexURL = "http://localhost:8000/pages/lists/list-reumatoidea-inicio.php";
var saveURL = 'http://localhost:8000/pages/pami/load-reumatoidea-inicio.php';
var generatePDFURL = 'http://localhost:8000/pages/pdf-generation/generate-reumatoidea-inicio.php';
var form = document.forms.namedItem('pamiReumatoideaInicioForm');

const btnMakePDF = document.getElementById('makePDF');
btnMakePDF.addEventListener('click', (event) => {
  event.preventDefault();
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);

  XHR.addEventListener('loadstart', (event) => {
    toggleFormElements(true);
  });

  // Define what happens on successful data submission
  XHR.addEventListener('load', (event) => {
    const data = event.target.response;

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+time;
    let link = document.createElement('a');

    link.href = window.URL.createObjectURL(data);
    link.download = form.inputName.value + dateTime + '.pdf';

    link.click();
  });
  
  XHR.addEventListener('loadend', (event) => {
    toggleFormElements(false);
  });

  XHR.addEventListener('progress', (event) =>{
    // console.log(event);
  })

  // Define what happens in case of error
  XHR.addEventListener('error', (event) => {
    alert('Oops! Something went wrong.');
  });

  // Set up our request
  XHR.open('POST', generatePDFURL);
  XHR.responseType = 'blob';

  // Send our FormData object; HTTP headers are set automatically
  XHR.send(FD);
  event.preventDefault();
});

const btnSave = document.getElementById('saveChanges');
btnSave.addEventListener('click', (event) => {
  event.preventDefault();
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);
  FD.append('subtotales[]', one);
  FD.append('subtotales[]', two);
  FD.append('subtotales[]', three);
  FD.append('subtotales[]', four);

  XHR.addEventListener('load', (event) => {
    const data = event.target.responseText;
    // console.log(data);
    const response = event.target.responseText;
    if (response.includes('True')) {
      alert('Datos guardados exitosamente');
      var table = $('#table_id').DataTable();
      $('#myModal').modal('hide');
      table.clear().draw();
    } else {
      alert('Datos no guardados');
    }
  });

  XHR.addEventListener('error', (event) => {
    alert('Oops! Something went wrong.');
  });

  XHR.open('POST', saveURL);
  XHR.send(FD);
  event.preventDefault();
});


function toggleFormElements(bDisabled) { 
  var inputs = document.getElementsByTagName("input"); 
  for (var i = 0; i < inputs.length; i++) { 
      inputs[i].disabled = bDisabled;
  } 
  var selects = document.getElementsByTagName("select");
  for (var i = 0; i < selects.length; i++) {
      selects[i].disabled = bDisabled;
  }
  var textareas = document.getElementsByTagName("textarea"); 
  for (var i = 0; i < textareas.length; i++) { 
      textareas[i].disabled = bDisabled;
  }
  var buttons = document.getElementsByTagName("button");
  for (var i = 0; i < buttons.length; i++) {
      buttons[i].disabled = bDisabled;
  }
}

function checkCheckboxs(bDisabled) { 
  var checkbocks = document.getElementsByClassName('form-check-input'); 
  for (var i = 0; i < checkbocks.length; i++) { 
      checkbocks[i].checked = bDisabled;
  } 
}

const btnAdd = document.getElementById('btnAddDrug');
const btnDrop = document.getElementById('btnDropDrug');

let cantDrugs = 1;
const maxDrugs = 6;

if (btnAdd) {
  btnAdd.addEventListener('click', () => {
  
    const tableDrugs = document.getElementById('drugs');

    let fieldset = document.createElement('fieldset');
    fieldset.setAttribute('class','row mb-2');

    for (let i = 1 ; i <= 4 ; i++) {

      let div = document.createElement('div');
      let label = document.createElement('label');
      let input = document.createElement('input');
      div.setAttribute('class', 'col-sm-2');
      label.setAttribute('class', 'col-sm-1 col-form-label');
      input.setAttribute('class', 'form-control');
      input.setAttribute('type', 'text');
      switch (i){
        case 1:{
          label.setAttribute('for','inputDrug'+cantDrugs);
          label.innerHTML = 'Droga';
          input.setAttribute('name', 'inputDrug[]');
          input.setAttribute('id', 'inputDrug'+cantDrugs);
          div.appendChild(input);
          fieldset.appendChild(label);
          fieldset.appendChild(div);
          break
        }
        case 2:{
          label.setAttribute('for','inputDosis'+cantDrugs);
          label.innerHTML = 'Dosis';
          input.setAttribute('name', 'inputDosis[]');
          input.setAttribute('id', 'inputDosis'+cantDrugs);
          div.appendChild(input);
          fieldset.appendChild(label);
          fieldset.appendChild(div);
          break
        }
        case 3:{
          label.setAttribute('for','inputTime'+cantDrugs);
          label.innerHTML = 'Tiempo';
          input.setAttribute('name', 'inputTime[]');
          input.setAttribute('id', 'inputTime'+cantDrugs);
          div.appendChild(input);
          fieldset.appendChild(label);
          fieldset.appendChild(div);
          break
        }
        case 4:{
          label.setAttribute('for','inputResults'+cantDrugs);
          label.innerHTML = 'Resultados';
          input.setAttribute('name', 'inputResults[]');
          input.setAttribute('id', 'inputResults'+cantDrugs);
          div.appendChild(input);
          fieldset.appendChild(label);
          fieldset.appendChild(div);
          break
        }
      }
    }
    if (cantDrugs < maxDrugs){
      tableDrugs.appendChild(fieldset);
      cantDrugs++;
    }
  });
}

if (btnDrop) {
  btnDrop.addEventListener('click', () => {
    const tableDrugs = document.getElementById('drugs');
    if (cantDrugs > 1) {
      tableDrugs.removeChild(tableDrugs.lastElementChild);
      cantDrugs--;
    }
  })
}

function resetRowDrugs() {
  const tableDrugs = document.getElementById('drugs');
  while ( tableDrugs.childElementCount > 1 ) {
    tableDrugs.removeChild(tableDrugs.lastElementChild);
  }
}

function addRowDrugs(value) {
  const tableDrugs = document.getElementById('drugs');
  while ( tableDrugs.childElementCount < value ) {
    btnAdd.click();
  }
}

const btnAddFarmaco = document.getElementById('btnAddFarmaco');
const btnDropFarmaco = document.getElementById('btnDropFarmaco');

let cantFarmacos = 1;
const maxFarmacos = 3;

btnAddFarmaco.addEventListener('click', () => {
  const tableFarmacos = document.getElementById('farmacos');

  let fieldset = document.createElement('fieldset');
  fieldset.setAttribute('class','row mb-2');

  for (let i = 1 ; i <= 4 ; i++) {

    let div = document.createElement('div');
    let label = document.createElement('label');
    let input = document.createElement('input');
    div.setAttribute('class', 'col-sm-3');
    label.setAttribute('class', 'col-sm-1 col-form-label');
    input.setAttribute('class', 'form-control');
    input.setAttribute('type', 'text');
    switch (i){
      case 1:{
        label.setAttribute('for','inputFarmaco'+cantFarmacos);
        label.innerHTML = 'Droga';
        input.setAttribute('name', 'inputFarmaco[]');
        input.setAttribute('id', 'inputFarmaco'+cantFarmacos);
        div.appendChild(input);
        fieldset.appendChild(label);
        fieldset.appendChild(div);
        break
      }
      case 2:{
        label.setAttribute('for','inputPresentation'+cantFarmacos);
        label.innerHTML = 'Presenta ción';
        input.setAttribute('name', 'inputPresentation[]');
        input.setAttribute('id', 'inputPresentation'+cantFarmacos);
        div.appendChild(input);
        fieldset.appendChild(label);
        fieldset.appendChild(div);
        break
      }
      case 3:{
        label.setAttribute('for','inputDosisFarmaco'+cantFarmacos);
        label.innerHTML = 'Dosis';
        input.setAttribute('name', 'inputDosisFarmaco[]');
        input.setAttribute('id', 'inputDosisFarmaco'+cantFarmacos);
        div.appendChild(input);
        fieldset.appendChild(label);
        fieldset.appendChild(div);
        break
      }
    }
  }
  if (cantFarmacos < maxFarmacos) {
    tableFarmacos.appendChild(fieldset);
    cantFarmacos++;
  }
});

btnDropFarmaco.addEventListener('click', () => {
const tableFarmacos = document.getElementById('farmacos');
if (cantFarmacos > 1) {
  tableFarmacos.removeChild(tableFarmacos.lastElementChild);
  cantFarmacos--;
}
})

function resetRowFarmaco() {
  const tableFarmaco = document.getElementById('farmacos');
  while ( tableFarmaco.childElementCount > 1 ) {
    tableFarmaco.removeChild(tableFarmaco.lastElementChild);
  }
}

function addRowFarmaco(value) {
  const tableFarmaco = document.getElementById('farmacos');
  while ( tableFarmaco.childElementCount < value ) {
    btnAddFarmaco.click();
  }
}

// checkbocks counting
var iDolorosasLabel = document.getElementById('iDolorosasLabel');
var iInflamadasLabel = document.getElementById('iInflamadasLabel');
var dDolorosasLabel = document.getElementById('dDolorosasLabel');
var dInflamadasLabel = document.getElementById('dInflamadasLabel');

var iDolorosasInput = document.getElementById('iDolorosas');
var iInflamadasInput = document.getElementById('iInflamadas');
var dDolorosasInput = document.getElementById('dDolorosas');
var dInflamadasInput = document.getElementById('dInflamadas');

var dolorosasTotal = document.getElementById('dolorosasTotal');
var inflamadasTotal = document.getElementById('inflamadasTotal');

var das28 = document.getElementById('das28');

var one = 0;
var two = 0;
var three = 0;
var four = 0;

const shoulderChk = document.getElementsByName('shoulder[]');

shoulderChk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const elbowChk = document.getElementsByName('elbow[]');

elbowChk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const wristsChk = document.getElementsByName('wrists[]');

wristsChk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const mcf1Chk = document.getElementsByName('mcf1[]');

mcf1Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const mcf2Chk = document.getElementsByName('mcf2[]');

mcf2Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const mcf3Chk = document.getElementsByName('mcf3[]');

mcf3Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const mcf4Chk = document.getElementsByName('mcf4[]');

mcf4Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const mcf5Chk = document.getElementsByName('mcf5[]');

mcf5Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const ifp1Chk = document.getElementsByName('ifp1[]');

ifp1Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const ifp2Chk = document.getElementsByName('ifp2[]');

ifp2Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const ifp3Chk = document.getElementsByName('ifp3[]');

ifp3Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const ifp4Chk = document.getElementsByName('ifp4[]');

ifp4Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const ifp5Chk = document.getElementsByName('ifp5[]');

ifp5Chk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

const kneeChk = document.getElementsByName('knee[]');

kneeChk.forEach(checkbox => {
  checkbox.addEventListener('change', (e) => {
    let value = parseInt(e.target.value) + 1;
    let checked = e.target.checked;
    changeLabel(value, checked);
  })
});

function changeLabel(value, checked){
  switch (value) {
    case 1:{
      (checked) ? one++ : one--;
      iDolorosasLabel.innerHTML = one;
      iDolorosasInput.value = one;
      dolorosasTotal.value = one + three;
      let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
      form.das28.value = value.toFixed(4);
      break;
    }
    case 2:{
      (checked) ? two++ : two--;
      iInflamadasLabel.innerHTML = two;
      iInflamadasInput.value = two;
      inflamadasTotal.value = two + four;
      let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
      form.das28.value = value.toFixed(4);
      break;
    }
    case 3:{
      (checked) ? three++ : three--;
      dDolorosasLabel.innerHTML = three;
      dDolorosasInput.value = three;
      dolorosasTotal.value = one + three;
      let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
      form.das28.value = value.toFixed(4);
      break;
    }
    case 4:{
      (checked) ? four++ : four--;
      dInflamadasLabel.innerHTML = four;
      dInflamadasInput.value = four;
      inflamadasTotal.value = two + four;
      let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
      form.das28.value = value.toFixed(4);
      break;
    }
  }
}

form.inputVSG.addEventListener('change', (e) => {
  form.inputVSG.value = e.target.value.replace(/,/, '.');
  let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
  form.das28.value = value.toFixed(4);
})

const vasRadios = document.getElementsByName('vasRadio');

vasRadios.forEach(radio => {
  radio.addEventListener('change', (e) => {
    let value = 0.56 * form.dolorosasTotal.value + 0.28 * form.inflamadasTotal.value + 0.7 * Math.log(form.inputVSG.value) + 0.014 * form.vasRadio.value;
    form.das28.value = value.toFixed(4);
  })
});

form.inputRFactor.addEventListener('change', (e) => {
  form.inputRFactor.value = e.target.value.replace(/,/, '.');
});
form.inputPCR.addEventListener('change', (e) => {
  form.inputPCR.value = e.target.value.replace(/,/, '.');
});
form.inputCPP.addEventListener('change', (e) => {
  form.inputCPP.value = e.target.value.replace(/,/, '.');
});
form.haq.addEventListener('change', (e) => {
  form.haq.value = e.target.value.replace(/,/, '.');
});