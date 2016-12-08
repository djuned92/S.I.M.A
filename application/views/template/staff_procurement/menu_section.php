<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse" style="padding:0;">
                    <ul id="menu-top" class="nav navbar-nav">
                        <li><a class="<?php if ($this->uri->segment(2) == 'purchase_order'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>staff_procurement/purchase_order">Purchase Order</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'invoice'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>staff_procurement/invoice">Invoice</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'pencatatan_data_aset'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_procurement/receives_aset_request">Pencatatan Data Aset</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'history_kepemilikan'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>staff_procurement/history_kepemilikan">History Kepemilikan</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>