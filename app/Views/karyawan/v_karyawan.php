<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data karyawan</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                }
                if (session()->getFlashdata('delete')) {
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil! - ';
                    echo session()->getFlashdata('delete');
                    echo '</h4></div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-primary">
                            <th width="50px">No</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Keahlian</th>
                            <th>Masa Kontrak</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($karyawan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nm_karyawan']; ?></td>
                                <td><?= $value['tipe_kar']; ?></td>
                                <td><?= $value['keahlian']; ?></td>
                                <td><?= $value['masa_kontrak']; ?></td>
                                <td><?= $value['jenis_kelamin']; ?></td>
                                <td class="text-center"> <img class="img-circle img-fluid" src="<?= base_url('foto/' .  $value['foto']) ?>" width="50px" height="50px"> </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_karyawan']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_karyawan']; ?>"><i class="fa fa-trash"></i></button>
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

<!-- modal add karyawan -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add karyawan</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('karyawan/add')
                ?>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input name="nm_karyawan" class="form-control" placeholder="Nama Karyawan" required>
                </div>
                <div class="form-group">
                    <label>Tipe karyawan</label>
                    <select name="tipe_kar" class="form-control">>
                        <option value="" holder disabled selected class="btn disabled">Pilih kategori</option>
                        <option value="Tetap" class="btn btn-primary">Tetap</option>
                        <option value="Kontrak" class="btn btn-primary">Kontrak</option>
                        <option value="Freelance" class="btn btn-primary">Freelance</option>
                    </select>
                    <!-- <input name="tipe_kar" class="form-control" placeholder="Masukkan Tipe" required> -->
                </div>
                <div class="form-group">
                    <label>Keahlian</label>
                    <input name="keahlian" class="form-control" placeholder="Keahlian" required>
                </div>
                <div class="form-group">
                    <label>Masa Kontrak</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="masa_kontrak" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">>
                        <option value="" holder disabled selected class="btn disabled">Jenis Kelamin</option>
                        <option value="L" class="btn btn-primary">Laki-Laki</option>
                        <option value="P" class="btn btn-primary">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal add -->

<!-- modal edit karyawan -->
<?php foreach ($karyawan as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_karyawan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Karyawan</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('karyawan/edit/' . $value['id_karyawan'])
                    ?>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input name="nm_karyawan" value="<?= $value['nm_karyawan']; ?>" class="form-control" placeholder="Nama Karyawan" required>
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
                        <label>Keahlian</label>
                        <input name="keahlian" value="<?= $value['keahlian']; ?>" class="form-control" placeholder="Keahlian" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">>
                            <option value="" holder disabled selected class="btn disabled">Jenis Kelamin</option>
                            <option value="L" <?= ($value['jenis_kelamin'] == "L" ? "selected" : ""); ?>>Laki-Laki</option>
                            <option value="P" <?= ($value['jenis_kelamin'] == "P" ? "selected" : ""); ?>>Perempuan</option>
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

<!-- modal delete hadir -->
<?php foreach ($karyawan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_karyawan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus karyawan</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['nm_karyawan']; ?>...?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('karyawan/delete_karyawan/' . $value['id_karyawan']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal delete -->
<?= $this->endSection() ?>