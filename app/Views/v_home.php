<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>
<div class="col-sm-8">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img class="d-block w-100" height="100px" src="<?= base_url('gambar/foto1.jpg') ?>" alt="First slide">
            </div>
            <div class="item">
                <img class="d-block w-100" height="100px" src="<?= base_url('gambar/foto2.png') ?>" alt="Second slide">
            </div>
            <div class="item">
                <img class="d-block w-100" height="100px" src="<?= base_url('gambar/foto3.png') ?>" alt="Third slide">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>
    </div>
    <!-- /.box-body -->
</div>
<div class="col-sm-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Estimasi Pendaftaran</h3>
        </div>
        <div class="box-body">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pendaftar</span>
                        <span class="info-box-number">100</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bookmarks</span>
                        <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Uploads</span>
                        <span class="info-box-number">13,648</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="<?= base_url('/pendaftaran') ?>" class="btn btn-primary btn-flat btn-block"><i class="fa fa-file"></i> Mendaftar</a>
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
</div>


















<?= $this->endSection() ?>