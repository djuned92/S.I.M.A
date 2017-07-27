<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Data Aset</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Asset</th>
                            <th>First User</th>
                            <th>End User</th>
                            <th>Date Received</th>
                            <th>Departement</th>
                            <th>Condition</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($history_aset as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->asset_no?></td>
                            <td>Staff Procurement</td>
                            <td><?=$r->departement_name?></td>
                            <td>
                                <?php
                                    $jadwal = $r->date_received;
                                    $data = strtotime($jadwal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan

                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('Y');
                                ?>
                            </td>
                            <td><?=$r->departement_location?></td>
                            <td><?=$r->act_condition?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_barang?>">
                                    <i class="fa fa-eye"> Detail</i>
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

<?php foreach($history_aset as $r): ?>
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
                                <td  width="30%">Asset No</td>
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
                                <td  width="30%">Processor</td>
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
                                <td  width="30%">No Purchase Request</td>
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
                                <td  width="30%">Perusahaan</td>
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