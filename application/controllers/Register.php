<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
		
		$this->load->library('cart');

    }

    public function index(){
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/register');
        $this->load->view('Home/Layout/footer');
 
}


public function getProvince(){
    $curl = curl_init(); 
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key: 01e99130c7b29de85c1b447f8e9c62ee"
        ),
    ));
    $response = curl_exec($curl);
    
    $err = curl_error($curl);

    curl_close($curl);
    $data = json_decode($response, true);
    echo "<option value=''>Pilih Provinsi</option>";
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
    echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    } 
}

public function getCity($province){
    $curl = curl_init(); 
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=".$province,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "key: 01e99130c7b29de85c1b447f8e9c62ee"
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $data = json_decode($response, true);
    echo "<option value=''>Pilih Kota</option>";
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
    } 
}

public function save_reg(){
   
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $telpon = $this->input->post('no_hp');
    $idKota = $this->input->post('city');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');

    $dataInput=array('Username'=>$username,'Password'=>$password,'idKota'=>$idKota,'namaKonsumen'=>$nama,'Alamat'=>$alamat,'Email'=>$email,'No_Hp'=>$telpon);
    $this->Madmin->insert('tbl_member', $dataInput);
    
    
  
    redirect('register/regissukses', 'refresh');
}

public function save_regpenjual(){
   
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $telpon = $this->input->post('no_hp');
    $idKota = $this->input->post('city');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');

    $dataInput=array('Username'=>$username,'Password'=>$password,'idKota'=>$idKota,'namaToko'=>$nama,'Alamat'=>$alamat,'Email'=>$email,'No_Hp'=>$telpon);
    $this->Madmin->insert('tbl_penjual', $dataInput);
    
   
  
    redirect('register/regispenjualsukses', 'refresh');
}

public function login(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/login');
    $this->load->view('Home/Layout/footer');	
}

public function login_penjual(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/loginpenjual');
    $this->load->view('Home/Layout/footer');	
}

public function penjual(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/regispenjual');
    $this->load->view('Home/Layout/footer');	
}

public function regissukses(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/regissukses');
    $this->load->view('Home/Layout/footer');	
}

public function regispenjualsukses(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/regispenjualsukses');
    $this->load->view('Home/Layout/footer');	
}


/*public function login_member(){
    $this->load->model('Madmin');
    $u= $this->input->post('username');
    $p= $this->input->post('password');
    
    $cek = $this->Madmin->cek_login_member($u, $p)->num_rows();
    $result = $this->Madmin->cek_login_member($u, $p)->row_object();

    if($cek==1){ 
        $data_session = array(
            'idKonsumen' => $result->idKonsumen,
            'idKotaTujuan' => $result->idKota,
            'member' => $u
        );
        $this->session->set_userdata($data_session);
        redirect('main');
    } else {
        redirect('Register/login');
    }
}*/


public function login_member()
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
       
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/login');
        $this->load->view('Home/Layout/footer');	
    } else {
        $cek = $this->Madmin->cek_loginmember($u, $p);

        if ($cek->num_rows() == 1) {
            $data_user = $cek->row_array(); 
            $data_session = array(
                'id' => $data_user['ID_Member'], 
                'member' => $u,
                'idKonsumen' => $result->idKonsumen,
                'idKotaTujuan' => $data_user['idKota'],
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('main');
        } else {
           
            $data['error'] = 'Invalid username or password.';
            $this->load->view('Home/Layout/header');
            $this->load->view('Home/login', $data);
            $this->load->view('Home/Layout/footer');	
            
        }
    }
}

public function aksi_login_penjual()
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
   
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/loginpenjual');
        $this->load->view('Home/Layout/footer');	
    } else {
        $cek = $this->Madmin->cek_loginpenjual($u, $p);

        if ($cek->num_rows() == 1) {
            $data_user = $cek->row_array(); 
            $data_session = array(
                'id' => $data_user['id'], 
                'penjual' => $u,
                'idKonsumen' => $result->idKonsumen,
                'idKotaTujuan' => $result->idKota,
                'status' => 'login'
            );
            $this->session->set_userdata('ID_Penjual', $data_user['id']); 
            redirect('dashboard_penjual');
        } else {
           
            $data['error'] = 'Invalid username or password.';
            $this->load->view('Home/Layout/header');
            $this->load->view('Home/loginpenjual', $data);
            $this->load->view('Home/Layout/footer');	
        }
    }
}



public function logout(){
    $this->session->sess_destroy();
    redirect('main');
}




}