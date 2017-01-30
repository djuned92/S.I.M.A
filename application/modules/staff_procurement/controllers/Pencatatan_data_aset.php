<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencatatan_data_aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_po'	=> 'po',
				'model_invoice'	=> 'invoice',
				'model_supplier'=> 'supplier',
				'model_category'=> 'category',
				'model_brand'	=> 'brand',
				'model_departement'=> 'departement',
				'model_specification'=> 'specification',
				'model_barang'	=> 'barang'
			));

		if ($this->session->userdata('level') != 6)
		{
			redirect('auth/users');
		}	
	}

	public function index()
	{
		// get data aset yang sudah dicatat
		$data['data_aset'] = $this->barang->get_all()->result();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->template->staff_procurement ('aset_sudah_dicatat', 'script_staff', $data);
	}

	// add data aset berdasarkan invoice yang sudah dibuat
	public function add($id_invoice = NULL)
	{
		$this->form_validation->set_rules('asset_no','Nomor Asset','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['invoice'] = $this->invoice->get_by_id($id_invoice)->row();
			$data['category'] = $this->category->get_all()->result();
			$data['brand'] = $this->brand->get_all()->result();
			$data['departement'] = $this->departement->get_all()->result();
			$this->template->staff_procurement('add_aset','script_staff',$data);
		} 
		else 
		{
			$data_specification = array(
				'processor'	=> $this->input->post('processor'),
				'ram'		=> $this->input->post('ram'),
				'hdd'		=> $this->input->post('hdd'),
				'display'	=> $this->input->post('display'),
				'os'		=> $this->input->post('os'),
				'notes'		=> $this->input->post('notes'),
				);
			$this->specification->add($data_specification);
			$id_specification = $this->db->insert_id();

			$data_aset = array(
				'id_invoice'		=> $this->input->post('id_invoice'),
				'id_category'		=> $this->input->post('id_category'),
				'id_brand'			=> $this->input->post('id_brand'),
				'id_specification'	=> $id_specification,
				'id_departement'	=> $this->input->post('id_departement'),
				'asset_no'			=> $this->input->post('asset_no'),
				'item_name'			=> $this->input->post('item_name'),
				'warranty'			=> $this->input->post('warranty'),
				'exp_date_wrr'		=> $this->input->post('exp_date_wrr'),
				'act_condition'		=> $this->input->post('act_condition')
				);
			$this->barang->add($data_aset);
			// return var_dump($data_aset, $data_specification);
			$this->session->set_flashdata('add', 'Data Aset berhasil dicatat');
			redirect('staff_procurement/pencatatan_data_aset');
		}
		
	}

	public function update($id_barang = NULL)
	{
		$this->form_validation->set_rules('asset_no','Nomor Asset','required'); // trigger form validation bootstrap
		if ($this->form_validation->run() == FALSE) 
		{
			$data['aset'] = $this->barang->get_by_id($id_barang)->row();
			$data['category'] = $this->category->get_all()->result();
			$data['brand'] = $this->brand->get_all()->result();
			$data['departement'] = $this->departement->get_all()->result();
			$this->template->staff_procurement('edit_aset','script_staff',$data);
		} 
		else 
		{
			$data_specification = array(
				'processor'	=> $this->input->post('processor'),
				'ram'		=> $this->input->post('ram'),
				'hdd'		=> $this->input->post('hdd'),
				'display'	=> $this->input->post('display'),
				'os'		=> $this->input->post('os'),
				'notes'		=> $this->input->post('notes'),
				);
			$id_specification = $this->input->post('id_specification');

			$data_aset = array(
				'id_invoice'		=> $this->input->post('id_invoice'),
				'id_category'		=> $this->input->post('id_category'),
				'id_brand'			=> $this->input->post('id_brand'),
				'id_departement'	=> $this->input->post('id_departement'),
				'asset_no'			=> $this->input->post('asset_no'),
				'item_name'			=> $this->input->post('item_name'),
				'warranty'			=> $this->input->post('warranty'),
				'exp_date_wrr'		=> $this->input->post('exp_date_wrr'),
				'act_condition'		=> $this->input->post('act_condition')
				);
			$data = $this->barang->update($id_barang, $id_specification, $data_aset, $data_specification);
			// return var_dump($data);
			$this->session->set_flashdata('update', 'Data Aset berhasil diperbaharui');
			redirect('staff_procurement/pencatatan_data_aset');
		}
	}
}

/* End of file Pencatatan_data_aset.php */
/* Location: ./application/modules/staff_procurement/controllers/Pencatatan_data_aset.php */