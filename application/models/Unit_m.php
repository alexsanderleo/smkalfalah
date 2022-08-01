<?php defined('BASEPATH') OR exit('No direct script access allowed');

class unit_m extends CI_Model {


public function get($id = null)
	{
		$this->db->from('tabel_produkunit');
		if($id != null) {
			$this->db->where('unit_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('tabel_produkunit'); //ini tabel

    }

public function tambah($post){
$params['name'] = $post['jenenge'];
$params['created'] = date('Y-m-d H:i:s');
		
		$this->db->insert('tabel_produkunit', $params);
}

public function edit($post){
	$params['name'] = $post['jenenge'];
			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('unit_id', $post['id']);
		$this->db->update('tabel_produkunit', $params);
	
	}
}