<?php

function check_already_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if($user_session) {
        redirect('dashboard');
    }
    
}

function check_not_login() {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('user_id');
    if(!$user_session) {
        redirect('auth/login');
    }
    
}

function check_admin(){ //gawek fungsi selain iki nganggo if ngisor
    $ci =& get_instance();
    $ci->load->library('fungsipropile');
   

    if($ci->fungsipropile->user_login()->level ==1){ //jika level nya adalah 1 dan 2,3,4 maka akan //kosong, else jika tidak maka akan redirect parakno ndi
		//redirect('dashboard');
	}
	else if($ci->fungsipropile->user_login()->level ==2){
		//redirect('dashboard');
	}
    else if($ci->fungsipropile->user_login()->level ==3){
		//redirect('dashboard');
	}
    else if($ci->fungsipropile->user_login()->level ==4){
		//redirect('dashboard');
	
    }
    
	else{
		redirect('dashboard');
	}
   
}

function indo_currency($nominal){
    $result = "Rp" . number_format($nominal, 2, ',', '.');
    return $result;
}
function indo_date($date){
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);
    return $d.'/'.$m.'/'.$y;
}
    

