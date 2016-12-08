<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->template->admin('Manajemen_user','script');				
	}

}

/* End of file Manajemen_data.php */
/* Location: ./application/modules/admin/controllers/Manajemen_data.php */