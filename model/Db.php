<?php
class Db
{
	public function dbConnect()
	{
		try {
			$db = new PDO('mysql:host=localhost;dbname=inovasist;charset=utf8', 'root', '');
			return $db;

		}
		catch (Exception $e) {
			error_log($e->getMessage());
	  exit('Something weird happened'); //something a user can understand
		}
	}

	public function getInfoCli($id)
	{	$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM client WHERE ID_CLI = :id ');
		$req->execute(array('id' => $id));
		$resultat = $req->fetch();
		return $resultat;
	}
	public function getInfoEmployee($id)
	{	$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM employee WHERE ID_EMPLOYEE = :id ');
		$req->execute(array('id' => $id));
		$resultat = $req->fetch();
		return $resultat;
	}
	public function getInfoUserCli($id)
	{	$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE ID_CLI = :id ');
		$req->execute(array('id' => $id));
		$resultat = $req->fetch();
		return $resultat;
	}
	public function getInfoUserEmployee($id){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM user WHERE ID_EMPLOYEE = :id ');
		$req->execute(array('id' => $id));
		$resultat = $req->fetch();
		return $resultat;
	}

    public function sendNotification($id,$notification){
    $db = $this->dbConnect();
    $notif = $db->prepare('INSERT INTO notification (ID_CLI, CONTENT_NOTIF, DATE_NOTIF , IS_READ) VALUES (?,?,NOW(),0);');
    $newline = $notif->execute(array($id,$notification));
    return $newline;

    }

		public function sendmail($email,$type)
    {
    	$to = ''.$email.'';
		$subject = "Inovasist";
        switch ($type) {
            case 'inscription':
                $message = "
                <html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                <h1>Bienvenue chez Inovasist</h1>
                <p>Nous vous remercions pour votre confiance . <strong>On va verifier votre compte dans quelques minutes .</strong></p>
                <p>Vous recevrez ulteuriérement un message de confirmation quand votre compte deviendra verifié .</p>
                <p><b>Inovasist's team vous souhaite une bonne journée .</b></p>

                </body>
                </html>
                ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <Inovasist Team>' . "\r\n";
                break;
						case 'subscribe':
						$message = "
						<html>
						<head>
						<title></title>
						</head>
						<body>
						<h1>Bienvenue chez Inovasist</h1>
						<p>Vous êtes abonné maintenant au Newsletter <strong> Inovasist</strong>. Grâce à vous on est les meuilleurs</p>
						<p><b>Inovasist's team vous souhaite une bonne journée .</b></p>

						</body>
						</html>
						";
						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= 'From: <Inovasist Team>' . "\r\n";
						break;
						case 'contact':
						$message = "
						<html>
						<head>
						<title></title>
						</head>
						<body>
						<h1>Merci de nous contacter</h1>
						<p>Nous avons bien reçu votre message , si vous avez besoin d'autre chose n'hesitez pas de nous contacter à nouveau</p>
						<p><b>Inovasist's team vous souhaite une bonne journée .</b></p>

						</body>
						</html>
						";
						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= 'From: <Inovasist Team>' . "\r\n";
						break;
						case 'ticket':
						$message = "
						<html>
						<head>
						<title></title>
						</head>
						<body>
						<h1>Inovasist vous promez de traiter votre ticket le plutôt possible</h1>
						<p>Nous avons bien reçu votre ticket ,Vous trouverez dans votre espace \"tickets\" l'ID et les details de votre ticket. </p>
						<p><b>Inovasist's team vous souhaite une bonne journée .</b></p>

						</body>
						</html>
						";
						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						$headers .= 'From: <Inovasist Team>' . "\r\n";
						break;
        }
		mail($to,$subject,$message,$headers);
    }

		public function addToNewsletter($email)
		{
			$db = $this->dbConnect();
			$new = $db->prepare('INSERT INTO newsletter (EMAIL_NEWS) VALUES (?)');
	    $newline = $new->execute(array($email));
		}
		function getreservation($id){
			$db = $this->dbConnect();
			$req = $db->prepare('SELECT * FROM reservation WHERE ID_CLI = :id ORDER BY ID_RES DESC');
			$req->execute(array('id' => $id));
			$resultat = $req->fetch();
			return $resultat;
		}
		function sendmailspecific($email,$type,$var1,$var2,$var3,$var4,$var5,$var6,$var7,$var8)
    {
    	$to = ''.$email.'';
		$subject = "Inovasist";
        switch ($type) {
            case 'reservationSA':
						$message = "
            <html>
            <head>
            <title></title>
            </head>
            <body>
            <h2>Votre réservation a été bien effectué</h2>
            <p>Nous avons bien reçu votre réservation.</strong></p>
            <p>Voilà les details de votre réservation :</p>
						<p>ID de réservation: ".$var1." <br> Séances : ".$var2." heures <br> Montant payé:".$var3." MAD <br>
						Nombre de personnels:".$var4." personne(s) <br> l'heure: ".$var5." <br> L'adresse: ".$var6."</p>
            <p><b>Inovasist's team vous souhaite une bonne journée.".$var7." </b></p>

            </body>
            </html>
            ";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <Inovasist Team>' . "\r\n";
                break;

								case 'reservationAA':
								$message = "
								<html>
								<head>
								<title></title>
								</head>
								<body>
								<h2>Votre réservation a été bien effectué</h2>
								<p>Nous avons bien reçu votre réservation.</strong></p>
								<p>Voilà les details de votre réservation :</p>
								<p>ID de réservation: ".$var1." <br> Séances : ".$var2." heures <br>Date début de contrat:".$var7."<br> Date fin de contrat : ".$var8." <br>Montant payé:".$var3." MAD <br>
								Nombre de personnels:".$var4." personne(s) <br> l'heure: ".$var5." <br> L'adresse: ".$var6."</p>
								<p><b>Inovasist's team vous souhaite une bonne journée. </b></p>

								</body>
								</html>
								";

										// Always set content-type when sending HTML email
										$headers = "MIME-Version: 1.0" . "\r\n";
										$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
										$headers .= 'From: <Inovasist Team>' . "\r\n";
										break;

        }
		mail($to,$subject,$message,$headers);
    }



}
