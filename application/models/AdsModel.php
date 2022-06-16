<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdsModel extends CI_Model
{
    public function lists()
    {
        $query = 'SELECT * FROM ads ORDER BY srno';
        $query = $this->db->query($query);
        return $query->result();
    }

    public function save()
    {
        $field = array(
            'title' => $this->input->post('title'),
            'srno' => $this->input->post('srno'),
        );

        if ($this->input->post('id') == 0) {
            $this->db->insert('ads', $field);
            $id = $this->db->insert_id();
        } else {
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('ads', $field);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $target_dir = '././ads/' . $id . '.png';
            if (file_exists($target_dir)) {
                unlink($target_dir);
            }
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_dir);
        }

        return $id;
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ads');
    }
}
