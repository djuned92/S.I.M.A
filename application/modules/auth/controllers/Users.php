<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'Model_user'	=> 'users'
			));
	}

	//login
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required'); // ini agar validation run == FALSE soalnya validation pake bootstrap validation
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');	
		} 
		else 
		{
			$check_username = $this->users->check_username(); // check username terdaftar atau tidak
			$check_status_user = $this->users->check_status_user(); // check status user aktif atau tidak aktif
			$valid_user = $this->users->check_credential(); // check username yang sudah terdaftar cocok tidak dengan password

			if($check_username == FALSE) // username tidak terdaftar
			{
				$this->session->set_flashdata('username_not_register','Username tidak terdaftar');
				redirect('auth/users');	
			}
			elseif($check_status_user == FALSE) // status user tidak aktif
			{
				$this->session->set_flashdata('status_tidak_aktif','Status user tidak aktif');
				redirect('auth/users');
			} 
			elseif ($valid_user == FALSE) // status user aktif dan terdaftar tapi salah password
			{
				$this->session->set_flashdata('wrong_password','Password salah');
				redirect('auth/users');	
			}
			else 
			{
				//login sukses
				$data = array(
					'ID_User'	=> $valid_user->ID_User,
					'NIK'		=> $valid_user->NIK,
					'Name'		=> $valid_user->Name,
					'Dept_Code'	=> $valid_user->Dept_Code,
					'Level'		=> $valid_user->Level,
					'Status'	=> $valid_user->Status
					);
				$this->session->set_userdata($data);
				
				switch (TRUE)
				{
					case ($valid_user->level_user == 1 && $valid_user->status == 1):
						redirect('admin/home');
						break;
					default : 
						break;
				}
			}
		}
	}

	//logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/users');
	}

}