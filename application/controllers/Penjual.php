<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjual extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }

    public function index(){
        $data['penjual'] = $this->Madmin->get_all_data('tbl_penjual')->result();
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/Penjual/penjual',$data);
        $this->load->view('Admin/Layout/footer');
 
}
}