<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','supplier_m','unit_m', 'stock_m']);

        
    }

    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stock_in()->result(); 
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);

    }

    public function stock_in_dataout(){
        $data['row'] = $this->stock_m->get_stock_inaout()->result(); 
        $this->template->load('template', 'transaction/stock_out/stock_in_dataout', $data);

    }

    public function stock_in_add(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
      
    }

    public function stock_in_addout(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'transaction/stock_out/stock_in_formout', $data);
      
    }

    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Stock-In berhasil disimpan');
            }
            redirect('stock/in');
        }
    }

    public function processdua(){
        if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data Stock-Outguwak berhasil disimpan');
            }
            redirect('stock/out');
        }
    }

    public function stock_in_del(){
       $stock_id = $this->uri->segment(4);
       $item_id = $this->uri->segment(5);
       $qty = $this->stock_m->get($stock_id)->row()->qty;
       $data = ['qty' => $qty, 'item_id'=> $item_id];
       $this->item_m->update_stock_out($data);
       $this->stock_m->del($stock_id);
       if($this->db->affected_rows() > 0){
        $this->session->set_flashdata('success', 'Data Stock-in berhasil dihapus');
    }
    redirect('stock/in');

    }

    public function stock_in_deldua(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id'=> $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0){
         $this->session->set_flashdata('success', 'Data Stock-out berhasil dihapus');
     }
     redirect('stock/out');
 
     }
}