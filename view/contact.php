<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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

<body>

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
          <h1 class="align-self-end p-5 mx-auto text-center">Contactez-Nous</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->

  <section id="contact">
    <?php if (isset($_GET['msg'])) {?>
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mx-auto">
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong><?php $msgmdp = $_GET['msg'];echo $msgmdp; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      </div>
    </div>
  </div>
  <?php    } ?>
    <div class="container">
      <div class="row py-4">
        <div class="col-lg-6 py-3 ">
          <form action="../index.php?action=contact" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <input type="text" class="form-control m-3" name="nom" id="usr" placeholder="Votre Nom">
                </div>
                <div class="col-6">
                  <input type="email" class="form-control m-3" name="email" id="email" placeholder="Votre Email">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <textarea class="form-control m-3 mr-5" name="msg" rows="8" cols="30 " id="comment" placeholder="Votre message..."></textarea>
                </div>

              </div>

            </div>
            <button type="submit" class="btn envoyer btn-md text-white text-uppercase ml-3">Envoyer</button>
          </form>
        </div>
        <div class="col-lg-6 pl-5  py-3">
          <h2> Notre adresse </h2>
          <p>Vous pouvez nous contacter directement par téléphone ou email sur:</p>
          <i class="fa fa-map-marker" aria-hidden="true"></i> N°21892 Iberia Tangier, Morocco
          <br>
          <i class="fa fa-phone" aria-hidden="true"></i> +2126600660066
          <br>
          <i class="fa fa-envelope" aria-hidden="true"></i> inovasist@inovasist.ma
          <br>
          <i class="fa fa-globe" aria-hidden="true"></i> inovasist.ma

          <div class="d-flex social-media flex-row py-3">
            <div class="p-2 mx-2 my-2  social_media_icon d-flex align-items-center justify-content-center blue-fb"> <a href="https://www.facebook.com/inovasist/" target="_blank"><i class=" fa fa-facebook"></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-yt"> <a href="https://www.youtube.com/channel/UCkyUma5IZC-2AY9NkACerPA?view_as=subscriber" target="_blank"><i class=" fa fa-youtube-play" ></i></a></div>
            <div class="p-2  mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center blue-twitter"> <a href="https://twitter.com/Inovasist1" target="_blank"><i class="fa fa-twitter"></i></a></div>
            <div class="p-2 mx-2 my-2 social_media_icon d-flex align-items-center justify-content-center red-instagram"> <a href="https://www.instagram.com/inovasist/" target="_blank"><i class="fa fa-instagram"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Footer-->
  <?php include 'footer.php';?>

  <!------------------------>
  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/main.js"></script>
  <script src="../public/js/dropdown.js"></script>

</body>

</html>
