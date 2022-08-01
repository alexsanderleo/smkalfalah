<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('category_m');
        
    }
	public function index()
	{
		$tampilno['row'] = $this->category_m->get();
		$this->template->load('template', 'category/viewne_category', $tampilno);
	}

	public function hapus($id) 
    {

        $this->category_m->hapus($id);
        $this->category_m->hapus($id);
        }

        public function tambah()
	{
		$category = new stdClass();
        $category->category_id = null;
        $category->name = null;
        
        $data = array(
            'page' => 'tambah',
            'row' =>$category
            
        );
		$this->template->load('template', 'category/viewne_categorytambah', $data);
	}

    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            $this->category_m->tambah($post);
        } else if(isset($_POST['edit'])){
            $this->category_m->edit($post);
        }
        if($this->db->affected_rows() > 0  ) {
           $this->session->set_flashdata('success', 'Data berhasil disimpan');
          
                              
           }
          redirect('category');
    }

    public function edit($id) 
    {
        $query = $this->category_m->get($id);
        if($query->num_rows() > 0 ) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'category/viewne_categorytambah', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('category')."';</script>";
        }
        
    }
}
