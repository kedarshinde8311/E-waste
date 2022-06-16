<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SliderpicsModel extends CI_Model
{
    public function lists()
    {
        $query = 'SELECT * FROM sliderpics ORDER BY id';
        $query = $this->db->query($query);
        return $query->result();
    }

    public function save()
    {
        $field = array(
			'title1' => $this->input->post('title1'),
            'showonhome' => $this->input->post('showonhome'),		
        );
        

        if ($this->input->post('id') == 0) {
            $this->db->insert('sliderpics', $field);
            $id = $this->db->insert_id();
        } else {
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('sliderpics', $field);
        }

        if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
            $target_dir = '././sliderpics/' . $id . '.png';
            if (file_exists($target_dir)) {
                unlink($target_dir);
            }
            move_uploaded_file($_FILES['pic']['tmp_name'], $target_dir);
            $url = '././sliderpics/thumb/' . $id . '_thumb.png';
            $filename = $this->compress_image($target_dir, $url, 5);
            move_uploaded_file($filename, $url);
        }

        return $id;
    }
    public function compress(){
        $id=1;
        $query = "SELECT MAX(id) AS maxid FROM sliderpics";
        $result = $this->db->query($query);
        $size = $result->row();
        for($id=1;$id<=$size->maxid;$id++)
        {
            $target_dir = '././sliderpics/' . $id . '.png';
            $url = '././sliderpics/thumb/' . $id . '_thumb.png';
            $filename = $this->compress_image($target_dir, $url, 90);
            move_uploaded_file($filename, $url);
		}
	}
    function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}

    public function getbyid($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('sliderpics');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // public function getsingleimages($pid)
    // {
    //     //echo $pid;
    //     $query = 'SELECT * FROM sliderpics WHERE pid = '.$pid.' limit 1';
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }

    // public function getimagesbyid($pid)
    // {
    //     //echo $pid;
    //     $query = 'SELECT * FROM sliderpics WHERE pid = '.$pid.'';
    //     $query = $this->db->query($query);

    //     return $query->result();
    // }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sliderpics');
    }
}
