<?php session_start();
if (isset($_SESSION['ID_EMPLOYEE'])) {
  if ($_SESSION['IS_ACTIF']==1) {
?>
<!DOCTYPE html>
<html>

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
  <div  id="inbox">

  <!-- Header -->
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
            <h1 class="align-self-end p-5 mx-auto text-center">Messages</h1>
          </div>
        </div>
      </div>
      </header>
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
        <table class="table text-center table-striped my-5">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">Message</th>
              <th scope="col">Traitement</th>
            </tr>
          </thead>
          <tbody class="">
            <?php
            require_once("../controller/notificationManager.php");
            $messages=listinbox();
            while($row = $messages->fetch()){
              ?>
            <tr>
              <td><?=$row['DATE_MESSAGE']?></td>
              <td><?=htmlspecialchars($row['NAME'])?></td>
              <td><?=htmlspecialchars($row['EMAIL'])?></td>
              <td><?php $letters= strlen($row['CONTENT_MESSAGE']);
              if ($letters < 20) {
                echo htmlspecialchars($row['CONTENT_MESSAGE']);
              } else {
                echo substr(htmlspecialchars($row['CONTENT_MESSAGE']), 0, 20);
                echo "...";
              }
              ?></td>
              <td>
              <a href="message.php?action=openmsg&email=<?=htmlspecialchars($row['EMAIL'])?>&content=<?=htmlspecialchars($row['CONTENT_MESSAGE'])?>&idmsg=<?=$row['ID_MESSAGE']?>" class="btn btn-sm bg-secondary text-white text-uppercase ">Ouvrir</a>
              <a href="../index.php?action=deletemsg&idmsg=<?=$row['ID_MESSAGE']?>" class="btn btn-sm bg-danger text-white text-uppercase ">Supprimer</a>
            </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>


    </div>

  <!-- footer---------------->
  <?php include 'footer.php';?>

  <!------------------------>



    <!-- Scripts -->

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
