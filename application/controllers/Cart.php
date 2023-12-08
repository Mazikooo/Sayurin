<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Madmin');
        $this->load->library('cart');
        $params = array('server_key' => 'SB-Mid-server-_x9mM9Xx3Sn6_8q-ZwNcabQc', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	

    }

    
	public function index()
	{
		
		$data['kota_asal'] = $this->session->userdata('idKotaAsal');
		$data['kota_tujuan'] = $this->session->userdata('idKotaTujuan');

		$data['cartItems'] = $this->cart->contents();
		$data['kategori']=$this->Madmin->get_all_data('tbl_kategori')->result();
		$data['total'] = $this->cart->total();

	
        $this->load->view('Home/Layout/header');
		$this->load->view('Home/cart',$data);
		$this->load->view('Home/Layout/footer');
	}

    public function add_to_cart($ID_Barang)
    {
        $dataWhere = array('ID_Barang' => $ID_Barang);
        $barang = $this->Madmin->get_by_id('tbl_barang', $dataWhere)->row_object();
        $kota = $this->Madmin->get_kota_penjual($barang->ID_Penjual)->row_object();
    
        $this->session->set_userdata('idKotaAsal', $kota->idKota);
        $this->session->set_userdata('idPenjual', $barang->ID_Penjual);

        $qty = $this->input->post('qty'); 
        if ($qty <= 0) {
            $qty = 1; 
        }
    
        $data = array(
            'id' => $barang->ID_Barang,
            'qty' => $qty,
            'price' => $barang->Harga,
            'name' => $barang->NamaBarang,
            'image' => $barang->Gambar
        );
    
        $this->cart->insert($data);
        redirect("cart");
    }
    

public function update_cart()
{
    $rowid = $this->input->post('rowid');
    $qty = $this->input->post('qty');

    $data = array(
        'rowid' => $rowid,
        'qty' => $qty
    );

    $this->cart->update($data);

    
}

public function delete_cart($rowid)
	{
		$remove = $this->cart->remove($rowid);
		redirect("cart");
	}

}