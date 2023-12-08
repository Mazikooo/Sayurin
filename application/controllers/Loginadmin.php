<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }
	public function index(){
		$this->load->view('Admin/login');
		
	}

	public function dashboard(){
		if(empty($this->session->userdata('Username'))){
			redirect('loginadmin');
		}
     
        $data['admin'] = $this->Madmin->get_all_data('tbl_admin')->result();
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/admin',$data);
        $this->load->view('Admin/Layout/footer');
	
	}

	
   /* public function masuk()
{
    $this->load->model('Madmin');
    $u = $this->input->post('username');
    $p = $this->input->post('password');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Validasi gagal, kembali ke halaman login dengan pesan error
        $this->load->view('admin/login');
    } else {
        $user = $this->Madmin->get_user_by_username($u);

        if ($user && password_verify($p, $user->password)) {
            $data_session = array(
                'userName' => $u,
                'status' => 'login'
            );
            //$this->session->set_userdata($data_session);
            redirect('loginadmin/dashboard');
        } else {
            // Validasi sukses, tetapi login gagal, tampilkan pesan error
            $data['error'] = 'Invalid username or password.';
            $this->load->view('admin/login', $data);
        }
    }
}
*/


public function masuk()
{
    $this->load->model('Madmin');
    $u = $this->input->post('username');
    $p = $this->input->post('password');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
     
        $this->load->view('Admin/login');
    } else {
        $cek = $this->Madmin->cek_login($u, $p);

        if ($cek->num_rows() == 1) {
            $data_session = array(
                'Username' => $u,
                'ID_Admin' => $data_user['ID_Admin'], 
               
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('loginadmin/dashboard');
        } else {
           
            $data['error'] = 'Invalid username or password.';
            $this->load->view('Admin/login', $data);
        }
    }
}


	/*public function masuk()
{
    $this->load->model('Madmin');
    $u = $this->input->post('username');
    $p = $this->input->post('password');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Validasi gagal, kembali ke halaman login dengan pesan error
        $this->load->view('admin/login');
    } else {
        $cek = $this->Madmin->cek_login($u, $p)->num_rows();

        if ($cek == 1) {
            $data_session = array(
                'userName' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('loginadmin/dashboard');
        } else {
            // Validasi sukses, tetapi login gagal, tampilkan pesan error
            $data['error'] = 'Invalid username or password.';
            $this->load->view('admin/login', $data);
        }
    }
}*/



	public function logout(){
		$this->session->sess_destroy();
		redirect('Loginadmin');
	}


    
}
