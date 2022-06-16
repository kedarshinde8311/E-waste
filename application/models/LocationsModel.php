<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LocationsModel extends CI_Model{

public function __construct(){				
		$this->load->database();	
		//$this->load->model('WastebinsModel', 'wastebins');				
	}
	
	public function lists(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('locations');
		return $query->result();
	}

	public function listroutes($id){
	 	 $query = "SELECT L.*, R.distance FROM locations AS L LEFT OUTER JOIN routes AS R ON L.id = R.tolocationid AND R.fromlocationid = " . $id .  " WHERE L.id NOT IN($id)";
		// $query = "SELECT * FROM  locations WHERE id IN(SELECT tolocationid FROM routes WHERE fromlocationid=".$id.")";
		return $this->dbmodel->getdata($query);
	}

	public function listlocation($id){
		$query = "SELECT * FROM locations WHERE id NOT IN ($id)";
	//	$query = "SELECT L.*, R.tolocationid FROM locations AS L LEFT OUTER JOIN routes AS R ON L.id = R.tolocationid AND R.tolocationid = ".$id." WHERE L.id NOT IN($id)";
		return $this->dbmodel->getdata($query);
	}

	public function saveroutes()
	{
		$id = $this->input->post("fromlocationid");
		$query = "DELETE FROM routes WHERE fromlocationid = " . $id;
		$this->db->query($query);
		for($i = 1; $i < $this->input->post("count"); $i++)
		{
			$tolocationid = $this->input->post("tolocationid" . $i);
			$distance = $this->input->post("distance" . $i);
			if($distance != "")
			{
				$query = "INSERT INTO routes(fromlocationid, tolocationid, distance) ";
				$query .= "VALUES(" . $id . ", " . $tolocationid . ", " . $distance . ")";
				$this->db->query($query);
			}
		}
	}

	public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('locations');
    }

	public function getsinglevalue($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('locations');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
	}
	public function save(){

		$field = array(
            'name'=>$this->input->post('name'),
			'longitude'=>$this->input->post('longitude'),
            'latitude'=>$this->input->post('latitude'),
		);

		if($this->input->post('id') == 0){
			$this->db->insert('locations', $field);
			$id= $this->db->insert_id();
		}
		else{
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('locations', $field);
			 
		}

		$fromlocationid = $id;
		$this->db->where('fromlocationid', $fromlocationid);
        $this->db->delete('routes');

		$frmlatitude = $this->input->post('latitude');
		$frmlongitude = $this->input->post('longitude');


		for($i = 1; $i < $this->input->post("count"); $i++)
		{
			$tolocationid = $this->input->post("tolocationid" . $i);
			$location = $this->getsinglevalue($tolocationid);
			if($location !=null)
			{
				$tolatitude = $location->latitude;
				$tolongitude = $location->longitude;		
				$distance = $this->haversineGreatCircleDistance($frmlatitude, $frmlongitude, $tolatitude, $tolongitude);

				if($tolocationid != null)
				{
					$query = "INSERT INTO routes(fromlocationid, tolocationid, distance) ";
					$query .= "VALUES(" . $fromlocationid . ", " . $tolocationid . ", " . $distance . ")";
					$this->db->query($query);
				}
			}
	
		
		}
		
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
