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



//kosongkan $_session user login
$_SESSION = [];

session_unset();
session_destroy();
header("Location: login.php");

?>