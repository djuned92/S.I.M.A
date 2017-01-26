<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse" style="padding:0;">
                    <ul id="menu-top" class="nav navbar-nav">
                    <style type="text/css">
                        .menu-top-active {
                            <?=$manajemen_web->menu_top_active?>
                        }
                        .menu-section .nav > li > a:hover,.menu-section .nav > li > a:focus {
                            <?=$manajemen_web->a_focus?>
                        }
                    </style>
                        <li><a class="<?php if ($this->uri->segment(2) == 'manajemen_user'){ echo 'menu-top-active ';} ?>" href="<?=base_url()?>admin/manajemen_user">Manajemen User</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'manajemen_data'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>admin/manajemen_data">Manajemen Data</a></li>
                        <li><a class="<?php if ($this->uri->segment(2) == 'manajemen_web'){ echo 'menu-top-active';} ?>" href="<?=base_url()?>admin/manajemen_web">Manajemen WEB</a></li>
                    </ul>
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                Admin <span class="glyphicon glyphicon-user"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings" style="width:250px; height:auto;">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="<?=base_url()?>assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <div style="padding-left:35px;">
                                    <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="<?=base_url()?>auth/users/logout" class="btn btn-danger btn-sm">Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>