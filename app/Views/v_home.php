<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>
<div class="col-sm-12">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?= base_url('gambar/girl.jpg') ?>" alt="First slide">
            </div>
            <div class="item">
                <img src="<?= base_url('gambar/gojo.jpg') ?>" alt="Second slide">
            </div>
            <div class="item">
                <img src="<?= base_url('gambar/rental.png') ?>" alt="Third slide">
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
</div>


















<?= $this->endSection() ?>