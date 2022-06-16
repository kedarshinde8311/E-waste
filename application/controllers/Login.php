<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper("cookie");
    }
    

    public function index()
    {
        $this->load->view('login');
    }

    public function checkLogin()
    { 
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $email = str_replace("'", "''", $email);
        $password = str_replace("'", "''", $password);
        if ($email == 'a' && $password == 'a') {
            $this->load->helper('cookie');
            $this->setCookie('usertype', 'admin');
            $this->setCookie('id', '0');
            redirect(base_url('admin'));
		}
        else 
        {
            $this->session->set_flashdata('success_msg', 'Sorry...Wrong username or password...!!!   Please enter valid username and password...');
            redirect(base_url('login'));
        }
    }
    
    public function setCookie($name, $value)
    {
        $cookie = array(
            'name' => $name,
            'value' => $value,
            'expire' => '31556926',
        );
        $this->input->set_cookie($cookie);
    }

    public function getCookie($name)
    {
        return $this->input->cookie($name, true);
    }

    public function clearCookie($name)
    {
        $cookie = array(
            'name' => $name,
            'value' => '',
            'expire' => '-3600',
        );
        $this->input->set_cookie($cookie);
    }

    public function logout()
    {
        $this->clearCookie('usertype');
        $this->clearCookie('id');
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('id');
        redirect(base_url());
    }

}
