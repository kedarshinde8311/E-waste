<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wastebin extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model('DBModel', 'dbmodel');
        $this->load->model('VehiclesModel', 'vehicles');
        $this->load->model('WastebinsModel', 'wastebins');
        $this->load->model('FirebaseModel', 'firebase');		
    }

    public function send()
    {
        $firebaseid = "dzjcJubtiYQ:APA91bFABIxYrtUJUaz-RNb0Zq1JxHaK0J042QjbvyQ0IdGMnA84j8I6xy_lL5Y8ZicCtqBFtacYv1CkqmEgfjtcXSaGAVrEe2tVWxsOKQEtunoyC8De9HNEFBfPzz3PyoLNqNL0yNXv";
        $title = "Patient on high alert";
        $message = "Trial notification";
        $imageurl = base_url('assets/alert.jpg');
        $this->firebase->sendNotification($firebaseid, $title, $message, $imageurl);
    }

    public function index()
    {
        if(isset($_GET["bid"]) && isset($_GET["stat"]))
        {
            $bid = $_GET["bid"];
            $stat = $_GET["stat"];
            date_default_timezone_set('Asia/Kolkata');
            $now = date('Y-m-d H:i:s');	
            $query = "UPDATE wastebins SET status =".$stat.",updatedon ='".$now."' WHERE id = ".$bid;
            $wastebins = $this->wastebins->getsinglevalue($bid) ;
            $this->db->query($query);
            echo "success" ;
        }
        else
        {
                echo "fail";
        }
        if($stat > 3)
        {
            $query = "SELECT name AS svalue FROM wastebins WHERE id = " . $bid;
            $binname = $this->dbmodel->getsinglevalue($query);
            $query = "SELECT * FROM vehicles ";
            $vehicles = $this->dbmodel->getdata($query);
            $query = "DELETE FROM vehicledustbindistance WHERE bid = " . $bid;
            $this->db->query($query);
            foreach($vehicles as $vehicle)
            {
                $distance = $this->haversineGreatCircleDistance($vehicle->longitude,$vehicle->latitude,$wastebins->longitude,$wastebins->latitude);
                $query = "INSERT INTO vehicledustbindistance(bid, vid, distance) ";
                $query .= "VALUES(" . $bid . ", " . $vehicle->id . ", " . $distance . ")";
                $this->db->query($query);
            }
            $query = "SELECT V.*, VD.distance FROM vehicles AS V, vehicledustbindistance AS VD WHERE V.id = VD.vid ORDER BY distance LIMIT 1";
            $nearestvehicles = $this->dbmodel->getdata($query);
            foreach($nearestvehicles as $vehicle)
            {
                //echo "<br />" . $vehicle->id . " - " . $vehicle->distance;

                $title = "Wastebin is filled.";
                $message = "Hello " . $vehicle->drivername . ", your vehicle " . $vehicle->name . " is approximately " . $vehicle->distance . " km from filled wastebin " . $binname . ".\nCheck if you can collect waste from there.";
                $imageurl = base_url('assets/alert.jpg');

                $this->firebase->sendNotification($vehicle->firebaseid, $title, $message, $imageurl);   
              //  print_r($vehicle);       
            }
        }
    }


    function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
      
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ($angle * $earthRadius)/100;
    }
}
