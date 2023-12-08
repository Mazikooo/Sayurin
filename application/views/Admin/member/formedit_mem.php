<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit Member</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('member/aksi_edit'); ?>" method="post">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">ID<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="ID_Member" name="ID_Member" required="required" value="<?php echo $member->ID_Member; ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Username<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" id="username" name="username" required="required" class="form-control" value="<?php echo $member->Username; ?>" readonly>
                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                                <?php if (isset($error)) { ?>
                                    <small class="text-danger"><?php echo $error; ?></small>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Password Baru</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="passwordBaru" class="form-control" type="password" name="passwordBaru">
                                <?php echo form_error('passwordBaru', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="alamat" class="form-control" type="text" name="alamat" value="<?php echo $member->Alamat; ?>">
                                <!-- Tambahkan validasi atau pesan kesalahan jika diperlukan -->
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No HP</label>
                            <div class="col-md-6 col-sm-6">
                                <input id="no_hp" class="form-control" type="text" name="no_hp" value="<?php echo $member->No_HP; ?>">
                               
                            </div>
                        </div>

                        

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="<?php echo site_url('member'); ?>" class="btn btn-primary" role="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
