<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model {

	public function get_all()
	{
		return $this->db->select('i.*, po.*, p.*, d.*, u.*, beli.*, s.*') //
						->from('invoice as i')
						->join('pembelian as beli','i.id_pembelian = beli.id_pembelian')
						->join('purchase_order as po','po.id_purchase_order = beli.id_purchase_order')
						->join('supplier as s','s.id_supplier = beli.id_supplier')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						->join('user as u','u.id_user = p.id_user')
						->join('departement as d','d.id_departement = u.id_departement')
						->order_by('i.id_invoice','DESC')
						->get();
	}

	public function get_by_id($id_invoice)
	{
		return $this->db->select('i.*, po.*, p.*, d.*, u.*, s.*, b.*')
						->from('invoice as i')
						->join('pembelian as b','b.id_pembelian = i.id_pembelian')
						->join('purchase_order as po','po.id_purchase_order = b.id_purchase_order')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						->join('user as u','u.id_user = p.id_user')
						->join('departement as d','d.id_departement = u.id_departement')
						->join('supplier as s','s.id_supplier = b.id_supplier')
						->limit(1)
						->where('i.id_invoice', $id_invoice)
						->get();
	}

	public function get_invoice_purchase_order($id_purchase_order)
	{
		return $this->db->select('i.*, po.*, p.*, s.*') //, u.* , d.*
						->from('invoice as i')
						->join('purchase_order as po','po.id_purchase_order = i.id_purchase_order')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						// ->join('user as u','u.id_user = p.id_user')
						// ->join('departement as d','d.id_departement = u.id_departement')
						->join('supplier as s','s.id_supplier = i.id_supplier')
						->limit(1)
						->where('i.id_purchase_order', $id_purchase_order)
						->get();
	}

	public function check_invoice($id_pembelian)
	{
		return $this->db->select('i.*, p.*')
						->from('invoice as i')
						->join('pembelian as p','p.id_pembelian = i.id_pembelian')
						->where('p.id_pembelian', $id_pembelian)
						->get();
	}	
	
	public function add($data)
	{
		$this->db->insert('invoice', $data);
	}

	public function update($data, $id_invoice)
	{
		$this->db->where('id_invoice',$id_invoice)->update('invoice',$data);
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