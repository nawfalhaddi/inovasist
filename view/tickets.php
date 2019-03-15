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
    <div class="header tickets">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Mes tickets</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->

  <section id="tickets">

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
          <form action="../index.php?action=ticket&id=<?=$_SESSION['ID_CLI']?>&email=<?=$_SESSION['EMAIL_USER']?>" method="POST">
            <div class="form-group">
              <div class="row">
                <div class="col-12">
                  <input type="text" name="objet" maxlength="30" class="form-control" id="objet" placeholder="Objet">
                </div>
                <div class="col-12">
                  <textarea type="text" name="msg" class="form-control mt-3" id="comment" rows="8" cols="30 " placeholder="Votre message..."></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="btn envoyer btn-md text-white text-uppercase ml-3">Envoyer</button>
          </form>
        </div>
        <div class="col-lg-6 mt-3">
          <table class="table">
            <thead>
              <tr>
                <th>Ticket (ID)</th>
                <th>Objet</th>
                <th>Message</th>
                <th>Traitement</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $tickets=listtickets($_SESSION['ID_CLI']);
              while($row = $tickets->fetch()){
                ?>
              <tr>
                <td><?=$row['ID_TICKET']?></td>
                <td><?=$row['OBJECT_TICKET']?></td>
                <td><?php $letters= strlen($row['CONTENT_TICKET']);
                if ($letters < 20) {
                  echo $row['CONTENT_TICKET'];
                } else {
                  echo substr($row['CONTENT_TICKET'], 0, 20);
                  echo "...";
                }

                ?></td>
                <?php
                if ($row['ID_STATE']==1) { ?>
                  <td><button type="button" disabled class="btn bg-dark btn-sm text-white text-uppercase">En cours</button></td><?php
                }
                if ($row['ID_STATE']==2) {?>
                <td><button type="button" disabled class="btn  btn-success btn-sm text-white text-uppercase">Terminé</button></td>
                <?php
              }
                ?>

              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
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
