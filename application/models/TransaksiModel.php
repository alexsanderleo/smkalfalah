<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TransaksiModel extends CI_Model {
    public function view_all(){
		return $this->db->get('tabel_supplier')->result(); // Tampilkan semua data supplier
	}

    public function view_by_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->where('DATE(created) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya

		return $this->db->get('tabel_supplier')->result();// Tampilkan data supplier sesuai tanggal yang diinput oleh user pada filter
	}
}
