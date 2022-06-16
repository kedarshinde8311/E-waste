<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DBModel extends CI_Model
{
	public function getdata($query){
		$result = $this->db->query($query);
        return $result->result();
    }

    public function execute($query){
		$this->db->query($query);
    }

    public function getsinglevalue($query){
		$result = $this->db->query($query);
        $row = $result->result()[0];
        return $row->svalue;
	}

    
    public function checkifexists($query){
		$result = $this->db->query($query);
        if(count($result->result()) > 0)
            return true;
        else
            return false;
    }

    function isValidUrl($url){
        $headers = @get_headers($url); 
        if($headers && strpos( $headers[0], '200')) { 
            return true;
        } 
        else { 
            return false;
        } 
    }

   
}

