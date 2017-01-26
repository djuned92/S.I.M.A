<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Buat Purchase Order</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal purchase_order" action="<?=base_url()?>staff_procurement/purchase_order/add" method="POST">
                    
                    <input type="hidden" name="id_purchase" value="<?=$purchase->id_purchase?>">               
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Purchase Request</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="<?=$purchase->purchase?>" disabled>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">No Purchase Request</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="<?=$purchase->no_purchase?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tanggal Purchase Request</label>
                        <div class="col-md-8">
                            <input class="form-control" 
                            value="<?php
                                        $jadwal = $purchase->date_purchase;
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
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Status Purchase Request</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php if($purchase->status_purchase ==
                            'Setuju'){echo "Diterima";}?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">No Purchase Order</label>
                        <div class="col-md-8">
                            <input type="text" name="po_no" class="form-control" placeholder="No Purchase Order">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tanggal Purchase Order</label>
                        <div class="col-md-8">
                            <input type="date" name="po_date" class="form-control">
                        </div>
                    </div>               

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->