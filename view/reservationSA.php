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
        <h1 class="align-self-end p-5 mx-auto text-center">Réservez maintenant</h1>
      </div>
    </div>
  </header>
  <!--------------------------->
  <div id="bodyreservationSA">

<?php if ($_SESSION['IS_VERIFIED']==1) {?>
    <section>
      <?php if (isset($_GET['msg'])) {?>
        <div class="container">
          <div class="row">
            <div class="col-sm-7 mx-auto">
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong><?php $msgmdp = $_GET['msg'];echo $msgmdp; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        </div>
      </div>
    </div>
    <?php  }
      if (isset($_GET['error'])) {?>
        <div class="container">
          <div class="row">
            <div class="col-sm-7 mx-auto">
          <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
              <strong><?php $msgmdp = $_GET['error'];echo $msgmdp; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        </div>
      </div>
    </div>
    <?php  } ?>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">

            <div class="reservationForm p-4 mt-3 mb-5">
              <h1 class="h2 text-center">Réservation sans abonnement</h1>
              <form action="" accept-charset="UTF-8" name="myform"  id="myform" method="POST" class="d-flex flex-column">
                <div class="form-group">
                  <label class="ml-1">Séance:</label>
                  <select class="form-control" onchange="changeHour(event);getelements();" required>
                <option disabled selected value> </option>
                <option value="1">1 heure</option>
                <option value="2">2 heures</option>
                <option value="3">3 heures</option>
                <option value="4">4 heures</option>
                <option value="5">5 heures</option>
                <option value="6">6 heures</option>
                <option value="7">7 heures</option>
                <option value="8">8 heures</option>
              </select>
                </div>
                <div class="form-group">
                  <label class="ml-1">Jour:</label>
                  <input type="date" name="date" value="" required class="form-control" id="dateDebut" min="">
                </div>
                <div class="form-group">
                  <label class="ml-1">Heure:</label>
                  <input type="time" name="time" value="" required class="form-control">
                </div>
                <div class="form-group">
                  <label class="ml-1">Vous avez des animeaux?</label>
                  <select class="form-control" name="animal"required>
              <option disabled selected value> </option>
              <option value="1">Oui</option>
              <option value="0">Non</option>
            </select>
                </div>
                <div class="form-group">
                  <label class="ml-1">Combien de personnels nécessaires ?</label>
                  <select class="form-control" name="staff" onchange="changeTotalPers(event);getelements();" required>
              <option disabled selected value> </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
                </div>
                <div class="form-group">
                  <label class="ml-1">Votre adresse:</label>
                  <select class="form-control" name="adress" onChange="choice(this.selectedIndex);" >
                    <option disabled selected value> </option>
                    <option value="<?=$_SESSION['ADDRESS_CLI']?>"><?=$_SESSION['ADDRESS_CLI']?></option>
                   <option value="autre">Autre</option>
                 </select>
                  <div id="divAdresse" class="mt-2">
                    <textarea name="autreaddresse" type="text" class="form-control" placeholder="Adresse..." rows="3"></textarea>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-6 total text-center">Durée: <div class="total totalCalcul"> <span id="hours" >... </span> heure</div></div>
                    <div class="col-6 total text-center">Prix: <div class="total totalCalcul"> <span id="totalPrice" >... </span> MAD</div></div>
                  </div>
                </div>
                <div class="container mt-4">
                  <div class="row">
                    <div class="col-xs-2 ml-auto">
                      <button type="submit" class="btn btn-danger ml-auto">Valider</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }
  else{
    header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'mesReservations.php#mesReservationsbody');
    exit;
  }?>



  </div>



  <!------footer---------------->
  <?php include 'footer.php';?>

  <!------------------------>

  <script src="../public/js/jquery.min.js"></script>
  <script src="../public/js/popper.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/reservation.js"></script>
  <script src="../public/js/dropdown.js"></script>
  <script>
  function getelements(){
  var hours = document.getElementById('hours').innerText;
  var totalprice= document.getElementById('totalPrice').innerText;
  var link="../index.php?action=resSA&id=<?=$_SESSION['ID_CLI'] ?>&balance=<?=$_SESSION['BALANCE_CLI'] ?>&hours="+hours+"&totalprice="+totalprice;
  document.myform.action = link;}
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
