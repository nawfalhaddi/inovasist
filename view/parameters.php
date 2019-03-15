<?php session_start();
if (isset($_SESSION['ID_CLI'])) {
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
  <link rel="stylesheet" href="../public/css/header.min.css">
  <link rel="stylesheet" href="../public/css/footer.min.css">
  <link rel="stylesheet" href="../public/css/totaldestyle.min.css">
  <link rel="stylesheet" href="../public/css/parameters.min.css">
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
    <div class="header parameters">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Mes Parametres</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->

  <section id="parameters">
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

    <div class="container modify">
      <div class="form-group mb-5">
        <label for="sel1">Vous voulez modifier votre:</label>
        <select class="form-control minimal" onChange="choice(this.selectedIndex);">
         <option disabled selected value> </option>
         <option value="1">Mot de passe</option>
         <option value="3">Numero de telephone</option>
         <option value="4">Adresse</option>
       </select>
      </div>
    </div>
    <div class="container mdp" id="mdp">
      <div class="row">
        <form action="../index.php?action=changepasswordcli&id=<?= $_SESSION['ID_CLI']?>" method="POST">
          <div class="col-lg-6">

            <div class="form-group">
              <div class=" my-2"><label for="email" class="h5">Ancien mot de passe</label></div>
              <input type="password" name="oldpass" class="form-control" placeholder="*********">
            </div>

          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <div class=" my-2"><label for="email" class="h5">Nouveau mot de passe</label></div>
              <input type="password" name="newpass1" class="form-control" placeholder="*********">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <div class=" my-2"><label for="email" class="h5">Confirmez le nouveau mot de passe</label></div>
              <input type="password" name="newpass2" class="form-control" placeholder="*********">
            </div>
          </div>
          <button type="submit" class="btn btn-md text-white text-uppercase ml-3">Confirmer</button>
        </form>
      </div>
    </div>
    <div class="container num" id="num">
      <div class="row">
        <form action="../index.php?action=changemobile&id=<?= $_SESSION['ID_CLI']?>" method="POST">
          <div class="col-lg-6">
            <div class="form-group">
              <div class="d-block my-2"><label for="email" class="h5">Ancien <span>&#8470;</span> du GSM</label></div>
              <input type="text" class="form-control  bg-light" disabled placeholder="<?=$_SESSION['PHONE_NUM'] ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <div class="d-block my-2"><label for="email" class="h5">Nouveau <span>&#8470;</span> du GSM</label></div>
              <input type="text" class="form-control" pattern="0[1-68]([-. ]?[0-9]{2}){4}" title="Votre télephone" placeholder="06xxxxxxxx" name="telephone">
            </div>
          </div>
          <button type="submit" class="btn btn-md text-white text-uppercase ml-3">Confirmer</button>
        </form>
      </div>
    </div>
    <div class="container adresse" id="adresse">
      <div class="row">
          <div class="col-lg-6">
        <form action="../index.php?action=changeadress&id=<?= $_SESSION['ID_CLI']?>" method="POST">
            <div class="form-group">
              <div class="d-block my-2"> <label for="adresse" class="h5">Votre ancien adresse</label></div>
              <input type="text" class="form-control bg-light" placeholder="<?= $_SESSION['ADDRESS_CLI'] ?>" disabled>
            </div>
            <div class="form-group">
              <div class="d-block my-2"> <label for="adresse" class="h5">Votre nouvelle adresse</label></div>
              <input type="text" name="adresse" class="form-control" placeholder="Adresse...">
            </div>
            <button type="submit" class="btn btn-md text-white text-uppercase ml-3">Confirmer</button>
          </form>
          </div>
      </div>
    </div>

  </section>
  <section>
    <div class=" mt-4 container">
      <div class="row">
        <div class="ml-auto col-sm-4">
          <button onclick="confirmation()" class="btn btn-secondary btn-sm btn-block"> Désactiver votre compte</button>
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
  <script src="../public/js/parameters.js"></script>
  <script src="../public/js/popper.min.js"></script>
<script>
function confirmation() {
    var r = confirm("Voulez-vous vraiment desactiver votre compte ? \n NB: une fois vous désactivez votre compte vous ne pouverez \n plus effectuer une operation sur notre plateforme");
    if (r == true) {
        location.href = "../index.php?action=disableaccountcli&id=<?= $_SESSION['ID_CLI']?>";
      }
}
</script>
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
