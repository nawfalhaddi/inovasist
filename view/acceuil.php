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
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
  <link rel="icon" type="image/png" href="../public/img/brightness.png" />
</head>
<body>
  <div  id="index">

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
    <!-- SHOWCASE SLIDER -->
    <section id="showcase">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item carousel-image-1 active">
            <div class="container">
              <div class="carousel-caption d-none d-sm-block text-block mb-5">
                <h1 class="display-3">Un bon ménage commence par ici !</h1>
                <p class="lead">Réservez, gérez et évaluez votre femme de ménage avec Inovasist.</p>
                <a href="#offers" class="btn btn-danger btn-lg">Réservez Maintenant !</a>
              </div>
            </div>
          </div>

          <div class="carousel-item carousel-image-2">
            <div class="container">
              <div class="carousel-caption d-none d-sm-block mb-5">
                <h1 class="display-3">Un bon ménage commence par ici !</h1>
                <p class="lead">Réservez, gérez et évaluez votre femme de ménage avec Inovasist.</p>
                <a href="contact.php" class="btn btn-primary btn-lg">Contactez-Nous</a>
              </div>
            </div>
          </div>

          <div class="carousel-item carousel-image-3">
            <div class="container">
              <div class="carousel-caption d-none d-sm-block text-block mb-5">
                <h1 class="display-3">Un bon ménage commence par ici !</h1>
                <p class="lead">Réservez, gérez et évaluez votre femme de ménage avec Inovasist.</p>
                <a href="#login" class="btn btn-success btn-lg">Se Connecter</a>
              </div>
            </div>
          </div>
        </div>

        <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
          <span class="carousel-control-prev-icon"></span>
        </a>

        <a href="#myCarousel" data-slide="next" class="carousel-control-next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </section>
    
    <!--Section 1-->
    <section id="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-12 boxes left"> <!-- Left side boxe -->
            <div class="row first-row"> <!-- First row -->
              <div class="col-lg-6 col-md-6 col-sm-6 first about text-center p-4"> <!-- First col -->
                  <h2>A propos de nous</h2>
                  <p> Inovasist est meilleure et différente ! <br> C'est l'entreprise de nettoyage la plus moderne au Maroc.</p>
                  <a href="apropos.php#apropos" class="btn btn-primary btn-outline with-arrow">
                Plus d'infos
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 second"> <!-- Second col -->
                <div class="other text-white text-uppercase text-center d-flex justify-content-center">
                  <div class="align-self-center">
                  <p class="my-auto"><a href="#services" >
                    Nos Services</a></p></div>
                </div>
              </div>
            </div>
            <div class="row second-row"> <!-- Second row -->
              <div class="col-md-6 col-md-6 col-sm-6 third">
                <div class="other text-white text-uppercase text-center d-flex justify-content-center">
                  <div class="align-self-center">
                  <a href="services.php">
                    Bons Plans
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 fourth text-white p-3">
                <div class="card-body review">
                  <h2>Avis d'un client <i class="fa fa-quote-right" aria-hidden="true"></i></h2>
                  <p> Le ménage de mon appartement avant était pour moi un vrai Puzzle à chaque fois. Le service de Inovasist m'a aidé et m'a sauvé. </p>
                  <span class="text-right">— Nourelhouda</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 boxes right bg-light">
            <div class="title-section2 text-center my-3">
              <h2>Nos avantages</h2>
            </div>
            <div class="card-body">
              <div class="details d-flex flex-row">
                <i class="fa fa-shield align-self-start text-center py-2" aria-hidden="true"></i>
                <div class="desc ml-4">
                  <h3>Service de qualité</h3>
                  <p>Les prestations sont notées pour garantir le suivi et la qualité de service.</p>
                </div>
              </div>
              <div class="details d-flex flex-row">
                <i class="fa fa-users align-self-start text-center py-2" aria-hidden="true"></i>
                <div class="desc ml-4">
                  <h3>Une equipe bien formee</h3>
                  <p>Nos prestataires sont expérimentés et individuellement sélectionnés.</p>
                </div>
              </div>
              <div class="details d-flex flex-row ">
                <i class="fa fa-clock-o align-self-start text-center py-2" aria-hidden="true"></i>
                <div class="desc ml-4">
                  <h3>Votre temps est si precieux</h3>
                  <p>Une réservation très facile et rapide du service dont vous avez besoin.</p>
                </div>
              </div>
              <div class="details d-flex flex-row">
                <i class="fa fa-tachometer align-self-start text-center py-2" aria-hidden="true"></i>
                <div class="desc ml-4">
                  <h3>Flexibilité</h3>
                  <p>Des séances automatiques ou à la demande qui s’adaptent à vos besoins et disponibilités.</p>
                </div>
              </div>
              <div class="details d-flex flex-row">
                <i class="fa fa-refresh align-self-start text-center py-2" aria-hidden="true"></i>
                <div class="desc ml-4">
                  <h3>Annulation gratuite</h3>
                  <p>L’annulation est gratuite dans le délai de 24h, avant que la demande soit confirmée.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Section -->
    <!-- Section 2 -->
    <section id="services">
      <div class="container text-center">
        <div class="title-section2 py-3">

          <span class="icon-service-header"></span>
          <h2>Nos Services</h2>
          <p>
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
          </p>
        </div>
        <div class="row p-2 mb-5">
          <div class="col-lg-4 col-sm-12  d-flex py-5">
            <div class="card align-content-center">
              <div class="icon-service home">
                <i class="fa fa-home " aria-hidden="true"></i>
              </div>
              <div class="card-body py-5">
                <h3>Ménage à domicile</h3>
                <p class="card-text">Garder votre maison impeccable est plus facile et abordable que jamais avec Inovasist. </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12 d-flex py-5">

            <div class="card align-content-center">
              <div class="icon-service building">
                <i class="fa fa-building" aria-hidden="true"></i>
              </div>
              <div class="card-body py-5">
                <h3>Ménage pour les entreprises</h3>
                <p class="card-text">Garder votre bureau ou cabinet impeccable est plus facile et abordable que jamais avec Inovasist. </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12 d-flex py-5">
            <div class="card align-content-center">
              <div class="icon-service wrench">
                <i class="fa fa-wrench" aria-hidden="true"></i>
              </div>
              <div class="card-body py-5">
                <h3>Aide et Support</h3>
                <p class="card-text">Réservez un spécialiste pour le lavage de vitres: intérieur et extérieur, aspirateur dans les rails de fenêtres, nettoyage de cadrages et élimination des nids araignées, nettoyage du moustiquaire équipé d’outils professionnels pour travaux
                  en hauteur.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Section 2 -->

    <!-- Section 3 -->
    <section id="clients">
      <div class="row row1">
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square1 p-4 text-center text-white">
          <h3> Il nous font confiance... </h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          <a href="#" class="btn btn-primary btn-outline with-arrow">
          Nos clients
          <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square2">
            <img src="../public/img/technopark.jpg" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Technopark - Tanger</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square3">
            <img src="../public/img/ibn-batouta.jpg" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Ibn Batouta Mall - Tanger</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square4">
            <img src="../public/img/renault.jpg" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Renault</p>
            </div>
        </div>
      </div>
      <div class="row row2">
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square5">
          <img src="../public/img/fstt.jpg" alt="" width="100%" height="100%">
          <div class="overlay">
            <p class="text text-center">Faculté de Sciences et Techniques de Tanger</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square6">
            <img src="../public/img/socco-alto.jpg" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Socco Alto Mall - Tanger</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square7">
            <img src="../public/img/city-mall.png" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Tanger City Mall</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 boxes col-xs-6 square8">
            <img src="../public/img/lear.png" alt="" width="100%" height="100%">
            <div class="overlay">
              <p class="text text-center">Lear Corporation</p>
            </div>
        </div>
    </section>

    <!--End Section 3-->

    <!-- Section 4 -->
    <section id="offers">
      <div class="title-section4 mt-5 p-2 text-center">
        <span class="icon-price"></span>
        <h1>Bons Plans</h1>
        <p>
          INOVASIST offre des bons plans par la création des différents types de services selon les besoins de ses clients.
        </p>
      </div>
      <div class="container">
        <div class="row mb-5">
          <div class="card-deck">
            <div class="col-lg-3 col-md-6 py-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1> 35dhs/h </h1>
                  <h4> Sans Abonnement </h4>
                  <p class="card-text p-3">Avec cette offre, vous aurez la possibilité de réserver notre service dans une date précise qui vous convient, pendant toute la semaine.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 py-3">
              <div class="card">
                <div class="card-body text-center">
                  <h1> 30dhs/h </h1>
                  <h4> 3 mois </h4>
                  <p class="card-text p-3">En choisissant nos offres Avec Abonnement, vous pouvez choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 py-3">
              <div class="card">
                <div class="card-body text-center ">
                  <h1> 25dhs/h </h1>
                  <h4> 6 mois </h4>
                  <p class="card-text p-3">En choisissant nos offres Avec Abonnement, vous pouvez choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 py-3">
              <div class="card">
                <div class="card-body text-center alert-warning">
                  <h1> 20dhs/h </h1>
                  <h4> 12 mois </h4>
                  <p class="card-text p-3">En choisissant nos offres Avec Abonnement, vous pouvez choisir le nombre des jours dans la semaine et aussi la durée des séances selon vos besoins.</p>
                </div>
              </div>
            </div>

          </div>
          <a href="Services.php" class="btn btn-lg text-white text-uppercase">Reservez Maintenant</a>
        </div>

      </div>
    </section>
    <!-- End Section 4 -->

    <!-- Section 5 -->
    <section id="reviews">
      <div class="container-reviews bg-dark p-4">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card m-5">
              <div class="review-quote bg-light text-center text-dark">
                <i class="fa fa-quote-right" aria-hidden="true"></i>
              </div>
              <div class="card-body text-justify p-5">
                <p class="card-text py-4">
                  "Merci pour le service. Fatima est une excellente femme de ménage. Je suis très heureuse. Je vais toujours demander vos services"
                  <p class="text-right">— Chaimae</p>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">

            <div class="card m-5">
              <div class="review-quote bg-light text-center text-dark">
                <i class="fa fa-quote-right" aria-hidden="true"></i>
              </div>
              <div class="card-body text-justify p-4">

                <p class="card-text py-5">
                  "Un merveilleux service, mon appartement fait en quelques heures, avec un niveau de propreté et de confort inégalé. Un soin et l'attention au service client, je me suis imaginé que je ne suis pas Maroc. Je recommande fortement! "
                  <p class="text-right">— Nawfal</p>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- End Section 5 -->

    <!-- Section 6 -->
    <section id="achievement">
      <div class="title-section6">
        <span class="icon-achievement"></span>
        <h2>Nos Accomplissements</h2>
        <p>
          Nous avons de véritables valeurs: être authentique, écouter les clients et être simple.
        </p>
      </div>
      <div class="container">
        <div class="row">
          <div class="numbers p-3 mx-auto text-center col-12">
            <div class="container">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="clients p-2 flex-fill">
                    <span class="counter" data-count="150">0</span>
                    <p> Clients </p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="Equipe p-2 flex-fill">
                    <span class="counter" data-count="80">0</span>
                    <p> Equipe </p>
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="Abonnement p-2 flex-fill">
                    <span class="counter" data-count="67">0</span>
                    <p> Abonnements </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- End Section 6 -->


    <!-- footer---------------->
    <?php include 'footer.php';?>

    <!------------------------>
    <!-- Scripts -->

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/popper.min.js"></script>
    <script src="../public/js/bootstrap.min.js"></script>
    <script src="../public/js/main.js"></script>
    <script src="../public/js/dropdown.js"></script>
</div>
</body>

</html>
