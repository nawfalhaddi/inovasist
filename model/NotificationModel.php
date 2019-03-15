<?php
require_once("Db.php");
/**
 *
 */
class Notification extends Db
{

    function countUnredNotification($id){
    	$db = $this->dbConnect();
    	$req=$db->prepare('SELECT * FROM notification WHERE IS_READ=0 AND ID_CLI= ?');
		$req->execute(array($id));
		$num=$req->rowCount();
		return $num;
    }


		function gettickets($id){
	        $db = $this->dbConnect();
	        $req = $db->query("SELECT ID_TICKET,OBJECT_TICKET,CONTENT_TICKET,ID_STATE FROM ticket
					WHERE ID_CLI='".$id."'ORDER BY ID_TICKET DESC");
	        return $req;
	    }

   function getreservations($id){
      $db = $this->dbConnect();
      $req = $db->query("SELECT r.*,o.*,c.*,s.* FROM reservation r INNER JOIN offer o on o.ID_OFFER = r.ID_OFFER  INNER JOIN client c on c.ID_CLI = r.ID_CLI INNER JOIN state s on s.ID_STATE = r.ID_STATE WHERE c.ID_CLI='".$id."' ORDER BY r.ID_RES DESC");
      return $req;
   }

     function getinbox(){
       $db = $this->dbConnect();
       $req = $db->query("SELECT * FROM message WHERE IS_ANSWERED=0 ORDER BY DATE_MESSAGE DESC");
       return $req;
     }

     function listalltickets(){
       $db = $this->dbConnect();
       $req = $db->query("SELECT t.*,c.*,s.*
                          FROM ticket t
                          INNER JOIN client c on c.ID_CLI = t.ID_CLI
                          INNER JOIN state s on s.ID_STATE = t.ID_STATE
                          WHERE t.ID_STATE=1
                          ORDER BY t.ID_TICKET ASC");
       return $req;
     }
     function listallclients($varification){
       $db = $this->dbConnect();
       $req = $db->query('SELECT * FROM client WHERE IS_VERIFIED='.$varification.' ORDER BY ID_CLI ASC');
       return $req;
     }
  function listallemployee($varification){
    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM employee WHERE IS_ADMIN=".$varification." ");
    return $req;
  }
  function listallreservationSA(){
    $db = $this->dbConnect();
    $req = $db->query("SELECT r.*,c.*,s.* FROM reservation r INNER JOIN client c on c.ID_CLI = r.ID_CLI INNER JOIN state s on s.ID_STATE = r.ID_STATE WHERE r.ID_OFFER=1 AND (r.ID_STATE=1 OR r.ID_STATE=4) ORDER BY r.ID_STATE ASC");
    return $req;
  }
  function listallreservationAA(){
    $db = $this->dbConnect();
    $req = $db->query("SELECT r.*,c.*,s.* FROM reservation r INNER JOIN client c on c.ID_CLI = r.ID_CLI INNER JOIN state s on s.ID_STATE = r.ID_STATE WHERE r.ID_OFFER!=1 AND (r.ID_STATE=1 OR r.ID_STATE=4) ORDER BY r.ID_STATE ASC");
    return $req;
  }

		function getNotifications($id){
	        $db = $this->dbConnect();
	        $req = $db->query('SELECT DATE_FORMAT(DATE_NOTIF, \'%d/%m/%Y: %Hh%imin\') AS DATE_NOTIF_FR ,CONTENT_NOTIF FROM notification WHERE ID_CLI='.$id.' ORDER BY DATE_NOTIF DESC LIMIT 0, 10');

	        return $req;
	    }

}
