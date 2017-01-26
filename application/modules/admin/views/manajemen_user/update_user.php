<div class="content-wrapper">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line" style="<?=$manajemen_web->page_head_line?>">Edit User</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal user" action="<?=base_url()?>admin/manajemen_user/update/<?=$user->id_user?>" method="POST">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Level User</label>
                        <div class="col-md-8">
                            <select name="level" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="2" <?=$user->level == "2" ? 'selected = "selected"': ''; ?>>Manajer Divisi</option>
                                <option value="3" <?=$user->level == "3" ? 'selected = "selected"': ''; ?>>Manajer Project</option>
                                <option value="4" <?=$user->level == "4" ? 'selected = "selected"': ''; ?>>Manajer Procurement</option>
                                <option value="5" <?=$user->level == "5" ? 'selected = "selected"': ''; ?>>Direktur</option>
                                <option value="6" <?=$user->level == "6" ? 'selected = "selected"': ''; ?>>Staff Procurement</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">NIK</label>
                        <div class="col-md-8">
                            <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Karyawan" value="<?=$user->nik?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nama Lengkap</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="<?=$user->name?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Departement</label>
                        <div class="col-md-8">
                            <select name="id_departement" class="form-control">
                                <option value="">-- Pilih --</option>
                                
                                <?php foreach($departement as $r): ?>
                                <option value="<?=$r->id_departement?>" <?=$user->id_departement == $r->id_departement ? 'selected = "selected"': ''; ?>><?=$r->departement_name?></option>
                                <?php endforeach;?>
                            
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Username</label>
                        <div class="col-md-8">
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$user->username?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?=$user->password?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Ulangi Password</label>
                        <div class="col-md-8">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Ulangi Password" value="<?=$user->password?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status User</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="1" <?=$user->status == 1 ? 'selected = "selected"': ''; ?>>Aktif</option>
                                <option value="2" <?=$user->status == 2 ? 'selected = "selected"': ''; ?>>Tidak Aktif</option>
                            </select>
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