<?php
require_once("model/Db.php");
/**
 *
 */
class User extends Db
{

public function Connect($email,$password)
{
		$db = $this->dbConnect();
		//  Récupération de l'utilisateur et de son pass hashé
		$req = $db->prepare('SELECT * FROM user WHERE EMAIL_USER = :email ');
		$req->execute(array('email' => $email));
		$resultat = $req->fetch();
		$idCli=$resultat['ID_CLI'];
		$idEmployee=$resultat['ID_EMPLOYEE'];

		// Comparaison du pass envoyé via le formulaire avec la base
		$isPasswordCorrect = password_verify($password, $resultat['PASSWORD_USER']);

		if (!$resultat)
		{
		    throw new Exception('Mauvais identifiant ou mot de passe !');
		}
		else
		{
		    if ($isPasswordCorrect) {
		        session_start();
		        if (!is_null($idCli)) {
		        	$_SESSION['ID_CLI'] = $idCli;
		        	$row=$this->getInfoCli($idCli);
		        	$_SESSION['FNAME_CLI'] =htmlspecialchars( $row['FNAME_CLI']);
		        	$_SESSION['LNAME_CLI'] =htmlspecialchars($row['LNAME_CLI']);
		        	$_SESSION['BIRTH_DATE'] =htmlspecialchars($row['BIRTH_DATE']);
		        	$_SESSION['PHONE_NUM'] =htmlspecialchars($row['PHONE_NUM']);
		        	$_SESSION['CIN_NUM'] =htmlspecialchars($row['CIN_NUM']);
		        	$_SESSION['CIN_LOCATION'] =htmlspecialchars($row['CIN_LOCATION']);
		        	$_SESSION['JOB_CLI'] =htmlspecialchars($row['JOB_CLI']);
		        	$_SESSION['ADDRESS_CLI'] =htmlspecialchars($row['ADDRESS_CLI']);
		        	$_SESSION['SEX_CLI'] =htmlspecialchars($row['SEX_CLI']);
		        	$_SESSION['BALANCE_CLI'] =htmlspecialchars($row['BALANCE_CLI']);
		        	$_SESSION['IS_ACTIF'] =$row['IS_ACTIF'];
		        	$_SESSION['IS_VERIFIED'] =$row['IS_VERIFIED'];
							$row1=$this->getInfoUserCli($idCli);
							$_SESSION['ID_USER']=htmlspecialchars( $row1['ID_USER']);
							$_SESSION['EMAIL_USER']=htmlspecialchars( $row1['EMAIL_USER']);
							$_SESSION['PASSWORD_USER']=htmlspecialchars( $row1['PASSWORD_USER']);
		        	header('location:view/acceuil.php');
		        }
		        if (!is_null($idEmployee)) {
		        	$_SESSION['ID_EMPLOYEE'] = $idEmployee;
		        	$row=$this->getInfoEmployee($idEmployee);
		        	$_SESSION['FNAME_EMPLOYEE'] =htmlspecialchars($row['FNAME_EMPLOYEE']);
		        	$_SESSION['LNAME_EMPLOYEE'] =htmlspecialchars($row['LNAME_EMPLOYEE']);
		        	$_SESSION['BIRTH_DATE_EMPLOYEE'] =htmlspecialchars($row['BIRTH_DATE_EMPLOYEE']);
		        	$_SESSION['PHONE_NUM_EMPLOYEE'] =htmlspecialchars($row['PHONE_NUM_EMPLOYEE']);
		        	$_SESSION['CIN_NUM_EMPLOYEE'] =htmlspecialchars($row['CIN_NUM_EMPLOYEE']);
		        	$_SESSION['IS_ACTIF'] =$row['IS_ACTIVE'];
		        	$_SESSION['IS_ADMIN'] =$row['IS_ADMIN'];
							$row1=$this->getInfoUserEmployee($idEmployee);
							$_SESSION['ID_USER']=htmlspecialchars( $row1['ID_USER']);
							$_SESSION['EMAIL_USER']=htmlspecialchars( $row1['EMAIL_USER']);
							$_SESSION['PASSWORD_USER']=htmlspecialchars( $row1['PASSWORD_USER']);
		        	header('location:view/acceuil.php');
		        }
		    }
		    else {
		    	throw new Exception('Mauvais identifiant ou mot de passe !');

		    }
		}
}

		function setsessionscli($id){
			session_start();
				$row=$this->getInfoCli($id);
				$_SESSION['FNAME_CLI'] =htmlspecialchars( $row['FNAME_CLI']);
				$_SESSION['LNAME_CLI'] =htmlspecialchars($row['LNAME_CLI']);
				$_SESSION['BIRTH_DATE'] =htmlspecialchars($row['BIRTH_DATE']);
				$_SESSION['PHONE_NUM'] =htmlspecialchars($row['PHONE_NUM']);
				$_SESSION['CIN_NUM'] =htmlspecialchars($row['CIN_NUM']);
				$_SESSION['CIN_LOCATION'] =htmlspecialchars($row['CIN_LOCATION']);
				$_SESSION['JOB_CLI'] =htmlspecialchars($row['JOB_CLI']);
				$_SESSION['ADDRESS_CLI'] =htmlspecialchars($row['ADDRESS_CLI']);
				$_SESSION['SEX_CLI'] =htmlspecialchars($row['SEX_CLI']);
				$_SESSION['BALANCE_CLI'] =htmlspecialchars($row['BALANCE_CLI']);
				$_SESSION['IS_ACTIF'] =$row['IS_ACTIF'];
				$_SESSION['IS_VERIFIED'] =$row['IS_VERIFIED'];
		}
}
