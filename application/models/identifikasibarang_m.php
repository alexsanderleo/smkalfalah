<?php defined('BASEPATH') OR exit('No direct script access allowed');

class identifikasibarang_m extends CI_Model {

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

public function gettampilkeedit($id = null) //get relasi 2 tabel
	{
        $this->db->select(
            'tabel_stock.stock_id, 
            tabel_produkitem.barcode,
            tabel_produkitem.name as item_name,
            qty, 
            date, 
            keteranganrusak,
            barcodekerusakan,
            detailperbaikan,
            diperbaikitanggal,
            tabel_supplier.name as supplier_name, 
            tabel_produkitem.item_id');
            $this->db->from('tabel_stock');
            $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
            $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
		
		if($id != null) {
			$this->db->where('stock_id', $id);

		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
		

	}


public function get_identifikasibarang_inaout()
{
    $this->db->select(
    'tabel_stock.stock_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    qty, 
    date, 
    keteranganrusak,
    barcodekerusakan,
    detailperbaikan,
    diperbaikitanggal,
    tabel_supplier.name as supplier_name, 
    tabel_produkitem.item_id');
    $this->db->from('tabel_stock');
    $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
    $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
    $this->db->where('statusperbaikan', 'rskperbaikan');
    $this->db->order_by('stock_id', 'desc');
    $query = $this->db->get();
    return $query;
}




    public function add_identifikasibarang_out($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'statusperbaikan' => 'rskperbaikan',
            'keteranganrusak' => $post['keteranganbarangrusakcbb'],
            'barcodekerusakan' => $post['barcodekerusakane'],
            'qty' => $post['qty'],
            'date' => $post['tanggale'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_stock', $params);
    }

   

public function updateidentifikasiedit($post) //gtambah update perbaikan
	{
		$params = [
            'stock_id' => $post['stock_id'],
            'item_id' => $post['item_id'],
            'statusperbaikan' => 'perawatan',
            'date' => $post['date'],
            'keteranganrusak' => $post['detailkerusakancbb'],
            
            'barcodekerusakan' => $post['barcodekerusakancbb'],
            'detailperbaikan' => $post['detailperbaikancbb'],
            'diperbaikitanggal' => $post['tanggaldiperbaikicbb'],
            'user_id' => $this->session->userdata('user_id'),
        ];
        $this->db->where('stock_id', $post['stock_id']);
		$this->db->update('tabel_stock', $params);
    }

    public function updaterusaktotaledit($post) //gtambah update perbaikan
	{
		$params = [
            'stock_id' => $post['stock_id'],
            'item_id' => $post['item_id'],
            'statusperbaikan' => 'rusaktotal',
            'date' => $post['date'],
            'keteranganrusak' => $post['detailkerusakancbb'],
            'qty' => $post['qty'],
            'barcodekerusakan' => $post['barcodekerusakancbb'],
            'detailperbaikan' => $post['detailperbaikancbb'],
            'diperbaikitanggal' => $post['tanggaldiperbaikicbb'],
            'user_id' => $this->session->userdata('user_id'),
        ];
        $this->db->where('stock_id', $post['stock_id']);
		$this->db->update('tabel_stock', $params);
    }




    public function get_dataperawatan() //fungsi menampilkan dataperawatan
{
    $this->db->select(
    'tabel_stock.stock_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    qty, 
    date, 
    keteranganrusak,
    barcodekerusakan,
    detailperbaikan,
    diperbaikitanggal,
    tabel_supplier.name as supplier_name, 
    tabel_produkitem.item_id');
    $this->db->from('tabel_stock');
    $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
    $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
    $this->db->where('statusperbaikan', 'perawatan');
    $this->db->order_by('stock_id', 'desc');
    $query = $this->db->get();
    return $query;
}

public function get_datakerusakan() //fungsi menampilkan dataperawatan
{
    $this->db->select(
    'tabel_stock.stock_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    qty, 
    date, 
    keteranganrusak,
    barcodekerusakan,
    detailperbaikan,
    diperbaikitanggal,
    tabel_supplier.name as supplier_name, 
    tabel_produkitem.item_id');
    $this->db->from('tabel_stock');
    $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
    $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
    $this->db->where('statusperbaikan', 'rusaktotal');
    $this->db->order_by('stock_id', 'desc');
    $query = $this->db->get();
    return $query;
}


public function edit($post){
	$params['barcode'] = $post['barcode'];
	$params['name'] = $post['jenenge'];
	$params['category_id'] = $post['category'];
	$params['unit_id'] = $post['unit'];
	$params['price'] = $post['rego'];
	$params['lokasi'] = $post['lokasine'];

			
			$params['updated'] = date('Y-m-d H:i:s');
			
			$this->db->where('item_id', $post['id']);
		$this->db->update('tabel_stock', $params);
	
	}


    public function tampilkankeperbaikanedit($id = null) //get relasi 2 tabel
	{
       $this->db->select(
            'tabel_stock.stock_id, 
            tabel_produkitem.barcode,
            tabel_produkitem.name as item_name,
            qty, 
            date, 
            keteranganrusak,
            barcodekerusakan,
            detailperbaikan,
            diperbaikitanggal,
            tabel_supplier.name as supplier_name, 
            tabel_produkitem.item_id');
            $this->db->from('tabel_stock');
            $this->db->join('tabel_produkitem', 'tabel_stock.item_id= tabel_produkitem.item_id');
            $this->db->join('tabel_supplier', 'tabel_stock.supplier_id= tabel_supplier.supplier_id', 'left');
          



		if($id != null) {
			$this->db->where('stock_id', $id);

		}
		$this->db->order_by('barcode', 'asc');
		$query = $this->db->get();
		return $query;
	}

    
}



