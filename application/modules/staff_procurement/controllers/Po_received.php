<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po_received extends CI_Controller {

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
		$this->template->staff_procurement('po_received', 'script_staff', $data);
	}

}

/* End of file Po_received.php */
/* Location: ./application/modules/staff_procurement/controllers/Po_received.php */