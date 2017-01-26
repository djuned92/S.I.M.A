<div class="content-wrapper">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Manajemen User</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="<?=base_url()?>admin/manajemen_user/add"><button class="btn btn-primary btn-md"><i class="fa fa-plus"> Tambah User</i></button></a>
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
                            <th>Level</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Departement</th>
                            <th>Username</th>
                            <th>Status</th>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($user as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td>
                                <?php 
                                    if($r->level == 1)
                                    {
                                        echo "Admin";
                                    }
                                    elseif($r->level == 2)
                                    {
                                        echo "Manajer Divisi";
                                    }
                                    elseif($r->level == 3)
                                    {
                                        echo "Manajer Project";
                                    }
                                    elseif($r->level == 4)
                                    {
                                        echo "Manajer Procurement";
                                    }
                                    elseif($r->level == 5)
                                    {
                                        echo "Direktur";
                                    }
                                    else
                                    {
                                        echo "Staff Procurement";
                                    }
                                ?>
                            </td>
                            <td><?=$r->nik?></td>
                            <td><?=$r->name?></td>
                            <td><?=$r->departement_name?></td>
                            <td><?=$r->username?></td>
                            <td>
                                <?php 
                                    if($r->status == 1)
                                    {
                                        echo "Aktif";
                                    }
                                    else 
                                    {
                                        echo "Tidak Aktif";
                                    }
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger btn-group" data-toggle="modal" data-target="#delete<?=$r->id_user?>"><i class="fa fa-trash"> Hapus</i></button>
                                <a href="<?=base_url()?>admin/manajemen_user/update/<?=$r->id_user?>"><button class="btn btn-sm btn-info btn-group"><i class="fa fa-edit"> Edit</i></button></a>
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

<!-- modal hapus -->
<?php foreach($user as $r): ?>
<div class="modal fade" id="delete<?=$r->id_user?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Hapus User</h4>
            </div>

            <form action="<?=base_url()?>admin/manajemen_user/delete/<?=$r->id_user?>" class="form-horizontal" method="POST">
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus user dengan nama <strong><?=$r->name?> ?</strong></h4>
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