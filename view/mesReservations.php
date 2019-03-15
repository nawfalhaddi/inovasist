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
        <h1 class="align-self-end p-5 mx-auto text-center">Mes Réservations</h1>
      </div>
    </div>
  </header>
  <!--------------------------->

  <div id="mesReservationsbody">
  <?php if ($_SESSION['IS_VERIFIED']==1) {?>

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
    <div class="container mb-5">
      <div class="row align-items-center">
        <div class="col align-self-end">
          <a href="services.php" class="btn btn-lg w-50 envoyer text-uppercase text-white mb-5"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
  Passer une nouvelle reservation</a>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th>Réservation (ID)</th>
              <th>Type de réservation</th>
              <th>L'heure</th>
              <th>Date début</th>
              <th>Date fin</th>
              <th>Traitement</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $reservations=listreservation($_SESSION['ID_CLI']);
            while($row = $reservations->fetch()){
              ?>
            <tr>
              <td>#<?= $row['ID_RES'] ?></td>
              <td><?= $row['TYPE'] ?></td>
              <td><?= $row['RESERVATION_TIME'] ?></td>
              <td><?= $row['START_DATE'] ?></td>
              <td><?= $row['FINAL_DATE'] ?></td>
              <td>
            <?php switch ($row['ID_STATE']) {
              case '1':?>
              <a href="../index.php?action=cancelRes&amp;idres=<?=$row['ID_RES']?>&amp;id=<?=$_SESSION['ID_CLI']?>&amp;totalprice=<?=$row['TOTAL_PRICE']?>&amp;solde=<?=$_SESSION['BALANCE_CLI']?>"class="btn btn-md bg-danger text-white text-uppercase mt-2">Annuler</a>
            <?php  break;
                case '2':?>
                <button type="button" disabled class="btn btn-md bg-dark text-white text-uppercase">Terminée</button>
              <?php  break;
                case '4':?>
               <button type="button" disabled class="btn btn-md bg-success text-white text-uppercase">Validée</button>
                <?php    break;
            } ?>
              </td>
            </tr>
            <?php
          }
          $reservations->closeCursor();
          ?>
          </tbody>

        </table>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <form action="../index.php?action=feedback&id=<?= $_SESSION['ID_CLI']?>&name=<?= $_SESSION['FNAME_CLI']?>" method="POST">
            <div class="form-group mt-5">
                  <label class="label text-white bg-dark text-center  py-2 ">Que pensez-vous de nos services ? </label>
                  <textarea class="form-control mt-3" name="review" rows="8" cols="80" placeholder="Merci de laisser un Feedback."></textarea>
                <button type="submit" class="btn btn-md envoyer text-uppercase text-white my-3" >Envoyer</button>

            </div>
          </form>
        </div>
        <div class="col-lg-6">

        </div>
      </div>


    </div>
  <?php } else{ echo "
    <div class='container my-5 py-5'>
      <div class='row py-5'>
        <div class='col-sm-7 mx-auto'>
          <div class='alert alert-warning' role='alert'>
            <p class='text-center'><b>Vous ne pouvez pas passer une réservation avant que votre compte soit verifié. <br> NB: nous allons vérifier votre compte dans quelques minutes.</b> </p>
          </div>
        </div>
      </div>
    </div>
    ";}?>
  </div>


  <!------footer---------------->
  <?php include 'footer.php';?>

  <!------------------------>

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
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
