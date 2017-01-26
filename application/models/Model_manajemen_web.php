<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_manajemen_web extends CI_Model {

	public function get()
	{
		$q = $this->db->select('m.*')
						->from('manajemen_web as m')
						->where('m.id_manajemen_web', 1)
						->get();
		return $q;
	}

	public function update($data)
	{
		$this->db->where('id_manajemen_web', 1)->update('manajemen_web', $data);
	}	

}

/* End of file Model_manajemen_web.php */
/* Location: ./application/models/Model_manajemen_web.php */