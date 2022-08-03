<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporanpinjam_model extends CI_Model {
   
    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggalpinjam) AS tahun FROM 
        tabel_peminjam GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC
        ");

        return $query->result();
    }

    function filterbytanggal($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT * from tabel_peminjam where
        tanggalpinjam BETWEEN '$tanggalawal' and '$tanggalakhir' ORDER BY tanggalpinjam ASC  ");
        return $query->result();
    }

    function filterbybulan($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * from tabel_peminjam where 
        YEAR(tanggalpinjam) = '$tahun1' and MONTH(tanggalpinjam) BETWEEN 
            '$bulanawal' and '$bulanakhir' ORDER BY tanggalpinjam ASC  ");
        return $query->result();
    }

    function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * from tabel_peminjam where 
        YEAR(tanggalpinjam) = '$tahun1' ORDER BY tanggalpinjam ASC  ");
        return $query->result();
    }


    //===============================================================QUERY SEKO PHPMU==============================================================================\\
    public function view_all(){
        return $this->db->query("SELECT a.namapeminjam, a.qty, a.nik,a.status,a.tanggalpinjam,a.tanggaldikembalikan,a.kondisibarang, b.barcode, b.name as item_name FROM tabel_peminjam a 
        JOIN tabel_produkitem b ON a.item_id=b.item_id GROUP BY a.peminjam_id")->result(); // Tampilkan semua data query pinjam
	}
    public function view_by_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->where('DATE(tanggalpinjam) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir);
		return $this->db->get("tabel_peminjam "); // Tampilkan semua data query pinjam


       $this->db->from('tabel_peminjam');
    $this->db->join('tabel_produkitem', 'tabel_peminjam.item_id= tabel_produkitem.item_id');
   
    $this->db->where('type', 'in');
    $this->db->order_by('peminjam_id', 'desc');
    $query = $this->db->get();
    return $query;
	}
   

 
   

















    function hari_ini(){
        
       //QUERYKU DEWE RUN NENG SQL MANUAL
       // SELECT a.namapeminjam, a.qty, a.nik, b.barcode, b.name as item_name FROM tabel_peminjam a JOIN tabel_produkitem b ON a.item_id=b.item_id   where YEAR(a.tanggalpinjam)=YEAR(NOW()) GROUP BY a.peminjam_id
    }
 
    function minggu_ini(){
       // return $this->db->query("SELECT c.kode_barang, c.nama_barang, sum(a.jumlah_jual) as terjual, b.waktu_proses FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi JOIN mu_barang c ON a.id_barang=c.id_barang  where YEARWEEK(b.waktu_proses)=YEARWEEK(NOW()) GROUP BY c.id_barang");
    }
 
    function bulan_ini(){
       // return $this->db->query("SELECT c.kode_barang, c.nama_barang, sum(a.jumlah_jual) as terjual, b.waktu_proses FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi JOIN mu_barang c ON a.id_barang=c.id_barang  where MONTH(b.waktu_proses)=MONTH(NOW()) GROUP BY c.id_barang");
    }
 
    function tahun_ini(){
      //  return $this->db->query("SELECT c.kode_barang, c.nama_barang, sum(a.jumlah_jual) as terjual, b.waktu_proses FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi JOIN mu_barang c ON a.id_barang=c.id_barang  where YEAR(b.waktu_proses)=YEAR(NOW()) GROUP BY c.id_barang");
    }

    
    



}