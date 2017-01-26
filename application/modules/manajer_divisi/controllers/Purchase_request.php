<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_request extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_purchase'	=> 'purchase'
			));

		if ($this->session->userdata('level') != 2)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data['purchase'] = $this->purchase->get_purchase_user($id_user)->result();
		$this->template->manajer_divisi('purchase_request/md_purchase_request','script_manajer_divisi', $data);	
	}

	public function add()
	{
		$this->form_validation->set_rules('purchase','Purchase','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->manajer_divisi('purchase_request/md_add_purchase_request','script_manajer_divisi');
		} 
		else 
		{
			$data = array(
				'id_user'	=> $this->input->post('id_user'),
				'purchase'	=> $this->input->post('purchase'),
				'no_purchase' => $this->input->post('no_purchase'),
				'date_purchase' => $this->input->post('date_purchase'),
				'status_purchase' => 'Pending'
				);
			$this->purchase->add($data);
			$this->session->set_flashdata('add', 'Purchase request berhasil ditambah');
			redirect('manajer_divisi/purchase_request');
		}
	}

	public function update($id_purchase)
	{
		$this->form_validation->set_rules('purchase','Purchase','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['purchase'] = $this->purchase->get_by_id($id_purchase)->row();
			$this->template->manajer_divisi('purchase_request/md_update_purchase_request','script_manajer_divisi', $data);
		} 
		else 
		{
			$data = array(
				'id_user'	=> $this->input->post('id_user'),
				'purchase'	=> $this->input->post('purchase'),
				'no_purchase' => $this->input->post('no_purchase'),
				'date_purchase' => $this->input->post('date_purchase'),
				'status_purchase' => 'Pending'
				);
			$this->purchase->update($id_purchase, $data);
			$this->session->set_flashdata('update', 'Purchase request berhasil diperbaharui');
			redirect('manajer_divisi/purchase_request');
		}	
	}

	public function delete($id_purchase)
	{
		$this->purchase->delete($id_purchase);
		$this->session->set_flashdata('delete', 'Purchase request berhasil dihapus');
		redirect('manajer_divisi/purchase_request');
	}

}

/* End of file Purchase_request.php */
/* Location: ./application/modules/manajer_divisi/controllers/Purchase_request.php */