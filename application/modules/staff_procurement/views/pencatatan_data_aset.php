<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Pencatatan Data Aset</h4>
                <h5>
                    <a href="<?=base_url()?>staff_procurement/pencatatan_data_aset" <?php if ($this->uri->segment(2) == 'pencatatan_data_aset'){ echo "class='label label-default'"; } ?>>Aset Sudah Dicatat</a>
                    <a href="<?=base_url()?>staff_procurement/aset_belum_dicatat" <?php if ($this->uri->segment(2) == 'aset_belum_dicatat'){ echo "class='label label-default'"; } ?>>Aset Belum Dicatat
                        <?php 
                            $x = $this->barang->count_invoice()->num_rows();
                            $y = $this->barang->count_barang()->num_rows();

                            $z = $x - $y;
                        ?>
                        <span class="badge"><?=$z?></span>
                    </a>
                </h5>
                <br/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                 <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No PR</th>
                            <th>No PO</th>
                            <th>No Invoice</th>
                            <th>Item Name</th>
                            <th>Requestor</th>
                            <th>Departement</th>
                            <th>Departement Location</th>
                            <th>Status Aset</th>
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
                            <td><?=$r->no_purchase?></td>
                            <td><?=$r->po_no?></td>
                            <td><?=$r->invoice_no?></td>
                            <td><?=$r->purchase?></td>
                            <td><?=$r->name?></td>
                            <td><?=$r->departement_name?></td>
                            <td><?=$r->departement_location?></td>
                            <td>
                                <?php 
                                    $check_aset = $this->barang->check_aset($r->id_invoice)->num_rows();
                                    if($check_aset > 0)
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
                                <a href="<?=base_url()?>staff_procurement/pencatatan_data_aset/add/<?=$r->id_invoice?>"
                                style="
                                    <?php
                                        if($check_aset > 0)
                                        {
                                            echo 'pointer-events: none;cursor: default;';
                                        }
                                    ?>   
                                ">
                                    <button class="btn btn-sm btn-primary"
                                    <?php
                                        if($check_aset > 0)
                                        {
                                            echo 'disabled';
                                        }
                                    ?>    
                                    ><i class="fa fa-file-text-o"> Catat Data Aset</i>
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