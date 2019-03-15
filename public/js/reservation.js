var PersTotal = 1;
var price = 35;
var hours = 0;
var total = price;
var days = 0;
var typeContrat = 3;
var jours = 0;
var pathname = window.location.pathname;

if (pathname == '/reservationAA.html') {
  price = 30;
  Contrat = 3;
}



/*champ ajouté au cas de choisir autre adresse */
function choice(i) {
  var divAdresse = document.getElementById('divAdresse');
  switch (i) {
    case 2:
      divAdresse.style.display = 'block';
      break;
    default:
      divAdresse.style.display = 'none';
      break;
  }
}


/*reservation sans abonnement*/
function changeHour(e) {
  document.getElementById("hours").innerHTML = e.target.value;
  hours = e.target.value;
  calculateTotal();
}

function changeTotalPers(e) {
  PersTotal = e.target.value;
  calculateTotal();
}

function calculateTotal() {
  total = PersTotal * hours * price;
  document.getElementById("totalPrice").innerHTML = total;
}

/*reservation avec abonnement*/

function checkboxes() {
  var inputElems = document.getElementsByTagName("input"),
    days = 0;
  for (var i = 0; i < inputElems.length; i++) {
    if (inputElems[i].type === "checkbox" && inputElems[i].checked === true) {
      days++;
    }
  }
  jours = days;
  calculateTotal2();
}

function changeContrat(e) {
  typeContrat = e.target.value;
  if (typeContrat == 2) {
    dateSelector();
    price = 30;
    Contrat = 3;
  } else if (typeContrat == 3) {
    dateSelector2();
    price = 25;
    Contrat = 6;
  } else {
    dateSelector3();
    price = 20;
    Contrat = 12;
  }
  calculateTotal2();
}


function changeHour2(e) {
  document.getElementById("hours").innerHTML = e.target.value;
  hours = e.target.value;
  calculateTotal2();
}

function changeTotalPers2(e) {
  PersTotal = e.target.value;
  calculateTotal2();
}



function calculateTotal2() {
  total = PersTotal * hours * price * jours * 4 * Contrat;
  document.getElementById("totalPrice").innerHTML = total;
}

/* disable date before today*/
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd
}

if (mm < 10) {
  mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("dateDebut").min = today;





/*------ajouter la date de fin automatiquement -----------*/
function dateSelector() {
  var date = new Date($('#dateDebut').val());
  date.setMonth(date.getMonth() + 3);
  console.log($('#dateFin'));
  $('#dateFin').val(formatDate(date));
}

function dateSelector2() {
  var date = new Date($('#dateDebut').val());
  date.setMonth(date.getMonth() + 6);
  console.log($('#dateFin'));
  $('#dateFin').val(formatDate(date));
}

function dateSelector3() {
  var date = new Date($('#dateDebut').val());
  date.setMonth(date.getMonth() + 12);
  console.log($('#dateFin'));
  $('#dateFin').val(formatDate(date));
}


function chooseDateSelector() {
  if (typeContrat == 2) {
    dateSelector();
  } else if (typeContrat == 3) {
    dateSelector2();
  } else {
    dateSelector3();
  }
}

function formatDate(date) {
  var d = new Date(date),
    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');
}