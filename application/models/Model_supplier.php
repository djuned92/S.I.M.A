<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_supplier extends CI_Model {

	public function get_all()
	{
		return $this->db->select('s.*')
						->from('supplier as s')
						->order_by('s.id_supplier','DESC')
						->get();
	}

	public function get_by_id($id_supplier)
	{
		return $this->db->select('s.*')
				->from('supplier as s')
				->limit(1)
				->where('s.id_supplier', $id_supplier)
				->get();	
	}

	public function add($data)	
	{
		$this->db->insert('supplier', $data);
	}

}

/* End of file Model_supplier.php */
/* Location: ./application/models/Model_supplier.php */