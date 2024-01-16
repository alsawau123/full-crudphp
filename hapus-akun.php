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

// menerima id akun yang dipilih  pengguna
$id_akun = (int)$_GET['id_akun'];

    if (delete_akun($id_akun) > 0) {
        echo "<script> 
        alert ('Data akun Berhasil Dihapus');
        document.location.href = 'crud-akun.php'
        </script>";
    } else {
        echo "<script> 
        alert ('Data akun gagal Dihapus');
        document.location.href = 'crud-akun.php'
        </script>";
    }



?>