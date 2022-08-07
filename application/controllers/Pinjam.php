<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','supplier_m','unit_m', 'pinjam_m']);

        
    }

    public function pinjam_in_data(){
        $data['row'] = $this->pinjam_m->get_pinjam_in()->result(); 
        $this->template->load('template', 'transaction/pinjam_in/pinjam_in_data', $data);

    }

   

    public function pinjam_in_add(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'transaction/pinjam_in/pinjam_in_form', $data);
      
    }



    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->pinjam_m->add_pinjam_in($post);
            $this->item_m->update_pinjam_in($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data pinjam-In berhasil disimpan');
            }
            redirect('pinjam/in');
        }
    }

    public function processdua(){
        if(isset($_POST['out_add'])){


            
            $post = $this->input->post(null, TRUE);
            $this->pinjam_m->add_pinjam_in2($post);
            $this->item_m->update_pinjam_out($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data berhasil dipinjamkan');
            }
            redirect('pinjam/in');
        }
    }

    

    public function pinjam_in_del(){
       $pinjam_id = $this->uri->segment(4);
       $item_id = $this->uri->segment(5);
       $qty = $this->pinjam_m->get($pinjam_id)->row()->qty;
       $data = ['qty' => $qty, 'item_id'=> $item_id];
       $this->item_m->update_pinjam_out($data);
       $this->pinjam_m->del($pinjam_id);
       if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Data pinjam-in berhasil dihapus');
    }
    redirect('pinjam/in');

    }

    public function pinjam_in_deldua(){
        $pinjam_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->pinjam_m->get($pinjam_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id'=> $item_id];
        $this->item_m->update_pinjam_in($data);
        $this->pinjam_m->del($pinjam_id);
        if($this->db->affected_rows() > 0){
         $this->session->set_flashdata('success', 'Data pinjam-out berhasil dihapus');
     }
     redirect('pinjam/out');
 
     }


     public function pinjam_out_dataout(){
        $data['row'] = $this->pinjam_m->get_pinjam_inaout()->result(); 
        $this->template->load('template', 'transaction/pinjam_out/pinjam_out_dataout', $data);

    }

    public function pinjam_out_addout(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'transaction/pinjam_out/pinjam_out_formout', $data);
      
    }

    public function edit() 
    {
        $query = $this->pinjam_m->get_pinjam_in();
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = $this->pinjam_m->get_pinjam_in()->result(); 
        
        if($query->num_rows() > 0 ) {
            
            $pinjam = $query->row();
            $data = array(
                'page' => 'edit',
                'item'=> $item,
                'supplier'=> $supplier,
                'row' => $data
              
            );
                  
            
            $this->template->load('template', 'kembalikan/kembalikanpinjaman', $data);
        }else{
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('supplier')."';</script>";
        }
        
    }
        
        
    public function processtiga(){
        if(isset($_POST['in_out'])){
            $post = $this->input->post(null, TRUE);
            $this->pinjam_m->editinserte3($post);
            $this->item_m->update_pinjam_in3($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data pinjam-In berhasil disimpan');
            }
            redirect('pinjam/in');
        }
    }
    
}