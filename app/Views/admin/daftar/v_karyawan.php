<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $subtitle ?></h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped projects">
                    <thead>
                        <tr class="bg-primary">
                            <th width="1%">No</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Bidang</th>
                            <th>Masa Kontrak</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th width="50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($daftar as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_lengkap'] ?></td>
                                <td><?= $value['tipe_kar']; ?></td>
                                <td><?= $value['bidang']; ?></td>
                                <td><?= $value['masa_kontrak']; ?></td>
                                <td><?= $value['jk']; ?></td>
                                <td><img src="<?= base_url('foto/' . $value['foto']) ?>" alt="avatar" class="img-circle" width="100px"> </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_calkar']; ?>"><i class="fa fa-pencil-square-o"></i> Edit</button>
                                    <a href="<?= base_url('daftar/detailData/' . $value['id_calkar']) ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
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
<!-- modal edit karyawan -->
<?php foreach ($daftar as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_calkar'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Karyawan</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('daftar/edit/' . $value['id_calkar'])
                    ?>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input name="nama_lengkap" value="<?= $value['nama_lengkap']; ?>" class="form-control" placeholder="Nama Karyawan" required>
                    </div>
                    <div class="form-group">
                        <label>Tipe karyawan</label>
                        <select name="tipe_kar" class="form-control">>
                            <option value="Tetap" <?= ($value['tipe_kar'] == "Tetap" ? "selected" : ""); ?>>Tetap</option>
                            <option value="Kontrak" <?= ($value['tipe_kar'] == "Kontrak" ? "selected" : ""); ?>>Kontrak</option>
                            <option value="Freelance" <?= ($value['tipe_kar'] == "Freelance" ? "selected" : ""); ?>>Freelance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bidang</label>
                        <input name="bidang" value="<?= $value['bidang']; ?>" class="form-control" placeholder="Keahlian" required>
                    </div>
                    <div class="form-group">
                        <label>Masa Kontrak</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="masa_kontrak" value="<?= $value['masa_kontrak']; ?>" class="form-control pull-right" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">>
                            <option value="" holder disabled selected class="btn disabled">Jenis Kelamin</option>
                            <option value="L" <?= ($value['jk'] == "L" ? "selected" : ""); ?>>Laki-Laki</option>
                            <option value="P" <?= ($value['jk'] == "P" ? "selected" : ""); ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" accept="image/*" class="form-control">
                        <img src="<?= base_url('foto/' . $value['foto']) ?>" width="100px" height="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal edit -->
<?= $this->endSection() ?>