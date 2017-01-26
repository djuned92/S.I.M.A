<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Invoice</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PO</th>
                            <th>No PO</th>
                            <th>Tanggal PO</th>
                            <th>Departement</th>
                            <th>Requestor</th>
                            <th>Status Invoice</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($purchase_order as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->purchase?></td>
                            <td><?=$r->po_no?></td>
                            <td>
                                <?php
                                    $jadwal = $r->po_date;
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
                            <td><?=$r->departement_name?></td>
                            <td><?=$r->name?></td>
                            <td>
                                <?php 
                                    $check_invoice = $this->invoice->check_invoice($r->id_purchase_order)->num_rows();

                                    if($check_invoice > 0)
                                    {
                                         echo "<span class='label label-success'>Sudah</span>";
                                    }
                                    else 
                                    {
                                        echo "<span class='label label-danger'>Belum</span>";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?=base_url()?>staff_procurement/invoice/add/<?=$r->id_purchase_order?>"
                                style="
                                    <?php
                                        $check_invoice = $this->invoice->check_invoice($r->id_purchase_order)->num_rows();
                                        if($check_invoice > 0)
                                        {
                                            echo 'pointer-events: none;cursor: default;';
                                        }
                                    ?>  
                                ">
                                    <button class="btn btn-sm btn-primary"
                                       <?php 
                                            if($check_invoice > 0)
                                            {
                                                echo 'disabled';
                                            }    
                                       ?>
                                    ><i class="fa fa-file-o"> Buat Invoice</i>
                                    </button>
                                </a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_purchase_order?>"
                                <?php
                                    if($check_invoice == 0)
                                    {
                                        echo 'disabled';
                                    }
                                ?>
                                >
                                    <i class="fa fa-eye"> Detail Ivoice</i>
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

<!-- modal detail invoice -->
<?php foreach($purchase_order as $r): ?>
<div class="modal fade" id="detail<?=$r->id_purchase_order?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Detail Invoice</h4>
            </div>

            <form action="" class="form-horizontal" method="">
                <div class="modal-body">
                    <?php
                        $invoice = $this->invoice->get_by_id($r->id_purchase_order)->row();
                        // return var_dump($invoice);
                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice <?=$invoice->purchase?></th>
                            </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <td>Supplier</td>
                                <td><?=$invoice->supplier_name?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><?=$invoice->address?></td>
                            </tr>
                            <tr>
                                <td>No Invoice</td>
                                <td><?=$invoice->invoice_no?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Invoice</td>
                                <td>
                                    <?php
                                    $tanggal = $invoice->invoice_date;
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
                                    $tanggal = $invoice->date_received;
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
                                <td><?=$invoice->price?></td>
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