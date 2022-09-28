const indexURL = "http://localhost:8000/";
const loadURL = "http://localhost:8000/pages/patient/load-patient.php"
const btn = document.getElementById('saveBtn');
const form = document.forms.namedItem('patientForm');

function sendData(event) {
  
  event.preventDefault();
  const XHR = new XMLHttpRequest();
  const FD = new FormData(form);

  // Define what happens on successful data submission
  XHR.addEventListener('load', (event) => {
    const data = event.target.responseText;
    //console.log(data);
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