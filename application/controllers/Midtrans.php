<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Midtrans extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-HiCmltrAJTfdcNgPkDpTPOH3', 'production' => false);
		$this->load->library('Midtrans');
		$this->midtrans->config($params);
        $this->load->helper('url'); 
     
	
    }

    public function get_snap_token() {
        // Mengambil Client Key dari Midtrans, pastikan untuk ganti dengan Client Key milik Anda
        $clientKey = 'SB-Mid-client-l132-U8I07f3_lBP';

        // Inisialisasi array data transaksi yang akan dikirim ke Midtrans
        $transactionDetails = array(
            'order_id' => 'ORDER-ID-123',
            'gross_amount' => 10000, // Total pembayaran dalam Rupiah
        );

        // Contoh item yang dibeli (bisa disesuaikan dengan data belanja dari keranjang Anda)
        $itemDetails = array(
            array(
                'id' => 'ITEM-ID-1',
                'price' => 10000,
                'quantity' => 1,
                'name' => 'Nama Produk 1'
            ),
            // Tambahkan item lain jika ada
        );

        // Buat payload untuk dikirim ke Midtrans
        $payload = array(
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
        );

        // Kirim permintaan ke Midtrans untuk mendapatkan token pembayaran
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/snap/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Basic ' . base64_encode($clientKey . ':')
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        // Mengembalikan token pembayaran dari Midtrans sebagai respons
        echo $result;
    }
}
?>
