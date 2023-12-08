<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_penjual extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

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

        if ($cek) {
            $data_user = $cek; 
            $data_session = array(
                'ID_Penjual' => $data_user['ID_Penjual'], 
                'Username' => $data_user['Username'], 
                'status' => 'login'
            );
            $this->session->set_userdata($data_session); 
            redirect('dashboard_penjual');
        } else {
           
            $data['error'] = 'Invalid username or password.';
            $this->load->view('Home/Layout/header');
            $this->load->view('Home/loginpenjual', $data);
            $this->load->view('Home/Layout/footer');
        }
        
    }
}

public function index() {
    $ID_Penjual = $this->session->userdata('ID_Penjual');
    $Username = $this->session->userdata('Username'); 

    if (!$ID_Penjual) {
        redirect('Register/Login_penjual');
    }
    $data['ID_Penjual'] = $ID_Penjual;
    $dataWhere = array('ID_Penjual' => $ID_Penjual);

    $data['penjualan'] = $this->Madmin->get_by_id('tbl_barang', $dataWhere)->result();
    $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
    $data['Username'] = $Username;
   
    $this->load->view('Dashboard_penjual/Layout/header',$data);
    $this->load->view('Dashboard_penjual/penjualan', $data);
    $this->load->view('Dashboard_penjual/Layout/footer');
}

public function kategori(){
   
    $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
    $this->load->view('Dashboard_penjual/Layout/header');
    $this->load->view('Dashboard_penjual/kategori',$data);
    $this->load->view('Dashboard_penjual/Layout/footer');

}


public function addPen()
{
    $ID_Penjual = $this->session->userdata('ID_Penjual');
    $data['ID_Penjual']=$ID_Penjual;
    $data['kategori']=$this->Madmin->get_all_data('tbl_kategori')->result();
    $this->load->view('Dashboard_penjual/Layout/header');
    $this->load->view('Dashboard_penjual/Penjualan/tambahbarang',$data);
    $this->load->view('Dashboard_penjual/Layout/footer');
}


public function aksi_login_penjual2()
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
                'ID_Penjual' => $data_user['ID_Penjual'], 
                'username' => $data_user['username'], 
                'idKonsumen' => $result->idKonsumen,
                'idKotaTujuan' => $result->idKota,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session); 
            redirect('dashboard_penjual');
        } else {
           
            $data['error'] = 'Invalid username or password.';
            $this->load->view('Home/Layout/header');
            $this->load->view('Home/loginpenjual', $data);
            $this->load->view('Home/Layout/footer');	
        }
    }
}






public function aksi_simpan_brg()
{
    $ID_Penjual = $this->input->post('ID_Penjual');
    $NamaBarang = $this->input->post('NamaBarang');
    $Deskripsi = $this->input->post('Deskripsi');
    $Harga = $this->input->post('Harga');
    $ID_Kategori = $this->input->post('ID_Kategori');
    
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    if (!$this->upload->do_upload('Gambar')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error', $error['error']);
        redirect('Dashboard_penjual/addPen');
    } else {
        $upload_data = $this->upload->data();
        $Gambar = $upload_data['file_name'];
        
        $data = array(
            'ID_Penjual' => $ID_Penjual,
            'NamaBarang' => $NamaBarang,
            'Deskripsi' => $Deskripsi,
            'Harga' => $Harga,
            'Gambar' => $Gambar,
            'ID_Kategori' => $ID_Kategori
        );
        
        $this->Madmin->insert_data_barang($data);
        redirect('Dashboard_penjual');
    }
}

public function get_by_idbrg($ID_Barang)
{
    $datawhere = array('ID_Barang' => $ID_Barang);
    $data['barang'] = $this->Madmin->get_by_idbrg('tbl_barang', $datawhere)->row_object();
    
    $ID_Penjual = $this->session->userdata('ID_Penjual');
    $data['ID_Penjual'] = $ID_Penjual;
    $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();

    $this->load->view('Dashboard_penjual/Layout/header');
    $this->load->view('Dashboard_penjual/Penjualan/editbrg', $data);
    $this->load->view('Dashboard_penjual/Layout/footer');
}


