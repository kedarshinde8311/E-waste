<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AssociateModel extends CI_Model
{
	public function __construct(){			
		$this->load->helper("string");
	}
    public function lists()
    {
        $query = 'SELECT ASS.*, A.name AS areaname FROM associates AS ASS, areas AS A WHERE ASS.areaid = A.id ORDER BY ASS.name';
        $result = $this->db->query($query);

        return $result->result();
    }

    public function save()
    {
        $id = 0;
        $field = array(
            'name' => $this->input->post('name'),
            'mobileno' => $this->input->post('mobileno'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'areaid' => $this->input->post('areaid'),
        );
        if ($this->input->post('id') == 0) {
            $this->db->insert('associates', $field);
            $id = $this->db->insert_id();
        } else {
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('associates', $field);
        }
        return $id;
    }

    public function getbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('associates');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('associates');
    }
}
