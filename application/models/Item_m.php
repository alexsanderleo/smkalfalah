<?php defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model {


public function get($id = null) //get relasi 2 tabel
	{
		$this->db->select('tabel_produkitem.*, tabel_produkcategory.name as kategori_name, tabel_produkunit.name as unite_name ');
		$this->db->from('tabel_produkitem');
		$this->db->join('tabel_produkcategory', 'tabel_produkcategory.category_id = tabel_produkitem.category_id');
		$this->db->join('tabel_produkunit', 'tabel_produkunit.unit_id = tabel_produkitem.unit_id');
		
		if($id != null) {
			$this->db->where('item_id', $id);

		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
		

	}
	public function hapus($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('item_id', $id);
        $this->db->delete('tabel_produkitem'); //ini tabel

    }

public function tambah($post){
	$params['barcode'] = $post['barcodete'];
$params['name'] = $post['jenenge'];
$params['category_id'] = $post['category'];
$params['unit_id'] = $post['unit'];
$params['price'] = $post['rego'];
$params['image'] = $post['image'];
$params['created'] = date('Y-m-d H:i:s');
$params['lokasi'] = $post['lokasine'];
		
		$this->db->insert('tabel_produkitem', $params);
}

public function edit($post){
	$params['barcode'] = $post['barcodete'];
	$params['name'] = $post['jenenge'];
	$params['category_id'] = $post['category'];
	$params['unit_id'] = $post['unit'];
	$params['price'] = $post['rego'];
	$params['lokasi'] = $post['lokasine'];

			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('item_id', $post['id']);
		$this->db->update('tabel_produkitem', $params);
	
	}

	function check_barcode($code, $id= null) {
		$this->db->from('tabel_produkitem');
		$this->db->where('barcode', $code);
		if ($id != null) {
			$this->db->where('item_id !=', $code);
		}
		if($post['image'] != null)  {
			$param['image'] = $post['image'];

		}
		
		$query = $this->db->get();
		return $query;
	}

 function update_stock_in($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock + '$qty' WHERE item_id = '$id'";
	$this->db->query($sql);
 }

 function update_stock_out($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock - '$qty' WHERE item_id = '$id'";
	$this->db->query($sql);
 }



 function update_pinjam_in($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock - '$qty' WHERE item_id = '$id'";
	$this->db->query($sql);
 }

 function update_pinjam_out($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock + '$qty' WHERE item_id = '$id'";
	$this->db->query($sql);
 }
 function kembalikanwae($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock + '$qty' WHERE item_id = '$id'";
	$this->db->query($sql);
 }

 function update_pinjam_in3($data)
 {
	$qty = $data['qty'];
	$id = $data['item_id'];
	$sql= "UPDATE tabel_produkitem SET stock = stock + '$qty' WHERE item_id = '$id'";
	
	$this->db->query($sql);
 }

}