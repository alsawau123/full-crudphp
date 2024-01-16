<?php 

$title = 'Tambah Barang';

include 'layout/header.php';

// cek apakah tombol ditekan
if (isset($_POST['tambah'])) {
    if (create_barang($_POST) > 0) {
        echo "<script> 
        alert ('Data Barang Berhasil Ditambahkan');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data Barang gagal Ditambahkan');
        document.location.href = 'index.php'
        </script>";
    }
}

?>



<div class="container">
    <h1>Tambah Barang</h1>
    <hr>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama barang...">
        </div>
        <div class="mb-3">
            <label for="sewa" class="form-label">Sewa Barang</label>
            <input type="text" class="form-control" id="sewa" name="sewa" placeholder="sewa barang...">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Barang</label>
            <input type="harga" class="form-control" id="harga" name="harga" placeholder="harga barang...">
        </div>
        <div class="mb-3">
            <label for="tanggal_diterima" class="form-label">Tanggal Diterima Barang</label>
            <input type="datetime-local" class="form-control" id="tanggal_diterima" name="tanggal_diterima"
                placeholder="tanggal_diterima barang...">
        </div>
        <div class="mb-3">
            <label for="tanggal_diambil" class="form-label">Tanggal Diambil</label>
            <input type="datetime-local" class="form-control" id="tanggal_diambil" name="tanggal_diambil"
                placeholder="tanggal_diambil barang...">
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float:left">Tambah</button>

    </form>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>