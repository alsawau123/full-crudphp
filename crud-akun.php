<?php 

session_start();

$title = 'Daftar akun';

include 'layout/header.php';

//membuat dan membatasi halaman 
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong');
		document.location.href = 'login.php';
		</script>";
		exit;
}


//tampil seluruh data
$data_akun = select("SELECT * FROM akun");

//tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");


// funsgi tambah jika tombol di tekan jalankan kode script berikut
if(isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script> 
        alert ('Data akun Berhasil Ditambahkan');
        document.location.href = 'crud-akun.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data akun gagal Ditambahkan');
        document.location.href = 'crud-akun.php'
        </script>";
    }
    #code
}

// funsgi ubah jika tombol di tekan jalankan kode script berikut
if(isset($_POST['ubah'])) {
    if (ubah_akun($_POST) > 0) {
        echo "<script> 
        alert ('Data akun Berhasil DiUbahkan');
        document.location.href = 'crud-akun.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data akun gagal DiUbahkan');
        document.location.href = 'crud-akun.php'
        </script>";
    }
    #code
}

?>


<div class="container">
    <h1>Data Akun</h1>

    <?php if ($_SESSION['level'] == 1): ?>
    <a href="tambah-barang.php" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah</a>
    <?php endif; ?>

    <table class="table table-bordered" class="table table-striped mt-3" id="table">
        <thead>

            <tr>
                <th> no</th>
                <th> Nama</th>
                <th> username</th>
                <th> email</th>
                <th> Password</th>
                <th> level</th>
                <th> Aksi</th>
            </tr>

        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php if ($_SESSION['level'] == 1) : ?>
            <?php foreach ($data_akun as $akun):?>
            <tr>
                <td> <?= $no++; ?></td>
                <td> <?= $akun['nama'];?></td>
                <td> <?= $akun['username'];?></td>
                <td> <?= $akun['email'];?></td>
                <td> password terenkripsi</td>
                <td> <?= $akun['level'];?></td>
                <td class="text-center">

                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal"
                        data-bs-target="#modalHapus<?= $akun['id_akun']; ?>"> hapus </button>
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                        data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"> Ubah </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <!-- tampil data berdasarkan user login -->
            <?php foreach ($data_bylogin as $akun):?>
            <tr>
                <td> <?= $no++; ?></td>
                <td> <?= $akun['nama'];?></td>
                <td> <?= $akun['username'];?></td>
                <td> <?= $akun['email'];?></td>
                <td> password terenkripsi</td>
                <td> <?= $akun['level'];?></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                        data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"> Ubah </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value=""> -- pilih level --</option>
                            <option value="1"> Admin </option>
                            <option value="2"> Operator barang</option>
                            <option value="3"> pelanggan</option>

                        </select>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<?php foreach ($data_akun as $akun): ?>
<div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"
                            value="<?= $akun['username']; ?>" required>
                    </div>

                    <div class=" mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>"
                            required>
                    </div>

                    <div class=" mb-3">
                        <label for="password">Password <small>(masukkan password baru atau lama)</small></label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <?php if ($_SESSION['level'] == 1) : ?>
                    <div class="mb-3">
                        <label for="level">level</label>
                        <select name="level" id="level" class="form-control" required>
                            <?= $akun['level']; ?>
                            <option value="1" <?= $akun == '1' ?  'selected' : null  ?>> Admin </option>
                            <option value="2" <?= $akun == '2' ? 'selected' : null  ?>> Operator barang </option>
                            <option value="3" <?= $akun == '3' ? 'selected' : null  ?>> Operator pelanggan</option>
                        </select>
                    </div>
                    <?php else: ?>
                    <input type="hidden" name="level" value=" <?= $akun['level']; ?>">
                    <?php endif; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
                <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>

<!-- modal hapus -->
<?php foreach ($data_akun as $akun) : ?>
<div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Yakin Ingin Menghapus Data Akun: <?= $akun['nama']; ?> .?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <a href="hapus-akun.php?id_akun=<?= $akun['id_akun'];?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php 
include 'layout/footer.php';
?>