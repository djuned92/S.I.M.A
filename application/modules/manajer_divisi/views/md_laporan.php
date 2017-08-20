<style type="text/css">
    @media screen {
        #header {
            display: none;
        }
        #footer {
            display: none;
        }
    }
    @media print {
        @page {
            margin: 0;
        }
        #footer {
            position: fixed;
            bottom: 0;
        }
        .row {
            display: none;
        }
        p {
            font: 20pt arial, bold;
            text-align: center;
        }
        thead {
            font: 16pt arial;

        }
        tbody {
            font: 14pt arial;
        }
    }
</style>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Laporan Purchase Request</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <?php if($this->session->flashdata('no_data')):?>
                    <div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echo $this->session->flashdata('no_data'); ?></strong>
                    </div>
                <?php endif; ?>

                <form class="form-horizontal from-to-tgl" action="<?=base_url()?>manajer_divisi/laporan" method="POST">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Atur Tanggal Laporan</label>
                        <div class="col-md-3">
                            <input type="date" name="from_tgl" class="form-control" value="<?=set_value('from_tgl')?>">
                        </div>
                        <label class="col-md-1 control-label">s/d</label>
                        <div class="col-md-3">
                            <input type="date" name="to_tgl" class="form-control" value="<?=set_value('to_tgl')?>">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary" title="Search">
                                <i class="fa fa-search"></i>
                            </button>
                            <button class="btn btn-info" title="Print" id="print">
                                <i class="fa fa-print"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($_POST['from_tgl']) && isset($_POST['to_tgl'])):?>
            <div class="col-md-10 col-md-offset-1">
                <div id="header">
                    <p><img src="<?=base_url()?>assets/img/logo_ark_crop.jpg" class="img-rounded"></p>
                    <p>Laporan Purchase Request</p>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>PR</td>
                            <td>No PR</td>
                            <td>Tanggal</td>
                            <td>Departement</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($laporan)) :?>
                        <tr>
                            <td colspan="6" align="center">Tidak ada data pada periode ini</td>
                        </tr>
                    <?php else : ?>
                        <?php $i = 1; foreach($laporan as $r): ?>
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
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>

                <div id="footer">
                    <img src="<?=base_url()?>assets/img/footer_logo.png" class="img-rounded">
                </div>
            </div>
        <?php endif;?>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->