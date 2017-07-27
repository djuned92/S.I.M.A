<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

    public function search_laporan($from_tgl, $to_tgl)
    {
        return $this->db->select('p.*, u.name, d.departement_name')
                        ->from('purchase as p')
                        ->join('user as u','p.id_user = u.id_user')
                        ->join('departement as d','u.id_departement = d.id_departement')
                        ->where('p.date_purchase >=',$from_tgl)
                        ->where('p.date_purchase <=',$to_tgl)
                        ->get();

        if($q->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


}

/* End of file Model_laporan.php */
/* Location: ./application/models/Model_laporan.php */