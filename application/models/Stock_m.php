<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

public function get($id = null)
{
    $this->db->from('tabel_stock');
    if($id != null) {
        $this->db->where('stock_id', $id);
            }
            $query = $this->db->get();
            return $query;
}

public function del($id)
{
$this->db->where('stock_id', $id);
$this->db->delete('tabel_stock');
}

public function get_stock_in()
{
    $this->db->select(
    'tabel_stock.stock_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    qty, 
    date, 
    detail,
    tabel_supplier.name as supplier_name, 
    tabel_produkitem.item_id');
    $this->db->from('tabel_stock');
    $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
    $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
    $this->db->where('type', 'in');
    $this->db->order_by('stock_id', 'desc');
    $query = $this->db->get();
    return $query;
}


public function get_stock_inaout()
{
    $this->db->select(
    'tabel_stock.stock_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    qty, 
    date, 
    detail,
    tabel_supplier.name as supplier_name, 
    tabel_produkitem.item_id');
    $this->db->from('tabel_stock');
    $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
    $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
    $this->db->where('type', 'out');
    $this->db->order_by('stock_id', 'desc');
    $query = $this->db->get();
    return $query;
}

public function add_stock_in($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['tanggale'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_stock', $params);
    }


    public function add_stock_out($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['tanggale'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_stock', $params);
    }
}



