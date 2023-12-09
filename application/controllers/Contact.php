<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }

    public function index(){
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/contact');
        $this->load->view('Home/Layout/footer');
 
}


public function saveContact() {
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $phone = $this->input->post('phone');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
   
    $data = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'subject' => $subject,
        'message' => $message
    );

    $result = $this->Madmin->saveContact($data);

    if ($result) {
      
        $this->session->set_flashdata('success_message', 'PertanyaanMu Berhasil Dikirim!');
    } else {
     
        $this->session->set_flashdata('error_message', 'Gagal Terkirim!');
    }

    
    redirect($_SERVER['HTTP_REFERER']);
}




}
