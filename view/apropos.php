<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
  <link rel="stylesheet" href="../public/css/header.min.css">
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="icon" type="image/png" href="../public/img/brightness.png" />
  <title>INOVASIST</title>
</head>

<body id="bodyAporpos">

    <!-- header------------------------------------>
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


  <div class="header contact">
    <div class="container">
      <div class="overlay d-flex">
        <h1 class="align-self-end p-5 mx-auto text-center">A propos de nous</h1>
      </div>
    </div>
  </div>

</header>
  <!---------------------------------------->

  <section id="apropos" class="mb-5  text-center pb-5 ">

    <div class="container mb-5">
      <div class="row">
        <div class="col mb-5">
          <div class="info-header">
            <span><img src="../public/img/aproposLogo.png" alt="" class="img-fluid mb-3 mx-auto" height="auto" width="100px"></span>
            <h1 class="text-dark mb-5 mx-auto">
            Notre équipe
          </h1>
            <p class="lead pb-5 mx-auto"> Équipe d'inovasist vous offre une meilleure plateforme de ménage où vous pouvez réserver en quelques minutes un service de ménage professionnelle, sans engagement de durée.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-12 my-5">
          <div class="card">
            <div class="card-body ">
              <img src="../public/img/nough_carre.png" alt="" class="img-fluid rounded-circle w-50   mb-3">
              <h3>Nourelhouda</h1>
            <h5 class="text-muted">WEB DÉVELOPPEUSE</h5>
            <p>Développeuse et Etudiante en 3ième année licence à la faculté de science et techniques de Tanger , specialisé en génie informatique .</p>
            <div class="d-flex flex-row justify-content-center">
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-in"><a href="https://www.linkedin.com/in/nourelhouda-elhassyouti-99099a6b/" target="_blank"><i class=" fa fa-linkedin"></i></a></div>
            <div class="p-2 mx-2 my-2  social_media_icon d-flex align-items-center justify-content-center blue-fb"> <a href="https://www.facebook.com/noughel.9" target="_blank"><i class=" fa fa-facebook"></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-yt"> <a href="https://www.youtube.com/channel/UCeoQ8Wd5M9OsA94r0_trPzw?view_as=subscriber" target="_blank"><i class=" fa fa-youtube-play" ></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-twitter">  <a href="https://twitter.com/Nourelhoudahst" target="_blank"><i class="fa fa-twitter"></i></a></div>
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-instagram">  <a href="https://www.instagram.com/nough_el/" target="_blank"><i class="fa fa-instagram"></i></a></div>
          </div>
          </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 my-5">
          <div class="card">
            <div class="card-body ">
              <img src="../public/img/nawfal.jpg" alt="" class="img-fluid rounded-circle w-50  mb-3">
              <h3>Nawfal</h1>
            <h5 class="text-muted">WEB DÉVELOPPEUR</h5>
            <p>Développeur et Etudiant en 3ième année licence à la faculté de science et techniques de Tanger , specialisé en génie informatique .</p>
            <div class="d-flex flex-row justify-content-center">
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-in"><a href="https://www.linkedin.com/in/nawfal-haddi-245390bb/" target="_blank"><i class=" fa fa-linkedin"></i></a></div>
            <div class="p-2 mx-2 my-2  social_media_icon d-flex align-items-center justify-content-center blue-fb"> <a href="https://www.facebook.com/nawfalhaddi" target="_blank"><i class=" fa fa-facebook"></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-yt"> <a href="https://www.youtube.com/channel/UCCkQfFy-w1Liq_kjF0IjYcg?view_as=subscriber" target="_blank"><i class=" fa fa-youtube-play" ></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-twitter">  <a href="https://twitter.com/HaddiNawfal" target="_blank"><i class="fa fa-twitter"></i></a></div>
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-instagram">  <a href="https://www.instagram.com/nawfalhaddi/" target="_blank"><i class="fa fa-instagram"></i></a></div>
          </div>
          </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 my-5">
          <div class="card">
            <div class="card-body ">
              <img src="../public/img/chaimae_carre.png" alt="" class="img-fluid rounded-circle w-50 mb-3">
              <h3>Chaimae</h1>
            <h5 class="text-muted">WEB DÉVELOPPEUSE</h5>
            <p>Développeuse et Etudiante en 3ième année licence à la faculté de science et techniques de Tanger , specialisé en génie informatique .</p>
            <div class="d-flex flex-row justify-content-center">
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-in"><a href="https://www.linkedin.com/in/chaimae-ben-amar-511489162/" target="_blank"><i class=" fa fa-linkedin"></i></a></div>
            <div class="p-2 mx-2 my-2  social_media_icon d-flex align-items-center justify-content-center blue-fb"> <a href="https://www.facebook.com/profile.php?id=100007800975632" target="_blank"><i class=" fa fa-facebook"></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-yt"> <a href="https://www.youtube.com/channel/UC-FxlPSyWz71-IJLlBCdqMw?view_as=subscriber" target="_blank"><i class=" fa fa-youtube-play" ></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-twitter">  <a ><i class="fa fa-twitter"></i></a></div>
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-instagram">  <a href="https://www.instagram.com/shaimae_b/" target="_blank"><i class="fa fa-instagram"></i></a></div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>

  </section>



  <!------footer---------------->
<?php include 'footer.php';?>

<!------------------------>

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/dropdown.js"></script>
</body>

</html>
