<?php
$hidden = [
    'id_calkar' => 'id',
    'star' => 0
];

$submit = [
    'name' => 'submit',
    'value' => 'Rate!',
    'type' => 'submit',
    'id' => 'btn_rating'
];

?>
<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $subtitle ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-plus"></i> Add </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('terima')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                    echo session()->getFlashdata('terima');
                    echo '</h4></div>';
                }
                if (session()->getFlashdata('tolak')) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                    echo session()->getFlashdata('tolak');
                    echo '</h4></div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr class="bg-primary">
                            <th width="1%">No</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Nama Lengkap</th>
                            <th>Rating</th>
                            <th width="50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($daftar as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('foto/' . $value['foto']) ?>" alt="avatar" class="img-circle" width="100px"> </td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                    <span class="fa fa-star "></span>
                                </td>
                                <td>
                                    <button type="button" id="btn_rating" data-toggle="modal"><i class="fa fa-star"></i> Rating</button>
                                    <a href="<?= base_url('daftar/detailData/' . $value['id_calkar']) ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                    <a href="<?= base_url('daftar/diterima/' . $value['id_calkar']) ?>" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Terima</a>
                                    <a href="<?= base_url('daftar/ditolak/' . $value['id_calkar']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Tolak</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Berikan Rating</h4>
            </div>
            <div class="modal-body">
                <span class="fa fa-star " id="f_star_1" onClick="rate(1)"></span>
                <span class="fa fa-star " id="f_star_2" onClick="rate(2)"></span>
                <span class="fa fa-star " id="f_star_3" onClick="rate(3)"></span>
                <span class="fa fa-star " id="f_star_4" onClick="rate(4)"></span>
                <span class="fa fa-star " id="f_star_5" onClick="rate(5)"></span>
            </div>
            <?php echo form_open('daftar/rate') ?>
            <input type="hidden" name="star" value="0">
            <?php echo form_submit($submit) ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>