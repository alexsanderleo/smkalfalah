<?php
Class Siswa_model extends CI_Model{
	
	function getData()
	{
		$data_siswa = $this->db->get('tabel_supplier');
		return $data_siswa->result();
	}
}
?>