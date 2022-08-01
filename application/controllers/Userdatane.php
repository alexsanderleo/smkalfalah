<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdatane extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_not_login();     
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }
	public function index()
	{
		//-----------------------------------------------------------------NAMPILNE DATABBASE USER KEDALAM ROW----------------------------------\\
        $tampilne['row'] = $this->user_m->get();
		$this->template->load('template', 'user/viewne_userdatane', $tampilne);
	}
    //-----------------------------------------------------------------END NAMPILNE DATABBASE USER KEDALAM ROW----------------------------------\\
    //----------------------------------------password=DATABASE KIRI, 'Passwordnya' TENGAH NAMA VIEW, 'required' PESAN ERORR);
    public function add() 
    {
       
        $this->form_validation->set_rules('jenenge', 'Namanya', 'required');
        $this->form_validation->set_rules('usernamee', 'Usernamenya', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
         array('matches' => '%s tidak sesuai dengan password')
        
        );
        $this->form_validation->set_rules('alamatnya', 'alamatnya', 'required');
        $this->form_validation->set_rules('levele', 'Levelnya', 'required');
        //---------------------------------------GANTI PESAN--------SET-MESSAGE--------------------------------------------------------------\\
        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if ($this->form_validation->run() == False) {
            $this->template->load('template', 'user/viewneadd');

        } else {
               $post = $this->input->post(null, TRUE);
               $this->user_m->add($post);

               if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data berhasil disimpan');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('userdatane')."';</script>";
        }
        

		
    }

    public function del() 
    {

        $id = $this->input->post('user_id');
        $this->user_m->del($id);
         if($this->db->affected_rows() > 0  ) {
                    echo"<script>alert('Data iso berhasil dihapus');</script>";
                                      
                   }
                   echo "<script>window.location='".site_url('userdatane')."';</script>";
        }

  
        public function edit($id) 
        {
            
            $this->form_validation->set_rules('jenenge', 'Namanya', 'required');
            $this->form_validation->set_rules('usernamee', 'Usernamenya', 'required|min_length[5]|callback_username_check');
            $this->form_validation->set_rules('password', 'password');
            
            $this->form_validation->set_rules('levele', 'Levelnya', 'required');
            //---------------------------------------GANTI PESAN--------SET-MESSAGE--------------------------------------------------------------\\
            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
            $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti');
            $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
    
            if ($this->form_validation->run() == False) {
                $query = $this->user_m->get($id);
                if($query->num_rows() > 0) {
                    $data['row'] = $query->row();
                $this->template->load('template', 'user/viewneedit', $data);
                }else {
                    echo"<script>alert('Data tidak ditemukan');";
                    echo "window.location='".site_url('userdatane')."';</script>";
                }


            } else {
                $post = $this->input->post(null, TRUE);
                $this->user_m->edit($post);
 
                if($this->db->affected_rows() > 0  ) {
                     echo"<script>alert('Data berhasil disimpan');</script>";
                                       
                    }
                    echo "<script>window.location='".site_url('userdatane')."';</script>";
         }
         
        }

        function username_check() {
            $post = $this->input->post(null, TRUE);
            $query = $this->db->query("SELECT * FROM user WHERE username = '$post[usernamee]' AND user_id !='$post[user_id]'");
            if($query->num_rows() > 0) {            
            $this->form_validation->set_message('username_check', '{field} wis ono sing nganggo silahkan ganti');
            return FALSE;
            }else {
                return TRUE;
            }
        }

}
