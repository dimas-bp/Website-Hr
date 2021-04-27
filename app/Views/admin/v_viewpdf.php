<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th width="140px">Nama Karyawan</th>
                <th width="30px">:</th>
                <td><?= $kontrak['nama_karyawan'] ?></td>
                <th width="140px">Tanggal Mulai</th>
                <th width="30px">:</th>
                <td><?= $kontrak['tgl_mulai'] ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <th>:</th>
                <td><?= $kontrak['status'] ?></td>
                <th>Tanggal Berakhir</th>
                <th>:</th>
                <td><?= $kontrak['tgl_berakhir'] ?></td>
            </tr>
            <tr>
                <th>Nama Project</th>
                <th>:</th>
                <td><?= $kontrak['nama_project'] ?></td>
                <th>Bidang</th>
                <th>:</th>
                <td><?= $kontrak['bidang'] ?></td>
            </tr>
        </table>
    </div>
    <div class="col-sm-12">
        <iframe src="<?= base_url('surat/' . $kontrak['surat']) ?>" height="500" width="100%" frameborder="0"></iframe>
    </div>
</div>
<?= $this->endSection() ?>