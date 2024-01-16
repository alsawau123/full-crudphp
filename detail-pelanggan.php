<?php 
session_start();
//mmembatasi halaman sebelum login


$title = 'Detail Pelanggan';

// include 'config/app.php';
include 'layout/header.php';

//memngambil id mahasiswa dari url
$id_pel = (int)$_GET['id_pel'];

//menampilkan data mahasiswa
$pelanggan = select("SELECT * FROM pelanggan WHERE id_pel = $id_pel")[0];

?>

<div class="container">
    <h1>Data <?= $pelanggan['nama_pel']; ?></h1>
    <hr>

    <table class="table table-bordered table-striped mt-3">
        <tr>
            <td>Nama</td>
            <td>: <?= $pelanggan['nama_pel']; ?></td>
        </tr>
        <tr>
            <td>No KTP</td>
            <td>: <?= $pelanggan['no_ktp']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $pelanggan['jenis_kelamin']; ?></td>
        </tr>
        <tr>
            <td>telepon</td>
            <td>: <?= $pelanggan['telepon']; ?></td>
        </tr>
        <tr>
            <td>email</td>
            <td>: <?= $pelanggan['email']; ?></td>
        </tr>
        <tr>
            <td width="50%">foto</td>
            <td>
                <a href="assets/img/<?= $pelanggan['foto']; ?>">
                    <img src="assets/img/<?= $pelanggan['foto']; ?>" alt="foto" width="20%">
                </a>


            </td>
        </tr>

    </table>

    <a href="pelanggan.php" class="btn btn-secondary btn-sm" style="float: right;"> kembali</a>

    <a href="hapus-pelanggan.php?id_pel=<?= $pelanggan ["id_pel"];?>" class="btn btn-danger btn-sm"
        onclick="return confirm('Yakin Data Mahasiswa akan di hapus?');">Hapus</a>

    <table class="table table-bordered" class="table table-striped mt-3">


    </table>
</div>

<?php include 'layout/footer.php'; ?>