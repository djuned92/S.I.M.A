<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->template->staff_procurement('purchase_order','script');	
	}

}

/* End of file Purchase_order.php */
/* Location: ./application/modules/staff_procurement/controllers/Purchase_order.php */