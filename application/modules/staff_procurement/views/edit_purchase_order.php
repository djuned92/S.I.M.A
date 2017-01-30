<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Edit Purchase Order</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal purchase_order" action="<?=base_url()?>staff_procurement/purchase_order/update/<?=$po->id_purchase_order?>" method="POST">
                    
                    <input type="hidden" name="id_purchase" value="<?=$po->id_purchase?>">               
                    
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
                        <label class="col-md-2 control-label">Tanggal PR</label>
                        <div class="col-md-4">
                            <input class="form-control" 
                            value="<?php
                                        $jadwal = $po->date_purchase;
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

                        <label class="col-md-1 control-label">Status PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?php if($po->status_purchase ==
                            'Setuju'){echo "Diterima";}?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No PO</label>
                        <div class="col-md-9">
                            <input type="text" name="po_no" class="form-control" placeholder="No Purchase Order" value="<?=$po->po_no?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal PO</label>
                        <div class="col-md-9">
                            <input type="date" name="po_date" class="form-control" value="<?php $tanggal = date_create($po->po_date); echo date_format($tanggal,'Y-m-d')?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Supplier</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_supplier" id="id_supplier" required disabled>
                                <option value="">-- Pilih --</option>
                                <?php foreach($supplier as $datas):?>
                                <option value="<?=$datas->id_supplier?>" <?=$datas->id_supplier == $po->id_supplier ? 'selected = "selected"': ''; ?>><?=$datas->supplier_name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <label class="col-md-2 control-label">Alamat Supplier</label>
                        <div class="col-md-3">
                            <input type="text" id="address" class="form-control" placeholder="Alamat Supplier" value="<?=$po->address?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Price</label>
                        <div class="col-md-7">
                            <input type="text" name="price" class="form-control" placeholder="Price" value="<?=$po->price?>" disabled>
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" name="currency" required disabled="">
                                <option value="">Currency</option>
                                <option value="IDR" <?=$po->currency == 'IDR' ? 'selected = "selected"': ''; ?>>IDR</option>
                                <option value="USD" <?=$po->currency == 'USD' ? 'selected = "selected"': ''; ?>>USD</option>
                            </select>
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