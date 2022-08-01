<?php defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model {


public function get($id = null)
	{
		$this->db->from('tabel_customer');
		if($id != null) {
			$this->db->where('customer_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('tabel_customer'); //ini tabel

    }

public function tambah($post){
$params['name'] = $post['customerjenenge'];
		 
		$params['gender'] = $post['gendere'];
        $params['phone'] = $post['customertilpune'];
        $params['address'] = $post['alamate'];
		$params['created'] = date('Y-m-d H:i:s');
		
		$this->db->insert('tabel_customer', $params);
}

public function edit($post){
	$params['name'] = $post['customerjenenge']; 
		$params['gender'] = $post['gendere'];
        $params['phone'] = $post['customertilpune'];//bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
        $params['address'] = $post['alamate'];   //menampilkan null KOSONG BLONG NENG TEXT FORM
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('customer_id', $post['id']);
		$this->db->update('tabel_customer', $params);
	
	}
}