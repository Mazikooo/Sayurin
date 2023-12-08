<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-HiCmltrAJTfdcNgPkDpTPOH3', 'production' => false);
		$this->load->library('Midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
        $this->load->library('cart');
    }

    public function index()
    {
    	$this->load->view('Payment/checkout_snap');
    }

   
    public function proses_tran()
    {

        $this->load->model('Madmin');
        $dataWhere = array('ID_Member '=>$this->session->userdata('id')); 
        $member = $this->Madmin->get_by_id('tbl_member', $dataWhere)->row_object();
        $kota_asal = $this->session->userdata ('idKotaAsal');
        $kota_tujuan = $this->session->userdata('idKotaTujuan');

        $this->load->helper('penjual');
        $ongkir = getOngkir ($kota_asal, $kota_tujuan, '1000', 'jne');
        $ongkir_value = $ongkir ['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];

        $dataInput=array(
        'ID_Member '=>$member->ID_Member,
        'ID_Penjual' => $this->session->userdata('idPenjual'),
        'tglOrder'=>date("Y-m-d"),
        'statusOrder' => "Belum Bayar",
        'kurir' => "JNE Oke",
        'ongkir' => $ongkir_value,
    );
        $this->Madmin->insert('tbl_order', $dataInput);
        $insert_id = $this->db->insert_id();


        $transaction_details = array(
        'order_id' => $insert_id,
        'gross_amount' => $ongkir_value +$this->cart->total(),
        );

        

        $item_details = [];
        foreach($this->cart->contents() as $item) 
        { $item_details[] = array( 
            'id' => $item["id"], 
            'price' => $item["price"], 
            'quantity' => $item["qty"], 
            'name' => $item["name"]
        );
        }

        $item_details[] = array( 
        'id' => "ONGKIR",
        'price' => $ongkir_value,
        'quantity' => 1,
        'name' => "Ongkos Kirim JNE Oke" );

		// Optional
		$billing_address = array(
		  'first_name'    => $member->namaKonsumen,
		  'last_name'     => "",
		  'address'       => $member->Alamat,
		  'city'          => $member->Alamat,
		  'postal_code'   => "",
		  'phone'         => $member->No_HP,
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
            'first_name'    => $member->namaKonsumen,
            'last_name'     => "",
            'address'       => $member->Alamat,
            'city'          => $member->Alamat,
            'postal_code'   => "",
            'phone'         => $member->No_HP,
            'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $member->namaKonsumen,
		  'last_name'     => "",
		 // 'email'         => $member->Email,
		  'phone'         => $member->No_HP,
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'hour', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }


    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'));

        if($result->transaction_status=="settlement"){
            $id=$result->order_id;
            $dataUpdate=array('statusOrder'=>"Dikemas");
            $this->Madmin->update('tbl_order',$dataUpdate,'idOrder',$id);
            redirect('/');
        }



    /*
    public function tes_pay() {
        $this->load->library('midtrans'); // Memuat library Midtrans yang telah diatur sebelumnya
        $this->load->helper('penjual');	
        // Data yang dibutuhkan untuk transaksi
        $kota_asal = $this->session->userdata('idKotaAsal');
        $kota_tujuan = $this->session->userdata('idKotaTujuan');
        $total_order = $this->cart->total();

        // Mendapatkan biaya ongkir menggunakan API RajaOngkir (atau cara yang sesuai dengan sistem Anda)
        $this->load->helper('penjual');
        $ongkir = getOngkir($kota_asal, $kota_tujuan, '1000', 'jne');
        $ongkir_value = $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];

        // Inisialisasi data untuk transaksi
        $transaction_details = array(
            'order_id' => 'ORDER-' . uniqid(), // Ganti ini dengan format yang sesuai dengan sistem Anda
            'gross_amount' => $total_order + $ongkir_value, // Total harga + ongkir
        );

        $item_details = [];
        foreach ($this->cart->contents() as $item) {
            $item_details[] = array(
                'id' => $item["id"],
                'price' => $item["price"],
                'quantity' => $item["qty"],
                'name' => $item["name"]
            );
        }

        $item_details[] = array(
            'id' => "ONGKIR",
            'price' => $ongkir_value,
            'quantity' => 1,
            'name' => "Ongkos Kirim JNE Oke"
        );

        $billing_address = array(
            'first_name'    => 'John', // Ganti ini dengan informasi yang sesuai
            'last_name'     => 'Doe',
            'address'       => 'Jl. Test No. 123',
            'city'          => 'Jakarta',
            'postal_code'   => '12345',
            'phone'         => '08123456789',
            'country_code'  => 'IDN'
        );

        $shipping_address = array(
            'first_name'    => 'John', // Ganti ini dengan informasi yang sesuai
            'last_name'     => 'Doe',
            'address'       => 'Jl. Test No. 123',
            'city'          => 'Jakarta',
            'postal_code'   => '12345',
            'phone'         => '08123456789',
            'country_code'  => 'IDN'
        );

        $customer_details = array(
            'first_name'    => 'John', // Ganti ini dengan informasi yang sesuai
            'last_name'     => 'Doe',
            'email'         => 'john@example.com',
            'phone'         => '08123456789',
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $credit_card['secure'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'hour',
            'duration'  => 2
        );

        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        try {
            $snapToken = $this->midtrans->getSnapToken($transaction_data);
            echo $snapToken; // Kembalikan token sebagai respons dari request
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage(); // Tangani kesalahan jika terjadi
        }
    }


 
    	

    }*/
}
}