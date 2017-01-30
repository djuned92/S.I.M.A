<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_belum_dicatat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_invoice'	=> 'invoice',
				'model_barang'	=> 'barang'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}	
	}

	public function index()
	{
		// data invoice barang yang sudah keluar invoice nya kemudian dicatat sebagai aset
		$data['invoice'] = $this->invoice->get_all()->result();
		$this->template->staff_procurement ('pencatatan_data_aset', 'script_staff', $data);	
	}

}

/* End of file Aset_belum_dicatat.php */
/* Location: ./application/modules/staff_procurement/controllers/Aset_belum_dicatat.php */