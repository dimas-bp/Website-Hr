<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $subtitle ?></h3>

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
                            <th>Nama Karyawan</th>
                            <th>Tipe</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Izin</th>
                            <th>Cuti</th>
                            <th>Alfa</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($hadir as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nm_kehadiran']; ?></td>
                                <td><?= $value['tipe_kar']; ?></td>
                                <td><?= $value['bulan']; ?></td>
                                <td><?= $value['tahun']; ?></td>
                                <td><?= $value['izin']; ?></td>
                                <td><?= $value['cuti']; ?></td>
                                <td><?= $value['alfa']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kehadiran']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_kehadiran']; ?>"><i class="fa fa-trash"></i></button>
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

<!-- modal add hadir -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Kehadiran</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('hadir/add')
                ?>
                <div class="form-group">
                    <label>Nama Karyawan</label>
                    <input name="nm_kehadiran" class="form-control" placeholder="Masukkan Nama" required>
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
                    <label>Bulan</label>
                    <select name="bulan" class="form-control">>
                        <option value="" holder disabled selected class="btn disabled">Pilih Bulan</option>
                        <option value="Januari" class="btn btn-primary">Januari</option>
                        <option value="Febuari" class="btn btn-primary">Febuari</option>
                        <option value="Maret" class="btn btn-primary">Maret</option>
                        <option value="April" class="btn btn-primary">April</option>
                        <option value="Mei" class="btn btn-primary">Mei</option>
                        <option value="Juni" class="btn btn-primary">Juni</option>
                        <option value="Juli" class="btn btn-primary">Juli</option>
                        <option value="Agustus" class="btn btn-primary">Agustus</option>
                        <option value="September" class="btn btn-primary">September</option>
                        <option value="Oktober" class="btn btn-primary">Oktober</option>
                        <option value="November" class="btn btn-primary">November</option>
                        <option value="Desember" class="btn btn-primary">Desember</option>
                    </select>
                    <!-- <input name="tipe_kar" class="form-control" placeholder="Masukkan Tipe" required> -->
                </div>
                <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Masukkan Tahun" min="2020" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                </div>
                <div class="form-group">
                    <label>Izin</label>
                    <input type="number" name="izin" class="form-control" placeholder="Masukkan Izin" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                </div>
                <div class="form-group">
                    <label>Cuti</label>
                    <input type="number" name="cuti" class="form-control" placeholder="Masukkan Cuti" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                </div>
                <div class="form-group">
                    <label>Alfa</label>
                    <input type="number" name="alfa" class="form-control" placeholder="Masukkan Alfa" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
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

<!-- modal edit hadir -->
<?php foreach ($hadir as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kehadiran'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kehadiran</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('hadir/edit/' . $value['id_kehadiran'])
                    ?>
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input name="nm_kehadiran" value="<?= $value['nm_kehadiran']; ?>" class="form-control" placeholder="Masukkan Tipe" required>
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
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">>
                            <option value="Januari" <?= ($value['bulan'] == "Januari" ? "selected" : ""); ?>>Januari</option>
                            <option value="Febuari" <?= ($value['bulan'] == "Febuari" ? "selected" : ""); ?>>Febuari</option>
                            <option value="Maret" <?= ($value['bulan'] == "Maret" ? "selected" : ""); ?>>Maret</option>
                            <option value="April" <?= ($value['bulan'] == "April" ? "selected" : ""); ?>>April</option>
                            <option value="Mei" <?= ($value['bulan'] == "Mei" ? "selected" : ""); ?>>Mei</option>
                            <option value="Juni" <?= ($value['bulan'] == "Juni" ? "selected" : ""); ?>>Juni</option>
                            <option value="July" <?= ($value['bulan'] == "July" ? "selected" : ""); ?>>July</option>
                            <option value="Agustus" <?= ($value['bulan'] == "Agustus" ? "selected" : ""); ?>>Agustus</option>
                            <option value="September" <?= ($value['bulan'] == "September" ? "selected" : ""); ?>>September</option>
                            <option value="Oktober" <?= ($value['bulan'] == "Oktober" ? "selected" : ""); ?>>Oktober</option>
                            <option value="November" <?= ($value['bulan'] == "November" ? "selected" : ""); ?>>November</option>
                            <option value="Desember" <?= ($value['bulan'] == "Desember" ? "selected" : ""); ?>>Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" value="<?= $value['tahun']; ?>" class="form-control" placeholder="Masukkan Tahun" min="2020" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                    </div>
                    <div class="form-group">
                        <label>Izin</label>
                        <input type="number" name="izin" value="<?= $value['izin']; ?>" class="form-control" placeholder="Masukkan Izin" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                    </div>
                    <div class="form-group">
                        <label>Cuti</label>
                        <input type="number" name="cuti" value="<?= $value['cuti']; ?>" class="form-control" placeholder="Masukkan Cuti" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                    </div>
                    <div class="form-group">
                        <label>Alfa</label>
                        <input type="number" name="alfa" value="<?= $value['alfa']; ?>" class="form-control" placeholder="Masukkan Alfa" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" required>
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
<?php foreach ($hadir as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kehadiran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Kehadiran</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['nm_kehadiran']; ?>...?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('hadir/delete_hadir/' . $value['id_kehadiran']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.modal delete -->
<!-- /.modal -->
<?= $this->endSection() ?>