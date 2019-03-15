<?php session_start();
if (isset($_SESSION['ID_EMPLOYEE'])) {
  if ($_SESSION['IS_ACTIF']==1) {
  if ($_SESSION['IS_ADMIN']==1) {
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
    <div class="header gestioncli">
      <div class="container">
        <div class="overlay d-flex">
          <h1 class="align-self-end p-5 mx-auto text-center">Assistants</h1>
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
      <a href="addemployee.php#Boite-Tickets" class="btn btn-lg bg-primary btn-block text-white">Ajouter un nouveau employée</a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-7">
      <h2>Liste des Assistants:</h2>
    </div>
  </div>
</div>
  <div class="container ">
    <table class="table">
      <thead>
        <tr>
          <th>Prenom</th>
          <th>Nom</th>
          <th>Date de naissance</th>
          <th>Num Tel</th>
          <th>Num CIN</th>
          <th>traitement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../controller/notificationManager.php");
        $varification=0;
        $employee=listallemployee($varification);
        while($row =$employee->fetch()){
          ?>
        <tr>
        <td><?php echo htmlspecialchars($row['FNAME_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['LNAME_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['BIRTH_DATE_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['PHONE_NUM_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['CIN_NUM_EMPLOYEE']);?></td>
        <td class="d-flex flex-column">
          <a href="../index.php?action=deleteemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-danger  text-white text-uppercase mb-1">Supprimer</a><?php if ($row['IS_ACTIVE']==1) {?>
            <a href="../index.php?action=desactivateemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-warning  text-white text-uppercase mb-1">Désactiver</a><?php
          } else {?>
            <a href="../index.php?action=activeemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-success  text-white text-uppercase mb-1">Activer</a>
        <?php  }
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
        <h2>Liste des Admins:</h2>
      </div>
    </div>
  </div>

  <div class="container ">
    <table class="table">
      <thead>
        <tr>
          <th>Prenom</th>
          <th>Nom</th>
          <th>Date de naissance</th>
          <th>Num Tel</th>
          <th>Num CIN</th>
          <th>traitement</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../controller/notificationManager.php");
        $varification=1;
        $employee=listallemployee($varification);
        while($row =$employee->fetch()){
          ?>
        <tr>
        <td><?php echo htmlspecialchars($row['FNAME_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['LNAME_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['BIRTH_DATE_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['PHONE_NUM_EMPLOYEE']);?></td>
        <td><?php echo htmlspecialchars($row['CIN_NUM_EMPLOYEE']);?></td>
        <td class="d-flex flex-column">
          <a href="../index.php?action=deleteemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-danger  text-white text-uppercase mb-1">Supprimer</a><?php if ($row['IS_ACTIVE']==1) {?>
            <a href="../index.php?action=desactivateemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-warning  text-white text-uppercase mb-1">Désactiver</a><?php
          } else {?>
            <a href="../index.php?action=activeemployee&idemployee=<?=$row['ID_EMPLOYEE']?>" class="btn btn-sm bg-success  text-white text-uppercase mb-1">Activer</a>
        <?php  }
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
} else {
  $msgmdp = "Vous ne pouvez pas accéder à cette page. vous n'êtes pas administrateur";
  header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'errorpage.php?msg='.$msgmdp);
  exit;
}
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
