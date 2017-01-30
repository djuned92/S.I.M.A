<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_kepemilikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_barang'	=> 'barang',
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['history_aset'] = $this->barang->get_all()->result();
		$this->template->staff_procurement('history_kepemilikan', 'script_staff', $data);
	}

}

/* End of file History_kepemilikan.php */
/* Location: ./application/modules/staff_procurement/controllers/History_kepemilikan.php */