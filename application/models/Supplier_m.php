<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model {
	var $tbl_transaction = 'tabel_supplier'; // START -----------------------import 

	function fetch_transactions()
    {
        /* Filter */
        $filter = $this->input->post('filter');
        if($filter == 1) {
            $date = $this->input->post('date');
            $this->db->where('input_date', $date);
        }

        /* Query */
        //$this->db->select("*, (price*qty) as total");
        
        $query = $this->db->get($this->tbl_transaction);
        return $query->result_array();
    }

    /*
    |-------------------------------------------------------------------
    | Insert Batch Transaction Data
    |-------------------------------------------------------------------
    |
    | @param $data  Transactions Array Data
    |
    */
    function insert_transaction_batch($data)
    {
      $this->db->insert_batch($this->tbl_transaction, $data);
    }
//-------------------------------------------END IMPORT
public function get($id = null)
	{
		$this->db->from('tabel_supplier');
		if($id != null) {
			$this->db->where('supplier_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('tabel_supplier'); //ini tabel

    }

public function tambah($post){
$params['name'] = $post['jenenge'];
		$params['phone'] = $post['tilpune']; //bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
		$params['address'] = $post['alamate'];
		$params['description'] = empty($post['descr']) ? null : $post['descr'];   //menampilkan null KOSONG BLONG NENG TEXT FORM
		
		$this->db->insert('tabel_supplier', $params);
}

public function edit($post){
	$params['name'] = $post['jenenge'];
			$params['phone'] = $post['tilpune']; //bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
			$params['address'] = $post['alamate'];
			$params['description'] = empty($post['descr']) ? null : $post['descr'];   //menampilkan null KOSONG BLONG NENG TEXT FORM
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('supplier_id', $post['id']);
		$this->db->update('tabel_supplier', $params);
	
	}

	function add_data($datas){
		return $this->db->insert_batch("tabel_supplier",$datas);
		}
}