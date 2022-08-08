<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_m extends CI_Model {


public function get($id = null)
	{
		$this->db->from('tabel_lokasi');
		if($id != null) {
			$this->db->where('lokasi_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('lokasi_id', $id);
        $this->db->delete('tabel_lokasi'); //ini tabel
		if($this->db->affected_rows() > 0  ) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
           
                               
            }
           redirect('lokasi');

    }

public function tambah($post){
$params['namalokasi'] = $post['jenenge'];
$params['created'] = date('Y-m-d H:i:s');
		
		$this->db->insert('tabel_lokasi', $params);
}

public function edit($post){
	$params['namalokasi'] = $post['jenenge'];
			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('lokasi_id', $post['id']);
		$this->db->update('tabel_lokasi', $params);
		if($this->db->affected_rows() > 0  ) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
              
            }
           redirect('lokasi');
	
	}


	
}