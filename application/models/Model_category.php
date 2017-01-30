<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_category extends CI_Model {

	public function get_all()
	{
		return $this->db->select('c.*')
						->from('category as c')
						->order_by('c.id_category','DESC')
						->get();
	}
	

}

/* End of file Model_category.php */
/* Location: ./application/models/Model_category.php */