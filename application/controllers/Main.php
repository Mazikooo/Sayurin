<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
    }

    public function index(){
        
        $data['tiga_barang_pertama'] = $this->Madmin->get_tiga_barang_terakhir();
        $data['artikel_terakhir'] = $this->Madmin->get_tiga_artikel_terakhir();
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/home',$data);
        $this->load->view('Home/Layout/footer');
 
}


public function get_id($ID_Barang)
{
    $datawhere = array('ID_Barang' => $ID_Barang);

    $data['barang'] = $this->Madmin->get_produk_by_id('tbl_barang', $datawhere);
    $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
    $data['penjual'] = $this->Madmin->get_all_data('tbl_penjual')->result();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/product',$data);
    $this->load->view('Home/Layout/footer');
}

public function detail_barang()
{

    $ID_Barang = $this->input->get('ID_Barang');
    $data['barang'] = $this->Madmin->get_produk_with_kategori_by_id($ID_Barang);
    $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/product', $data);
    $this->load->view('Home/Layout/footer');
}



public function register(){
   
    $this->load->view('Home/registermember');
    
    
    }


    public function save(){
        $this->load->model('Madmin');
        if(isset($_POST['btnsubmit'])){
            $pesanerror = ['required' => '<span style=" color : red">%s wajib diisi </span>'];

            $this->form_validation->set_rules('email',
            $this->model->labels['email'],
            'requred',$pesanerror
        );
        }
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
      

        $datainput=array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
           
        );
        $this->Madmin->insert('tb_member',$datainput);
        $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
         Berhasil Registrasi.Silahkan Login Didasboard Member.
      </div>');
        redirect('main/login');
    }


    public function login(){
        $this->load->view('Home/loginmember');
        
    }

   /* public function login_member()
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
        $this->load->view('home/loginmember');
    } else {
        $cek = $this->Madmin->cek_loginmember($u, $p);

        if ($cek->num_rows() == 1) {
            $data_user = $cek->row_array(); // Ambil data user dari hasil query
            $data_session = array(
                'id' => $data_user['id'], // Set data "id" dari hasil query ke dalam sesi
                'member' => $u,
                'ID_Member' => $result->ID_Member,
				'idKotaTujuan' => $data_user['idKota'],
                'status' => 'login'
            );
               
   // Tampilkan isi dari data sesi yang telah disimpan
   echo "<pre>";
   print_r($this->session->userdata());
   echo "</pre>";
   exit(); // Optional: Untuk menghentikan proses setelah menampilkan data sesi

   //redirect('main');
        } else {
            // Validasi sukses, tetapi login gagal, tampilkan pesan error
            $data['error'] = 'Invalid username or password.';
            $this->load->view('home/loginmember', $data);
        }
    }
}




    
/*
    public function login_member(){
        $u = $this->input->post('usernama');
        $p = $this->input->post('password');

        $this->load->library('form_validation');
    $this->form_validation->set_rules('usernama', 'Usernama', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

        $cek = $this->Madmin->cek_login_member($u,$p,)->num_rows();
        $result = $this->Madmin->cek_login_member($u,$p)->row_object();

        if($cek == 1){
            $data_session = array(
                'idkonsumen' => $result->idkonsumen,
                'member' => $u,
                'status'=> 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('main/dasboard_member');
        }else{
            $this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
            Maaf !! username atau password salah !! 
            ( status akun anda tidak aktif!! )
         </div>');
            redirect('main/login');
            
        }
    }*/


    public function dasboard_member(){
        $this->load->view('home2/layout/header');
        $this->load->view('home/dasboard_member');
        $this->load->view('home2/layout/footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('main');
    }

}