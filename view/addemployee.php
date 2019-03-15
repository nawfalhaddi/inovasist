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
  <div class="container">
    <div class="row bordernone">
      <div class="col-sm-8 mx-auto mb-4">
        <form action="../index.php?action=addnewemployee" method="POST">
          <h3 class="text-center">Nouveau employé</h3>
          <div class="form-group">
            <label >Adresse email:</label>
            <input type="email" class="form-control" name="email"  required>
          </div>
          <div class="form-group">
            <label >Mot de passe:</label>
            <input type="password" class="form-control" name="pass"  required>
          </div>
          <div class="form-group">
            <label >Prenom:</label>
            <input type="text" class="form-control" name="fname" required >
          </div>
          <div class="form-group">
            <label >Nom:</label>
            <input type="text" class="form-control" name="lname" required >
          </div>
          <div class="form-group">
            <label >Date de naissance:</label>
            <input type="date" class="form-control" name="birth" required>
          </div>
          <div class="form-group">
            <label >Numero de Telephone:</label>
            <input type="text" class="form-control" name="mobile" required>
          </div>
          <div class="form-group">
            <label >CIN:</label>
            <input type="text" class="form-control" name="cin" required >
          </div>
          <div class="form-group">
            <label >Poste:</label>
            <select class="form-control" name="isadmin" required>
              <option value="1">Admin</option>
              <option value="0">Assistant</option>
            </select>

          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>


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
