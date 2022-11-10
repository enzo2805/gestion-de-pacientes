const indexURL = "http://localhost:8000/pages/patient/patient-list.php";
const loadURL = "http://localhost:8000/pages/patient/load-patient.php";
const btn = document.getElementById('saveBtn');
const form = document.forms.namedItem('patientForm');

function sendData(event) {
  
  event.preventDefault();
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);

  XHR.addEventListener('load', (event) => {
    const data = event.target.responseText;
    const response = event.target.responseText;
    if (response.includes('True')) {
      alert('Datos guardados exitosamente');
      window.location.href = indexURL;
    } else {
      alert('Datos no guardados');
    }
  });

  XHR.addEventListener('error', (event) => {
    alert('Oops! Something went wrong.');
  });

  XHR.open('POST', loadURL);
  XHR.send(FD);
  event.preventDefault();
}

btn.addEventListener('click', (event) => {
  sendData(event);
});