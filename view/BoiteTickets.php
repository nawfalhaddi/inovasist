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
    <div class="header tickets">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Tickets</h1>
        </div>
      </div>
    </div>
  </header>
  <!-------->
<section id="Boite-Tickets">
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
    <table class="table">
      <thead>
        <tr>
          <th>Ticket (ID)</th>
          <th>Client</th>
          <th>Objet</th>
          <th>Message</th>
          <th>Traitement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../controller/notificationManager.php");
        $tickets=listalltickets();
        while($row = $tickets->fetch()){
          ?>
        <tr>
          <td><?php echo htmlspecialchars($row['ID_TICKET']);?></td>
          <td> <?php echo htmlspecialchars($row['FNAME_CLI']);?> <?php echo htmlspecialchars($row['LNAME_CLI']);?></td>
          <td><?php echo htmlspecialchars($row['OBJECT_TICKET']);?></td>
          <td><?php $letters= strlen($row['CONTENT_TICKET']);
          if ($letters < 20) {
            echo htmlspecialchars($row['CONTENT_TICKET']);
          } else {
            echo substr(htmlspecialchars($row['CONTENT_TICKET']), 0, 20);
            echo "...";
          }
          ?></td>
          <td>
          <a href="ticketopen.php?idticket=<?=$row['ID_TICKET']?>&idcli=<?=$row['ID_CLI']?>&objet=<?php echo htmlspecialchars($row['OBJECT_TICKET']);?>&content=<?php echo htmlspecialchars($row['CONTENT_TICKET']);?>&fnamecli=<?php echo htmlspecialchars($row['FNAME_CLI']);?>&lnamecli=<?php echo htmlspecialchars($row['LNAME_CLI']);?>" class="btn btn-sm btn-primary text-white text-uppercase ">Répondre</a> <a href="../index.php?action=closeticket&idticket=<?=$row['ID_TICKET']?>" class="btn btn-sm btn-secondary text-white text-uppercase ">Terminer</a> &nbsp&nbsp<?php $answered= $row['IS_ANSWERED'];
          if ($answered ==1 ) {?>
            <i class="fa fa-check-circle-o" aria-hidden="true"></i><?php
          } else {
            echo "...";
          }?>

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
