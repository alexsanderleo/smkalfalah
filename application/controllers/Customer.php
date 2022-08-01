<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('customer_m');
        
    }
	public function index()
	{
		$tampilno['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/viewne_customer', $tampilno);
	}

	public function hapus($id) 
    {

        $this->customer_m->hapus($id);
        $this->customer_m->hapus($id);
         if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data Supp iso berhasil dihapus');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('customer')."';</script>";
        }

        public function tambah()
	{
		$customer = new stdClass();
        $customer->customer_id = null;
        $customer->name = null;
        $customer->gender= null;
        $customer->phone = null;
        $customer->address = null;
        $data = array(
            'page' => 'tambah',
            'row' =>$customer
            
        );
		$this->template->load('template', 'customer/viewne_customertambah', $data);
	}

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->customer_m->tambah($post);
        } else if(isset($_POST['edit'])){
            $this->customer_m->edit($post);
        }
        if($this->db->affected_rows() > 0  ) {
            echo"<script>alert('Data Supp iso berhasil disimpan');</script>";
                              
           }
           echo "<script>window.location='".site_url('customer')."';</script>";
    }

    public function edit($id) 
    {
        $query = $this->customer_m->get($id);
        if($query->num_rows() > 0 ) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/viewne_customertambah', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('customer')."';</script>";
        }
        
    }
}
