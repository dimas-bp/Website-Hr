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
            <div class="section-title-container">
                <h4 class="section-title" style="font-weight:bold; text-transform:none;"><span>GiNK</span> TECHNOLOGY</h4>
            </div>
            <div class="contact-info">
                <h3>GINK TECHNOLOGY</h3>
                <p>Jl. WAY PENGUBUAN NO.16 BANDAR LAMPUNG</p>
                <p><strong>T. </strong>0721 5600 649 | <strong>P. </strong>0811 7208 887</p>
                <p>www.ginktech.net | info@ginktech.net</p>
            </div>
            <!-- /.col -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="<?= base_url('/pendaftaran') ?>" class="btn btn-primary btn-flat btn-block"><i class="fa fa-file"></i> Mendaftar</a>
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Full Stack Web Developer</b></h3>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $beranda['beranda'] ?>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<?= $this->endSection() ?>