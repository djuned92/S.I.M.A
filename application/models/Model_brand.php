<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_brand extends CI_Model {

	public function get_all()
	{
		return $this->db->select('b.*')
						->from('brand as b')
						->order_by('b.id_brand','DESC')
						->get();
	}	

}

/* End of file Model_brand.php */
/* Location: ./application/models/Model_brand.php */