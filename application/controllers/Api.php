<?php
require(APPPATH . '/libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS,POST");
class Api extends REST_Controller
{

    public function __construct()
    {
       
		parent::__construct();
		$this->load->model('DBModel', 'dbmodel');
        $this->load->model('VehiclesModel', 'vehicles');
        $this->load->model('WastebinsModel', 'wastebins');
        $this->load->model('LocationsModel', 'locations');
		
    }

     function login_post()
    {
        $mobileno = $this->input->post('mobileno');
        $password = $this->input->post('password');
        $mobileno = str_replace("'", "''", $mobileno);
        $password = str_replace("'", "''", $password);

        $query = "SELECT * FROM vehicles WHERE mobileno = '" . $mobileno . "' AND password = '" . $password . "'";
        $data = $this->dbmodel->getdata($query);
        if (sizeof($data) > 0) {
            $row = $data[0];

            $result['status'] = "success";
            $result['id'] = $row->id;
            $result['name'] = $row->drivername;
            $result['vehicleno'] = $row->name;
            $result['mobileno'] = $row->mobileno;
        } else {
            $result['status'] = "fail";
            $result['id'] = 0;
            $result['name'] = "";
            $result['mobileno'] = "";
        }
       $this->response($result,200);
    }
    function wastebins_post()
    {
       $query = "SELECT id, name, IFNULL(status, 0) AS status, IFNULL(longitude, 0) AS  longitude, IFNULL(latitude, 0) AS  latitude FROM wastebins";
       $data['wastebin'] = $this->dbmodel->getdata($query);
       $this->response($data,200);
       
    }

    function wastebin_post()
    {
        $id = $this->input->post("id");
        $query = "SELECT id, name, IFNULL(status, 0) AS status, IFNULL(longitude, 0) AS  longitude, IFNULL(latitude, 0) AS  latitude FROM wastebins WHERE id= ".$id;
       $data['wastebin'] = $this->dbmodel->getdata($query)[0];
       $this->response($data,200);
       
    }

    function updatevehicles_post()
    {
        $id = $this->input->post("id");
        $longitude = $this->input->post("longitude");
        $latitude = $this->input->post("latitude");
        $query = "UPDATE vehicles SET longitude = ". $longitude.", latitude =". $latitude." WHERE id =". $id ;
        $this->db->query($query);
        $data["status"] = "Success";
        $this->response($data,200);

    }

    function updatefirebaseid_post()
    {
        $id = $this->input->post("id");
        $firebaseid = $this->input->post("firebaseid");
        $query = "UPDATE vehicles SET firebaseid ='". $firebaseid."' WHERE id =". $id ;
        $this->db->query($query);
        $data["status"] = "Success";
        $this->response($data,200);
    }


    function nearestlocation_post()
    {

        $user_latitude = $this->input->post("user_latitude");
        $user_longitude = $this->input->post("user_longitude");
        $distance =  0;
        $user_distance = 0;
        $result = $this->locations->lists();
        $cnt = 1;
        $id = 0;
        foreach ($result as $row) {

            if($cnt==1)
            {
                $distance =  $this->haversineGreatCircleDistance($user_latitude, $user_longitude, $row->latitude, $row->longitude);
                $user_distance = $distance;
                $id = $row->id;


            }

            else{
                $distance =  $this->haversineGreatCircleDistance($user_latitude, $user_longitude, $row->latitude, $row->longitude);
                if( $distance < $user_distance)
                {
                      $user_distance = $distance;
                      $id = $row->id;
                }
                
            }
            $cnt++;
        }
        $data["id"] = $id;
        $this->response($data,200);
    }

    function routes_post()
    {
      $user_latitude = $this->input->post("latitude");
      $user_longitude = $this->input->post("longitude");
      $did =  $this->input->post("id");  

      $distance =  0;
        $user_distance = 0;
        $result = $this->locations->lists();
        $cnt = 1;
        $id = 0;
        foreach ($result as $row) {

            if($cnt==1)
            {
                $distance =  $this->haversineGreatCircleDistance($user_latitude, $user_longitude, $row->latitude, $row->longitude);
                $user_distance = $distance;
                $id = $row->id;


            }

            else{
                $distance =  $this->haversineGreatCircleDistance($user_latitude, $user_longitude, $row->latitude, $row->longitude);
                if( $distance < $user_distance)
                {
                      $user_distance = $distance;
                      $id = $row->id;
                }
                
            }
            $cnt++;
        }
        $currentlocationid = $id;

      $query = "SELECT id, name  FROM locations WHERE wastebinid =". $did ." OR id = ". $currentlocationid;
     
      $data['data'] = $this->dbmodel->getdata($query);
      $this->response($data,200); 
    }

    function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
      
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
          cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ($angle * $earthRadius)/1000;
      }  

     
}
