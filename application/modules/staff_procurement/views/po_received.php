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
                                    $check_invoice = $this->invoice->check_invoice($r->id_pembelian)->num_rows();

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
                                <a href="<?=base_url()?>staff_procurement/invoice/add/<?=$r->id_pembelian?>"
                                style="
                                    <?php
                                        $check_invoice = $this->invoice->check_invoice($r->id_pembelian)->num_rows();
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
                                <!-- <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#detail<?=$r->id_purchase_order?>"
                                <?php
                                    if($check_invoice == 0)
                                    {
                                        echo 'disabled';
                                    }
                                ?>
                                >
                                    <i class="fa fa-eye"> Detail Ivoice</i>
                                </button> -->
                            </td>        
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
            </div>

        </div>
    </div>
</div>

