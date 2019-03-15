<?php
require_once("model/Db.php");
/**
 *
 */
class Client extends Db
{


	 public function createAccountCli($fnamecli,$lnamecli,$birth,$phone,$cinnum,$cinlocation,$jobcli,$address,$sex,$email,$password)
    {
        $db = $this->dbConnect();
        $inscription = $db->prepare('INSERT INTO client(FNAME_CLI, LNAME_CLI, BIRTH_DATE, PHONE_NUM , CIN_NUM , CIN_LOCATION, JOB_CLI, ADDRESS_CLI, SEX_CLI, BALANCE_CLI, IS_ACTIF, IS_VERIFIED) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, 0,true ,false )');
        $affectedLines = $inscription->execute(array($fnamecli,$lnamecli,$birth,$phone,$cinnum,$cinlocation,$jobcli,$address,$sex));
        if ($affectedLines===true) {
        	 $sql = $db->query("SELECT ID_CLI FROM client WHERE PHONE_NUM='".$phone."' AND CIN_NUM='".$cinnum."' AND LNAME_CLI='".$lnamecli."' AND ADDRESS_CLI='".$address."'");
        	 	while($donnees = $sql->fetch()) {
        	 		$id=$donnees['ID_CLI'];
        	 		$newline=$this->addUserCli($id,$email,$password);
      		  	 }
      		  	 if ($newline===true) {
              $notification='Bienvenue chez Inovasist , veuillez attendre la validation de votre compte avant de passer votre première réservation';
        	 		$this->sendmail($email,'inscription');
              $this->sendNotification($id,$notification);
							$this->addToNewsletter($email);
        	 		$sql->closeCursor();
                    return $newline;
        	 	}

        }


    }
     public function addUserCli($idcli,$email,$password)
    {
    	$db = $this->dbConnect();
    	$adduser = $db->prepare('INSERT INTO user (ID_CLI, EMAIL_USER, PASSWORD_USER) VALUES (?,?,?);');
    	$newline = $adduser->execute(array($idcli,$email,$password));
    	return $newline;
    }

    public function existemail($email)
    {
    		$db = $this->dbConnect();
    		$stmt=$db->query("SELECT * FROM user WHERE EMAIL_USER='".$email."'");
    		if ( $stmt->rowCount() > 0) {
    			$answer= true;
    		}
            else{
                $answer= false;
            }
            return $answer;

    }

      public function existcin($numcin)
    {
            $db = $this->dbConnect();
            $stmt=$db->query("SELECT * FROM client WHERE CIN_NUM='".$numcin."'");
            if ( $stmt->rowCount() > 0) {
                $answer= true;
            }
            else{
                $answer= false;
            }
            return $answer;

    }

     public function existnumtel($numtel)
    {
            $db = $this->dbConnect();
            $stmt=$db->query("SELECT * FROM client WHERE PHONE_NUM='".$numtel."'");
            if ( $stmt->rowCount() > 0) {
                $answer= true;
            }
            else{
                $answer= false;
            }
            return $answer;

    }

    function upload($file){
                $file_tmp=$file['tmp_name'];
                $file_name=$file['name'];
                $file_type=$file['type'];
                $file_size=$file['size'];
                $file_store="public/upload/cin/".$file_name;
                if($file_type != " image/jpg" && $file_type  != "image/png" && $file_type != "image/jpeg"
                && $file_type != "application/pdf" ) {
                throw new Exception("Desolé seulement les fichiers jpg , png , jpeg et pdf sont autorisé ");

                }
                else{
                    if(move_uploaded_file($file_tmp,$file_store)){
                        return $file_store;
                        }
                    else{
                        throw new Exception("Il y a une erreur");
                        }
                }


    }

    function readnotif($id){
        $db = $this->dbConnect();
        $req=$db->query('UPDATE notification  SET IS_READ=1 WHERE ID_CLI= '.$id.'');
    }

		public function existsubscriber($email)
		{
				$db = $this->dbConnect();
				$stmt=$db->query("SELECT * FROM newsletter WHERE EMAIL_NEWS='".$email."'");
				if ( $stmt->rowCount() > 0) {
					$answer= true;
				}
						else{
								$answer= false;
						}
						return $answer;

		}
		function receivemsg($nom,$email,$msg)
		{
		$db = $this->dbConnect();
		$addmsg = $db->prepare('INSERT INTO message (NAME, EMAIL, CONTENT_MESSAGE , DATE_MESSAGE, IS_ANSWERED) VALUES (?,?,?,NOW(),0);');
		$newline = $addmsg->execute(array($nom,$email,$msg));


		}

