<?php

class Madmin extends CI_Model{
	
	public function cek_login($u, $p){
		
		$q = $this->db->get_where('tbl_admin', array('username'=>$u, 'password'=>$p));
		return $q;
	}

    /*public function cek_login($u, $p){
        $q = $this->db->get_where('tb_admin', array('userName'=>$u));
        $user = $q->row_array();

        if ($user && password_verify($p, $user['password'])) {
            return $q;
        } else {
            return false;
        }
    }*/


	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

    public function get_member_data($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('tb_member');

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
}



  /*  public function insert($tabel, $data){
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        $this->db->insert($tabel, $data);
    }*/

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}


    public function get_user_by_username($username)
{
    return $this->db->get_where('tb_admin', ['userName' => $username])->row();
}


	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

    public function get_by_idadm($tabel, $ID_Admin){
		return $this->db->get_where($tabel, $ID_Admin);
	}

    public function get_by_idmem($tabel, $ID_Member){
		return $this->db->get_where($tabel, $ID_Member);
	}


    

    public function get_by_idart($tabel, $ID_Berita){
		return $this->db->get_where($tabel, $ID_Berita);
	}

    public function get_by_idbrg($tabel, $ID_Barang){
		return $this->db->get_where($tabel, $ID_Barang);
	}

 


public function get_produk_with_kategori_by_id($ID_Barang)
{
    $this->db->select('tbl_barang.*, tbl_kategori.NamaKategori');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_kategori', 'tbl_barang.ID_Kategori = tbl_kategori.ID_Kategori');
    $this->db->where('tbl_barang.ID_Barang', $ID_Barang);
    $query = $this->db->get();

    return ($query->num_rows() > 0) ? $query->row() : NULL;
}



	public function update($table, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($table, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val)); 
	}

    public function cek_username($table, $Username)
{
    $this->db->where('Username', $Username);
    $query = $this->db->get($table);
    return $query->num_rows() > 0;
}

public function insert_data_barang($data) {
  
    $this->db->insert('tbl_barang', $data);
}



public function insert_data_kat($data) {
 
    $this->db->insert('tbl_kategori', $data);
}



public function insert_data_artikel($data) {
    
    $this->db->insert('tbl_berita', $data);
}

 
  public function get_data_by_condition($table, $condition) {
    return $this->db->get_where($table, $condition);
}



public function cek_loginmember($u,$p){
    $q = $this->db->get_where('tbl_member',array('username'=>$u,'password'=>$p));
    return $q;
}

public function cek_loginpenjual2($u,$p){
    $q = $this->db->get_where('tbl_penjual',array('username'=>$u,'password'=>$p));
    return $q;
}

public function cek_loginpenjual($u, $p) {
    $q = $this->db->get_where('tbl_penjual', array('Username' => $u, 'Password' => $p));
    if ($q->num_rows() == 1) {
        return $q->row_array(); 
    } else {
        return false;
    }
}




public function get_tiga_artikel_terakhir() {
    
    $this->db->select('*');
    $this->db->from('tbl_berita');
   
    $this->db->order_by('ID_Berita', 'DESC'); 
    $this->db->limit(3);
    $query = $this->db->get();

    return $query->result(); 
}


public function get_tiga_barang_terakhir() {
    
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_penjual', 'tbl_penjual.ID_Penjual = tbl_barang.ID_Penjual');
  
    $this->db->order_by('ID_Barang', 'DESC'); 
    $this->db->limit(3);
    $query = $this->db->get();

    return $query->result(); 
}


public function get_tiga_barang_pertama() {
   
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->limit(3);
    $query = $this->db->get();

    return $query->result(); 
}


public function get_kota_penjual($ID_Penjual){
    $this->db->select('*');
    $this->db->from('tbl_penjual');
 
    $this->db->where('tbl_penjual.ID_Penjual', $ID_Penjual);
    $q = $this->db->get();
    return $q;
}


public function getDetailCityByID($idKota) {
   
    $this->db->where('idKota', $idKota);
    $query = $this->db->get('tbl_member');
    return $query->row_array(); 
}

public function get_produk_by_id($table_name, $datawhere)
{
    $this->db->where($datawhere);
    $this->db->join('tbl_penjual', 'tbl_penjual.ID_Penjual = ' . $table_name . '.ID_Penjual');
    return $this->db->get($table_name)->row_object();
}


public function get_all_barang() {
    $this->db->join('tbl_penjual', 'tbl_penjual.ID_Penjual = tbl_barang.ID_Penjual');
    return $this->db->get('tbl_barang')->result();
}


public function get_all_artikel() {
    $this->db->order_by('ID_Berita', 'DESC');
    return $this->db->get('tbl_berita')->result();
}

public function get_produk(){
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_penjual', 'tbl_penjual.ID_Penjual = tbl_barang.ID_Penjual');
    $this->db->join('tbl_member', 'tbl_member.ID_Member = tbl_penjual.ID_Member');
    $q = $this->db->get();
    return $q;
}

public function get_filtered_products($kategori) {
    $this->db->where('ID_Kategori', $kategori);
    $query = $this->db->get('tbl_barang');
    return $query->result();
}


public function get_all_kat() {
    return $this->db->get('tbl_kategori')->result();
}


	public function cek_login_member($u,$p){
        $q = $this->db->get_where('tbl_member',array('username'=>$u,'password'=>$p));
        return $q;
    }

	
    public function get_barang_by_kategori($ID_Kategori) {
        $this->db->join('tbl_penjual', 'tbl_penjual.ID_Penjual = tbl_barang.ID_Penjual');
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->where('ID_Kategori', $ID_Kategori);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insert_template($data){
        
        $this->db->insert('tb_template', $data);
    }

    public function insert_member($data){
        
        $this->db->insert('tb_member', $data);
    }

}
