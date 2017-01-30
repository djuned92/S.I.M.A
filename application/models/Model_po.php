<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_po extends CI_Model {

	public function add($data)
	{
		$this->db->insert('purchase_order', $data);
	}

	public function get_all()
	{
		return $this->db->select('po.*, p.*, u.name, d.*, b.*, s.*')
						->from('purchase_order as po')
						->join('purchase as p','po.id_purchase = p.id_purchase')
						->join('pembelian as b','b.id_purchase_order = po.id_purchase_order')
						->join('supplier as s','s.id_supplier = b.id_supplier')
						->join('user as u','p.id_user = u.id_user')
						->join('departement as d','u.id_departement = d.id_departement')
						->order_by('b.id_purchase_order', 'DESC')
						->get();
	}

	// purchase request
	public function get_by_id($id_purchase)
	{
		return $this->db->select('po.*, p.*')
						->from('purchase_order as po')
						->join('purchase as p','po.id_purchase = p.id_purchase')
						->limit(1)
						->where('po.id_purchase', $id_purchase)
						->get();	
	}

	// purchase order
	public function po_by_id($id_pembelian)
	{
		return $this->db->select('po.*, p.*, beli.*, s.*')
						->from('purchase_order as po')
						->join('purchase as p','po.id_purchase = p.id_purchase')
						->join('pembelian as beli','beli.id_purchase_order = po.id_purchase_order')
						->join('supplier as s','s.id_supplier = beli.id_supplier')
						->limit(1)
						->where('beli.id_pembelian', $id_pembelian)
						->get();	
	}

	// get po id untuk update
	public function get_po_id($id_purchase_order)
	{
		return $this->db->select('po.*, p.*, beli.*, s.*')
						->from('purchase_order as po')
						->join('purchase as p','po.id_purchase = p.id_purchase')
						->join('pembelian as beli','beli.id_purchase_order = po.id_purchase_order')
						->join('supplier as s','s.id_supplier = beli.id_supplier')
						->limit(1)
						->where('po.id_purchase_order', $id_purchase_order)
						->get();	
	}	

	public function update($data, $id_purchase_order)
	{
		$this->db->where('id_purchase_order', $id_purchase_order)->update('purchase_order', $data);
	}

	public function check_po($id_purchase)
	{
		return $this->db->select('po.*')
						->from('purchase_order as po')
						->where('po.id_purchase', $id_purchase)
						->get();
	}

	// count purchase setuju dan count purchase order
	// dicount ada berapa nanti dikurang untuk mengetahui purchase setuju yang belom diorder
	public function count_purchase_setuju()
	{
		$where = "p.status_purchase = 'Setuju'";
		return $this->db->select('p.id_purchase, po.id_purchase')
						->from('purchase as p')
						->join('purchase_order as po','p.id_purchase = po.id_purchase','left')
						->where($where)
						->get();
	}

	public function count_purchase_order()
	{
		$where = "p.status_purchase = 'Setuju'";
		return $this->db->select('p.id_purchase, po.id_purchase')
						->from('purchase as p')
						->join('purchase_order as po','p.id_purchase = po.id_purchase','right')
						->where($where)
						->get();
	}	

}

/* End of file Model_po.php */
/* Location: ./application/models/Model_po.php */