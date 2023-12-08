<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }
  
      
    public function index(){
        $data['berita'] = $this->Madmin->get_all_data('tbl_berita')->result();
        $this->load->view('Admin/Layout/header');
        $this->load->view('Admin/Artikel/artikel',$data);
        $this->load->view('Admin/Layout/footer');
 
}


public function add()
{
    if (empty($this->session->userdata('Username'))) {
        redirect('loginadmin');
    }
    $ID_Admin = $this->session->userdata('ID_Admin');
    $data['ID_Admin']=$ID_Admin;
    $this->load->view('Admin/Layout/header');
    $this->load->view('Admin/Artikel/tambahartikel');
    $this->load->view('Admin/Layout/footer');
}



public function aksi_simpan_artikel()
{
   
    $Judul = $this->input->post('Judul');
    $Deskripsi = $this->input->post('Deskripsi');
    $Link = $this->input->post('Link');

    $config['upload_path'] = './uploads/artikel/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
    if (!$this->upload->do_upload('Gambar')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error', $error['error']);
        redirect('artikel/add');
    } else {
        $upload_data = $this->upload->data();
        $Gambar = $upload_data['file_name'];
        
        $data = array(
            'Judul' => $Judul,
            'Deskripsi' => $Deskripsi,
            'Link' => $Link,
            'Gambar' => $Gambar
        );
        
        $this->Madmin->insert_data_artikel($data);
        redirect('artikel');
    }
}



public function get_by_idart($ID_Berita)
{
    $datawhere = array('ID_Berita' => $ID_Berita);
    $data['berita'] = $this->Madmin->get_by_idbrg('tbl_berita', $datawhere)->row_object();

    $this->load->view('Admin/Layout/header');
    $this->load->view('Admin/Artikel/editartikel', $data);
    $this->load->view('Admin/Layout/footer');
}


public function aksi_edit_artikel()
{
    $ID_Berita = $this->input->post('ID_Berita');
    $Judul = $this->input->post('Judul');
    $Deskripsi = $this->input->post('Deskripsi');
    $Link = $this->input->post('Link');
    
    $config['upload_path'] = './uploads/artikel/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    
   
    if (!empty($_FILES['Gambar']['name'])) {
     
        if (!$this->upload->do_upload('Gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('artikel/get_by_idart/' . $ID_Berita);
        } else {
            $upload_data = $this->upload->data();
            $Gambar = $upload_data['file_name'];
        }
    } else {
      
        $berita = $this->Madmin->get_by_idart('tbl_berita', array('ID_Berita' => $ID_Berita))->row();
        $Gambar = $berita->Gambar;
    }
    
 
    $data  = array(
        'Judul' => $Judul,
        'Deskripsi' => $Deskripsi,
        'Link' => $Link,
        'Gambar' => $Gambar
    );
    
    $where = array('ID_Berita' => $ID_Berita);
    
    $this->Madmin->update_data($where, $data, 'tbl_berita');
    redirect('artikel');
}


public function delete($ID_Berita){
    if(empty($this->session->userdata('Username'))){
        redirect('Register/login_penjual');
    }
    $this->Madmin->delete('tbl_berita', 'ID_Berita', $ID_Berita);
    redirect('artikel');
}

}