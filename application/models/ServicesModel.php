<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ServicesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DBModel', 'dbmodel');
    }


    public function lists()
    {
        
        $query = $this->db->get('services');
        return $query->result();
    }

    public function save()
    {
        $id = 0;
        $urltitle = $this->input->post('title');
        $urltitle = str_replace(' ', '_', $urltitle);
        $urltitle = str_replace('/', '_', $urltitle);
        $urltitle = str_replace("'", '_', $urltitle);
        $urltitle = str_replace("&", '_', $urltitle);

        date_default_timezone_set('Asia/Kolkata');
        $now = date('Y-m-d H:i:s');
        if ($this->input->post('id') == 0) {
            $field = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'urltitle' => $urltitle,
                'createdon' => $now,
            );
            $this->db->insert('services', $field);
            $id = $this->db->insert_id();
        } else {
            $id = $this->input->post('id');
            $field = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'urltitle' => $urltitle,
                'createdon' => $now,
            );
            $this->db->where('id', $id);
            $this->db->update('services', $field);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $target_dir = '././servicespics/'.$id.'.png';
            if (file_exists($target_dir)) {
                unlink($target_dir);
            }

            move_uploaded_file($_FILES['pic']['tmp_name'], $target_dir);
        }

        return $id;
    }

    public function getbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('services');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getbytitle($title)
    {
        $this->db->where('urltitle', $title);
        $query = $this->db->get('services');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
       
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('services');
    }
}
