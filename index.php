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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tabel Daftar Barang</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <a href="tambah-barang.php" class="btn btn-primary btn-sm mb-2"><i
                                            class="fas fa-plus"> Tambah</i></a>
                                    <table id="example2" class="table table-bordered table-hover">
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
                                                <td><?= date('d-m-Y H:i:s', strtotime($barang['tanggal_diambil'])) ?>
                                                </td>
                                                <td><?= date('d-m-Y H:i:s', strtotime($barang['tanggal_diterima'])) ?>
                                                </td>
                                                <td width="15%" class="text-center">
                                                    <a href="ubah-barang.php?id_barang=<?= $barang['id_barang'] ?>"
                                                        class="btn btn-success">Ubah</a>
                                                    <a href="hapus-barang.php?id_barang=<?= $barang['id_barang'] ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('yakin data barang di hapus?')">Hapus</a>
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
        </div>

</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<?php
include 'layout/footer.php';
?>