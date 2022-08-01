<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_m extends CI_Model {

public function get($id = null)
{
    $this->db->from('tabel_peminjam');
    if($id != null) {
        $this->db->where('peminjam_id', $id);
            }
            $query = $this->db->get();
            return $query;
}

public function del($id)
{
$this->db->where('peminjam_id', $id);
$this->db->delete('tabel_peminjam');
}



public function get_pinjam_in()
{
    $this->db->select(
    'tabel_peminjam.peminjam_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    namapeminjam,
    qty,
    nik,
    kondisibarang,
    tanggalpinjam,
    tanggaldikembalikan,  
    status,
    
    tabel_produkitem.item_id');
    $this->db->from('tabel_peminjam');
    $this->db->join('tabel_produkitem', 'tabel_peminjam.item_id= tabel_produkitem.item_id');
   
    $this->db->where('type', 'in');
    $this->db->order_by('peminjam_id', 'desc');
    $query = $this->db->get();
    return $query;
}

public function tampilkanseluruhdatane()
{
    $this->db->select(
    'tabel_peminjam.peminjam_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    namapeminjam,
    qty,
    nik,
    kondisibarang,
    tanggalpinjam,
    tanggaldikembalikan,  
    status,
    
    tabel_produkitem.item_id');
    $this->db->from('tabel_peminjam');
    $this->db->join('tabel_produkitem', 'tabel_peminjam.item_id= tabel_produkitem.item_id');
   
    $this->db->where('status', 'K');
    $this->db->order_by('peminjam_id', 'desc');
    $query = $this->db->get();
    return $query;
}


public function get_pinjam_inaout()
{
    $this->db->select(
    'tabel_peminjam.peminjam_id, 
    tabel_produkitem.barcode,
    tabel_produkitem.name as item_name,
    namapeminjam,
    qty,
    nik,
    kondisibarang,
    tanggalpinjam,
    tanggaldikembalikan,  
    status,
    
    
    
    tabel_produkitem.item_id');
    $this->db->from('tabel_peminjam');
    $this->db->join('tabel_produkitem', 'tabel_peminjam.item_id= tabel_produkitem.item_id');
    
    $this->db->where('status', 'P');
    $this->db->order_by('peminjam_id', 'desc');
    $query = $this->db->get();
    return $query;
}

public function add_pinjam_in($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'namapeminjam' => $post['namapeminjame'],
            
            'qty' => $post['qty'],
          
            'tanggalpinjam' => $post['tanggaldipinjam'],
            'tanggaldikembalikan' => $post['tanggaldikembalikan'],
            'nik' => $post['nike'],
            'status' => $post['statuse'],
            'kondisibarang' => $post['kondisibarange'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_peminjam', $params);
    }

    public function add_pinjam_in2($post) //get relasi 2 tabel
	{
		$params = [
            'peminjam_id' => $post['peminjam_id'],
            'item_id' => $post['item_id'],
            'type' => 'in',
            'namapeminjam' => $post['namapeminjam'],
            
            'qty' => $post['qty'],
          
            
            'tanggaldikembalikan' => $post['tanggale'],
            
            'status' => $post['statuse'],
            'kondisibarang' => $post['kondisibarange'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_peminjam', $params);
    }

   

    public function add_pinjam_out($post) //get relasi 2 tabel
	{
		$params = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'qty' => $post['qty'],
            'date' => $post['tanggaldikembalikan'],
            'namapeminjam' => $post['namapeminjame'],
            'status' => $post['statuse'],
            'kondisibarang' => $post['kondisibarange'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            $this->db->insert('tabel_peminjam', $params);
    }


    public function add_pinjam_out2($post) //get relasi 2 tabel
	{
		$params = [
       
            
            'type' => 'in',
            'namapeminjam' => $post['namapeminjam'],
            
            'qty' => $post['qty'],
          
            
            'tanggaldikembalikan' => $post['tanggale'],
            
            'status' => $post['statuse'],
            'kondisibarang' => $post['kondisibarange'],
            'user_id' => $this->session->userdata('user_id'),
        ];
            
            $this->db->update('tabel_peminjam', $params);



           
    }

    public function edit($post){
        $params['namapeminjam'] = $post['namapeminjam'];
                $params['phone'] = $post['tilpune']; //bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
                $params['qty'] = $post['qty'];
                $params['description'] = empty($post['descr']) ? null : $post['descr'];   //menampilkan null KOSONG BLONG NENG TEXT FORM
                $params['updated'] = date('Y-m-d H:i:s');
                
                $this->db->where('supplier_id', $post['id']);
            $this->db->update('tabel_supplier', $params);
        
        }
    
    public function editinserte3($post) //get relasi 2 tabel
	    {
		$params = [
            
            'peminjam_id' => $post['peminjam_id'],
            'type' => 'in',
            'item_id' => $post['item_id'],
            
            'qty' => $post['qty'],
          
            
            'tanggaldikembalikan' => $post['tanggaldikembalikanecbb'],
            
            'status' => $post['statusecbb'],
            'kondisibarang' => $post['kondisibarangecbb'],
            'user_id' => $this->session->userdata('user_id'),
        ];
       $this->db->where('peminjam_id', $post['peminjam_id']);
            $this->db->update('tabel_peminjam', $params);
        }
}



