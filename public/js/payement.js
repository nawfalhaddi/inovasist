function choix(i) {
  var Paypal = document.getElementById('Paypal');
  var card = document.getElementById('card');
  var Western = document.getElementById('Western');
  switch (i) {
    case 0:
      Paypal.style.display = 'none';
      card.style.display = 'block';
      Western.style.display = 'none';
      break;
    case 1:
      Paypal.style.display = 'block';
      card.style.display = 'none';
      Western.style.display = 'none';
      break;
    case 2:
      Paypal.style.display = 'none';
      card.style.display = 'none';
      Western.style.display = 'block';
      break;
  }
}