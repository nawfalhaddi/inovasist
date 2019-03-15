<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>INOVASIST</title>
  <link rel="stylesheet" href="../public/css/font-awesome.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/header.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="icon" type="image/png" href="../public/img/brightness.png" />


</head>

<body id="body-services">
  <!-- Header -->
  <header>
    <?php
  if (isset($_SESSION['ID_CLI'])) {
    include("navbarClient.php");
  } else {
      if (isset($_SESSION['ID_EMPLOYEE']) && $_SESSION['IS_ADMIN'] == 1) {
        include("navbarAdmin.php");
      } else {
        if (isset($_SESSION['ID_EMPLOYEE']) && $_SESSION['IS_ADMIN'] == 0) {
          include("navbarAssistant.php");
        } else {
          include("navbar.php");
        }


      }
  }
  ?>

<div class="header offers">
  <div class="container">
    <div class="overlay d-flex">
      <h1 class="align-self-end p-5 mx-auto text-center">Nos Bons Plans</h1>
    </div>
  </div>
</div>
</header>
<!-- End Header -->

  <section id="offers">

    <div class="title-section4 text-center ">
      <span class="icon-price"></span>
      <h1>Bons Plans</h1>
      <p>
        INOVASIST offre des bons plans par la création des différents types de services selon les besoins de ses clients.<br>
        * : L'annulation d'une réservation est possible dans un délai ne dépasse pas 24 heures aprés sa création.

      </p>
    </div>

      <div class="prices text-center p-5">
          <div class="container-fluid">
            <div class="row py-3">
    <div class="col-md-3 col-xs-12 text-center">
      <h1> 35dhs/h </h1>
      <h4> Sans Abonnement </h4>
    </div>
    <div class="col-md-6 col-xs-6 ">

      <ul class="text-left">
      <li>Réservation d'un service de ménage Sans Abonnement de haute qualité et un prix attractif.</li>
      <li>Possibilité de choisir une date précise avec un jour et une heure qui vous convient pendant toute la semaine.</li>
      <li>Possibilité de choisir le nombre de personnel nécessaire.</li>
      <li>Annulation* de réservation ou remboursement d'argents gratuit.</li>
    </ul>

    </div>
    <div class="col-md-3 col-xs-6 text-center">
      <a href="reservationSA.php" class="btn btn-md text-white text-uppercase ">Continuer</a>
    </div>
  </div>
  <hr>
  <div class="row py-3">
    <div class="col-md-3 col-xs-12 text-center">
      <h1> 30dhs/h </h1>
      <h4> 3 mois </h4>
    </div>
    <div class="col-md-6 col-xs-6 ">

      <ul class="text-left">
      <li>Réservation d'un service de ménage avec un abonnement de 3 mois avec une qualité haute et un prix attractif et raisonable.</li>
      <li>Possibilité de choisir une date de début précise avec le jour et l'heure qui vous convient pendant toute la semaine.</li>
      <li>Possibilité de choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</li>
      <li>Possibilité de choisir le nombre de personnel nécessaire.</li>
      <li>Annulation* de réservation ou remboursement d'argents gratuit.</li>
    </ul>

    </div>
    <div class="col-md-3 col-xs-6 text-center">
      <a href="reservationAA.php" class="btn btn-md text-white text-uppercase ">Continuer</a>
    </div>
  </div>
  <hr>
  <div class="row py-3">
    <div class="col-md-3 col-xs-12 text-center">
      <h1> 25dhs/h </h1>
      <h4> 6 mois </h4>
    </div>
    <div class="col-md-6 col-xs-6">

      <ul class="text-left">
      <li>Réservation d'un service de ménage avec un abonnement de 6 mois avec une qualité haute et un prix attractif et raisonable.</li>
      <li>Possibilité de choisir une date de début précise avec le jour et l'heure qui vous convient pendant toute la semaine.</li>
      <li>Possibilité de choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</li>
      <li>Possibilité de choisir le nombre de personnel nécessaire.</li>
      <li>Annulation* de réservation ou remboursement d'argents gratuit.</li>
    </ul>

    </div>
    <div class="col-md-3 col-xs-6  text-center">
      <a href="reservationAA.php" class="btn btn-md text-white text-uppercase ">Continuer</a>
    </div>
  </div>
  <hr>
  <div class="row py-3">
    <div class="col-md-3 col-xs-12  text-center">
      <h1> 20dhs/h </h1>
      <h4> 12 mois </h4>
    </div>
    <div class="col-md-6 col-xs-6 ">

      <ul class="text-left">
      <li>Réservation d'un service de ménage avec un abonnement de 12 mois.</li>
      <li>Meilleure offre parmis les autres types de services en raison qu'il a les mêmes normes de qualité mais avec une tarif trés raisonable et économique.</li>
      <li>Possibilité de choisir une date de début précise avec le jour et l'heure qui vous convient pendant toute la semaine.</li>
      <li>Possibilité de choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</li>
      <li>Possibilité de choisir le nombre de personnel nécessaire.</li>
      <li>Annulation* de réservation ou remboursement d'argents gratuit.</li>
    </ul>

    </div>
    <div class="col-md-3 col-xs-6 text-center">
      <a href="reservationAA.php" class="btn btn-md text-white text-uppercase ">Continuer</a>
    </div>
  </div>
</div>
</div>


  </section>


  <!------footer---------------->
<?php include 'footer.php';?>

<!------------------------>



  <!-- Scripts -->

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/main.js"></script>
</body>

</html>
