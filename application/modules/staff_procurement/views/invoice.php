<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Invoice</h4>

                <h5>
                    <a href="<?=base_url()?>staff_procurement/invoice" <?php if ($this->uri->segment(2) == 'invoice'){ echo "class='label label-default'"; } ?>>Invoice</a>
                    <a href="<?=base_url()?>staff_procurement/po_received" <?php if ($this->uri->segment(2) == 'po_received'){ echo "class='label label-default'"; } ?>>PO Received <span class="badge"><?=$count_not_invoice?></span></a>
                </h5>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Invoice</th>
                            <th>Tanggal Invoice</th>
                            <th>Date Received</th>
                            <th>No PR</th>
                            <th>No PO</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($invoice as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->invoice_no?></td>
                            <td>
                                <?php
                                    $jadwal = $r->invoice_date;
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
                            <td><?=$r->no_purchase?></td>
                            <td><?=$r->po_no?></td>
                            <td>
                                <a href="<?=base_url()?>staff_procurement/invoice/update/<?=$r->id_invoice?>">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit"> Edit Invoice</i>
                                    </button>
                                </a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_invoice?>">
                                    <i class="fa fa-eye"> Detail Invoice</i>
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

<!-- modal detail invoice -->
<?php foreach($invoice as $r): ?>
<div class="modal fade" id="detail<?=$r->id_invoice?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Invoice</h4>
            </div>

            <form action="" class="form-horizontal" method="">
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><?=$r->purchase?></th>
                            </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <td>Supplier</td>
                                <td><?=$r->supplier_name?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?=$r->address?></td>
                            </tr>
                            <tr>
                                <td>No Invoice</td>
                                <td><?=$r->invoice_no?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Invoice</td>
                                <td>
                                    <?php
                                    $tanggal = $r->invoice_date;
                                    $data = strtotime($tanggal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan
                                
                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('Y');
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Invoice Date Received</td>
                                <td>
                                    <?php
                                    $tanggal = $r->date_received;
                                    $data = strtotime($tanggal);
                                    // $w = date('w', $data); // hari
                                    $j = date('j', $data); // tanggal
                                    $n = date('n', $data); // bulan
                                
                                    // $hari = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
                                    $bulan = array('','Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novovember','Desember');
                                    // echo $hari[$w]. ", ".$j." ".$bulan[$n]." ".date('y');
                                    echo $j. " ".$bulan[$n]. " ".date('Y');
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><?=$r->price?> <?=$r->currency?></td>
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
