<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {


	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}
//---------------------------------------------------nampilno TB user berdasarkan kolom user_id login dengan librari berdasarkan ROW------------------------\\
	public function get($id = null)
	{
		$this->db->from('user');
		if($id != null) {
			$this->db->where('user_id', $id);

		}
		$query = $this->db->get();
		return $query;

	}
	//---------------------------------------------------END nampilno TB user berdasarkan kolom user_id login dengan librari berdasarkan ROW------------------------\\
	public function add($post)
	{
		$params['name'] = $post['jenenge'];
		$params['username'] = $post['usernamee']; //bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
		$params['password'] = sha1($post['password']);
		$params['address'] = $post['alamatnya'];
		$params['level'] = $post['levele'];
		$this->db->insert('user', $params);

	}

	public function del($id) //id ini itu dibaca dibawahnya alias user_id sbg primary key
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');

    }

	public function edit($post)
	{
		$params['name'] = $post['jenenge'];
		$params['username'] = $post['usernamee']; //bacanya kiri dari field DATABASE/kolom, Kanan adalah dari form name=
		
		if(!empty($post['password'])){
		$params['password'] = sha1($post['password']);
		}
		$params['address'] = $post['alamatnya'] !="" ? $post['alamatnya'] : null;
		$params['level'] = $post['levele'];
		$this->db->where('user_id', $post['user_id']);
		$this->db->update('user', $params);
	}
	
	
}

