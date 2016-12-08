<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse" style="padding:0;">
                    <ul id="menu-top" class="nav navbar-nav">
                        <li><a class="<?php if ($this->uri->segment(2) == 'receives_aset_request'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_procurement/receives_aset_request">Receives Aset Request</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'data_aset'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_procurement/data_aset">Data Aset</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'laporan'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>manajer_procurement/laporan">Laporan</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>