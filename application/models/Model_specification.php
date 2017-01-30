<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_specification extends CI_Model {

	public function add($data)
	{
		$this->db->insert('specification', $data);
	}	

}

/* End of file Model_specification.php */
/* Location: ./application/models/Model_specification.php */