		function receivetkt($id,$object,$msg)
		{
			$db = $this->dbConnect();
			$addticket = $db->prepare('INSERT INTO ticket (ID_STATE, ID_CLI, OBJECT_TICKET , CONTENT_TICKET) VALUES (?,?,?,?);');
			$newline = $addticket->execute(array(1,$id,$object,$msg));
		}
		function updatepassword($id,$pass_hache){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE user SET PASSWORD_USER='".$pass_hache."' WHERE ID_USER='".$id."'");
		}
		function updatenum($id,$tele){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE client SET PHONE_NUM='".$tele."' WHERE ID_CLI='".$id."'");
		}
		function changeadr($id,$adress){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE client SET ADDRESS_CLI='".$adress."' WHERE ID_CLI='".$id."'");
		}
		function updatebalance($id,$nouveausolde){
			$db = $this->dbConnect();
				$stmt=$db->query("UPDATE client SET BALANCE_CLI='".$nouveausolde."' WHERE ID_CLI='".$id."'");
		}
		function addfeed($id,$review,$name){
			$db = $this->dbConnect();
			$addfeed = $db->prepare('INSERT INTO feedback (ID_CLI, FEEDBACK_CONTENT, FEEDBACK_NAME) VALUES (?,?,?);');
			$newline = $addfeed->execute(array($id,$review,$name));
		}
		function addresSA($id,$date,$hours,$totalprice,$staff,$time,$animal,$adress){
			$db = $this->dbConnect();
			$addressa = $db->prepare('INSERT INTO reservation (ID_CLI, ID_STATE, ID_OFFER,START_DATE,FINAL_DATE,HOURS,TOTAL_PRICE,STAFF,RESERVATION_TIME,EXIST_ANIMAL,RESERVATION_ADRESS) VALUES (?,?,?,?,?,?,?,?,?,?,?);');
			$newline = $addressa->execute(array($id,1,1,$date,$date,$hours,$totalprice,$staff,$time,$animal,$adress));
			$row=$this-> getreservation($id);
			$idres=$row['ID_RES'];
			$row=$this->addresline($idres,$date,$hours,$staff);
			return $idres;
		}
		function addresAA($id,$offer,$datestart,$dateend,$hours,$totalprice,$staff,$time,$animal,$adress){
			$db = $this->dbConnect();
			$addressa = $db->prepare('INSERT INTO reservation (ID_CLI, ID_STATE, ID_OFFER,START_DATE,FINAL_DATE,HOURS,TOTAL_PRICE,STAFF,RESERVATION_TIME,EXIST_ANIMAL,RESERVATION_ADRESS) VALUES (?,?,?,?,?,?,?,?,?,?,?);');
			$newline = $addressa->execute(array($id,1,$offer,$datestart,$dateend,$hours,$totalprice,$staff,$time,$animal,$adress));
			$row=$this-> getreservation($id);
			$idres=$row['ID_RES'];
			return $idres;
		}

		function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

		    $dates = array();
		    $current = strtotime($first);
		    $last = strtotime($last);

		    while( $current <= $last ) {

		        $dates[] = date($output_format, $current);
		        $current = strtotime($step, $current);
		    }

