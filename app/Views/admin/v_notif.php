<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>


<?php
// Create database connection using config file
include("connection/DB.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tb_kontrak where DATE_SUB(tgl_berakhir,INTERVAL 16 DAY) = CURDATE()");
?>
<table width='80%' border=1>

    <tr>
        <th>Name</th>
        <th>status</th>
        <th>tanggal mulai</th>
        <th>tanggal berakhir</th>
    </tr>
    <?php
    while ($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $user_data['nama_karyawan'] . "</td>";
        echo "<td>" . $user_data['status'] . "</td>";
        echo "<td>" . $user_data['tgl_mulai'] . "</td>";
        echo "<td>" . $user_data['tgl_berakhir'] . "</td>";
    }
    ?>
</table>












<?= $this->endSection() ?>