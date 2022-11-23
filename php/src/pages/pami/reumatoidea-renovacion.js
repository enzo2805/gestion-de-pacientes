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

// Enviar el form
const indexURL = "http://localhost:8000/";
const loadURL = "http://localhost:8000/pages/pami/load-reumatoidea-renovacion.php"
const btn = document.getElementById('saveBtn');
const form = document.forms.namedItem('pamiReumatoideaInicioForm');

function sendData(event) {
  
  event.preventDefault();
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);
  FD.append('subtotales[]', one);
  FD.append('subtotales[]', two);
  FD.append('subtotales[]', three);
  FD.append('subtotales[]', four);

  // Define what happens on successful data submission
  XHR.addEventListener('load', (event) => {
    const data = event.target.responseText;
    console.log(data);
    const response = event.target.responseText;
    if (response.includes('True')) {
      alert('Datos guardados exitosamente');
      window.location.href = indexURL;
    } else {
      alert('Datos no guardados');
    }
  });

  // Define what happens in case of error
  XHR.addEventListener('error', (event) => {
    alert('Oops! Something went wrong.');
  });

  // Set up our request
  XHR.open('POST', loadURL);

  // Send our FormData object; HTTP headers are set automatically
  XHR.send(FD);
  event.preventDefault();
}

btn.addEventListener('click', (event) => {
  sendData(event);
});

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