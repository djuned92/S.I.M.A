<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Pencatatan Data Aset</h4>
                <h5>
                    <a href="<?=base_url()?>staff_procurement/pencatatan_data_aset" <?php if ($this->uri->segment(2) == 'pencatatan_data_aset'){ echo "class='label label-default'"; } ?>>Aset Sudah Dicatat</a>
                    <a href="<?=base_url()?>staff_procurement/aset_belum_dicatat" <?php if ($this->uri->segment(2) == 'aset_belum_dicatat'){ echo "class='label label-default'"; } ?>>Aset Belum Dicatat
                        <?php
                            $x = $this->barang->count_invoice()->num_rows();
                            $y = $this->barang->count_barang()->num_rows();

                            $z = $x - $y;
                        ?>
                        <span class="badge"><?=$z?></span>
                    </a>
                </h5>
                <br/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                 <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset NO</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Departement</th>
                            <th>Warranty</th>
                            <th>Exp Date Wrr</th>
                            <th>Act Condition</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($data_aset as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->asset_no?></td>
                            <td><?=$r->item_name?></td>
                            <td><?=$r->category_name?></td>
                            <td><?=$r->departement_name?></td>
                            <td><?=$r->warranty?></td>
                            <td>
                                <?php
                                    $exp_date_wrr = $r->exp_date_wrr;
                                    $data = strtotime($exp_date_wrr);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan
                                    $y = date('Y', $data); // tahun

                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".$y;
                                ?>
                            </td>
                            <td><?=$r->act_condition?></td>
                            <td>
                                <a href="<?=base_url()?>staff_procurement/pencatatan_data_aset/update/<?=$r->id_barang?>">
                                    <button class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"> Edit Aset</i>
                                    </button>
                                </a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_barang?>">
                                    <i class="fa fa-eye"> Detail Aset</i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<!-- modal detail aset -->
<?php foreach($data_aset as $r): ?>
<div class="modal fade" id="detail<?=$r->id_barang?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Aset</h4>
            </div>

            <form action="" class="form-horizontal" method="">
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?=$r->item_name?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Asset No</td>
                                <td><?=$r->asset_no?></td>
                            </tr>
                            <tr>
                                <td>Item Name</td>
                                <td><?=$r->item_name?></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><?=$r->category_name?></td>
                            </tr>
                            <tr>
                                <td>Brand</td>
                                <td><?=$r->brand_name?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Specification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Processor</td>
                                <td><?=$r->processor?></td>
                            </tr>
                            <tr>
                                <td>RAM</td>
                                <td><?=$r->ram?></td>
                            </tr>
                            <tr>
                                <td>HDD</td>
                                <td><?=$r->hdd?></td>
                            </tr>
                            <tr>
                                <td>Display</td>
                                <td><?=$r->display?></td>
                            </tr>
                            <tr>
                                <td>OS</td>
                                <td><?=$r->os?></td>
                            </tr>
                            <tr>
                                <td>Notes</td>
                                <td><?=$r->notes?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>PR, PO, INVOICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No Purchase Request</td>
                                <td><?=$r->no_purchase?></td>
                            </tr>
                            <tr>
                                <td>No Purchase Order</td>
                                <td><?=$r->po_no?></td>
                            </tr>
                            <tr>
                                <td>No Invoice</td>
                                <td><?=$r->invoice_no?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><?=$r->price?> <?=$r->currency?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="2">Supplier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Perusahaan</td>
                                <td><?=$r->supplier_name?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?=$r->address?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><?=$r->phone?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php endforeach; ?>
