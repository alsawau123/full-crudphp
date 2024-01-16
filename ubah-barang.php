<?php 

session_start();

//mmembatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong');
		document.location.href = 'login.php';
		</script>";
	exit;
}

$title = 'Ubah Barang';
include 'layout/header.php';

//mengambil id barang dari id url
$id_barang = (int)$_GET['id_barang'];


$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// cek apakah tombol ubah ditekan
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script> 
        alert ('Data Barang Berhasil Diubah');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data Barang gagal Diubah');
        document.location.href = 'index.php'
        </script>";
    }
}

$data_barang = select("SELECT * FROM barang");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Data Barang</a></li>
                        <li class="breadcrumb-item active">Ubah Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form action="" method="post">

                <input type="hidden" name="id_barang" value="<?=$barang['id_barang'];?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama barang..."
                        value="<?= $barang['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="sewa" class="form-label">Sewa Barang</label>
                    <input type="text" class="form-control" id="sewa" name="sewa" placeholder="sewa barang..."
                        value="<?= $barang['sewa']; ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Barang</label>
                    <input type="harga" class="form-control" id="harga" name="harga" placeholder="harga barang..."
                        value="<?= $barang['harga']; ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal_diambil" class="form-label">Tanggal Diambil</label>
                    <input type="datetime-local" class="form-control" id="tanggal_diambil" name="tanggal_diambil"
                        placeholder="tanggal_diambil barang..." value="<?= $barang['tanggal_diambil']; ?>">
                </div>
                <div class="mb-3">
                    <label for="tanggal_diterima" class="form-label">Tanggal Diterima Barang</label>
                    <input type="datetime-local" class="form-control" id="tanggal_diterima" name="tanggal_diterima"
                        placeholder="tanggal_diterima barang..." value="<?= $barang['tanggal_diterima']; ?>">
                </div>

                <button type="submit" name="ubah" class="btn btn-primary" style="float:right">Ubah</button>

            </form>

        </div>
    </section>
    <!-- /.content -->
</div>

<?php
include 'layout/footer.php';
?>