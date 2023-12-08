<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }

    public function index(){
        $data['admin'] = $this->Madmin->get_all_data('tbl_admin')->result();
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/admin',$data);
        $this->load->view('Admin/Layout/footer');
 
}

public function add()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('loginadmin');
    }
    $this->load->view('Admin/Layout/header');
    
    $this->load->view('Admin/formtambah_adm');
    $this->load->view('Admin/Layout/footer');
}


public function save()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('loginadmin');
    }

    $this->load->library('form_validation');

    
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
     
        $this->load->view('Admin/Layout/header');
   
    $this->load->view('Admin/formtambah_adm');
    $this->load->view('Admin/Layout/footer');
    } else {
      
        $username = $this->input->post('username');
        $cek_username = $this->Madmin->cek_username('tbl_admin', $username);

        if ($cek_username) {
          
            $data['error'] = 'Username sudah ada';
            $this->load->view('Admin/Layout/header');
           
            $this->load->view('Admin/formtambah_adm', $data);
            
            $this->load->view('Admin/Layout/footer');
        } else {
     
            $dataInput = array(
                'username' => $username,
                'password' => $this->input->post('password')
            );
            $this->Madmin->insert('tbl_admin', $dataInput);
            redirect('Admin');
        }
    }
}

public function delete($ID_Admin){
    if(empty($this->session->userdata('Username'))){
        redirect('loginadmin');
    }
    $this->Madmin->delete('tbl_admin', 'ID_Admin', $ID_Admin);
    redirect('admin');
}

public function get_by_idadm($ID_Admin)
{
    if(empty($this->session->userdata('Username')))
    {
        redirect('loginadmin');
    }

    $dataWhere = array('ID_Admin' => $ID_Admin);
    $data['admin'] = $this->Madmin->get_by_idadm('tbl_admin', $dataWhere)->row_object();

    $this->load->view('Admin/Layout/header');
    
    $this->load->view('Admin/formedit_adm', $data);
    $this->load->view('Admin/Layout/footer');
}

public function edit($id)
{
    if (empty($this->session->userdata('userName'))) {
        redirect('adminpanel');
    }

    $data['admin'] = $this->Madmin->get_by_id('tb_admin', array('id' => $id))->row_object();

    $this->load->view('Admin/Layout/header');
    $this->load->view('Admin/Layout/sidebar');
    $this->load->view('Admin/admin/formedit_adm', $data);
    $this->load->view('Admin/Layout/footer');
}

public function update_password()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('adminpanel');
    }

    $this->load->library('form_validation');

 
    $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required', array(
        'required' => 'Password Baru Harus Diisi'
    ));

    if ($this->form_validation->run() == FALSE) {
      
        $ID_Admin = $this->input->post('ID_Admin');
        $data['admin'] = $this->Madmin->get_by_idadm('tbl_admin', array('ID_Admin' => $ID_Admin))->row_object();

        $this->load->view('Admin/Layout/header');
        
        $this->load->view('Admin/formedit_adm', $data);
        $this->load->view('Admin/Layout/footer');
    } else {
   
        $ID_Admin = $this->input->post('ID_Admin');
        $passwordBaru = $this->input->post('passwordBaru');

        $dataUpdate = array('password' => $passwordBaru);
        $this->Madmin->update('tbl_admin', $dataUpdate, 'ID_Admin', $ID_Admin);

        redirect('admin');
    }
}

}