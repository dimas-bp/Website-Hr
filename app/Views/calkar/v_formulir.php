<?= $this->extend('template/template-frontend') ?>

<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="box box-outline box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Formulir Pendaftaran</b></h3>
        </div>
        <div class="box-body">
            <?php
            session()->getFlashdata('errors');
            if (session()->get('pesan')) {
                echo '<div class="alert alert-success">';
                echo session()->get('pesan');
                echo '</div>';
            } ?>
            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php } ?>


            <div class="col-sm-4">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-image"></i>
                        <h3 class="box-title"><b>Foto</b></h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#foto"> <i class="fa fa-pencil text-primary"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <?php if ($calkar['foto'] == null) { ?>
                                <img src="<?= base_url('foto/blank.png') ?>" width="250px" height="284px" alt="Foto">
                            <?php } else { ?>
                                <img src="<?= base_url('foto/' . $calkar['foto']) ?>" width="250px" height="284px" alt="Foto">
                            <?php } ?>
                            <br>
                            <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-th-list"></i>
                        <h3 class="box-title"><b>Identitas</b></h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editidentitas"> <i class="fa fa-pencil text-primary"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fa fa-table margin-r-5"></i> Nama Lengkap</strong>
                                <?= ($calkar['nama_lengkap'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_lengkap'] . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Tempat Lahir</strong>
                                <?= ($calkar['tempat_lahir'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['tempat_lahir'] . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-calendar margin-r-5"></i>Tanggal Lahir</strong>
                                <?= ($calkar['tgl_lahir'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['tgl_lahir'] . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-table margin-r-5"></i> Email</strong>
                                <?= ($calkar['email'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['email'] . '</p>' ?>
                            </div>
                            <div class="col-sm-6">
                                <strong><i class="fa fa-table margin-r-5"></i>Nama Panggilan</strong>
                                <?= ($calkar['nama_panggilan'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_panggilan'] . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-male margin-r-5"></i> Jenis Kelamin </strong>
                                <?php if ($calkar['jk'] == 'P') {
                                    $jk = 'Perempuan';
                                } elseif ($calkar['jk'] == 'L') {
                                    $jk = 'Laki-Laki';
                                } ?>
                                <?= ($calkar['jk'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $jk . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-table margin-r-5"></i> Agama</strong>
                                <?= ($calkar['agama'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['agama'] . '</p>' ?>
                                <hr>
                                <strong><i class="fa fa-table margin-r-5"></i> No Telpon</strong>
                                <?= ($calkar['no_telpon'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['no_telpon'] . '</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-file"></i>
                        <h3 class="box-title"><b>Upload CV</b></h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#berkas"> <i class="fa fa-plus text-primary"></i> Add File</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Jenis Berkas</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th width="50px">Action</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($berkas as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['lampiran'] ?></td>
                                    <td><?= $value['ket'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('berkas/' . $value['berkas']) ?>"><i class="fa fa-file-pdf-o fa-2x text-danger"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('calkar/deleteBerkas/' . $value['id_berkas']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <a href="" class="btn btn-success btn-block"><i class="fa fa-check"></i> Apply Pendaftaran</a>
            </div>
        </div>
    </div>
</div>

<!-- modal add identitas -->
<div class="modal fade" id="editidentitas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formulir</h4>
            </div>
            <?php
            echo form_open('calkar/updateIdentitas/' . $calkar['id_calkar'])
            ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama_lengkap" value="<?= $calkar['nama_lengkap'] ?>" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input name="tempat_lahir" value="<?= $calkar['tempat_lahir'] ?>" class="form-control" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tgl_lahir" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" value="<?= $calkar['email'] ?>" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Panggilan</label>
                            <input name="nama_panggilan" value="<?= $calkar['nama_panggilan'] ?>" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="L" <?= $calkar['jk'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                <option value="P" <?= $calkar['jk'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control">>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam" <?= ($calkar['agama'] == "Islam" ? "selected" : ""); ?>>Islam</option>
                                <option value="Kristen" <?= ($calkar['agama'] == "Kristen" ? "selected" : ""); ?>>Kristen</option>
                                <option value="Buddha" <?= ($calkar['agama'] == "Buddha" ? "selected" : ""); ?>>Buddha</option>
                                <option value="Katholik" <?= ($calkar['agama'] == "Katholik" ? "selected" : ""); ?>>Katholik</option>
                                <option value="Hindu" <?= ($calkar['agama'] == "Hindu" ? "selected" : ""); ?>>Hindu</option>
                            </select>
                            <!-- <input name="tipe_kar" class="form-control" placeholder="Masukkan Tipe" required> -->
                        </div>
                        <div class="form-group">
                            <label>No Telpon</label>
                            <input name="no_telpon" value="<?= $calkar['no_telpon'] ?>" class="form-control" placeholder="Telpon" required>
                        </div>
                    </div>
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

<!-- modal add foto -->
<div class="modal fade" id="foto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Foto</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('calkar/updateFoto/' . $calkar['id_calkar'])
                ?>
                <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" id="preview_gambar" class="form-control" name="foto" accept="image/*">
                </div>
                <p class="text-danger">* (Max 2MB)</p>
                <div class="form-group">
                    <label>Preview Foto</label> <br>
                    <?php if ($calkar['foto'] == null) { ?>
                        <img src="<?= base_url('foto/blank.png') ?>" width="150px" height="170px" id="gambar_load">
                    <?php } else { ?>
                        <img src="<?= base_url('foto/' . $calkar['foto']) ?>" width="150px" height="170px" id="gambar_load">
                    <?php } ?>
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

<!-- modal add Berkas -->
<div class="modal fade" id="berkas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Berkas</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open_multipart('calkar/addBerkas/' . $calkar['id_calkar'])
                ?>
                <div class="form-group">
                    <label>Lampiran</label>
                    <select name="id_lampiran" class="form-control">
                        <option value="">-- Pilih Lampiran --</option>
                        <?php foreach ($lampiran as $key => $value) { ?>
                            <option value="<?= $value['id_lampiran'] ?>"><?= $value['lampiran'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="ket" placeholder="Keterangan" required>
                </div>
                <div class="form-group">
                    <label>Berkas (* Format PDF)</label>
                    <input type="file" class="form-control" name="berkas" accept=".pdf" required>
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
<?= $this->endSection() ?>