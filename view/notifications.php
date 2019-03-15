<?php session_start();
if (isset($_SESSION['ID_CLI'])) {
  if ($_SESSION['IS_ACTIF']==1) {
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../public/css/font-awesome.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/apropos.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
  <link rel="stylesheet" href="../public/css/header.min.css">
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="icon" type="image/png" href="../public/img/brightness.png" />
  <title>INOVASIST</title>
</head>

<body>
  <header>
    <!------- header---------------->
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
    <div class="header reservation_sa text-uppercase">
      <div class="overlay d-flex">
        <h1 class="align-self-end p-5 mx-auto text-center">Notifications</h1>
      </div>
    </div>
  </header>
  <!--------------------------->
  <div id="notificationbody" class="mb-5 pb-5">
    <div class="container mb-5">
      <table>
      <?php
      $notifications=listNotifications($_SESSION['ID_CLI']);
      while($row = $notifications->fetch()){
        ?>
      <div class="row notification mb-4 d-flex flex-row justify-content-around">
        <div class="col-12  ">
          <div class="container">
            <div class="row">
          <div class=" col-sm-3 "><p><?= $row['DATE_NOTIF_FR'] ?></p></div>
          <div class=" col-sm-9 "><p><?= $row['CONTENT_NOTIF']?></p></div>
            </div>
          </div>
        </div>
      </div>
    <?php
      }
    ?>
  </table>
    </div>


  </div>


  <!------footer---------------->
  <?php include 'footer.php';?>

  <!------------------------>

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/main.js"></script>
  <script src="../public/js/dropdown.js"></script>

</body>

</html>
<?php
}else {
  $msgmdp = "Desolé votre compte n'est pas actif veuillez contacter l'administration pour l'activer";
  header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'errorpage.php?msg='.$msgmdp);
  exit;
}
}
else{
  $msgmdp = "Desolé cette page n'est pas accésible pour vous";
  header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'errorpage.php?msg='.$msgmdp);
  exit;
}
?>
