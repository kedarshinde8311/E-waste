<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TestimonialsModel extends CI_Model
{
    public function lists()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('testimonials');

        return $query->result();
    }

    public function save()
    {
        $id = 0;

        if ($this->input->post('id') == 0) {
            $field = array(
                'name' => $this->input->post('name'),
                'position' => $this->input->post('position'),
                'message' => $this->input->post('message'),
            );
            $this->db->insert('testimonials', $field);
            $id = $this->db->insert_id();
        } else {
            $id = $this->input->post('id');
            $field = array(
                'name' => $this->input->post('name'),
                'position' => $this->input->post('position'),
                'message' => $this->input->post('message'),
            );
            $this->db->where('id', $id);
            $this->db->update('testimonials', $field);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $target_dir = '././testimonialpics/'.$id.'.png';
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
        $query = $this->db->get('testimonials');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('testimonials');
    }
}
