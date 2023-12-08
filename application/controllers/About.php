<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    public function index(){
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/about');
        $this->load->view('Home/Layout/footer');
 
}
}