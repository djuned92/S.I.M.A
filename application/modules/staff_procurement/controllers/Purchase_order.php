<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_purchase'	=> 'purchase',
				'model_po'			=> 'po'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['purchase'] = $this->purchase->get_purchase_setuju()->result();
		$this->template->staff_procurement('purchase_order','script_staff', $data);	
	}

	public function add($id_purchase = NULL)
	{
		$this->form_validation->set_rules('po_no','Nomor PO','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['purchase'] = $this->purchase->get_by_id($id_purchase)->row();
			$this->template->staff_procurement('add_purchase_order','script_staff',$data);
		} 
		else 
		{
			$data = array(
				'id_purchase'	=> $this->input->post('id_purchase'),
				'po_no'			=> $this->input->post('po_no'),
				'po_date'		=> $this->input->post('po_date')
				);
			$this->po->add($data);
			$this->session->set_flashdata('add', 'Purchase order berhasil dibuat');
			redirect('staff_procurement/purchase_order');
		}
		
	}

}

/* End of file Purchase_order.php */
/* Location: ./application/modules/staff_procurement/controllers/Purchase_order.php */