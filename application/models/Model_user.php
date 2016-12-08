<?php

class Model_user extends CI_Model{
	
	// cek users login
	public function check_credential()
	{
		$this->load->helper('security');

		$pwd = $this->input->post('password');
		$data = array(
		 		'Username'	=> $this->input->post('username'),
		 		'Password'	=> do_hash($pwd)
		 	); 

		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('tb_user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}
	}

	// cek username
	public function check_username()
	{
		$data = array(
			'Username'	=> $this->input->post('username')
			);
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('tb_user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}

	}

	// cek status aktif / tidak aktif
	public function check_status_user()
	{
		$data = array(
		 		'Username'	=> $this->input->post('username'),
		 		'Status'	=> 1
		 	); 
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('tb_user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}	
	}
}