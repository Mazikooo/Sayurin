<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');


    }

    public function index(){
        $data['member'] = $this->Madmin->get_all_data('tbl_member')->result();
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/Member/member',$data);
        $this->load->view('Admin/Layout/footer');
 
}

public function add()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('loginadmin');
    }
    $this->load->view('Admin/Layout/header');
    
    $this->load->view('Admin/Member/formtambah_mem');
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
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_hp', 'No_Hp', 'required');

    if ($this->form_validation->run() == FALSE) {
        
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/Member/formtambah_mem');
        $this->load->view('Admin/Layout/footer');
    } else {
        
        $username = $this->input->post('username');
        $cek_username = $this->Madmin->cek_username('tbl_member', $username);

        if ($cek_username) {
          
            $data['error'] = 'Username sudah ada';
            $this->load->view('Admin/Layout/header');
            $this->load->view('Admin/Member/formtambah_adm', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
           
            $dataInput = array(
                'username' => $username,
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            );
            $this->Madmin->insert('tbl_member', $dataInput);
            redirect('Member');
        }
    }
}


public function delete($ID_Member){
    if(empty($this->session->userdata('Username'))){
        redirect('loginadmin');
    }
    $this->Madmin->delete('tbl_member', 'ID_Member', $ID_Member);
    redirect('Member');
}

public function get_by_idmem($ID_Member)
{
    if(empty($this->session->userdata('Username')))
    {
        redirect('loginadmin');
    }

    $dataWhere = array('ID_Member' => $ID_Member);
    $data['member'] = $this->Madmin->get_by_idmem('tbl_member', $dataWhere)->row_object();

    $this->load->view('Admin/Layout/header');
    $this->load->view('Admin/Member/formedit_mem', $data);
    $this->load->view('Admin/Layout/footer');
}

public function edit($ID_Member)
{
    if (empty($this->session->userdata('Username'))) {
        redirect('adminpanel');
    }

    $data['member'] = $this->Madmin->get_by_idmem('ID_Member', array('ID_Member' => $ID_Member))->row_object();

    $this->load->view('Admin/Layout/header');
 
    $this->load->view('Admin/Member/formedit_mem', $data);
    $this->load->view('Admin/Layout/footer');
}


public function aksi_edit()
{
    $ID_Member = $this->input->post('ID_Member');
        $username = $this->input->post('username');
 
        $passwordBaru = $this->input->post('passwordBaru');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');


    $data = array(
        'ID_Member' => $ID_Member,
        'username' => $username,
      
        'password' => $passwordBaru,
        'alamat' => $alamat,
        'no_hp' => $no_hp
    );

    $where = array(
        'ID_Member' => $ID_Member
    );

    $this->Madmin->update_data($where, $data, 'tbl_member');
    redirect('member');
}


public function update_profile()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('adminpanel');
    }

    $this->load->library('form_validation');

    
    $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required', array(
        'required' => 'Password Baru Harus Diisi'
    ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
        'required' => 'Alamat Harus Diisi'
    ));
    $this->form_validation->set_rules('nohp', 'Nomor HP', 'required', array(
        'required' => 'Nomor HP Harus Diisi'
    ));

    if ($this->form_validation->run() == FALSE) {
       
        $ID_Member = $this->input->post('ID_Member');
        $data['member'] = $this->Madmin->get_by_idmem('tbl_member', array('ID_Member' => $ID_Member))->row_object();

        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/Member/formedit_mem', $data);
        $this->load->view('Admin/Layout/footer');
    } else {
       
        $ID_Member = $this->input->post('ID_Member');
        $passwordBaru = $this->input->post('passwordBaru');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');

        
        $dataUpdate = array(
            'password' => $passwordBaru,
            'alamat' => $alamat,
            'no_hp' => $no_hp
        );
        $this->Madmin->update('tbl_member', $dataUpdate, 'ID_Member', $ID_Member);

        redirect('member'); 
    }
}

}