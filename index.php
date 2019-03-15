<?php session_start();
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'addAccount') {
            addMember();
            $msgmdp = 'Votre compte est creée avec succès ';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/validationpage.php?msg='.$msgmdp);
            exit;
        }
        elseif ($_GET['action'] == 'connect') {
            login();
        }
        elseif ($_GET['action'] == 'deconnect') {
            logout();
        }
        elseif ($_GET['action'] == 'subscribe') {
            subscribe($_POST['subscriber']);
        }
        elseif ($_GET['action'] == 'contact') {
            receivemessage($_POST['nom'],$_POST['email'],$_POST['msg']);
            $msgmdp = "Merci ".$_POST['nom'].". Votre message est  bien reçu";
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/contact.php?msg='.$msgmdp);
            exit;
        }
        elseif ($_GET['action'] == 'notification') {
            if (isset($_GET['id'])){
                 readNotification($_GET['id']);
                 header('location:view/notifications.php#notificationbody');
            }
          }
        elseif ($_GET['action'] == 'ticket') {
          if (isset($_GET['id']) && isset($_POST['objet'])  && isset($_GET['email']) && isset($_POST['msg'])){
                receiveticket($_GET['id'],$_POST['objet'],$_POST['msg'],$_GET['email']);
                $msgmdp = 'Votre ticket sera traité dans quelques minutes';
                header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/tickets.php?msg='.$msgmdp);
                exit;
              }
            }
        elseif ($_GET['action'] == 'changepasswordcli') {
          if (isset($_GET['id'])){
            changepasswordcli($_GET['id'],$_POST['oldpass'],$_POST['newpass1'],$_POST['newpass2']);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre mot de passe est changé avec succès';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/parameters.php?msg='.$msgmdp);
            exit;
            //header("location:view/parameters.php#parameters");
          }
        }
        elseif ($_GET['action'] == 'changemobile') {
          if (isset($_GET['id'])){
            changemobile($_GET['id'],$_POST['telephone']);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre Numero de telephone est changé avec succès';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/parameters.php?msg='.$msgmdp);
            exit;
            //header("location:view/parameters.php#parameters");
          }
        }
        elseif ($_GET['action'] == 'changeadress') {
          if (isset($_GET['id'])){
            changeadress($_GET['id'],$_POST['adresse']);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre adresse est changé avec succès';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/parameters.php?msg='.$msgmdp);
            exit;
          }
        }
        elseif ($_GET['action'] == 'pay') {
          if (isset($_GET['id'])){
            addamount($_GET['id'],$_POST['montant']);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre montant a été bien ajouté';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/payement.php?msg='.$msgmdp);
            exit;
          }
        }
        elseif ($_GET['action'] == 'feedback') {
          if (isset($_GET['id']) && isset($_GET['name'])){
            addfeedback($_GET['id'],$_POST['review'],$_GET['name']);
            $msgmdp = 'Votre feedback est bien reçu , merci beaucoup.';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/mesReservations.php?msg='.$msgmdp);
            exit;
          }
        }
        elseif ($_GET['action'] == 'resSA') {
           if (isset($_GET['id']) && isset($_GET['hours']) && isset($_GET['totalprice'])){
             if ($_POST['adress']===$_SESSION['ADDRESS_CLI']) {
               $adress=$_POST['adress'];
             } else {
               $adress=$_POST['autreaddresse'];
             }
             $email = $_SESSION['EMAIL_USER'];
            addreservationSA($_GET['id'],$_POST['date'],$_GET['hours'],$_GET['totalprice'],$_POST['staff'],$_POST['time'],$_POST['animal'],$_GET['balance'],$adress,$email);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre reservation est effectué avec succès';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/mesReservations.php?msg='.$msgmdp);
            exit;
          }
        }
        elseif ($_GET['action'] == 'cancelRes') {
          if (isset($_GET['idres'])){
            $id=$_GET['idres'];
            $idcli=$_GET['id'];
            $totalprice=$_GET['totalprice'];
            $solde=$_GET['solde'];
            $newbalance=$solde+$totalprice;
            deleteres($id,$idcli);
            returnmonney($idcli,$newbalance);
            refreshsessioncli($idcli);
            $msgmdp = "Votre reservation ID ".$id." est annulé";
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/mesReservations.php?msg='.$msgmdp);
            exit;
          }
        }
        elseif ($_GET['action'] == 'resAA') {
          if (isset($_GET['id']) && isset($_GET['hours']) && isset($_GET['totalprice'])){
            if ($_POST['adress']===$_SESSION['ADDRESS_CLI']) {
              $adress=$_POST['adress'];
            } else {
              $adress=$_POST['autreaddresse'];
            }
            $email = $_SESSION['EMAIL_USER'];
            $datestart=$_POST['datestart'];
            if ($_POST['offer']==2) {
              $dateend=date('Y-m-d', strtotime($datestart. ' + 3 months'));
            } else {
              if ($_POST['offer']==3) {
              $dateend=date('Y-m-d', strtotime($datestart. ' + 6 months'));
            } else {
              $dateend=date('Y-m-d', strtotime($datestart. ' + 12 months'));
            }

            }
            $days=$_POST['day'];
            addreservationAA($_GET['id'],$datestart,$dateend,$_GET['hours'],$_GET['totalprice'],$_POST['staff'],$_POST['time'],$_POST['animal'],$_GET['balance'],$adress,$email,$days,$_POST['offer']);
            refreshsessioncli($_GET['id']);
            $msgmdp = 'Votre reservation est effectué avec succès';
            header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/mesReservations.php?msg='.$msgmdp);
            exit;
          }
        }
      elseif ($_GET['action'] == 'disableaccountcli') {
        $id= $_GET['id'];
        disableclient($id);
        logout();
      }

      elseif ($_GET['action'] == 'answermsg') {
        $reponse=$_POST['reponse'];
        $email=$_GET['email'];
        $idmsg=$_GET['idmsg'];
        echo $reponse."   ".$email;
        answermsg($email,$reponse);
        markasanswered($idmsg);
        $msgmdp = 'Votre réponse a été bien envoyé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/inbox.php?msg='.$msgmdp);
        exit;
      }
      elseif ($_GET['action'] == 'deletemsg') {
        $idmsg=$_GET['idmsg'];
        deletemsg($idmsg);
        $msgmdp = 'Le message est supprimé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/inbox.php?msg='.$msgmdp);
      }
      elseif ($_GET['action']=='answerticket') {
        $idcli=$_GET['idcli'];
        $idticket=$_GET['idticket'];
        $objet=$_GET['objet'];
        $message=$_POST['reponse'];
        answerticket($idcli,$message);
        markticketasanswered($idticket);
        $msgmdp = 'Votre réponse a été bien envoyé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/BoiteTickets.php?msg='.$msgmdp);
        exit;
      }
      elseif ($_GET['action']=='closeticket') {
        $idticket=$_GET['idticket'];
        closeticket($idticket);
        $msgmdp = 'Ticket Numero '.$idticket.' est fermé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/BoiteTickets.php?msg='.$msgmdp);
        exit;
      }
      elseif ($_GET['action']=='validaccount') {
        $idcli=$_GET['idcli'];
        validaccount($idcli);
        $msgmdp = 'Client ID '.$idcli.' est validé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestioncli.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='deleteclient') {
        $idcli=$_GET['idcli'];
        deleteclient($idcli);
        $msgmdp = 'Client ID '.$idcli.' est rettiré';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestioncli.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='desactivateclient') {
        $idcli=$_GET['idcli'];
        desactivateclient($idcli);
        $msgmdp = 'Client ID '.$idcli.' est desactivé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestioncli.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='activeclient') {
        $idcli=$_GET['idcli'];
        activeclient($idcli);
        $msgmdp = 'Client ID '.$idcli.' est active maintenant';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestioncli.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='deleteemployee') {
        $idemlpoyee=$_GET['idemployee'];
        deleteemployee($idemlpoyee);
        $msgmdp = 'Employé ID '.$idemlpoyee.' est supprimé';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestionassistant.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='activeemployee') {
        $idemlpoyee=$_GET['idemployee'];
        activeemployee($idemlpoyee);
        $msgmdp = 'Employé ID '.$idemlpoyee.' est active maintenant';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestionassistant.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='desactivateemployee') {
        $idemlpoyee=$_GET['idemployee'];
        desactivateemployee($idemlpoyee);
        $msgmdp = 'Employé ID '.$idemlpoyee.' est inactive maintenant';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestionassistant.php?msg='.$msgmdp);
          exit;
      }
      elseif ($_GET['action']=='addnewemployee') {
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $birth=$_POST['birth'];
        $mobile=$_POST['mobile'];
        $cin=$_POST['cin'];
        $isadmin=$_POST['isadmin'];
        $idemployee=addemployee($fname,$lname,$birth,$mobile,$cin,$isadmin);
        adduseremlpoyee($idemployee,$email,$password);
        $msgmdp = 'Employé ID '.$idemployee.' est Ajouté avec succès';
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/gestionassistant.php?msg='.$msgmdp);
          exit;

      }
      elseif ($_GET['action'] == 'rejectRes') {
        if (isset($_GET['idres'])){
          $id=$_GET['idres'];
          $idcli=$_GET['id'];
          $totalprice=$_GET['totalprice'];
          $solde=$_GET['solde'];
          $newbalance=$solde+$totalprice;
          deleteres($id,$idcli);
          returnmonney($idcli,$newbalance);
          $msgmdp = "La réservation ID ".$id." est rejeté";
          header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/demandesReservations.php?msg='.$msgmdp);
          exit;
        }
      }
      elseif ($_GET['action'] == 'validatereservation') {
        if (isset($_GET['idres'])){
          $idres=$_GET['idres'];
          validatereservation($idres);
          $msgmdp = "La réservation ID ".$idres." est validé";
          header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/demandesReservations.php?msg='.$msgmdp);
          exit;
        }


      }
      elseif ($_GET['action'] == 'endreservation') {
        if (isset($_GET['idres'])){
          $idres=$_GET['idres'];
          endreservation($idres);
          $msgmdp = "La réservation ID ".$idres." est terminé";
          header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/demandesReservations.php?msg='.$msgmdp);
          exit;
        }
      }
      elseif ($_GET['action'] == 'verifyday') {
        $date=$_POST['date'];
        $msgmdp = verifyday($date);
        header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/demandesReservations.php?msg='.$msgmdp);
        exit;
      }
        else {
          header('location:view/acceuil.php');exit;
        }
      }
    else {
        header('location:view/acceuil.php');
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    $msgmdp = $errorMessage;
    header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/errorpage.php?msg='.$msgmdp);
    exit;
}
