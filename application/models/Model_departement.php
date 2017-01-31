<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_departement extends CI_Model {

	public function get_all()
	{
		return $this->db->select('d.*')
						->from('departement as d')
						->order_by('d.id_departement','DESC')
						->get();
	}
	
	public function get_by_id($id_departement)
	{
		return $this->db->select('d.*')
					->from('departement as d')
					->limit(1)
					->where('d.id_departement', $id_departement)
					->get();	
	}

}

/* End of file Model_departement.php */
/* Location: ./application/models/Model_departement.php */