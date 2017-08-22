<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {

	public function get_all()
	{
		return $this->db->select('i.*, po.*, p.*, d.*, u.*, beli.*, s.*, b.*, spe.*, brand.*, c.*') //
						->from('barang as b')
						->join('category as c','c.id_category = b.id_category')
						->join('brand as brand','brand.id_brand = b.id_brand')
						->join('specification as spe','spe.id_specification = b.id_specification')
						->join('invoice as i','b.id_invoice = i.id_invoice')
						->join('pembelian as beli','i.id_pembelian = beli.id_pembelian')
						->join('purchase_order as po','po.id_purchase_order = beli.id_purchase_order')
						->join('supplier as s','s.id_supplier = beli.id_supplier')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						->join('user as u','u.id_user = p.id_user')
						->join('departement as d','d.id_departement = b.id_departement')
						->order_by('b.id_barang','DESC')
						->get();
	}

	public function get_by_id($id_barang)
	{
				return $this->db->select('i.*, po.*, p.*, d.*, u.*, beli.*, s.*, b.*, spe.*, brand.*, c.*') //
						->from('barang as b')
						->join('category as c','c.id_category = b.id_category')
						->join('brand as brand','brand.id_brand = b.id_brand')
						->join('specification as spe','spe.id_specification = b.id_specification')
						->join('invoice as i','b.id_invoice = i.id_invoice')
						->join('pembelian as beli','i.id_pembelian = beli.id_pembelian')
						->join('purchase_order as po','po.id_purchase_order = beli.id_purchase_order')
						->join('supplier as s','s.id_supplier = beli.id_supplier')
						->join('purchase as p','p.id_purchase = po.id_purchase')
						->join('user as u','u.id_user = p.id_user')
						->join('departement as d','d.id_departement = u.id_departement')
						->limit(1)
						->where('b.id_barang',$id_barang)
						->get();
	}

	public function add($data)
	{
		$this->db->insert('barang',$data);
	}

	public function update($id_barang, $id_specification, $data_barang, $data_specification)
	{
		$this->db->where('id_barang',$id_barang)->update('barang', $data_barang);
		$this->db->where('id_specification', $id_specification)->update('specification', $data_specification);
	}

	public function check_aset($id_invoice)
	{
		return $this->db->select('b.*')
						->from('barang as b')
						->where('b.id_invoice', $id_invoice)
						->get();
	}

	public function count_invoice()
	{
		return $this->db->select('i.*')
						->from('invoice as i')
						->get();
	}

	public function count_barang()
	{
		return $this->db->select('b.*')
						->from('barang as b')
						->get();
	}

}

/* End of file Model_barang.php */
/* Location: ./application/models/Model_barang.php */