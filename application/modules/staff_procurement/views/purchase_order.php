<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Purchase Order</h4>
                <h5>
                    <a href="<?=base_url()?>staff_procurement/purchase_order" <?php if ($this->uri->segment(2) == 'purchase_order'){ echo "class='label label-default'"; } ?>>Purchase Order</a>
                    <a href="<?=base_url()?>staff_procurement/pr_receives" <?php if ($this->uri->segment(2) == 'pr_receives'){ echo "class='label label-default'"; } ?>>PR Received <span class="badge"><?=$count_not_po?></a>
                </h5>
                <br>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Purchase Request</th>
                            <th>No PR</th>
                            <th>No PO</th>
                            <th>Price</th>
                            <!-- <th>Departement</th>
                            <th>Requestor</th>
                            <th>Status PR</th>
                            <th>Status PO</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($po as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->purchase?></td>
                            <td><?=$r->no_purchase?></td>
                            <td><?=$r->po_no?></td>
                            <td><?=$r->price?> <?=$r->currency?></td>
                            <!-- <td>
                                <?php
                                    $jadwal = $r->date_purchase;
                                    $data = strtotime($jadwal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan

                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('Y');
                                ?>
                            </td> -->
                            <!-- <td><?=$r->departement_name?></td>
                            <td><?=$r->name?></td>
                            <td>
                                <?php
                                    if($r->status_purchase == 'Pending') {
                                        echo "<span class='label label-default'>Pending</span>";
                                    }
                                    elseif($r->status_purchase == 'Proses') {
                                        echo "<span class='label label-warning'>Proses</span>";
                                    }
                                    elseif($r->status_purchase == 'Setuju') {
                                        echo "<span class='label label-success'>Diterima</span>";
                                    }
                                    else {
                                        echo "<span class='label label-danger'>Ditolak</span>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    // $this->load->model('model_po','po');
                                    $check_po = $this->po->check_po($r->id_purchase)->num_rows();
                                    // var_dump($check_po);

                                    if($check_po > 0)
                                    {
                                         echo "<span class='label label-success'>Sudah</span>";
                                    }
                                    else
                                    {
                                        echo "<span class='label label-danger'>Belum</span>";
                                    }
                                ?>
                            </td> -->
                            <td>
                                <a href="<?=base_url()?>staff_procurement/purchase_order/update/<?=$r->id_purchase_order?>">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"> Edit PO</i>
                                    </button>
                                </a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_purchase_order?>">
                                    <i class="fa fa-eye"> Detail PO</i>
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

<!-- modal detail po -->
<?php foreach($po as $r): ?>
<div class="modal fade" id="detail<?=$r->id_purchase_order?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Purchase Order</h4>
            </div>

            <form action="" class="form-horizontal" method="">
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th colspan="2"><?=$r->purchase?></th>
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
                                <td>Tanggal Purchase Order</td>
                                <td><?=$r->po_date?></td>
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