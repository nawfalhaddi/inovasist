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
  <div  id="message">
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
    <div class="header inbox">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Message</h1>
        </div>
      </div>
    </div>
  </header>
  <div class="container" id="content">
    <form action="../index.php?action=answermsg&email=<?=$_GET['email']?>&idmsg=<?=$_GET['idmsg']?>" method="POST">
      <div class="form-group">
        <div class="row">
          <div class="col-6">
            <textarea class="form-control mt-3" disabled rows="8" cols="30 " id="Message-client"><?php
              if (isset($_GET['content'])) {
                $content=$_GET['content'];
                echo $content;
              }
          ?></textarea>
          </div>
            <div class="col-6">
              <textarea name="reponse" class="form-control mt-3" rows="8" cols="30 " id="comment" placeholder="Votre message..."></textarea>
              <input type="submit" class="btn envoyer btn-md text-white text-uppercase my-3" value="Envoyer">
            </div>
          </div>

      </div>

    </form>
  </div>
  <!--Footer-->
  <?php include 'footer.php';?>

  <!------------------------>
  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/main.js"></script>

  </script>
</body>

</html>
