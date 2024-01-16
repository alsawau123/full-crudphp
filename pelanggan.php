<?php 

session_start();
//membuat dan membatasi halaman 
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong');
		document.location.href = 'login.php';
		</script>";
		exit;
}

//mmembatasi halaman sesuai user login
if ($_SESSION["level"] !=1 and $_SESSION["level"] !=3) {
	echo "<script>
		alert('perhatian anda bukan pelanggan jadi tidak bisa masuk')
		document.location.href = 'crud-akun.php'
		</script>";
	exit;
}
$title = 'Daftar Pelanggan';

include 'layout/header.php';

//menampilkan data mahasiswa
$data_pelanggan = select("SELECT * FROM pelanggan ORDER BY id_pel DESC");

?>

<!-- Content Wrapper. Contains page content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Daftar Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="container">
                        <a href="download-excel-pelanggan.php" class="btn btn-success mb-1 "><i
                                class="fas fa-file-pdf"></i>
                            Download
                            Excel</a>
                        <a href="download-pdf-pelanggan.php" class="btn btn-danger mb-1 "><i
                                class="fas fa-file-pdf"></i>
                            Download PDF</a>
                        <a href="tambah-pelanggan.php" class="btn btn-primary mb-1 "> Tambah Pelanggan</a>
                    </div>

                    <table class="table table-bordered" class="table table-striped mt-3" id="table">
                        <thead>

                            <tr>
                                <th> no</th>
                                <th> Nama</th>
                                <th> No Ktp</th>
                                <th> Jenis Kelamin</th>
                                <th> Telepon</th>
                                <th> email</th>
                                <th> Aksi</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($data_pelanggan as $pelanggan) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pelanggan['nama_pel']; ?></td>
                                <td><?= $pelanggan['no_ktp']; ?></td>
                                <td><?= $pelanggan['jenis_kelamin']; ?></td>
                                <td><?= $pelanggan['telepon'] ?></td>
                                <td><?= $pelanggan['email']; ?></td>
                                <td>
                                    <a href="detail-pelanggan.php?id_pel=<?= $pelanggan ["id_pel"];?>"
                                        class="btn btn-secondary btn-sm">Detail</a>
                                    <a href="ubah-pelanggan.php?id_pel=<?= $pelanggan ["id_pel"];?>"
                                        class="btn btn-success btn-sm">Ubah</a>
                                    <a href="hapus-pelanggan.php?id_pel=<?= $pelanggan ["id_pel"];?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin Data Mahasiswa akan di hapus?');">Hapus</a>


                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'layout/footer.php'; ?>