<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DBModel', 'dbmodel');
        $this->load->model('VehiclesModel', 'vehicles');
        $this->load->model('WastebinsModel', 'wastebins');
        $this->load->model('LocationsModel', 'locations');
    }

    public function index()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
    }


    //vehicles
    public function vehicles()
    {
        $this->load->helper('cookie');
        $data['result'] = $this->vehicles->lists();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/vehicles');
        $this->load->view('admin/layout/footer');
    }

    public function vehicle($id)
    {
        $this->load->helper('cookie');
        $data['id'] = $id;
        $data['result'] = $this->vehicles->getsinglevalue($id);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/vehicle');
        $this->load->view('admin/layout/footer');
    }

    public function savevehicle()
    {
        if(!empty($_POST['website']))
          die();
        $result = $this->vehicles->save();

        redirect(base_url('admin/vehicles'));
    }

    public function deletevehicle($id)
    {
        $result = $this->vehicles->delete($id);
        redirect(base_url('admin/vehicles'));
    }


    //wastebins
    public function wastebins()
    {
        $this->load->helper('cookie');
        $data['result'] = $this->wastebins->lists();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/wastebins');
        $this->load->view('admin/layout/footer');
    }

    public function wastebin($id)
    {
        $this->load->helper('cookie');
        $data['id'] = $id;
        $data['result'] = $this->wastebins->getsinglevalue($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/wastebin');
        $this->load->view('admin/layout/footer');
    }

    public function savewastebin()
    {

        $result = $this->wastebins->save();
        redirect(base_url('admin/wastebins'));
    }

    public function deletewastebin($id)
    {
        $result = $this->wastebins->delete($id);
        redirect(base_url('admin/wastebins'));
    }


    //notification
    public function notification()
    {
        $this->load->helper('cookie');
        $data['result'] = $this->wastebins->lists();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/notification');
        $this->load->view('admin/layout/footer');
    }


     //locations
     public function locations()
     {
         $this->load->helper('cookie');
         $data['result'] = $this->locations->lists();
         $this->load->view('admin/layout/header', $data);
         $this->load->view('admin/layout/sidebar');
         $this->load->view('admin/locations');
         $this->load->view('admin/layout/footer');
     }
   
     public function location($id)
     {
         $this->load->helper('cookie');
         $data['id'] = $id;
         $data['locations'] = $this->locations->listlocation($id);;
         $data['result'] = $this->locations->getsinglevalue($id);
         $data['wastebins'] = $this->wastebins->wastbinlocationlists();

        $query = "SELECT L.id FROM locations AS L, routes AS R WHERE L.id = R.fromlocationid AND R.tolocationid = " . $id . " ";
        $query .= "UNION ALL "; 
        $query .= "SELECT L.id FROM locations AS L, routes AS R WHERE L.id = R.tolocationid AND R.fromlocationid = " . $id;
        $data["connectednodes"] = $this->dbmodel->getdata($query);

         $this->load->view('admin/layout/header', $data);
         $this->load->view('admin/layout/sidebar');
         $this->load->view('admin/location');
         $this->load->view('admin/layout/footer');
     }

     public function deletelocation($id)
     {
         $result = $this->locations->delete($id);
         redirect(base_url('admin/locations'));
     }


     public function savelocation()
     {
         $result = $this->locations->save();
         redirect(base_url('admin/locations'));
     }
 

    //routes
     public function routes($id)
     {
         $this->load->helper('cookie');
         $data["id"] = $id;
         $data['locationname'] = $this->locations->getsinglevalue($id);
         
        $query = "SELECT L.*, R.distance FROM locations AS L, routes AS R WHERE L.id = R.fromlocationid AND R.tolocationid = " . $id . " ";
        $query .= "UNION ALL "; 
        $query .= "SELECT L.*, R.distance FROM locations AS L, routes AS R WHERE L.id = R.tolocationid AND R.fromlocationid = " . $id;
        $data['result'] = $this->dbmodel->getdata($query);

       
        $this->load->view('admin/layout/header', $data);
         $this->load->view('admin/layout/sidebar');
         $this->load->view('admin/routes');
         $this->load->view('admin/layout/footer');
     }

     public function saveroute()
     {
         $this->locations->saveroutes();
         redirect(base_url('admin/locations'));
     }

}
