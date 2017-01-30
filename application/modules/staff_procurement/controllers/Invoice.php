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
		$data['invoice'] = $this->invoice->get_all()->result();
		$this->template->staff_procurement('invoice', 'script_staff', $data);
	}

	public function add($id_pembelian = NULL)
	{
		$this->form_validation->set_rules('invoice_no','Nomor Invoice','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['po'] = $this->po->po_by_id($id_pembelian)->row();
			// return var_dump($data);
			$this->template->staff_procurement('add_invoice','script_staff',$data);
		} 
		else 
		{
			$data = array(
				'id_pembelian'		=> $this->input->post('id_pembelian'),
				'invoice_no'		=> $this->input->post('invoice_no'),
				'invoice_date'		=> $this->input->post('invoice_date'),
				'date_received'		=> $this->input->post('date_received'),
				);
			$this->invoice->add($data);
			$this->session->set_flashdata('add', 'Invoice berhasil dibuat');
			redirect('staff_procurement/invoice');
		}
	}

	public function update($id_invoice)
	{
		$this->form_validation->set_rules('invoice_no','Nomor Invoice','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['invoice'] = $this->invoice->get_by_id($id_invoice)->row();
			// return var_dump($data);
			$this->template->staff_procurement('edit_invoice','script_staff',$data);
		} 
		else 
		{
			$data = array(
				'id_pembelian'		=> $this->input->post('id_pembelian'),
				'invoice_no'		=> $this->input->post('invoice_no'),
				'invoice_date'		=> $this->input->post('invoice_date'),
				'date_received'		=> $this->input->post('date_received'),
				);
			$this->invoice->update($data, $id_invoice);
			$this->session->set_flashdata('update', 'Invoice berhasil diperbaharui');
			redirect('staff_procurement/invoice');
		}	
	}
}

/* End of file Invoice.php */
/* Location: ./application/modules/staff_procurement/controllers/Invoice.php */