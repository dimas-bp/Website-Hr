<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

<div class="col-sm-5">
    <div class="text-center">
        <img class="img-fluid pad" src="<?= base_url('logo/logoo.png') ?>" width="350px">
    </div>
</div>

<div class="col-sm-7">
    <?php echo form_open('Auth/cek_login_calkar') ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Login</h3>
        </div>
        <div class="box-body">

            <?php
            session()->getFlashdata('errors');
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Warning! - ';
                echo session()->getFlashdata('pesan');
                echo '</h4></div>';
            }
            session()->getFlashdata('errors');
            if (session()->getFlashdata('keluar')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success! - ';
                echo session()->getFlashdata('keluar');
                echo '</h4></div>';
            }
            ?>

            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" value="<?= old('email') ?>" class="form-control" placeholder="Email">
                <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" value="<?= old('password') ?>" class="form-control" placeholder="Password">
                <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Login</button>
            </div>

        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
</div>

<?php echo form_close() ?>

</div>

<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    window.setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>

<?= $this->endSection() ?>