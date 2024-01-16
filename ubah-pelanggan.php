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

$title = 'ubah Pelanggan';

include 'layout/header.php';

// cek apakah tombol ditekan
if (isset($_POST['ubah'])) {
    if (update_pelanggan($_POST) > 0) {
        echo "<script> 
        alert ('Data pelanggan Berhasil Diubah');
        document.location.href = 'pelanggan.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data pelanggan gagal Diubah');
        document.location.href = 'pelanggan.php'
        </script>";
    }
}

//ambil id pelanggan dari url
$id_pel = (int)$_GET['id_pel'];

//query ambil data pelanggan
$pelanggan = select("SELECT * FROM pelanggan WHERE id_pel = $id_pel") [0];

?>



<div class="container">
    <h1>ubah Pelanggan</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pel" value="<?= $pelanggan['id_pel']; ?>">
        <input type="hidden" name="fotoLama" value="<?= $pelanggan['foto']; ?>">


        <div class="row">
            <div class="mb-3 col-4">
                <label for="nama_pel" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pel" name="nama_pel" placeholder="nama Pelanggan..."
                    required value="<?= $pelanggan['nama_pel']; ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="no_ktp" class="form-label">No ktp</label>
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="No ktp..." required
                    value="<?= $pelanggan['no_ktp']; ?>">
            </div>
        </div>


        <div class="mb-3 col-4 col-4">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <?php $jkl = $pelanggan ['jenis_kelamin']; ?>
                <option value="Laki-Laki" <?= $jkl == 'Laki-Laki' ? 'selected' : null ?>>Laki Laki</option>
                <option value="Perempuan" <?= $jkl == 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required
                value="<?= $pelanggan['telepon']; ?>">

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email..." required
                    value="<?= $pelanggan['email']; ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="foto..."
                    onchange="previewImg()">

                <img src="assets/img/<?= $pelanggan['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2"
                    width="100px">
            </div>
        </div>

        <button type="sumbit" name="ubah" class="btn btn-primary" style="float: right;"> ubah</button>
    </form>
</div>

<!-- preview img -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }
</script>


<?php include 'layout/footer.php'; ?>