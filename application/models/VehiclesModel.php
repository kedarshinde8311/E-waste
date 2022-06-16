<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VehiclesModel extends CI_Model{

public function __construct(){				
		$this->load->database();					
	}
	
	public function lists(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('vehicles');
		return $query->result();
	}
	public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('vehicles');
    }

	public function getsinglevalue($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('vehicles');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
	}
	public function save(){		
		$field = array(
            'name'=>$this->input->post('name'),
			'drivername'=>$this->input->post('drivername'),
            'mobileno'=>$this->input->post('mobileno'),
			'password'=>$this->input->post('password'),
            'longitude'=>$this->input->post('longitude'),
			'latitude'=>$this->input->post('latitude'),
		);
		if($this->input->post('id') == 0){
			$this->db->insert('vehicles', $field);
			return $this->db->insert_id();
		}
		else{
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('vehicles', $field);
			return $id;
		}
	}
}
