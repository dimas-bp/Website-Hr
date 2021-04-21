<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="box box-outline box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Formulir Pendaftaran</b></h3>
            <div class="box-tools">
                <a href="<?= base_url('daftar') ?>" class="btn btn-sm"> <i class="fa  fa-mail-reply text-primary"></i> Back</a>
            </div>
        </div>
        <div class="box-body">
            <div class="col-sm-4">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-image"></i>
                        <h3 class="box-title"><b>Foto</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <?php if ($calkar['foto'] == null) { ?>
                                <img src="<?= base_url('foto/blank.png') ?>" width="250px" height="284px" alt="Foto">
                            <?php } else { ?>
                                <img src="<?= base_url('foto/' . $calkar['foto']) ?>" width="250px" height="284px" alt="Foto">
                            <?php } ?>
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
                            <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#editidentitas"> <i class="fa fa-pencil text-primary"></i></button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fa fa-table margin-r-5"></i> Nama Lengkap</strong>
                                <?= ($calkar['nama_lengkap'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_lengkap'] . '</p>' ?>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Tempat Lahir</strong>
                                <?= ($calkar['tempat_lahir'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['tempat_lahir'] . '</p>' ?>
                                <strong><i class="fa fa-calendar margin-r-5"></i>Tanggal Lahir</strong>
                                <?= ($calkar['tgl_lahir'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['tgl_lahir'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Email</strong>
                                <?= ($calkar['email'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['email'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Agama</strong>
                                <?= ($calkar['agama'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['agama'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Devisi yang di lamar</strong>
                                <?= ($calkar['email'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['email'] . '</p>' ?>
                            </div>
                            <div class="col-sm-6">
                                <strong><i class="fa fa-table margin-r-5"></i>Pendidikan</strong>
                                <?= ($calkar['pendidikan'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['pendidikan'] . '</p>' ?>
                                <strong><i class="fa fa-male margin-r-5"></i> Jenis Kelamin </strong>
                                <?php if ($calkar['jk'] == 'P') {
                                    $jk = 'Perempuan';
                                } elseif ($calkar['jk'] == 'L') {
                                    $jk = 'Laki-Laki';
                                } ?>
                                <?= ($calkar['jk'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $jk . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Agama</strong>
                                <?= ($calkar['agama'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['agama'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> No Telpon</strong>
                                <?= ($calkar['no_telpon'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['no_telpon'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Jabatan</strong>
                                <?= ($calkar['no_telpon'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['no_telpon'] . '</p>' ?>
                                <strong><i class="fa fa-table margin-r-5"></i> Keahlian Bidang</strong>
                                <?= ($calkar['no_telpon'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['no_telpon'] . '</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-home"></i>
                        <h3 class="box-title"><b>Alamat Lengkap</b></h3>
                        <div class="box-tools">
                            <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#alamat"> <i class="fa fa-pencil text-primary"></i></button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Provinsi</strong>
                                <?= ($calkar['nama_provinsi'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_provinsi'] . '</p>' ?>
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Kabupaten/Kota</strong>
                                <?= ($calkar['nama_kabupaten'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_kabupaten'] . '</p>' ?>
                            </div>
                            <div class="col-sm-6">
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Kecamatan</strong>
                                <?= ($calkar['nama_kecamatan'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_kecamatan'] . '</p>' ?>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Alamat</strong>
                                <?= ($calkar['alamat'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['alamat'] . '</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-outline box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-home"></i>
                        <h3 class="box-title"><b>Pekerjaan</b></h3>
                        <div class="box-tools">
                            <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#dataPekerjaan"> <i class="fa fa-pencil text-primary"></i></button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><i class="fa fa-map-marker margin-r-5"></i> Spesialisasi</strong>
                                <?= ($calkar['nama_spesialisasi'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_spesialisasi'] . '</p>' ?>
                            </div>
                            <div class="col-sm-6">
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Bidang Pekerjaan</strong>
                                <?= ($calkar['nama_bidang'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['nama_bidang'] . '</p>' ?>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Jabatan</strong>
                                <?= ($calkar['jabatan'] == null) ? '<p class="text-danger">Wajib Diisi !!</p>' : '<p>' . $calkar['jabatan'] . '</p>' ?>
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
                            <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#berkas"> <i class="fa fa-plus text-primary"></i> Add File</button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Jenis Berkas</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                    <th width="50px">Action</th>
                                <?php } ?>
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
                                    <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                                        <td class="text-center">
                                            <a href="<?= base_url('calkar/deleteBerkas/' . $value['id_berkas']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>

            <?php if ($calkar['stat_pendaftaran'] == 0) { ?>
                <div class="col-sm-12">
                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#apply"><i class="fa fa-check"></i> Apply Pendaftaran</button>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>