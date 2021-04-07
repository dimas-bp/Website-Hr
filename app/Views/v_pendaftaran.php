<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

<?php if ($jadwal['status'] == 1) { ?>
    <div class="col-sm-4">
        <img class="img-responsive pad" src="<?= base_url('logo/register.png') ?>" alt="">
    </div>

    <div class="col-sm-8">
        <?php echo form_open('pendaftaran/simpanPendaftaran') ?>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Estimasi Pendaftaran</h3>
            </div>
            <div class="box-body">

                <?php session()->getFlashdata('errors');
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                }
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" value="<?= old('email') ?>" class="form-control" placeholder="Email">
                            <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" value="<?= old('nama_lengkap') ?>" class="form-control" placeholder="Nama Lengkap">
                            <p class="text-danger"><?= $validation->hasError('nama_lengkap') ? $validation->getError('nama_lengkap') : '' ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" value="<?= old('password') ?>" class="form-control" placeholder="Password">
                            <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info btn-flat btn-block"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <!-- /.col -->
        </div>
    </div>

    <?php echo form_close() ?>

    </div>
<?php } ?>

<?= $this->endSection() ?>