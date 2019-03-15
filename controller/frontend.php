<?php
// Chargement des classes
require_once('model/Client.php');
require_once('model/User.php');
function addMember()
{
	if (isset($_POST['submit']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['birth'])  && isset($_POST['telephone']) && isset($_POST['numcin']) && isset($_POST['job']) && isset($_POST['address']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) &&isset($_FILES['cartenational']) ){

		$numcin= strtoupper($_POST['numcin']);
		$email= strtolower($_POST['email']);
		$numtel=$_POST['telephone'];
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];
		$file=$_FILES['cartenational'];

		$client= new Client;
		$existemail = $client->existemail($email);
		$existcin = $client->existcin($numcin);
		$existnumtel=$client->existnumtel($numtel);


		if ($existemail === true || $existcin === true) {
			throw new Exception('Cet Email ou Numero de la carte d\'indentité existe déja! essayez de nouveau');
		}
		else{

			if ($existnumtel === true) {
				throw new Exception('Numero de telephone est déja utilisé par  un autre client');

			} else {
				if ($pass1 === $pass2) {
				// Hachage du mot de passe
				$pass_hache = password_hash($pass1, PASSWORD_DEFAULT);
				//upload de fichier
                 $cinlocation=$client->upload($file);

				$compte=$client->createAccountCli($_POST['fname'],$_POST['lname'],$_POST['birth'],$numtel,$numcin,$cinlocation,$_POST['job'],$_POST['address'],$_POST['sexe'],$_POST['email'],$pass_hache);
			}
			else{
				throw new Exception('Les mots de passe ne sont pas identiques!essayez de nouveau');
			}
			}

		}


	}
	else{
		throw new Exception('Veuillez remplir tous les champs s\'il vous plait !');
	}

}

function login()
{
	if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
		$email= strtolower($_POST['email']);
		$password=$_POST['password'];
		$user=New User;
		$user->Connect($email,$password);
	} else {
		throw new Exception('veuillez remplir tous les champs Email et mot de passe s\'il vous plait');
	}

}
function logout(){
	session_start();
	session_unset();
	session_destroy();
	header("location: index.php");
	exit();
}


function readNotification($id){
	$client= new Client;
	$client->readnotif($id);

}
function subscribe($email)
{
	$client= new Client;
	$existemail = $client->existsubscriber($email);
	if ($existemail === true){
		header('location:view/acceuil.php');
	}
		else {
			$client->addToNewsletter($email);
			$client->sendmail($email,'subscribe');
			header('location:view/acceuil.php');
		}
}

function receivemessage($nom,$email,$msg)
{
		$client= new Client;
		$client->receivemsg($nom,$email,$msg);
		$client->sendmail($email,'contact');
}
 function receiveticket($id,$object,$msg,$email)
{
	$client= new Client;
	$client->receivetkt($id,$object,$msg);
	$client->sendmail($email,'ticket');
	$notification='Nous avons bien reçu votre ticket, nous allons le traiter dans quelques minutes';
	$client->sendNotification($id,$notification);
}

function changepasswordcli($id,$oldpass,$newpass1,$newpass2){
	$client= new Client;
	$row= $client->getInfoUserCli($id);
	$isPasswordCorrect = password_verify($oldpass, $row['PASSWORD_USER']);
	if ($isPasswordCorrect) {
		if ($newpass1==$newpass2) {
			$pass_hache = password_hash($newpass1, PASSWORD_DEFAULT);
			$iduser=$row['ID_USER'];
			$client->updatepassword($iduser,$pass_hache);
			$notification="Votre mot de passe est changé avec succès ";
			$client->sendNotification($id,$notification);
		} else {
			throw new \Exception("Veuillez tapez s'il vous plait deux mots de passe identiques");

		}

	} else {
		throw new \Exception("L'ancien mot de passe n'est pas correct");

	}


}

function changemobile($id,$tele){
	$client= new Client;
	$existnumtel=$client->existnumtel($tele);
if ($existnumtel) {
	throw new \Exception("Ce numero de télephone existe déja");

} else {
	$client->updatenum($id,$tele);
	$notification="Votre nouveau numero de télephone est ".$tele."";
	$client->sendNotification($id,$notification);
}


}
function changeadress($id,$adress){
	$client= new Client;
	$client->changeadr($id,$adress);
	$notification="Votre nouvelle adresse est ".$adress."";
	$client->sendNotification($id,$notification);
}

function addamount($id,$amount){
$client= new Client;
$row=$client->getInfoCli($id);
$soldeactuel=$row['BALANCE_CLI'];
$nouveausolde=$amount+$soldeactuel;
$client->updatebalance($id,$nouveausolde);
$notification="Un versement d'un montant de  ".$amount." MAD a été effectué par vous. Votre nouveau solde est ".$nouveausolde." MAD";
$client->sendNotification($id,$notification);
}

