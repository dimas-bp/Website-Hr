<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="col-sm-12">
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                echo session()->getFlashdata('pesan');
                echo '</h4></div>';
            }
            ?>
            <?php echo form_open('Admin/saveBeranda') ?>
            <div class="form-group">
                <textarea id="editor1" name="beranda" rows="10" cols="80">
                    <?= $beranda['beranda'] ?>
                    </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>