<?php 

$title = 'Tambah Pelanggan';

include 'layout/header.php';

// cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
    if (create_pelanggan($_POST) > 0) {
        echo "<script> 
        alert ('Data pelanggan Berhasil Ditambahkan');
        document.location.href = 'pelanggan.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data pelanggan gagal Ditambahkan');
        document.location.href = 'pelanggan.php'
        </script>";
    }
}

?>



<div class="container">
    <h1>Tambah Pelanggan</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3 col-4">
                <label for="nama_pel" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pel" name="nama_pel" placeholder="nama Pelanggan...">
            </div>
            <div class="mb-3 col-4">
                <label for="no_ktp" class="form-label">No ktp</label>
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="No ktp...">
            </div>


            <div class="mb-3 col-4 col-4">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">---Jenis Kelamin---</option>
                    <option value="Laki-Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon...">
        </div>


        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email...">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="foto..." onchange="previewImg()">

            <img src="" alt="" class="img-thumbnail img-preview" width="100px">
        </div>


        <button type="sumbit" name="tambah" class="btn btn-primary" style="float: left"> Tambah</button>

    </form>

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