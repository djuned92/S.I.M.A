<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Receives_aset_request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
						'model_purchase' => 'purchase',	
		));

		if ($this->session->userdata('level') != 5)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['purchase'] = $this->purchase->get_purchase_direktur()->result();
		$this->template->direktur('dir_receives_aset_request','script_direktur', $data);	
	}

	public function setuju($id_purchase)
	{
		$data = array(
			'status_purchase'	=> 'Setuju'
			);
		$this->purchase->update($id_purchase, $data);
		$this->session->set_flashdata('setuju', 'Status purchase request berhasil diperbaharui');
		redirect('direktur/receives_aset_request');
	}

	public function tidak_setuju($id_purchase)
	{
		$data = array(
			'status_purchase'	=> 'Tidak Setuju'
			);
		$this->purchase->update($id_purchase, $data);
		$this->session->set_flashdata('tidak_setuju', 'Status purchase request berhasil diperbaharui');
		redirect('direktur/receives_aset_request');
	}

}

/* End of file Receives_aset_request.php */
/* Location: ./application/modules/manajer_procurement/controllers/Receives_aset_request.php */