function refreshsessioncli($id){
	$user= new User;
	$user->setsessionscli($id);
}
function addfeedback($id,$review,$name){
	$client= new Client;
	$client->addfeed($id,$review,$name);
}
function addreservationSA($id,$date,$hours,$totalprice,$staff,$time,$animal,$balance,$adress,$email){
	if ($balance > $totalprice) {
		$newbalance=$balance-$totalprice;
		$client= new Client;
		$idres=$client->addresSA($id,$date,$hours,$totalprice,$staff,$time,$animal,$adress);
		$client->updatebalance($id,$newbalance);
		$notification="Votre réservation a été bien effectué.";
		$client->sendNotification($id,$notification);
		$client->sendmailspecific($email,'reservationSA',$idres,$hours,$totalprice,$staff,$time,$adress,' ',' ');
	} else {
		$msgmdp = "Votre solde n'est pas suffisant pour effectuer la réservation.<br>Veuillez ajouter des fonds s'il vous plait";
		header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/reservationSA.php?error='.$msgmdp);
		exit;
	}

}

function addreservationAA($id,$datestart,$dateend,$hours,$totalprice,$staff,$time,$animal,$balance,$adress,$email,$days,$offer){
	if ($balance > $totalprice) {
		$newbalance=$balance-$totalprice;
		$client= new Client;
		$idres=$client->addresAA($id,$offer,$datestart,$dateend,$hours,$totalprice,$staff,$time,$animal,$adress);
		$client->addlinesforres($days,$datestart,$offer,$idres,$hours,$staff);
		$client->updatebalance($id,$newbalance);
		$notification="Votre réservation a été bien effectué.";
		$client->sendNotification($id,$notification);
		$client->sendmailspecific($email,'reservationAA',$idres,$hours,$totalprice,$staff,$time,$adress,$datestart,$dateend);
	} else {
		$msgmdp = "Votre solde n'est pas suffisant pour effectuer la réservation.<br>Veuillez ajouter des fonds s'il vous plait";
		header('Location: http://'.$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']).'view/reservationSA.php?error='.$msgmdp);
		exit;
	}

}

function deleteres($id,$idcli){
	$client= new Client;
	$client->deletereservation($id);
	$client->deletereservationline($id);
	$idres=$id;
	$notification = "Votre reservation ID   ".$idres." est annulé.";
	$client->sendNotification($idcli,$notification);
}
function returnmonney($idcli,$newbalance){
	$client= new Client;
	$client->updatebalance($idcli,$newbalance);
}
function disableclient($id){
	$client= new Client;
	$client->disableaccountcli($id);
}
function answermsg($email,$reponse){
	$client= new Client;
	$client->mailanswer($email,$reponse);
}
function markasanswered($idmsg){
	$client= new Client;
	$client->markasanswered($idmsg);
}
function deletemsg($idmsg){
	$client= new Client;
	$client->deletemsg($idmsg);
}
function answerticket($idcli,$message)
{
$client= new Client;
$row= $client->getInfoUserCli($idcli);
$email=$row['EMAIL_USER'];
$client->mailanswer($email,$message);
}
function markticketasanswered($idticket){
	$client= new Client;
	$client->markticketasanswered($idticket);
}

function closeticket($idticket){
	$client= new Client;
		$client->closeticket($idticket);
}
function validaccount($idcli){
	$client= new Client;
	$client->validaccount($idcli);
}
function  deleteclient($idcli){
	$client= new Client;
	$client->deleteclient($idcli);
}
function  desactivateclient($idcli){
	$client= new Client;
	$client->desactivateclient($idcli);
}
function activeclient($idcli){
	$client= new Client;
	$client->activeclient($idcli);
}
function   deleteemployee($idemlpoyee){
	$client= new Client;
	$client->deleteemployee($idemlpoyee);
}
function activeemployee($idemlpoyee){
	$client= new Client;
	$client->activeemployee($idemlpoyee);
}
function desactivateemployee($idemlpoyee){
	$client= new Client;
	$client->desactivateemployee($idemlpoyee);
}
function addemployee($fname,$lname,$birth,$mobile,$cin,$isadmin){
	$client= new Client;
	$idemployee=$client->addemployee($fname,$lname,$birth,$mobile,$cin,$isadmin);
	return $idemployee;
}
function   adduseremlpoyee($idemployee,$email,$password){
		$pass_hache = password_hash($password, PASSWORD_DEFAULT);
		$client= new Client;
		$client->adduseremlpoyee($idemployee,$email,$pass_hache);
}
function validatereservation($idres){
	$client= new Client;
	$client->validatereservation($idres);
}
function endreservation($idres){
	$client= new Client;
	$client->endreservation($idres);
}
function verifyday(){
	$client= new Client;
	$verification=$client->verifyday($date);
	if ($verification>80) {
		$msg="il n y'a plus d'heures de service disponible dans ce jour là";
	} else {
		$msg="Vous pouvez accepter encore une demande";
	}
	return $msg ;

}
