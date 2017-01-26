<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Aset Request</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <?php if($this->session->flashdata('proses')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('proses'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('tidak_setuju')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('tidak_setuju'); ?></strong>
                    </div>
                <?php endif; ?> 


                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>PR</th>
                            <th>No PR</th>
                            <th>Tanggal PR</th>
                            <th>Departement</th>
                            <th>Requestor</th>
                            <th>Status</th>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($purchase as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$r->purchase?></td>
                            <td><?=$r->no_purchase?></td>
                            <td>
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
                            </td>
                            <td><?=$r->departement_name?></td>
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
                                <a href="<?=base_url()?>manajer_procurement/receives_aset_request/tidak_setuju/<?=$r->id_purchase?>" 
                                style="
                                    <?php 
                                        if($r->status_purchase == 'Tidak Setuju' || $r->status_purchase == 'Setuju' || $r->status_purchase == 'Proses') 
                                        {
                                            echo 'pointer-events: none;cursor: default;';
                                        }
                                    ?>
                                ">
                                    <button class="btn btn-sm btn-danger" 
                                        <?php 
                                            if($r->status_purchase == 'Tidak Setuju' || $r->status_purchase == 'Setuju' || $r->status_purchase == 'Proses') 
                                            {
                                                echo 'disabled';
                                            }
                                        ?>><i class="fa fa-close"> Tidak Setuju</i>
                                        
                                    </button>    
                                </a>
                                <a href="<?=base_url()?>manajer_procurement/receives_aset_request/proses/<?=$r->id_purchase?>"
                                style="
                                    <?php 
                                        if($r->status_purchase == 'Tidak Setuju' || $r->status_purchase == 'Setuju' || $r->status_purchase == 'Proses') 
                                        {
                                            echo 'pointer-events: none;cursor: default;';
                                        }
                                    ?>
                                ">
                                    <button class="btn btn-sm btn-warning"
                                        <?php 
                                            if($r->status_purchase == 'Tidak Setuju' || $r->status_purchase == 'Setuju' || $r->status_purchase == 'Proses') 
                                            {
                                                echo 'disabled';
                                            }
                                        ?>
                                        ><i class="fa fa-circle-o-notch"> Proses</i>
                                                                    
                                    </button>
                                </a>
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