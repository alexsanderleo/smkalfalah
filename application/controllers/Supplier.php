<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
 
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('supplier_m');
        
    }

    
	public function index()
	{
        $tampilno['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/viewne_supplier', $tampilno);
        
        $data['title'] = 'Codeigniter 3 - PHPSpreadsheet';
        $data['transaction_list'] = $this->supplier_m->fetch_transactions();
        
        
       
	}


	public function hapus($id) 
    {

        $this->supplier_m->hapus($id);
        $this->supplier_m->hapus($id);
         if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data Supp iso berhasil dihapus');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('supplier')."';</script>";
        }

        public function tambah()
	{
		$supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = array(
            'page' => 'tambah',
            'row' =>$supplier
            
        );
		$this->template->load('template', 'supplier/viewne_suppliertambah', $data);
	}

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->supplier_m->tambah($post);
        } else if(isset($_POST['edit'])){
            $this->supplier_m->edit($post);
        }
        if($this->db->affected_rows() > 0  ) {
            echo"<script>alert('Data Supp iso berhasil disimpan');</script>";
                              
           }
           echo "<script>window.location='".site_url('supplier')."';</script>";
    }

    public function edit($id) 
    {
        $query = $this->supplier_m->get($id);
        if($query->num_rows() > 0 ) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template', 'supplier/viewne_suppliertambah', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('supplier')."';</script>";
        }
        
    }

   
   
    
}
