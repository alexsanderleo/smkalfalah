<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanpinjam_model extends CI_Model {
    public function view_all(){
		return $this->db->get('tabel_peminjam')->result(); // Tampilkan semua data supplier
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
    public function view_by_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->where('DATE(tanggalpinjam) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya

		return $this->db->get('tabel_peminjam')->result();// Tampilkan data supplier sesuai tanggal yang diinput oleh user pada filter
	}
}
