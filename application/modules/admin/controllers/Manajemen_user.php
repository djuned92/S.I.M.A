<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
						'model_user' => 'user',
						'model_departement'	=> 'departement'	
		));

		if ($this->session->userdata('level') != 1)
		{
			redirect('auth/users');
		}
	}

	public function index()
	{
		$data['user'] = $this->user->get_all()->result();
		$this->template->admin('manajemen_user/manajemen_user','script_admin', $data);	
	}

	public function add()
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('name','Nama','required'); // trigger bootstrap form validation
		if($this->form_validation->run() == FALSE)
		{
			$data['departement'] = $this->departement->get_all()->result();
			$this->template->admin('manajemen_user/add_user','script_admin', $data);
		}
		else
		{
			$data = array(
				'id_departement'	=> $this->input->post('id_departement'),
				'nik'				=> $this->input->post('nik'),
				'name'				=> $this->input->post('name'),
				'username'			=> $this->input->post('username'),
				'password'			=> do_hash($this->input->post('password')),
				'level'				=> $this->input->post('level'),
				'status'			=> $this->input->post('status')
				);
			$this->user->add($data);
			$this->session->set_flashdata('add', 'User berhasil ditambah');
			redirect('admin/manajemen_user');
		}
	}

	public function update($id_user)
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('name','Nama','required'); // trigger bootstrap form validation
		if($this->form_validation->run() == FALSE)
		{
			$data['departement'] = $this->departement->get_all()->result();
			$data['user'] = $this->user->get_by_id($id_user)->row();
			$this->template->admin('manajemen_user/update_user','script_admin', $data);
		}
		else
		{
			$data = array(
				'id_departement'	=> $this->input->post('id_departement'),
				'nik'				=> $this->input->post('nik'),
				'name'				=> $this->input->post('name'),
				'username'			=> $this->input->post('username'),
				'password'			=> do_hash($this->input->post('password')),
				'level'				=> $this->input->post('level'),
				'status'			=> $this->input->post('status')
				);
			$this->user->update($id_user, $data);
			$this->session->set_flashdata('update', 'User berhasil diperbaharui');
			redirect('admin/manajemen_user');
		}	
	}

	public function delete($id_user)
	{
		$this->user->delete($id_user);
		$this->session->set_flashdata('delete', 'User berhasil dihapus');
		redirect('admin/manajemen_user');
	}

}

/* End of file Manajemen_user.php */
/* Location: ./application/modules/admin/controllers/Manajemen_user.php */