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
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Status</th>
                            <th>Tgl mulai</th>
                            <th>Tgl berakhir</th>
                            <th>Nama Project</th>
                            <th>Bidang</th>
                            <th>Surat</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($karyawan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_karyawan']; ?></td>
                                <td><?= $value['status']; ?></td>
                                <td><?= $value['tgl_mulai']; ?></td>
                                <td><?= $value['tgl_berakhir']; ?></td>
                                <td><?= $value['nama_project']; ?></td>
                                <td><?= $value['bidang']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('karyawan/' . $value['surat']) ?>"><i class="fa fa-file-pdf-o fa-2x text-danger"></i></a>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kontrak']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kontrak']; ?>"><i class="fa fa-trash"></i></button>
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
                    <input name="nama_karyawan" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">>
                        <option value="" holder disabled selected class="btn disabled">Pilih kategori</option>
                        <option value="Kontrak" class="btn btn-primary">Kontrak</option>
                        <option value="Freelance" class="btn btn-primary">Freelance</option>
                    </select>
                    <!-- <input name="tipe_kar" class="form-control" placeholder="Masukkan Tipe" required> -->
                </div>
                <div class="form-group">
                    <label>Tgl Mulai</label>
                    <input name="tgl_mulai" type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tgl Berakhir</label>
                    <input name="tgl_berakhir" type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Project</label>
                    <input name="nama_project" class="form-control" placeholder="Masukan Project" required>
                </div>
                <div class="form-group">
                    <label>Bidang</label>
                    <input name="bidang" class="form-control" placeholder="Masukkan Bidang" required>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" name="surat" accept=".pdf">
                    <label>Berkas (* Format PDF)</label>
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
    <div class="modal fade" id="edit<?= $value['id_kontrak'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Karyawan</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open_multipart('karyawan/edit/' . $value['id_kontrak'])
                    ?>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input name="nama_karyawan" value="<?= $value['nama_karyawan']; ?>" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">>
                            <option value="Kontrak" <?= ($value['status'] == "Kontrak" ? "selected" : ""); ?>>Kontrak</option>
                            <option value="Freelance" <?= ($value['status'] == "Freelance" ? "selected" : ""); ?>>Freelance</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tgl Mulai</label>
                        <input name="tgl_mulai" type="date" value="<?= $value['tgl_mulai']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tgl Berakhir</label>
                        <input name="tgl_berakhir" type="date" value="<?= $value['tgl_berakhir']; ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Project</label>
                        <input name="nama_project" value="<?= $value['nama_project']; ?>" class="form-control" placeholder="Masukkan Project" required>
                    </div>
                    <div class="form-group">
                        <label>Bidang</label>
                        <input name="bidang" value="<?= $value['bidang']; ?>" class="form-control" placeholder="Masukkan Bidang" required>
                    </div>
                    <div class="form-group">
                        <label>Surat</label>
                        <input name="surat" type="file" value="<?= $value['surat']; ?>" class="form-control" accept=".pdf">
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
    <div class="modal fade" id="delete<?= $value['id_kontrak']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus karyawan</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['nama_karyawan']; ?>...?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('karyawan/delete_karyawan/' . $value['id_kontrak']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal delete -->
<?= $this->endSection() ?>