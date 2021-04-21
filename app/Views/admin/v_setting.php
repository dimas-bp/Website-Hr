<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col-sm-12">
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
        echo session()->getFlashdata('pesan');
        echo '</h4></div>';
    }
    ?>
</div>

<div class="col-sm-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Logo</h3>
        </div>
        <div class="box-body">
            <?php echo form_open_multipart('admin/saveSetting') ?>
            <div class="text-center">
                <img id="gambar_load" class="img-fluid pad" src="<?= base_url('logo/' . $setting['logo']) ?>" width="250px" height="250px">
            </div>
            <div class="form-group">
                <label>Ganti Logo</label>
                <input id="preview_gambar" name="logo" type="file" class="form-control" accept="image/*">
            </div>
        </div>
    </div>
</div>

<div class="col-sm-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Data Perusahaan</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input name="nama_perusahaan" value="<?= $setting['nama_perusahaan'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" value="<?= $setting['email'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <input name="web" value="<?= $setting['web'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Sosial Media</label>
                        <input name="sosial_media" value="<?= $setting['sosial_media'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="5" class="form-control"><?= $setting['deskripsi'] ?></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</div>

<?php echo form_close() ?>

<?= $this->endSection() ?>