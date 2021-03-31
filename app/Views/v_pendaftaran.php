<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

<div class="col-sm-4">
    <img class="img-responsive pad" src="<?= base_url('logo/register.png') ?>" alt="">
</div>

<div class="col-sm-8">
    <?php echo form_open() ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Estimasi Pendaftaran</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-save"></i> Submit</button>
                </div>
            </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
</div>

<?php echo form_close() ?>

</div>
<?= $this->endSection() ?>