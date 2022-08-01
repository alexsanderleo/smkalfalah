<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {


public function get($id = null)
	{
		$this->db->from('tabel_produkcategory');
		if($id != null) {
			$this->db->where('category_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('category_id', $id);
        $this->db->delete('tabel_produkcategory'); //ini tabel
		if($this->db->affected_rows() > 0  ) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
           
                               
            }
           redirect('category');

    }

public function tambah($post){
$params['name'] = $post['jenenge'];
$params['created'] = date('Y-m-d H:i:s');
		
		$this->db->insert('tabel_produkcategory', $params);
}

public function edit($post){
	$params['name'] = $post['jenenge'];
			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('category_id', $post['id']);
		$this->db->update('tabel_produkcategory', $params);
		if($this->db->affected_rows() > 0  ) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
              
            }
           redirect('category');
	
	}


	
}