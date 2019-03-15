<nav class="navbar navbar-expand-md fixed-top  bg-light navbar-light  py-2">
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
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle mx-auto" href="#" id="navbardrop" data-toggle="dropdown">
            <img src="../public/img/closed.png" class="closed-size ">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">Se connecter</a>
            <hr>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#signUpModal">S'inscrire</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--  Login modal--------------------------->
<section id="login">
  <div class="modal fade text-dark" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal"><span>&times;</span></button><br>
          <form action="../index.php?action=connect "  method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <div class="d-block my-2"><label for="email" class="h5">Email</label></div>
              <input type="text" name="email" class="form-control" placeholder="xyz@name.qwe" required>
            </div>
            <div class="form-group">
              <div class="d-block my-2"><label for="password" class="h5">Mot de passe</label></div>
              <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
            </div>
            <div class="d-flex flex-row justify-content-center"><input type="submit" name="submit" class="btn btn-danger align-self-center my-3" value="Se connecter"></div>
          </form>
          <div class="d-flex flex-row justify-content-center"><a href="acceuil.php" class="my-2"><span class="link">Mot de passe oublié ?</span></a></div>
          <div class="d-flex flex-row justify-content-center text-center"><a onclick="$('#loginModal').one('hidden.bs.modal', function() { $('#signUpModal').modal('show'); }).modal('hide');" class="my-2">Vous n’avez pas de compte? <br><span class="link">Inscrivez-vous</span></a><br></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--  signup modal--------------------------->
<section id="signup">
  <div class="modal fade text-dark" id="signUpModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header mx-auto">
          <h5 class="modal-title">Inscrivez-vous </h5>
        </div>
        <div class="modal-body">
          <form action="../index.php?action=addAccount" method="POST" id="inscription_form" enctype="multipart/form-data">
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="nom" class="h5">Nom</label></div>
                    <input type="text" name="lname" pattern="[a-zA-Z-]+" class="form-control" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h5">Prenom</label></div>
                    <input type="text" name="fname" pattern="[a-zA-Z-]+" class="form-control" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="password" class="h5">Votre Email</label></div>
                    <input type="email" name="email" class="form-control" placeholder="xyz@name.qwe" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h6">Mot de passe</label></div>
                    <input type="password" name="pass1" class="form-control" placeholder="*********" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h6">Confirmez le mdp</label></div>
                    <input type="password" name="pass2" class="form-control" placeholder="*********" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h6">Sexe</label></div>
                    <select name="sexe" class="form-control" required>
                       <option value="Mr">Mr</option>
                       <option value="Mlle">Mlle</option>
                       <option value="Mme">Mme</option>
                     </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h6">Date de naissance</label></div>
                    <input type="date" id="birthdate" name="birth" class="form-control" max="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h5"><span>&#8470;</span> du GSM</label></div>
                    <input type="tel" name="telephone" pattern="0[1-68]([-. ]?[0-9]{2}){4}" title="Votre télephone" class="form-control" placeholder="+212666666666" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="email" class="h5"><span>&#8470;</span> du CIN</label></div>
                    <input type="text" name="numcin" class="form-control" placeholder="K12345xxx" required>
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="profession" class="h5">Adresse</label></div>
                    <input type="text" name="address" class="form-control" required >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="d-block my-2"><label for="profession" class="h5">Profession</label></div>
                    <input type="text" name="job" class="form-control" required >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-block my-2 text-center">
                    <h3 class="h6">Importez la photo de CIN</h3>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-row justify-content-center"><input type="file" name="cartenational" class="btn btn-secondary align-self-center my-3" required ></div>


              <div class="d-flex flex-row justify-content-center"><input type="submit" name="submit" class="btn btn-danger align-self-center my-3" value="Valider"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

 <script type="text/javascript">
   var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd
}

if (mm < 10) {
  mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("birthdate").max = today;
 </script>
