<?php
require_once('../model/NotificationModel.php');
function listNotifications($id){
	$notification= new Notification;
    $notifications = $notification->getNotifications($id);

    return $notifications ;
}
function unreadNotifications($id){
	$notification= new Notification;
	$unreadNotification=$notification->countUnredNotification($id);
	return $unreadNotification;
}

function listtickets($id){
	$ticket= new Notification;
    $tickets = $ticket->gettickets($id);
    return $tickets ;
}
function listreservation($id){
	$reservation= new Notification;
    $reservations = $reservation->getreservations($id);
    return $reservations ;
}
function listinbox(){
	$inbox= new Notification;
  $messages = $inbox->getinbox();
  return $messages ;
}
function listalltickets(){
	$tickets= new Notification;
	$req = $tickets->listalltickets();
	return $req ;
}
function  listallclients($varification){
	$clients= new Notification;
	$req = $clients->listallclients($varification);
	return $req ;
}
function listallemployee($varification){
	$emloyee= new Notification;
	$req = $emloyee->listallemployee($varification);
	return $req ;
}
function listallreservationSA(){
	$reservation= new Notification;
	$req = $reservation->listallreservationSA();
	return $req ;
}

function listallreservationAA(){
	$reservation= new Notification;
	$req = $reservation->listallreservationAA();
	return $req ;
}
