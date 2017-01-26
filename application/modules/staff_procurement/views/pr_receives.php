<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Purchase Order</h4>
                <h5>
                    <a href="<?=base_url()?>staff_procurement/purchase_order" <?php if ($this->uri->segment(2) == 'purchase_order'){ echo "class='label label-primary'"; } ?>>Purchase Order</a>
                    <a href="<?=base_url()?>staff_procurement/pr_receives" <?php if ($this->uri->segment(2) == 'pr_receives'){ echo "class='label label-primary'"; } ?>>PR Receives</a>
                </h5>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                
            </div>

        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->