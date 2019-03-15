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
    <div class="header demanderes">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Demandes de réservation</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->
<section id="Boite-Tickets">
  <?php if (isset($_GET['msg'])) {?>
    <div class="container">
      <div class="row bordernone">
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
  <div class="row bordernone">
    <div class="col-sm-7 mx-auto my-4">
      <form class="" action="../index.php?action=verifyday" method="post">
        <div class="form-group d-flex">
          <input class="form-control" type="date" name="date" >
          <input type="submit" class="btn btn-sm-primary bg-primary text-white" value="Verifier">
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <h3>Demandes de réservation sans abonnement:</h3>
    </div>
  </div>
</div>
  <div class="container ">
    <table class="table">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Nom</th>
          <th>Date</th>
          <th>Heure</th>
          <th>Séance (h)</th>
          <th>Personnel</th>
          <th>Adresse</th>
          <th>traitement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../controller/notificationManager.php");
        $reservation=listallreservationSA();
        while($row =$reservation->fetch()){
          ?>
        <tr>
        <td><?php echo htmlspecialchars($row['ID_RES']);?></td>
        <td><?php echo htmlspecialchars($row['FNAME_CLI']);echo " ";echo htmlspecialchars($row['LNAME_CLI']); ?></td>
        <td><?php echo htmlspecialchars($row['START_DATE']);?></td>
        <td><?php echo htmlspecialchars($row['RESERVATION_TIME']);?></td>
        <td><?php echo htmlspecialchars($row['HOURS']);?></td>
        <td><?php echo htmlspecialchars($row['STAFF']);?></td>
        <td><?php echo htmlspecialchars($row['RESERVATION_ADRESS']);?></td>
        <td class="d-flex flex-column">
          <?php
          switch ($row['ID_STATE']) {
            case '1':?>
            <a href="../index.php?action=rejectRes&amp;idres=<?=$row['ID_RES']?>&amp;id=<?=$row['ID_CLI']?>&amp;totalprice=<?=$row['TOTAL_PRICE']?>&amp;solde=<?=$row['BALANCE_CLI']?>"  class="btn btn-sm bg-danger text-white text-uppercase mb-1">Rejeter</a>
            <a href="../index.php?action=validatereservation&idres=<?=$row['ID_RES']?>" class="btn btn-sm bg-success text-white text-uppercase mb-1">Valider</a>
            <?php  break;
            case '4':?>
              <a href="../index.php?action=endreservation&idres=<?=$row['ID_RES']?>" class="btn btn-sm bg-secondary text-white text-uppercase mb-1">Terminer</a>
          <?php  break;
          }
          ?>


        </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <h3>Demandes de réservation avec abonnement:</h3>
      </div>
    </div>
  </div>

  <div class="container ">
    <table class="table">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Nom</th>
          <th>Date début</th>
          <th>Date fin</th>
          <th>Heure</th>
          <th>Séance (h)</th>
          <th>Personnel</th>
          <th>Adresse</th>
          <th>traitement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../controller/notificationManager.php");
        $reservation=listallreservationAA();
        while($row =$reservation->fetch()){
          ?>
        <tr>
        <td><?php echo htmlspecialchars($row['ID_RES']);?></td>
        <td><?php echo htmlspecialchars($row['FNAME_CLI']);echo " ";echo htmlspecialchars($row['LNAME_CLI']); ?></td>
        <td><?php echo htmlspecialchars($row['START_DATE']);?></td>
        <td><?php echo htmlspecialchars($row['FINAL_DATE']);?></td>
        <td><?php echo htmlspecialchars($row['RESERVATION_TIME']);?></td>
        <td><?php echo htmlspecialchars($row['HOURS']);?></td>
        <td><?php echo htmlspecialchars($row['STAFF']);?></td>
        <td><?php echo htmlspecialchars($row['RESERVATION_ADRESS']);?></td>
        <td class="d-flex flex-column">
          <?php
          switch ($row['ID_STATE']) {
            case '1':?>
            <a href="../index.php?action=rejectRes&amp;idres=<?=$row['ID_RES']?>&amp;id=<?=$row['ID_CLI']?>&amp;totalprice=<?=$row['TOTAL_PRICE']?>&amp;solde=<?=$row['BALANCE_CLI']?>" class="btn btn-sm bg-danger text-white text-uppercase mb-1">Rejeter</a>
            <a href="../index.php?action=validatereservation&idres=<?=$row['ID_RES']?>" class="btn btn-sm bg-success text-white text-uppercase mb-1">Valider</a>
            <?php  break;
            case '4':?>
              <a href="../index.php?action=endreservation&idres=<?=$row['ID_RES']?>" class="btn btn-sm bg-secondary text-white text-uppercase mb-1">Terminer</a>
          <?php  break;
          }
          ?>


        </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
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
