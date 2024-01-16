<?php 

session_start();

$title = 'Daftar Barang';
include 'layout/header.php';

//mmembatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong')
		document.location.href = 'login.php'
		</script>";
	exit;
}
//mmembatasi halaman sesuai user login
if ($_SESSION["level"] !=1 and $_SESSION["level"] !=2) {
	echo "<script>
		alert('selamat datang pelanggan')
		document.location.href = 'pelanggan.php'
		</script>";
	exit;
}




$data_barang = select("SELECT * FROM barang");

?>

<div class="container">
	<h1>Data Barang</h1>

	<a href="tambah-barang.php" class="btn btn-primary mb-1 "> Tambah</a>

	<table class="table table-bordered" class="table table-striped mt-3" id="table">
		<thead>

			<tr>
				<th> no</th>
				<th> Nama</th>
				<th> Sewa</th>
				<th> Harga</th>
				<th> Tanggal Diambil</th>
				<th> Tanggal Diterima</th>
				<th> Aksi</th>
			</tr>

		</thead>

		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($data_barang as $barang) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $barang['nama'] ?></td>
				<td><?= $barang['sewa'] ?></td>
				<td>RP. <?= number_format($barang['harga'], 0, ',', '.') ?></td>
				<td><?= date('d-m-Y H:i:s', strtotime($barang['tanggal_diambil'])) ?></td>
				<td><?= date('d-m-Y H:i:s', strtotime($barang['tanggal_diterima'])) ?></td>
				<td width="15%" class="text-center">
					<a href="ubah-barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-success">Ubah</a>
					<a href="hapus-barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-danger"
						onclick="return confirm('yakin data barang di hapus?')">Hapus</a>
				</td>
			</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>

<?php
include 'layout/footer.php';
?>