<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->template->manajer_project('mp_purchase_request','script');	
	}

}

/* End of file Purchase_request.php */
/* Location: ./application/modules/manajer_project/controllers/Purchase_request.php */