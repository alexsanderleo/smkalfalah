<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('viewne_login');
	}
//=======================================KODINGAN PROSESS UNTUK MULTI LOGIN==============================//
	public function process()//proses untuk  input post login  e ketok e
	{
		$post  = $this->input->post(null, TRUE);
		if(isset($post['login'])) {
			$this->load->model('user_m');
			$query =  $this->user_m->login($post);
			if($query->num_rows() > 0) {
				$row =$query->row();
				$params  = array(
					'user_id'  => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat, login iso');
					window.location='".site_url('dashboard')."';
				</script>";

			} else  {
				
				echo "<script>
					alert('Maaf, login ga iso');
					window.location='".site_url('Auth/login')."';
				</script>";
			}
		}
	}


	public function logout()//=======================================FUNGSI UNTUK LOGOUT AUTH LOGIN==============================//
	{
		$params = array('user_id', 'level');
		$this->session->unset_userdata($params);
		
		echo "<script>
					alert('Logout iso!');
					window.location='".site_url('Auth/login')."';
				</script>";

	}
}
//=======================================END===KODINGAN PROSESS UNTUK MULTI LOGIN==============================//