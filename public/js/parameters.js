function choice(i) {
  var mdp = document.getElementById('mdp');
  var num = document.getElementById('num');
  var adresse = document.getElementById('adresse');
  switch (i) {
    case 1:
      mdp.style.display = 'block';
      num.style.display = 'none';
      adresse.style.display = 'none';
      break;
    case 2:
      mdp.style.display = 'none';
      num.style.display = 'block';
      adresse.style.display = 'none';
      break;
    case 3:
      mdp.style.display = 'none';
      num.style.display = 'none';
      adresse.style.display = 'block';
      break;
    default:
      mdp.style.display = 'none';
      num.style.display = 'none';
      adresse.style.display = 'none';
      break;
  }
}