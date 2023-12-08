<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }


    public function index(){
        
        $data['data_artikel'] = $this->Madmin->get_all_artikel();
        
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/news',$data);
        $this->load->view('Home/Layout/footer');
 
}

}