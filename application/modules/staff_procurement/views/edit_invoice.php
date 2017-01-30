<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Edit Invoice</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal invoice" action="<?=base_url()?>staff_procurement/invoice/update/<?=$invoice->id_invoice?>" method="POST" enctype="multipart/form-data">              
                    <input type="hidden" name="id_pembelian" value="<?=$invoice->id_pembelian?>">
                    <div class="form-group">
                        <label class="col-md-2 control-label">PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$invoice->purchase?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">No PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$invoice->no_purchase?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">NO PO</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?=$invoice->po_no?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">Tgl PO</label>
                        <div class="col-md-2">
                            <input class="form-control" 
                            value="<?php
                                        $jadwal = $invoice->po_date;
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
                            <input type="text" class="form-control" value="<?=$invoice->price?> <?=$invoice->currency?> " disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Supplier</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$invoice->supplier_name?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">Alamat</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$invoice->address?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No Invoice</label>
                        <div class="col-md-9">
                            <input type="text" name="invoice_no" class="form-control" placeholder="No Invoice" value="<?=$invoice->invoice_no?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal Invoice</label>
                        <div class="col-md-9">
                            <input type="date" name="invoice_date" class="form-control" value="<?php $tanggal = date_create($invoice->invoice_date); echo date_format($tanggal,'Y-m-d')?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Invoice Date Received</label>
                        <div class="col-md-9">
                            <input type="date" name="date_received" class="form-control" placeholder="Invoice Date Received" value="<?php $tanggal = date_create($invoice->date_received); echo date_format($tanggal,'Y-m-d')?>">
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
                    
                    <input type="hidden" name="id_purchase_order" value="<?=$invoice->id_purchase_order?>">
                          
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