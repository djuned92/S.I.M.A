<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang','barang');

		if ($this->session->userdata('level') != 4)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['history_aset'] = $this->barang->get_all()->result();
		$this->template->manajer_procurement('data_aset','script_manajer_procurement', $data);
	}

}

/* End of file Data_aset.php */
/* Location: ./application/modules/manajer_procurement/controllers/Data_aset.php */