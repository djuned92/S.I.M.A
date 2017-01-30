<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">History Kepemilikan</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First User</th>
                            <th>End User</th>
                            <th>Date Received</th>
                            <th>Departement</th>
                            <th>Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($history_aset as $r):
                        ?>
                        <tr>
                            <td><?=$i++?></td>
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
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            
            </div>

        </div>
    </div>
</div>