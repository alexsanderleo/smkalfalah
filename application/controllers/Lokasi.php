<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('lokasi_m');
        
    }
	public function index()
	{
		$tampilno['row'] = $this->lokasi_m->get();
		$this->template->load('template', 'lokasi/viewne_lokasi', $tampilno);
	}

	public function hapus($id) 
    {

        $this->lokasi_m->hapus($id);
        $this->lokasi_m->hapus($id);
        }

        public function tambah()
	{
		$lokasi = new stdClass();
        $lokasi->lokasi_id = null;
        $lokasi->namalokasi = null;
        
        $data = array(
            'page' => 'tambah',
            'row' =>$lokasi
            
        );
		$this->template->load('template', 'lokasi/viewne_lokasitambah', $data);
	}

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->lokasi_m->tambah($post);
        } else if(isset($_POST['edit'])){
            $this->lokasi_m->edit($post);
        }
        if($this->db->affected_rows() > 0  ) {
           $this->session->set_flashdata('success', 'Data berhasil disimpan');
          
                              
           }
          redirect('lokasi');
    }

    public function edit($id) 
    {
        $query = $this->lokasi_m->get($id);
        if($query->num_rows() > 0 ) {
            $lokasi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $lokasi
            );
            $this->template->load('template', 'lokasi/viewne_lokasitambah', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('lokasi')."';</script>";
        }
        
    }
}
