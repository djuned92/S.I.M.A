<?php

class Template {
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('parser');
	}

	public function admin($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();

		$data = array(
			'head'			=> $this->CI->load->view('template/admin/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/admin/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/admin/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/admin/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/admin/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/admin/index', $data);
	}

	public function manajer_divisi($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();

		$data = array(
			'head'			=> $this->CI->load->view('template/manajer_divisi/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/manajer_divisi/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/manajer_divisi/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/manajer_divisi/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/manajer_divisi/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/manajer_divisi/index', $data);
	}

	public function manajer_project($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();

		$data = array(
			'head'			=> $this->CI->load->view('template/manajer_project/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/manajer_project/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/manajer_project/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/manajer_project/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/manajer_project/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/manajer_project/index', $data);
	}

	public function manajer_procurement($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$this->CI->load->model('model_purchase','purchase');
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();
		$data['purchase_pending'] = $this->CI->purchase->count_pending()->num_rows();

		$data = array(
			'head'			=> $this->CI->load->view('template/manajer_procurement/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/manajer_procurement/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/manajer_procurement/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/manajer_procurement/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/manajer_procurement/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/manajer_procurement/index', $data);
	}

	public function direktur($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$this->CI->load->model('model_purchase','purchase');
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();
		$data['purchase_proses'] = $this->CI->purchase->count_proses()->num_rows();

		$data = array(
			'head'			=> $this->CI->load->view('template/direktur/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/direktur/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/direktur/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/direktur/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/direktur/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/direktur/index', $data);
	}

	public function staff_procurement($content, $script = NULL, $data = NULL)
	{
		$this->CI->load->model('model_manajemen_web','manajemen_web');
		$this->CI->load->model('model_po','po');
		$this->CI->load->model('model_invoice','invoice');

		// count yang belum di po
		$purchase_setuju = $this->CI->po->count_purchase_setuju()->num_rows();
		$po = $this->CI->po->count_purchase_order()->num_rows();
		$x = $purchase_setuju - $po;

		// count yang belum buat invoice
		$po = $this->CI->invoice->count_po()->num_rows();
		$invoice = $this->CI->invoice->count_invoice()->num_rows();

		$y = $po - $invoice;

		$data['count_not_po'] = $x; 
		$data['count_not_invoice'] = $y;
		$data['manajemen_web'] = $this->CI->manajemen_web->get()->row();

		$data = array(
			'head'			=> $this->CI->load->view('template/staff_procurement/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/staff_procurement/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/staff_procurement/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/staff_procurement/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/staff_procurement/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/staff_procurement/index', $data);
	}
}