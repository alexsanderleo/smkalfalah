<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','category_m','unit_m']);
        
    }
	public function index()
	{
		$tampilno['row'] = $this->item_m->get();
		$this->template->load('template', 'item/viewne_item', $tampilno);
	}

	public function hapus($id) 
    {

        $this->item_m->hapus($id);
        $this->item_m->hapus($id);
         if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data Supp iso berhasil dihapus');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('item')."';</script>";
        }

        public function tambah()
	{
		$item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null;
        $item->lokasi = null;
        $item->price = null;
        $item->category_id = null;
        $item->unit_id = null;
       $category = $this->category_m->get();
       $unit = $this->unit_m->get();
        $data = array(
            'page' => 'tambah',
            'row' =>$item,
            'category'=>$category,
            'unit'=>$unit,
            
        );
		$this->template->load('template', 'item/viewne_itemtambah', $data);
	}

    public function process(){
        $config['upload_path'] = './uploads/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $config['file_name'] = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);


        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['tambah'])){
            if($this->item_m->check_barcode($post['barcodete'])->num_rows() > 0) {
            $this->session->set_flashdata('erorr', "Barcode $post[barcode] sudah dipakai barang lain");
            redirect('item/tambah');
            
        } else {
       
                if(@$_FILES['image']['name'] != null) {
                    if($this->upload->do_upload('image')){
                    $post['image'] = $this->upload->data('file_name');
                    $this->item_m->tambah($post);
                    if($this->db->affected_rows() > 0  ) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                                           
                        }
                       redirect('item');
                    }else{
                        $error = $this->upload->display_errors();
                        echo"<script>alert('erorr,$error');</script>";
                       redirect('item/tambah');

                    }

                    
            }else{
                $post['gambare'] = null;
                    $this->item_m->tambah($post);
                    if($this->db->affected_rows() > 0  ) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                                           
                        }
                       redirect('item');
            }
            
        }

    } else if(isset($_POST['edit'])){
            $this->item_m->edit($post);
        }
        
    }

    public function edit($id) 
    {
        $query = $this->item_m->get($id);
        if($query->num_rows() > 0 ) {
            $item = $query->row();
            $category = $this->category_m->get();
       $unit = $this->unit_m->get();
        $data = array(
            'page' => 'edit',
            'row' =>$item,
            'category'=>$category,
            'unit'=>$unit,
            
        );
		$this->template->load('template', 'item/viewne_itemtambah', $data);
        }else{
            
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('item')."';</script>";
        }
        
    }
}
