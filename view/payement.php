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
    <div class="header payement">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Fonds</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->
  <section id="payement">
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
      <div class="row">
        <div class="col-lg-6">
          <div class="solde bg-secondary text-center text-white p-1 mb-5">
            <h4> Votre solde actuel : <strong> <?php echo $_SESSION['BALANCE_CLI']?> MAD  </strong> </h4>
          </div>
          <div class="form-group">
            <label for="sel1">Ajouter des fonds par :</label>
            <select class="form-control minimal" onChange="choix(this.selectedIndex);">
            <option value="1">Credit Card</option>
             <option value="2">Paypal</option>
             <option value="3">Western Union</option>
           </select>
          </div>
        </div>
      </div>

    <div class="container paypal" id="Paypal">
      <div class="row">
        <div class="col-lg-6 card">
          <form action="../index.php?action=pay&id=<?= $_SESSION['ID_CLI']?>" method="POST">
              <div class="form-group">
                <div class=" my-2"><label for="email" class="h5">Votre Email</label></div>
                <input type="email" required class="form-control" name="" value="">
                <div class=" my-2"><label for="email" class="h5">Votre mot de passe</label></div>
                <input type="password" required class="form-control" placeholder="*********">
                <div class=" my-2"><label for="email" class="h5">Le montant à ajouter :</label></div>
                <input type="number" max="60000" required  class="form-control" name="montant" value="">
                <button type="submit" class="btn envoyer btn-md text-white text-uppercase my-3">Confirmer</button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <div class="container credit-card" id="card">
      <div class="row">
        <div class="col-lg-6 card">
          <form  action="../index.php?action=pay&id=<?= $_SESSION['ID_CLI']?>" method="POST">
              <div class="form-group">
                <div class=" my-2"><label for="email" class="h5">Votre code bancaire</label></div>
                <input type="text" class="form-control">
                <div class=" my-2"><label for="email" class="h5">La date d'expiration :</label></div>
                <div class="row">
                  <div class="col-lg-3">
                    <input type="text" pattern="[0-9]{2}"   required class="form-control " name="" value="" placeholder="MM" maxlength="2" >
                  </div> <span class="h4">/</span>
                  <div class="col-lg-3">
                  <input type="text"  pattern="[0-9]{2}" required class="form-control " name="" value="" placeholder="YY" maxlength="2">
                  </div>
                  <div class="col-lg-4">
                    <input type="text" pattern="[0-9]{3}" required class="form-control" name="" value="" placeholder="Security Code" maxlength="3">
                  </div>
                </div>
                <div class=" my-2"><label for="email" class="h5">Le montant à ajouter :</label></div>
                <input type="number" max="60000" required class="form-control" name="montant" value="">
                <button type="submit" class="btn envoyer btn-md text-white text-uppercase my-3">Confirmer</button>
              </div>
          </form>
          </div>
        </div>
    </div>
    <div class=" container Western" id="Western">
      <div class="row">
        <div class="col-lg-6 card">
          <form  action="../index.php?action=pay&id=<?= $_SESSION['ID_CLI']?>" method="POST">
              <div class="form-group">
                <div class=" my-2"><label for="email" class="h5">Votre nom et prénom :</label></div>
                <input type="text" required class="form-control" name="" value="">
                <div class=" my-2"><label for="email" class="h5">Votre code de transaction</label></div>
                <input type="text" required class="form-control">
                <div class=" my-2"><label for="email" class="h5">Le montant à ajouter :</label></div>
                <input type="number" max="60000" required class="form-control" name="montant" value="">

                <button type="submit" class="btn envoyer btn-md text-white text-uppercase my-3">Confirmer</button>
              </div>
          </form>
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
  <script src="../public/js/payement.js"></script>
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
