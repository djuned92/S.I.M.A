<div class="content-wrapper">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Tambah Purchase Request</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal purchase" action="<?=base_url()?>manajer_divisi/purchase_request/add" method="POST">
                    
                    <input type="hidden" name="id_user" value="<?=$this->session->userdata('id_user')?>">               
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Purchase Request</label>
                        <div class="col-md-8">
                            <input type="text" name="purchase" class="form-control" placeholder="Purchase Request">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">No Purchase Request</label>
                        <div class="col-md-8">
                            <input type="text" name="no_purchase" class="form-control" placeholder="No Purchase Request">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Date Purchase Request</label>
                        <div class="col-md-8">
                            <input type="date" name="date_purchase" class="form-control" placeholder="Date Purchase Request">
                        </div>
                    </div>               

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->