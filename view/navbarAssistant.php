
<div id="mainNavbar">


  <section id="mainNavbar2">
    <nav class="navbar navbar-expand-md fixed-top bg-light navbar-light  py-2">
      <div class="container">
        <a href="acceuil.php" class="navbar-brand"><img  src="../public/img/Logo.png" width="auto" height="36" alt=""></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="acceuil.php#about" class="nav-link">Accueil</a>
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mx-auto" href="#" id="navbardrop" data-toggle="dropdown">
              <img src="../public/img/profil.png" class="closed-size ">
            </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li class="h5 text-center text-light"><?php echo $_SESSION['LNAME_EMPLOYEE'] ?> <?php echo $_SESSION['FNAME_EMPLOYEE']  ?> </li>
                <li><a class="dropdown-item" tabindex="-1" href="gestioncli.php"><span><i class="fa fa-cog  pr-2" aria-hidden="true"></i></span>Gestion des clients</a></li>
                <hr>
                <li><a class="dropdown-item" tabindex="-1" href="demandesReservations.php"> <span><i class="fa fa-inbox pr-2" aria-hidden="true"></i></span>Demandes de réservation</a></li>
                <hr>
                <li class="dropdown-submenu dropleft">
                  <a class="test dropdown-item" tabindex="-1" href="#"><i class="fa fa-arrow-circle-o-left pr-2" aria-hidden="true"></i>Boite de réception <span class="caret"></span></a>

                  <ul class="dropdown-menu " id="submenu">
                    <li><a class="dropdown-item" tabindex="-1" href="inbox.php"><i class="fa fa-envelope pr-2" aria-hidden="true"></i>Messages</a></li>
                    <li><a class="dropdown-item" tabindex="-1" href="BoiteTickets.php"><i class="fa fa-ticket pr-2" aria-hidden="true"></i>Tickets</a></li>
                  </ul>

                </li>
                <hr>
                <li><a class="dropdown-item" tabindex="-1" href="../index.php?action=deconnect"><span><i class="fa fa-sign-out  pr-2" aria-hidden="true"></i></span>Déconnexion</a></li>
                <hr>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

</div>



<!--
  <script src="js/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
  </script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>-->
