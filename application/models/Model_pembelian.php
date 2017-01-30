<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembelian extends CI_Model {

	public function add($data)
	{
		$this->db->insert('pembelian', $data);
	}
	
}

/* End of file Model_pembelian.php */
/* Location: ./application/models/Model_pembelian.php */