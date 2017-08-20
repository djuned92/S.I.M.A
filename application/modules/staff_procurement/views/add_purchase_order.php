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
                        <label class="col-md-2 control-label">PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$purchase->purchase?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">No PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$purchase->no_purchase?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal PR</label>
                        <div class="col-md-4">
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

                        <label class="col-md-1 control-label">Status PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?php if($purchase->status_purchase ==
                            'Setuju'){echo "Diterima";}?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">No PO</label>
                        <div class="col-md-9">
                            <?php
                                $date = date('y/n/d');
                                $explode = explode('/',$date);
                                $tahun = $explode[0];
                                $bulan = array(
                                    '','I', 'II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'
                                    );
                                $bulan = $bulan[$explode[1]];
                                $lastNoPO = 'PO/ALT/'.$bulan.'/'.$tahun;

                                if(is_null($po)) { // $po parsing from controller
                                    $lastNo = 1;
                                } else {
                                    $explodeNoPO = explode('/',$po['po_no']);
                                    $lastNo = $explodeNoPO[0];
                                    $lastNo++;
                                }

                            ?>
                            <input type="text" name="po_no" value=<?=$lastNo.'/'.$lastNoPO?> class="form-control" placeholder="No Purchase Order" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Tanggal PO</label>
                        <div class="col-md-9">
                            <input type="date" name="po_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Supplier</label>
                        <div class="col-md-3">
                            <select class="form-control" name="id_supplier" id="id_supplier" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach($supplier as $r): ?>
                                <option value="<?=$r->id_supplier?>"><?=$r->supplier_name?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a href="#add" data-toggle="modal" data-target="#add"><span class='label label-primary'><i class="fa fa-plus"></i> Tambah Supplier</span></a>
                        </div>

                        <label class="col-md-2 control-label">Alamat Supplier</label>
                        <div class="col-md-3">
                            <input type="text" id="address" class="form-control" placeholder="Alamat Supplier" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Price</label>
                        <div class="col-md-7">
                            <input type="text" name="price" class="form-control" placeholder="Price">
                        </div>

                        <div class="col-md-2">
                            <select class="form-control" name="currency" required>
                                <option value="">Currency</option>
                                <option value="IDR">IDR</option>
                                <option value="USD">USD</option>
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

<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Supplier</h4>
            </div>

            <form action="<?=base_url()?>staff_procurement/invoice/add_supplier" class="form-horizontal supplier" method="POST">
                <div class="modal-body">

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