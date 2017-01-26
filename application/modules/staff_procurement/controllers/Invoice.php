<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_po'	=> 'po',
				'model_invoice'	=> 'invoice',
				'model_supplier'=> 'supplier'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['purchase_order'] = $this->po->get_all()->result();
		$this->template->staff_procurement('invoice', 'script_staff', $data);
	}

	public function add($id_purchase_order = NULL)
	{
		$this->form_validation->set_rules('invoice_no','Nomor Invoice','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['po'] = $this->po->po_by_id($id_purchase_order)->row();
			$data['supplier'] = $this->supplier->get_all()->result();
			$this->template->staff_procurement('add_invoice','script_staff',$data);
		} 
		else 
		{
			$data = array(
				'id_purchase_order'	=> $this->input->post('id_purchase_order'),
				'id_supplier'		=> $this->input->post('id_supplier'),
				'invoice_no'		=> $this->input->post('invoice_no'),
				'invoice_date'		=> $this->input->post('invoice_date'),
				'date_received'		=> $this->input->post('date_received'),
				'price'				=> $this->input->post('price')
				);
			$this->invoice->add($data);
			$this->session->set_flashdata('add', 'Invoice berhasil dibuat');
			redirect('staff_procurement/invoice');
		}
		
	}

	// add supplier
	public function add_supplier()
	{
		$this->form_validation->set_rules('supplier_code','Kode Supplier','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->staff_procurement('add_invoice','script_staff');
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
			$id_purchase_order = $this->input->post('id_purchase_order');
			redirect('staff_procurement/invoice/add/'.$id_purchase_order);
		}
	}

	// get supplier
	public function supplier($id_supplier)
	{
		$supplier = $this->supplier->get_by_id($id_supplier)->row();
		echo json_encode($supplier);
	}

}

/* End of file Invoice.php */
/* Location: ./application/modules/staff_procurement/controllers/Invoice.php */