<section id="mainNavbar">
  <nav class="navbar navbar-expand-md fixed-top bg-light navbar-light  py-2">
    <div class="container">
      <a href="acceuil.php" class="navbar-brand"><img  src="../public/img/Logo.png" width="auto" height="36" alt=""></a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a href="acceuil.php" class="nav-link">Accueil</a>
          </li>
          <li class="nav-item ">
            <a href="apropos.php#apropos" class="nav-link">A propos</a>
          </li>
          <li class="nav-item ">
            <a href="services.php#offers" class="nav-link">Nos offres</a>
          </li>
          <li class="nav-item ">
            <a href="contact.php#contact" class="nav-link">Contact</a>
          </li>
          </li>
          <li class="nav-item ">
            <div class="mt-2"><a href="payement.php" class="btn-primary solde px-2"><?php echo $_SESSION['BALANCE_CLI']?> MAD</a></div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-auto" href="#" id="navbardrop" data-toggle="dropdown">
              <img src="../public/img/profil.png" class="closed-size ">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="h5 text-center text-light"><?php echo $_SESSION['LNAME_CLI'] ?> <?php echo $_SESSION['FNAME_CLI'] ?></div>
              <a class="dropdown-item" href="parameters.php#parameters"><span><i class="fa fa-cog pr-2" aria-hidden="true"></i></span>Mes paramètres</a>
              <hr>
              <a class="dropdown-item" href="mesReservations.php#mesReservationsbody"> <span><i class="fa fa-inbox pr-2" aria-hidden="true"></i></span>Mes réservations</a>
              <hr>
              <a class="dropdown-item" href="tickets.php#tickets"><span><i class="fa fa-ticket pr-2" aria-hidden="true"></i></span>Tickets</a>
              <hr>
              <a class="dropdown-item" href="../index.php?action=notification&amp;id=<?= $_SESSION['ID_CLI']?>"><span><i class="fa fa-bell pr-2" aria-hidden="true"></i></span>Notifactions&nbsp&nbsp(<?php 
                require('../controller/notificationManager.php'); $number=unreadNotifications($_SESSION['ID_CLI']);
                echo $number; 
              ?>) </a>
              <hr>
              <a class="dropdown-item" href="../index.php?action=deconnect"><span><i class="fa fa-sign-out pr-2" aria-hidden="true"></i></span>Déconnexion</a>
              <hr>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>
