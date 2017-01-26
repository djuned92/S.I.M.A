<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'model_user'	=> 'users',
				'model_manajemen_web'=> 'manajemen_web'
			));
	}

	//login
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required'); // ini agar validation run == FALSE soalnya validation pake bootstrap validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['manajemen_web'] = $this->manajemen_web->get()->row();
			$this->load->view('login', $data);	
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
					'id_user'		=> $valid_user->id_user,
					'nik'			=> $valid_user->nik,
					'name'			=> $valid_user->name,
					'id_departement'=> $valid_user->id_departement,
					'level'			=> $valid_user->level,
					'status'		=> $valid_user->status
					);
				$this->session->set_userdata($data);
				
				switch (TRUE)
				{
					case ($valid_user->level == '1' && $valid_user->status == '1'):
						redirect('admin/manajemen_user');
						break;
					case ($valid_user->level == '2' && $valid_user->status == '1'):
						redirect('manajer_divisi/purchase_request');
						break;
					case ($valid_user->level == '3' && $valid_user->status == '1'):
						redirect('manajer_project/purchase_request');
						break;
					case ($valid_user->level == '4' && $valid_user->status == '1'):
						redirect('manajer_procurement/receives_aset_request');
						break;
					case ($valid_user->level == '5' && $valid_user->status == '1'):
						redirect('direktur/receives_aset_request');
						break;
					case ($valid_user->level == '6' && $valid_user->status == '1'):
						redirect('staff_procurement/purchase_order');
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