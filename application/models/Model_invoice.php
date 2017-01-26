<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model {

	public function get_by_id($id_purchase_order)
	{
		return $this->db->select('i.*, po.*, s.*, p.*')
						->from('invoice as i')
						->join('purchase_order as po','po.id_purchase_order = i.id_purchase_order')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						->join('supplier as s','s.id_supplier = i.id_supplier')
						->limit(1)
						->where('i.id_purchase_order', $id_purchase_order)
						->get();
	}

	public function check_invoice($id_purchase_order)
	{
		return $this->db->select('i.*, po.*')
						->from('invoice as i')
						->join('purchase_order as po','po.id_purchase_order = i.id_purchase_order')
						->where('po.id_purchase_order', $id_purchase_order)
						->get();
	}	
	
	public function add($data)
	{
		$this->db->insert('invoice', $data);
	}

	// count purchase order dan count invoice
	// dicount ada berapa nanti dikurang untuk mengetahui po yang belum diorder
	public function count_po()
	{
		return $this->db->select('po.*')
						->from('purchase_order as po')
						->get();
	}

	public function count_invoice()
	{
		return $this->db->select('i.*')
						->from('invoice as i')
						->get();
	}	

}

/* End of file Model_invoice.php */
/* Location: ./application/models/Model_invoice.php */