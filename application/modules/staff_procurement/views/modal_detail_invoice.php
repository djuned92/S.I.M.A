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
                        $invoice = $this->invoice->get_invoice_purchase_order($r->id_purchase_order)->row();
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