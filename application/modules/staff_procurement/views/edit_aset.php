<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Edit Data Aset</h4>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
                <form class="form-horizontal aset" action="<?=base_url()?>staff_procurement/pencatatan_data_aset/update/<?=$aset->id_barang?>" method="POST" enctype="multipart/form-data">
                                 
                    <input type="hidden" name="id_barang" value="<?=$aset->id_barang?>">
                    <input type="hidden" name="id_invoice" value="<?=$aset->id_invoice?>">
                    <input type="hidden" name="id_specification" value="<?=$aset->id_specification?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label">No PR</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$aset->no_purchase?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">No PO</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$aset->po_no?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Purchase</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$aset->purchase?>" disabled>
                        </div>

                        <label class="col-md-1 control-label">Requestor</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$aset->name?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Departement</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="<?=$aset->departement_name?>" disabled>
                        </div>

                        <label class="col-md-2 control-label">Departement Location</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="<?=$aset->departement_location?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Item Name</label>
                        <div class="col-md-9">
                            <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="<?=$aset->item_name ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Asset No</label>
                        <div class="col-md-9">
                            <input type="text" name="asset_no" class="form-control" placeholder="Asset No" value="<?=$aset->asset_no?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Category</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_category" id="id_category" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach($category as $datas):?>
                                <option value="<?=$datas->id_category?>" <?=$datas->id_category == $aset->id_category ? 'selected = "selected"': ''; ?>><?=$datas->category_name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <label class="col-md-1 control-label">Brand</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_brand" id="id_brand" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach($brand as $datas):?>
                                <option value="<?=$datas->id_brand?>" <?=$datas->id_brand == $aset->id_brand ? 'selected = "selected"': ''; ?>><?=$datas->brand_name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Specification</label>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">Processor</label>
                        <div class="col-md-3">
                            <input type="text" name="processor" class="form-control" placeholder="Processor" value="<?=$aset->processor?>">
                        </div>

                        <label class="col-md-1 control-label">RAM</label>
                        <div class="col-md-4">
                            <input type="text" name="ram" class="form-control" placeholder="RAM" value="<?=$aset->ram?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">HDD</label>
                        <div class="col-md-3">
                            <input type="text" name="hdd" class="form-control" placeholder="HDD" value="<?=$aset->hdd?>">
                        </div>

                        <label class="col-md-1 control-label">Display</label>
                        <div class="col-md-4">
                            <input type="text" name="display" class="form-control" placeholder="Display" value="<?=$aset->display?>">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-3 control-label">OS</label>
                        <div class="col-md-3">
                            <input type="text" name="os" class="form-control" placeholder="OS" value="<?=$aset->os?>">
                        </div>

                        <label class="col-md-1 control-label">Notes</label>
                        <div class="col-md-4">
                            <textarea class="form-control" rows="3" name="notes"><?=$aset->notes?></textarea>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-2 control-label">Departement</label>
                        <div class="col-md-3">
                           <select class="form-control" name="id_departement" id="id_departement" required>
                                <option value="">-- Pilih --</option>
                                <?php foreach($departement as $datas):?>
                                <option value="<?=$datas->id_departement?>" <?=$datas->id_departement == $aset->id_departement ? 'selected = "selected"': ''; ?>><?=$datas->departement_name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <label class="col-md-2 control-label">Departement Location</label>
                        <div class="col-md-4">
                            <input type="text" name="location" class="form-control" placeholder="Location" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Warranty</label>
                        <div class="col-md-4">
                            <input type="text" name="warranty" class="form-control" placeholder="Warranty" value="<?=$aset->warranty?>">
                        </div>

                        <label class="col-md-1 control-label">Exp Date</label>
                        <div class="col-md-4">
                            <input type="date" name="exp_date_wrr" class="form-control" placeholder="" value="<?php $tanggal = date_create($aset->exp_date_wrr); echo date_format($tanggal,'Y-m-d')?>">
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="col-md-2 control-label">Act Condition</label>
                        <div class="col-md-9">
                            <select class="form-control" name="act_condition" required>
                                <option value="">-- Pilih --</option>
                                <option value="Useable" <?=$aset->act_condition == 'Useable' ? 'selected = "selected"': ''; ?>>Useable</option>
                                <option value="Unuseable" <?=$aset->act_condition == 'Unuseable' ? 'selected = "selected"': ''; ?>>Unuseable</option>
                                <option value="Damage" <?=$aset->act_condition == 'Damage' ? 'selected = "selected"': ''; ?>>Damage</option>
                            </select>
                        </div>
                    </div>  
                    

                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->