		    return $dates;
		}



		function addlinesforres($days,$datestart,$offer,$idres,$hours,$staff){
		$db = $this->dbConnect();
		switch ($offer) {
		  case '2':
		  $dateend=date('Y-m-d', strtotime($datestart. ' + 3 months'));
		  break;
		  case '3':
		    $dateend=date('Y-m-d', strtotime($datestart. ' + 6 months'));
		  break;
		  case '4':
		    $dateend=date('Y-m-d', strtotime($datestart. ' + 12 months'));
		  break;
		}


		  foreach ($days as $key => $selectedday) {
		  $dates=$this->date_range($datestart, $dateend, $step = '+1 day', $output_format = 'Y-m-d' );
		    foreach ($dates as $key => $day) {
		      $dayOfWeek = date("l", strtotime($day));

		        if(($dayOfWeek == $selectedday) ){
							$this->addresline($idres,$day,$hours,$staff);
						}
		    }
		  }
		}


		function addresline($idres,$date,$hours,$staff){
			$db = $this->dbConnect();
			$addresline = $db->prepare('INSERT INTO reeservation_lines (ID_RES, RESERVATION_DATE, HOURS_RES_LINE,STAFF_RES_LINE) VALUES (?,?,?,?);');
			$newline = $addresline->execute(array($idres,$date,$hours,$staff));
		}
		function deletereservation($id){
			$db = $this->dbConnect();
			$stmt=$db->query("DELETE FROM reservation WHERE ID_RES=".$id."");
		}
		function deletereservationline($id){
			$db = $this->dbConnect();
			$stmt=$db->query("DELETE FROM reeservation_lines WHERE ID_RES=".$id."");
		}
		function disableaccountcli($id){
			$db = $this->dbConnect();
			$db->query("UPDATE client SET IS_ACTIF=0 WHERE ID_CLI=".$id."");

		}
		function mailanswer($email,$reponse){
	    	$to = ''.$email.'';
			$subject = "Inovasist";
			$message = "
			<html>
			<head>
			<title>HTML email</title>
			</head>
			<body>
			<h1></h1>
			<p>".$reponse."</p>
			<p><b>Inovasist's team vous souhaite une bonne journée .</b></p>

			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <Inovasist Team>' . "\r\n";

			mail($to,$subject,$message,$headers);

		}
		function markasanswered($idmsg){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE message SET IS_ANSWERED=1 WHERE ID_MESSAGE=".$idmsg."");
		}
		function deletemsg($idmsg){
			$db = $this->dbConnect();
			$stmt=$db->query("DELETE FROM message WHERE ID_MESSAGE=".$idmsg."");
		}
		function markticketasanswered($idticket){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE ticket SET IS_ANSWERED=1 WHERE ID_TICKET=".$idticket."");
		}
		function closeticket($idticket){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE ticket SET ID_STATE=2 WHERE ID_TICKET=".$idticket."");
		}
		function validaccount($idcli){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE client SET IS_VERIFIED=1 WHERE ID_CLI=".$idcli."");
		}
		function deleteclient($idcli){
			$db = $this->dbConnect();
			$stmt=$db->query("DELETE FROM client WHERE ID_CLI=".$idcli."");
			$stmt2=$db->query("DELETE FROM user WHERE ID_CLI=".$idcli."");
		}
		function desactivateclient($idcli){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE client SET IS_ACTIF=0 WHERE ID_CLI=".$idcli."");
		}
		function activeclient($idcli){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE client SET IS_ACTIF=1 WHERE ID_CLI=".$idcli."");
		}
		function deleteemployee($idemlpoyee){
			$db = $this->dbConnect();
			$stmt=$db->query("DELETE FROM employee WHERE ID_EMPLOYEE=".$idemlpoyee."");
			$stmt2=$db->query("DELETE FROM user WHERE ID_EMPLOYEE=".$idemlpoyee."");
		}
		function activeemployee($idemlpoyee){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE employee SET IS_ACTIVE=1 WHERE ID_EMPLOYEE=".$idemlpoyee."");
		}
		function desactivateemployee($idemlpoyee){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE employee SET IS_ACTIVE=0 WHERE ID_EMPLOYEE=".$idemlpoyee."");
		}
		function addemployee($fname,$lname,$birth,$mobile,$cin,$isadmin){
			$db = $this->dbConnect();
			$addemployee = $db->prepare('INSERT INTO employee (FNAME_EMPLOYEE, LNAME_EMPLOYEE, BIRTH_DATE_EMPLOYEE,PHONE_NUM_EMPLOYEE,CIN_NUM_EMPLOYEE,IS_ACTIVE,IS_ADMIN) VALUES (?,?,?,?,?,?,?);');
			$newline = $addemployee->execute(array($fname,$lname,$birth,$mobile,$cin,1,$isadmin));
			$stmt=$db->query("SELECT * FROM employee WHERE CIN_NUM_EMPLOYEE='".$cin."'");
			$row=$stmt->fetch();
			$idemployee=$row['ID_EMPLOYEE'];
			return $idemployee;
		}
		function adduseremlpoyee($idemployee,$email,$pass_hache){
			$db = $this->dbConnect();
			$addresline = $db->prepare('INSERT INTO user (ID_EMPLOYEE, EMAIL_USER,PASSWORD_USER) VALUES (?,?,?);');
			$newline = $addresline->execute(array($idemployee,$email,$pass_hache));
		}
		function validatereservation($idres){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE reservation SET ID_STATE=4 WHERE ID_RES=".$idres."");
		}
		function endreservation($idres){
			$db = $this->dbConnect();
			$stmt=$db->query("UPDATE reservation SET ID_STATE=2 WHERE ID_RES=".$idres."");
		}
		function verifyday($date){
			$db = $this->dbConnect();
			$stmt=$db->query("SELECT SUM(HOURS_RES_LINE*STAFF_RES_LINE) FROM reeservation_lines WHERE RESERVATION_DATE='".$date."'");
			return $stmt;
		}

}
