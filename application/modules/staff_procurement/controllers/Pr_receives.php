<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pr_receives extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_purchase'	=> 'purchase'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['purchase'] = $this->purchase->get_purchase_setuju()->result();
		// return var_dump($data);
		$this->template->staff_procurement('pr_received','script_staff', $data);
	}

}

/* End of file Purchase_order.php */
/* Location: ./application/modules/staff_procurement/controllers/Purchase_order.php */