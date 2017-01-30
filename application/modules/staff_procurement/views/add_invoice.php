<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Buat Invoice</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal invoice" action="<?=base_url()?>staff_procurement/invoice/add" method="POST" enctype="multipart/form-data">              
                    <input type="hidden" name="id_pembelian" value="<?=$po->id_pembelian?>">
                    <div class="form-group">
                        <label class="col-md-2 control-label">PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$po->purchase?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">No PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$po->no_purchase?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">NO PO</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?=$po->po_no?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">Tgl PO</label>
                        <div class="col-md-2">
                            <input class="form-control" 
                            value="<?php
                                        $jadwal = $po->po_date;
                                        $data = strtotime($jadwal);
                                        // $w = date('w', $data); // hari
                                        $j = date('j', $data); // tanggal
                                        $n = date('n', $data); // bulan
                                    
                                        // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                        $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                        // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                        echo $j. " ".$bulan[$n]. " ".date('Y');
                                    ?>"
                            disabled>
                        </div>

                        <label class="col-md-1 control-label">Price</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="<?=$po->price?> <?=$po->currency?> " disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Supplier</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$po->supplier_name?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">Alamat</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$po->address?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No Invoice</label>
                        <div class="col-md-9">
                            <input type="text" name="invoice_no" class="form-control" placeholder="No Invoice">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Invoice</label>
                        <div class="col-md-9">
                            <input type="date" name="invoice_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Invoice Date Received</label>
                        <div class="col-md-9">
                            <input type="date" name="date_received" class="form-control" placeholder="Invoice Date Received">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Supplier</h4>
            </div>

            <form action="<?=base_url()?>staff_procurement/invoice/add_supplier" class="form-horizontal supplier" method="POST">
                <div class="modal-body">
                    
                    <input type="hidden" name="id_purchase_order" value="<?=$po->id_purchase_order?>">
                          
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kode Supplier</label>
                        <div class="col-md-8">
                            <input type="text" name="supplier_code" class="form-control" placeholder="Kode Supplier">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Supplier</label>
                        <div class="col-md-8">
                            <input type="text" name="supplier_name" class="form-control" placeholder="Nama Supplier">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-8">
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        
        </div>
    </div>
</div>