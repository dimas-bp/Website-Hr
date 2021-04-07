<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>
<div class="col-sm-8">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $no_a = 1;
            foreach ($baner as $key => $value) {
                $a = $no_a;
            ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?= $no_a++ ?>" class="<?= ($no_a == 1) ? 'active' : '' ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php $no_b = 1;
            foreach ($baner as $key => $value) {
                $b = $no_b;
            ?>
                <div class="item <?= ($b == 1) ? 'active' : '' ?>">
                    <img class="d-block w-100" height="100px" src="<?= base_url('assets/' . $value['baner']) ?>" alt="<?= $no_b++ ?>">
                </div>
            <?php } ?>
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