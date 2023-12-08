<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');

    }

    public function index(){

        $data['databarang'] = $this->Madmin->get_all_barang();
        $data['kategori'] = $this->Madmin->get_all_kat();
        $this->load->view('Home/Layout/header');
        $this->load->view('Home/shop',$data);
        $this->load->view('Home/Layout/footer');
 
}


public function batang(){
    $ID_Kategori = 1; 

    $data['databarang'] = $this->Madmin->get_barang_by_kategori($ID_Kategori);
    $data['kategori'] = $this->Madmin->get_all_kat();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/Kategori/batang', $data);
    $this->load->view('Home/Layout/footer');
}


public function daun(){
    $ID_Kategori = 2; 

    $data['databarang'] = $this->Madmin->get_barang_by_kategori($ID_Kategori);
    $data['kategori'] = $this->Madmin->get_all_kat();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/Kategori/daun', $data);
    $this->load->view('Home/Layout/footer');
}

public function biji(){
    $ID_Kategori = 3; 

    $data['databarang'] = $this->Madmin->get_barang_by_kategori($ID_Kategori);
    $data['kategori'] = $this->Madmin->get_all_kat();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/Kategori/biji', $data);
    $this->load->view('Home/Layout/footer');
}

public function buah(){
    $ID_Kategori = 4; 

    $data['databarang'] = $this->Madmin->get_barang_by_kategori($ID_Kategori);
    $data['kategori'] = $this->Madmin->get_all_kat();
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/Kategori/buah', $data);
    $this->load->view('Home/Layout/footer');
}


public function filter_products() {
    $kategori = $this->input->post('kategori');
    $filtered_data = $this->Madmin->get_filtered_products($kategori);

    $data['databarang'] = $filtered_data;
    
 
  
    $this->load->view('Home/shop_filtered', $data);
    
}



public function checkout(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/checkout');
    $this->load->view('Home/Layout/footer');

}

public function product(){
    $this->load->view('Home/Layout/header');
    $this->load->view('Home/product');
    $this->load->view('Home/Layout/footer');

}

}