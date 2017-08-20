<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_laporan','laporan');
    }

    public function index()
    {
        $from_tgl = date_create($this->input->post('from_tgl'));
        $from_tgl = date_format($from_tgl,'Y-m-d');

        $to_tgl = date_create($this->input->post('to_tgl'));
        $to_tgl = date_format($to_tgl,'Y-m-d');
        $search = $this->laporan->search_laporan_pr($from_tgl, $to_tgl);
        // echo "<pre>";
        // return var_dump($search->result());
        if($search != NULL)
        {
            $data['laporan'] = $search->result();
            $this->template->manajer_divisi('md_laporan','script_manajer_divisi',$data);
        }
        elseif($search == 'NULL')
        {
            $this->session->set_flashdata('no_data', 'Tidak ada laporan di tanggal tersebut');
            redirect('divisi/laporan');
        }
        else
        {
            $this->template->manajer_divisi('md_laporan','script_manajer_divisi');
        }
    }

}

/* End of file Laporan.php */
/* Location: ./application/modules/manajer_divisi/controllers/Laporan.php */