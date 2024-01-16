<?php 

include 'config/app.php';

// menerima id pel yang dipilih  pengguna
$id_pel = (int)$_GET['id_pel'];

    if (delete_pel($id_pel) > 0) {
        echo "<script> 
        alert ('Data Pelanggan Berhasil Dihapus');
        document.location.href = 'pelanggan.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data Pelanggan gagal Dihapus');
        document.location.href = 'pelanggan.php'
        </script>";
    }



?>