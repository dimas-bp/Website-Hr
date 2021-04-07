<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Lampiran</h3>

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
                            <th>Lampiran</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($lampiran as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['lampiran']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_lampiran']; ?>"><i class="fa fa-pencil-square-o"></i></button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_lampiran']; ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add Lampiran</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('lampiran/add')
                ?>
                <div class="form-group">
                    <label>Lampiran</label>
                    <input name="lampiran" class="form-control" placeholder="Lampiran" required>
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
<?php foreach ($lampiran as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_lampiran'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Lampiran</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('lampiran/edit/' . $value['id_lampiran'])
                    ?>
                    <div class="form-group">
                        <label>Lampiran</label>
                        <input name="lampiran" value="<?= $value['lampiran']; ?>" class="form-control" placeholder="Lampiran" required>
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
<?php foreach ($lampiran as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_lampiran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Lampiran</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['lampiran']; ?>...?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('lampiran/delete_lampiran/' . $value['id_lampiran']) ?>" type="submit" class="btn btn-danger">Hapus</a>
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