public function aksi_edit_brg()
{
    $ID_Barang = $this->input->post('ID_Barang');
    $ID_Penjual = $this->input->post('ID_Penjual');
    $NamaBarang = $this->input->post('NamaBarang');
    $Deskripsi = $this->input->post('Deskripsi');
    $Harga = $this->input->post('Harga');
    $ID_Kategori = $this->input->post('ID_Kategori');
    
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
   
    if (!empty($_FILES['Gambar']['name'])) {
     
        if (!$this->upload->do_upload('Gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('Dashboard_penjual/get_by_idbrg/' . $ID_Barang);
        } else {
            $upload_data = $this->upload->data();
            $Gambar = $upload_data['file_name'];
        }
    } else {
      
        $barang = $this->Madmin->get_by_idbrg('tbl_barang', array('ID_Barang' => $ID_Barang))->row();
        $Gambar = $barang->Gambar;
    }
    
 
    $data  = array(
        'ID_Penjual' => $ID_Penjual,
        'NamaBarang' => $NamaBarang,
        'Deskripsi' => $Deskripsi,
        'Harga' => $Harga,
        'Gambar' => $Gambar,
        'ID_Kategori' => $ID_Kategori
    );
    
    $where = array('ID_Barang' => $ID_Barang);
    
    $this->Madmin->update_data($where, $data, 'tbl_barang');
    redirect('Dashboard_penjual');
}


public function addKat()
{
    $ID_Penjual = $this->session->userdata('ID_Penjual');
    $data['ID_Penjual']=$ID_Penjual;
    $data['kategori']=$this->Madmin->get_all_data('tbl_kategori')->result();
    $this->load->view('Dashboard_penjual/Layout/header');
    $this->load->view('Dashboard_penjual/kategori/tambahKat',$data);
    $this->load->view('Dashboard_penjual/Layout/footer');
}



public function aksi_simpan_kat()
{

    $namaKategori = $this->input->post('NamaKategori');
    $data = array(
        'NamaKategori' => $namaKategori
    
    );
    $this->load->model('Madmin');
    $this->Madmin->insert_data_kat($data);
    redirect('Dashboard_penjual/kategori');
}



public function delete($ID_Barang){
    if(empty($this->session->userdata('Username'))){
        redirect('Register/login_penjual');
    }
    $this->Madmin->delete('tbl_barang', 'ID_Barang', $ID_Barang);
    redirect('Dashboard_penjual');
}


public function deleteKat($ID_Kategori){
    if(empty($this->session->userdata('Username'))){
        redirect('Register/login_penjual');
    }
    $this->Madmin->delete('tbl_kategori', 'ID_Kategori', $ID_Kategori);
    redirect('Dashboard_penjual/kategori');
}

public function logout(){
    $this->session->sess_destroy();
    redirect('Register/login_penjual');
}


/*public function aksi_simpan_brg2()
{
    $ID_Penjual = $this->input->post('ID_Penjual');
    $NamaBarang = $this->input->post('NamaBarang'); // Sesuaikan dengan nama field pada form
    $Deskripsi = $this->input->post('Deskripsi');
    $Harga = $this->input->post('Harga');
    $ID_Kategori = $this->input->post('ID_Kategori');
    
    $Gambar = $_FILES['Gambar']['name']; // Menggunakan ['name'] untuk mendapatkan nama file gambar
    
    if ($gambar != '') {
        $config['upload_path'] ='./uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
    
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('Gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('Dashboard_penjual/addPen');
        } else {
            $upload_data = $this->upload->data();
            $Gambar = $upload_data['file_name'];
        }
    }
    
    $data = array(
        'ID_Penjual' => $ID_Penjual,
        'NamaBarang' => $NamaBarang,
        'Deskripsi' => $Deskripsi,
        'Harga' => $Harga,
        'Gambar' => $Gambar,
        'ID_Kategori' => $ID_Kategori
    );
    
    $this->Madmin->insert_data_barang($data);
    redirect('Dashboard_penjual');
}


public function aksi_simpan_brg()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $tipe = $this->input->post('tipe');
        $deskripsi = $this->input->post('deskripsi');
        $link = $this->input->post('link');
    
        $gambar = $_FILES['gambar']['name']; // Menggunakan ['name'] untuk mendapatkan nama file gambar
    
        if ($gambar != '') {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';
    
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload!";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
    
        $data = array(
            'id' => $id,
            'nama' => $nama,
            'tipe' => $tipe,
            'deskripsi' => $deskripsi,
            'link' => $link,
            'gambar' => $gambar
        );
    
        $this->Madmin->insert_template($data);
        if ($this->db->affected_rows()) {
            redirect('Dashboard_penjual');
        } else {
            redirect('Dashboard_penjual/addPen');
        }
    }*/
    

}
