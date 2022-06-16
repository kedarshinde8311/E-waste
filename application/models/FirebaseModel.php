<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FirebaseModel extends CI_Model{
	function __construct() {
        parent::__construct();
	}
	
	public function sendNotification($firebaseid, $title, $message, $imageurl)//, $patientid, $patientname)
	{
			ini_set('display_errors', 'On');
			require_once 'Firebase.php';
			require_once 'Push.php';
			$firebase = new Firebase();
			$push = new Push();
			$push->setTitle($title);
			$push->setMessage($message);
			$push->setImage($imageurl);
			// $push->setPatientId($patientid);
			// $push->setPatientName($patientname);
			$json = $push->getPush();
			$firebase->send_notification($firebaseid, $json, "Android");
	}
}
