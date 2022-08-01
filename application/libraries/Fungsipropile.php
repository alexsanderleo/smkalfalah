<?php
Class Fungsipropile{

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
            }
            //---------------------------------------------------nampilno user login berdasarkan tabel user login dengan librari berdasarkan ROW------------------------\\
    function user_login() {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
//---------------------------------------------------ENDDDDDDD nampilno user login berdasarkan tabel user login dengan librari------------------------\\
    public function count_item(){
        $this->ci->load->model('item_m');
        return $this->ci->item_m->get()->num_rows();
    }

    public function count_supplier(){
        $this->ci->load->model('supplier_m');
        return $this->ci->supplier_m->get()->num_rows();
    }

    public function count_customer(){
        $this->ci->load->model('customer_m');
        return $this->ci->customer_m->get()->num_rows();
    }

    public function count_user(){
        $this->ci->load->model('unit_m');
        return $this->ci->unit_m->get()->num_rows();
    }

}

