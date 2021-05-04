<?php

$db = \Config\Database::connect();
$hidden = [
    'id_calkar' => 'id_calkar',
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
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        if (($i + 1) <= $value['star']) {
                                            echo '<span class="fa fa-star checked"></span>';
                                        } else {
                                            echo '<span class="fa fa-star"></span>';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal<?= $value['id_calkar']; ?>"><i class="fa fa-star"></i> Rating</button>
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

<?php foreach ($daftar as $key => $value) { ?>
    <div class="modal" id="myModal<?= $value['id_calkar'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Berikan Rating</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('daftar/rate/' . $value['id_calkar']) ?>
                    <div class="form-group">
                        <label>Rating</label>
                        <select name="star" class="form-control">>
                            <option value="1" <?= ($value['star'] == "1" ? "selected" : ""); ?>>1</option>
                            <option value="2" <?= ($value['star'] == "2" ? "selected" : ""); ?>>2</option>
                            <option value="3" <?= ($value['star'] == "3" ? "selected" : ""); ?>>3</option>
                            <option value="4" <?= ($value['star'] == "4" ? "selected" : ""); ?>>4</option>
                            <option value="5" <?= ($value['star'] == "5" ? "selected" : ""); ?>>5</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

<?php } ?>
<?= $this->endSection() ?>