<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse" style="padding:0;">
                    <ul id="menu-top" class="nav navbar-nav">
                        <li><a class="<?php if ($this->uri->segment(2) == 'purchase_request'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_project/purchase_request">Purchase Request</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'laporan'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_project/laporan">Laporan</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>