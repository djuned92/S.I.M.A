<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receives_aset_request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->template->manajer_procurement('receives_aset_request','script');	
	}

}

/* End of file Receives_aset_request.php */
/* Location: ./application/modules/manajer_procurement/controllers/Receives_aset_request.php */