<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang','barang');

		if ($this->session->userdata('level') != 5)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['history_aset'] = $this->barang->get_all()->result();
		$this->template->direktur('dir_data_aset','script_direktur', $data);
	}

}

/* End of file Data_aset.php */
/* Location: ./application/modules/direktur/controllers/Data_aset.php */