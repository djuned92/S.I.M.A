<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_purchase'	=> 'purchase',
				'model_po'			=> 'po',
				'model_pembelian'	=> 'pembelian',
				'model_supplier'	=> 'supplier'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['po'] = $this->po->get_all()->result();
		$this->template->staff_procurement('purchase_order','script_staff', $data);	
	}

	public function add($id_purchase = NULL)
	{
		$this->form_validation->set_rules('po_no','Nomor PO','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['purchase'] = $this->purchase->get_by_id($id_purchase)->row();
			$data['supplier'] = $this->supplier->get_all()->result();
			$this->template->staff_procurement('add_purchase_order','script_staff',$data);
		} 
		else 
		{
			$data_po = array(
				'id_purchase'	=> $this->input->post('id_purchase'),
				'po_no'			=> $this->input->post('po_no'),
				'po_date'		=> $this->input->post('po_date')
				);
			$this->po->add($data_po);
			$id_purchase_order = $this->db->insert_id();

			$data_pembelian = array(
				'id_purchase_order' => $id_purchase_order,
				'id_supplier'		=> $this->input->post('id_supplier'),
				'price'				=> $this->input->post('price'),
				'currency'			=> $this->input->post('currency')
				);
			$this->pembelian->add($data_pembelian);

			$this->session->set_flashdata('add', 'Purchase order berhasil dibuat');
			redirect('staff_procurement/purchase_order');
		}	
	}

	public function update($id_purchase_order)
	{
		$this->form_validation->set_rules('po_no','Nomor PO','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['po'] = $this->po->get_po_id($id_purchase_order)->row();
			// return var_dump($data);
			$data['supplier'] = $this->supplier->get_all()->result();
			$this->template->staff_procurement('edit_purchase_order','script_staff',$data);
		} 
		else 
		{
			$data = array(
				'id_purchase'	=> $this->input->post('id_purchase'),
				'po_no'			=> $this->input->post('po_no'),
				'po_date'		=> $this->input->post('po_date')
				);
			$this->po->update($data, $id_purchase_order);
			$this->session->set_flashdata('update', 'Purchase order berhasil diperbaharui');
			redirect('staff_procurement/purchase_order');
		}
	}

	// add supplier
	public function add_supplier()
	{
		$this->form_validation->set_rules('supplier_code','Kode Supplier','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->staff_procurement('add_purchase_order','script_staff');
		} 
		else 
		{
			$data = array(
				'supplier_code'	=> $this->input->post('supplier_code'),
				'supplier_name' => $this->input->post('supplier_name'),
				'address' 		=> $this->input->post('address'),
				'phone' 		=> $this->input->post('phone')
				);
			$this->supplier->add($data);
			$this->session->set_flashdata('add_supplier', 'Supplier berhasil ditambah');
			$id_purchase = $this->input->post('id_purchase');
			redirect('staff_procurement/purchase_order/add/'.$id_purchase);
		}
	}

	// get supplier
	public function supplier($id_supplier)
	{
		$supplier = $this->supplier->get_by_id($id_supplier)->row();
		echo json_encode($supplier);
	}
}

/* End of file Purchase_order.php */
/* Location: ./application/modules/staff_procurement/controllers/Purchase_order.php */