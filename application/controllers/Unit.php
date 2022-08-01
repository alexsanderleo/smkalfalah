<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('unit_m');
        
    }
	public function index()
	{
		$tampilno['row'] = $this->unit_m->get();
		$this->template->load('template', 'unit/viewne_unit', $tampilno);
	}

	public function hapus($id) 
    {

        $this->unit_m->hapus($id);
        $this->unit_m->hapus($id);
         if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data Supp iso berhasil dihapus');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('unit')."';</script>";
        }

        public function tambah()
	{
		$unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        
        $data = array(
            'page' => 'tambah',
            'row' =>$unit
            
        );
		$this->template->load('template', 'unit/viewne_unittambah', $data);
	}

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->unit_m->tambah($post);
        } else if(isset($_POST['edit'])){
            $this->unit_m->edit($post);
        }
        if($this->db->affected_rows() > 0  ) {
           $this->session->set_flashdata('success', 'Data berhasil disimpan');
                              
           }
          redirect('unit');
    }

    public function edit($id) 
    {
        $query = $this->unit_m->get($id);
        if($query->num_rows() > 0 ) {
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'unit/viewne_unittambah', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('unit')."';</script>";
        }
        
    }
}
