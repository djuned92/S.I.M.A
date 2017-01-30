<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_purchase extends CI_Model {

	public function get_all()
	{
		return $this->db->select('p.*, u.name, d.departement_name')
						->from('purchase as p')
						->join('user as u','p.id_user = u.id_user')
						->join('departement as d','u.id_departement = d.id_departement')
						->order_by('p.id_purchase','DESC')
						->get();	
	}

	public function get_purchase_direktur()
	{
		$where = "p.status_purchase != 'Pending'";
		return $this->db->select('p.*, u.name, d.departement_name')
						->from('purchase as p')
						->join('user as u','p.id_user = u.id_user')
						->join('departement as d','u.id_departement = d.id_departement')
						->order_by('p.id_purchase','DESC')
						->where($where)
						->get();	
	}

	public function get_purchase_setuju()
	{
		$where = "p.status_purchase = 'Setuju'"; //  && po.id_purchase IS NULL
		return $this->db->select('p.*, u.name, d.departement_name') // , po.*
						->from('purchase as p')
						// ->join('purchase_order as po','po.id_purchase = p.id_purchase','left')
						->join('user as u','p.id_user = u.id_user')
						->join('departement as d','u.id_departement = d.id_departement')
						->order_by('p.id_purchase','DESC')
						->where($where)
						->get();	
	}

	public function get_purchase_user($id_user)
	{
		return $this->db->select('p.*')
						->from('purchase as p')
						->where('p.id_user', $id_user)
						->order_by('p.id_purchase','DESC')
						->get();
	}

	public function get_by_id($id_purchase)
	{
		return $this->db->select('p.*, u.name, d.departement_name')
						->from('purchase as p')
						->join('user as u','p.id_user = u.id_user')
						->join('departement as d','u.id_departement = d.id_departement')
						->limit(1)
						->where('p.id_purchase', $id_purchase)
						->get();
	}

	public function count_pending()
	{
		return $this->db->select('p.*')
						->from('purchase as p')
						->where('p.status_purchase', 'Pending')
						->order_by('p.id_purchase','DESC')
						->get();
	}

	public function count_proses()
	{
		return $this->db->select('p.*')
						->from('purchase as p')
						->where('p.status_purchase', 'Proses')
						->order_by('p.id_purchase','DESC')
						->get();
	}
	
	public function add($data)
	{
		$this->db->insert('purchase', $data);
	}

	public function update($id_purchase, $data)
	{
		$this->db->where('id_purchase', $id_purchase)->update('purchase', $data);
	}

	public function delete($id_purchase)
	{
		$this->db->where('id_purchase', $id_purchase)->delete('purchase');
	}

}

/* End of file Model_purchase.php */
/* Location: ./application/models/Model_purchase.php */