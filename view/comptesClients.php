<?php session_start();
if (isset($_SESSION['ID_EMPLOYEE'])) {
  if ($_SESSION['IS_ACTIF']==1) {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>INOVASIST</title>
  <link rel="stylesheet" href="../public/css/font-awesome.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="stylesheet" href="../public/css/header.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
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
    <div class="header comptes">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Gestion des clients</h1>
        </div>
      </div>
    </div>
  </header>

<section id="comptes">
  <div class="container">
    <div class="row py-4">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body text-center">
            <img src="../public/img/nawfal.jpg" alt="" class="img-fluid rounded-circle w-50   mb-3">
            <h3> Nawfal Haddi </h3>
            <h4> Client </h4></div>
            <div class="row text-center py-3">
              <div class="col-6">
                <a href="#" class="btn btn-sm ml-3 modify text-dark text-uppercase">Modifier</a>
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-sm mr-3 delete text-dark text-uppercase">Supprimer</a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- footer---------------->
<?php include 'footer.php';?>

<!------------------------>
<!-- Scripts -->

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
else {
  $msgmdp = "Desolé cette page n'est pas accésible pour vous";
  header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'errorpage.php?msg='.$msgmdp);
  exit;
}
?>
