<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

    public function search_laporan_pr($from_tgl, $to_tgl)
    {
        return $this->db->select('p.*, u.name, d.departement_name')
                        ->from('purchase as p')
                        ->join('user as u','p.id_user = u.id_user')
                        ->join('departement as d','u.id_departement = d.id_departement')
                        ->where('p.status_purchase','Setuju')
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

    public function search_laporan_po($from_tgl, $to_tgl)
    {
        return $this->db->select('po.*, p.*, u.name, d.*, b.*, s.*')
                        ->from('purchase_order as po')
                        ->join('purchase as p','po.id_purchase = p.id_purchase')
                        ->join('pembelian as b','b.id_purchase_order = po.id_purchase_order')
                        ->join('supplier as s','s.id_supplier = b.id_supplier')
                        ->join('user as u','p.id_user = u.id_user')
                        ->join('departement as d','u.id_departement = d.id_departement')
                        ->where('po.po_date >=',$from_tgl)
                        ->where('po.po_date <=',$to_tgl)
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