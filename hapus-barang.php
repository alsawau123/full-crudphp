<?php 

session_start();

//mmembatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong')
		document.location.href = 'login.php'
		</script>";
		exit;
}

include 'config/app.php';

// menerima id barang yang dipilih  pengguna
$id_barang = (int)$_GET['id_barang'];

    if (delete_barang($id_barang) > 0) {
        echo "<script> 
        alert ('Data Barang Berhasil Dihapus');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data Barang gagal Dihapus');
        document.location.href = 'index.php'
        </script>";
    }



?>