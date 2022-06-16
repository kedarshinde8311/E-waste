<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model{

public function __construct(){				
		$this->load->database();					
	}
	
	public function lists(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('customer_details');
		return $query->result();
	}
	public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer_details');
    }

	public function getsinglevalue($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('customer_details');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
	}
	public function save(){		
		$field = array(
            'name'=>$this->input->post('nm'),
            'address'=>$this->input->post('add'),
		);
		if($this->input->post('id') == 0){
			$this->db->insert('customer_details', $field);
			return $this->db->insert_id();
		}
		else{
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('customer_details', $field);
			return $id;
		}
	}
}
