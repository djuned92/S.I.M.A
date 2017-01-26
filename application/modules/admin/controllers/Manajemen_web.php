<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_manajemen_web','manajemen_web');
	}

	public function index()
	{
		$this->template->admin('manajemen_web','script');	
	}

	public function theme_one()
	{
		$data = array(
			'navbar_inverse'	=> 'background-color: #B9B739;',
			'a_focus'			=> 'background-color: #B9B739!important;',
			'menu_top_active'	=> 'background-color: #B9B739;',
			'page_head_line'	=> 'border-bottom: 2px solid #B9B739;color: #B9B739;',
			'footer'			=> 'background-color: #B9B739;'
			);
		$this->manajemen_web->update($data);
		redirect('admin/manajemen_web');
	}

	public function theme_two()
	{
		$data = array(
			'navbar_inverse'	=> 'background-color: #C36464;',
			'a_focus'			=> 'background-color: #F0677C!important;',
			'menu_top_active'	=> 'background-color: #924f4f;',
			'page_head_line'	=> 'border-bottom: 2px solid #F0677C;color: #F0677C;',
			'footer'			=> 'background-color: #C36464;'
			);
		$this->manajemen_web->update($data);
		redirect('admin/manajemen_web');
	}

	public function theme_three()
	{
		$data = array(
			'navbar_inverse'	=> 'background-color: #119c7e;',
			'a_focus'			=> 'background-color: #119c7e!important;',
			'menu_top_active'	=> 'background-color: #119c7e;',
			'page_head_line'	=> 'border-bottom: 2px solid #119c7e;color: #119c7e;',
			'footer'			=> 'background-color: #119c7e;'
			);
		$this->manajemen_web->update($data);
		redirect('admin/manajemen_web');
	}

	public function theme_four()
	{
		$data = array(
			'navbar_inverse'	=> 'background-color: #b739b9;',
			'a_focus'			=> 'background-color: #b739b9!important;',
			'menu_top_active'	=> 'background-color: #b739b9;',
			'page_head_line'	=> 'border-bottom: 2px solid #b739b9;color: #b739b9;',
			'footer'			=> 'background-color: #b739b9;'
			);
		$this->manajemen_web->update($data);
		redirect('admin/manajemen_web');
	}

}

/* End of file Manajemen_web.php */
/* Location: ./application/modules/admin/controllers/Manajemen_web.php */