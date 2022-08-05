<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identifikasibarang extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model(['item_m','supplier_m','unit_m', 'identifikasibarang_m']);

        
    }
    public function dataperawatan(){
        $data['row'] = $this->identifikasibarang_m->get_dataperawatan()->result(); 
        $this->template->load('template', 'identifikasibarang/perawatan/viewdataperawatan', $data);

    }
    public function datakerusakan(){
        $data['row'] = $this->identifikasibarang_m->get_datakerusakan()->result(); 
        $this->template->load('template', 'identifikasibarang/rusak/view_rusaktotal', $data);

    }
    

    public function identifikasibarang_in_dataout(){
        $data['row'] = $this->identifikasibarang_m->get_identifikasibarang_inaout()->result(); 
        $this->template->load('template', 'identifikasibarang/identifikasibarang_out/identifikasibarang_in_dataout', $data);

    }

   

    public function identifikasibarang_in_addout(){
        $item= $this->item_m->get()->result();
        $supplier= $this->supplier_m->get()->result();
        $data = ['item'=> $item, 'supplier' => $supplier];
  $this->template->load('template', 'identifikasibarang/identifikasibarang_out/identifikasibarang_in_formout', $data);
      
    }

   

    public function processdua(){
        if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->identifikasibarang_m->add_identifikasibarang_out($post);
            $this->item_m->update_identifikasibarang_out($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data identifikasibarang-Outguwak berhasil disimpan');
            }
            redirect('identifikasibarang/out');
        }
    }

   

    public function identifikasibarang_in_deldua(){
        $identifikasibarang_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->identifikasibarang_m->get($identifikasibarang_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id'=> $item_id];
        $this->item_m->update_identifikasibarang_in($data);
        $this->identifikasibarang_m->del($identifikasibarang_id);
        if($this->db->affected_rows() > 0){
         $this->session->set_flashdata('success', 'Data identifikasibarang-out berhasil dihapus');
     }
     redirect('identifikasibarang/out');
 
     }

     public function identifikasibarang_in_delrusak(){
        $identifikasibarang_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->identifikasibarang_m->get($identifikasibarang_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id'=> $item_id];
        $this->item_m->updatesetelahdideleterusak($data);
        $this->identifikasibarang_m->del($identifikasibarang_id);
        if($this->db->affected_rows() > 0){
         $this->session->set_flashdata('success', 'Data identifikasibarang-out berhasil dihapus');
     }
     redirect('identifikasibarang/out');
 
     }

    
    public function edit2($id) 
    {
        $query = $this->identifikasibarang_m->gettampilkeedit($id);
        $item= $this->identifikasibarang_m->tampilkankeperbaikanedit()->result();
        if($query->num_rows() > 0 ) {
            $item = $query->row();
            
       $unit = $this->unit_m->get();
        $data = array(
            'page' => 'edit2',
            'row'=> $item,
            'unit'=>$unit,
            
        );
		$this->template->load('template', 'identifikasibarang/perbaikan/viewupdateperbaikan', $data);
        }else{
            
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('item')."';</script>";
        }
        
    }
    

    public function editrusak($id) 
    {
        $query = $this->identifikasibarang_m->gettampilkeedit($id);
        $item= $this->identifikasibarang_m->tampilkankeperbaikanedit()->result();
        if($query->num_rows() > 0 ) {
            $item = $query->row();
            
       $unit = $this->unit_m->get();
        $data = array(
            'page' => 'edit2',
            'row'=> $item,
            'unit'=>$unit,
            
        );
		$this->template->load('template', 'identifikasibarang/rusak/viewupdaterusaktotal', $data);
        }else{
            
            echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('item')."';</script>";
        }
        
    }

    public function processsimpanupdate(){
        if(isset($_POST['in_out'])){
            $post = $this->input->post(null, TRUE);
            $this->identifikasibarang_m->updateidentifikasiedit($post);
            $this->item_m->updateperbaikan($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Data identifikasibarang-Outguwak berhasil disimpan');
            }
            redirect('identifikasibarang/perawatan');


            
        }
    }

    public function processupdaterusak(){
        if(isset($_POST['in_out'])){
            $post = $this->input->post(null, TRUE);
            $this->identifikasibarang_m->updaterusaktotaledit($post);
            $this->item_m->updatekerusakantotal($post);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Rusaktotal! stock akan berkurang');
            }
            redirect('identifikasibarang/rusak');


            
        }
    }

   

    

}