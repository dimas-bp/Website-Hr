<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kehadiran</h3>

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
                            <th>Izin</th>
                            <th>Cuti</th>
                            <th>Alfa</th>
                            <th>Bulan</th>
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
                                <td><?= $value['izin']; ?></td>
                                <td><?= $value['cuti']; ?></td>
                                <td><?= $value['alfa']; ?></td>
                                <td><?= $value['bulan']; ?></td>
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
                    <label>tipe_kar</label>
                    <input name="tipe_kar" class="form-control" placeholder="Masukkan Tipe" required>
                </div>
                <div class="form-group">
                    <label>Izin</label>
                    <input name="izin" class="form-control" placeholder="Masukkan Izin" required>
                </div>
                <div class="form-group">
                    <label>Cuti</label>
                    <input name="cuti" class="form-control" placeholder="Masukkan Cuti" required>
                </div>
                <div class="form-group">
                    <label>Alfa</label>
                    <input name="alfa" class="form-control" placeholder="Masukkan Alfa" required>
                </div>
                <div class="form-group">
                    <label>Bulan</label>
                    <select name="bulan" class="form-control">
                        <option value="">-- Bulan --</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>;
                        <?php } ?>
                    </select>
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
                        <label>Tipe</label>
                        <input name="tipe_kar" value="<?= $value['tipe_kar']; ?>" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Izin</label>
                        <input name="izin" value="<?= $value['izin']; ?>" class="form-control" placeholder="Masukkan Izin" required>
                    </div>
                    <div class="form-group">
                        <label>Cuti</label>
                        <input name="cuti" value="<?= $value['cuti']; ?>" class="form-control" placeholder="Masukkan Cuti" required>
                    </div>
                    <div class="form-group">
                        <label>Alfa</label>
                        <input name="alfa" value="<?= $value['alfa']; ?>" class="form-control" placeholder="Masukkan Alfa" required>
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