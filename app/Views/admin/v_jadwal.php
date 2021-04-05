<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Menu</h3>

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
                            <th>Lowongan</th>
                            <th>Status</th>
                            <th class="text-center">Aktif/Noaktif</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['lowongan'] ?></td>
                                <td><?= ($value['status'] == 1) ? '<label class="label label-success">Active</label>' : '<label class="label label-danger">Non Active</label>' ?></td>
                                <td class="text-center"><?php if ($value['status'] == 1) { ?>
                                        <a href="<?= base_url('jadwal/statusNonAktif/' . $value['id_lowongan']) ?>" class="btn btn-danger btn-xs">Nonaktifkan</a>
                                    <?php } else { ?>
                                        <a href="<?= base_url('jadwal/statusAktif/' . $value['id_lowongan']) ?>" class="btn btn-success btn-xs">Aktifkan</a>
                                    <?php } ?>
                                </td>
                                <td>

                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_lowongan']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_lowongan']; ?>"><i class="fa fa-trash"></i></button>
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

<!-- modal add tipe -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Lowongan</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('jadwal/add')
                ?>
                <div class="form-group">
                    <label>Lowongan</label>
                    <input name="lowongan" class="form-control" placeholder="Masukkan Lowongan" required>
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

<!-- modal edit tipe -->
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_lowongan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Lowongan</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('jadwal/edit/' . $value['id_lowongan'])
                    ?>
                    <div class="form-group">
                        <label>Lowongan</label>
                        <input name="lowongan" value="<?= $value['lowongan']; ?>" class="form-control" placeholder="Lowongan" required>
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

<!-- modal delete tipe -->
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_lowongan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Lowongan</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['lowongan']; ?>...?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('jadwal/delete_lowongan/' . $value['id_lowongan']) ?>" type="submit" class="btn btn-danger">Hapus</a>
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