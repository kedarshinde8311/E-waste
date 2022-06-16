<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class WastebinsModel extends CI_Model{

public function __construct(){				
		$this->load->database();	
		$this->load->model('DBModel', 'dbmodel');				
	}
	
	public function lists(){
		$query = $this->db->get('wastebins');
		return $query->result();
	}

	public function wastbinlocationlists(){
		$query = "SELECT * FROM wastebins WHERE id NOT IN(SELECT wastebinid FROM locations)";
		return $this->dbmodel->getdata($query);
	}

	public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('wastebins');

		$this->db->where('wastebinid', $id);
        $this->db->delete('locations');
    }

	public function getsinglevalue($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('wastebins');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
	}
	public function save(){	
		date_default_timezone_set('Asia/Kolkata');
        $now = date('Y-m-d H:i:s');	
		//echo $now;
		$field = array(
			'id'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
			'longitude'=>$this->input->post('longitude'),
			'latitude'=>$this->input->post('latitude'),
			
		);
		$field1 = array(
			'wastebinid'=>$this->input->post('id'),
            'name'=>$this->input->post('name'),
			'longitude'=>$this->input->post('longitude'),
			'latitude'=>$this->input->post('latitude'),
			'iswastebin'=>'yes'
		);

		$query = "SELECT * FROM wastebins WHERE id = " . $this->input->post('id');
		if(!$this->dbmodel->checkifexists($query))
		{
			$this->db->insert('wastebins', $field);
			$this->db->insert('locations', $field1);
			return $this->db->insert_id();
		}
		else{
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('wastebins', $field);
			$this->db->where('wastebinid', $id);
			$this->db->update('locations', $field1);
			return $id;
		}
	}
}
