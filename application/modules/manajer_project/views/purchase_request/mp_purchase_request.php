<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Purchase Request</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="<?=base_url()?>manajer_project/purchase_request/add"><button class="btn btn-primary btn-md"><i class="fa fa-plus"> Tambah Purchase Request</i></button></a>
                <br/><br/>

                <?php if($this->session->flashdata('add')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('add'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('update')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('update'); ?></strong>
                    </div>
                <?php elseif($this->session->flashdata('delete')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('delete'); ?></strong>
                    </div>
                <?php endif; ?> 

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Purchase Request</th>
                            <th>No Purchase Request</th>
                            <th>Tanggal Request</th>
                            <th>Status Request</th>
                            <!-- <td>Aksi</td> -->
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
                            <!-- <td>
                                <button class="btn btn-sm btn-danger btn-group" data-toggle="modal" data-target="#delete<?=$r->id_purchase?>"><i class="fa fa-trash"> Hapus</i></button>
                                <a href="<?=base_url()?>manajer_project/purchase_request/update/<?=$r->id_purchase?>"><button class="btn btn-sm btn-info btn-group"><i class="fa fa-edit"> Edit</i></button></a>
                            </td> -->
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->

<!-- modal hapus -->
<?php foreach($purchase as $r): ?>
<div class="modal fade" id="delete<?=$r->id_purchase?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus Purchase Request</h4>
            </div>

            <form action="<?=base_url()?>manajer_project/purchase_request/delete/<?=$r->id_purchase?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus purchase request <strong><?=$r->purchase?> ?</strong></h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- end modal hapus -->