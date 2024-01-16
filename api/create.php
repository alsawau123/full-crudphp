<?php 
//render halaman jadi json
header('Content-Type: application/json');

require '../config/app.php';

//menerima input

$nama = $_POST['nama'];
$sewa = $_POST['sewa'];
$harga = $_POST['harga'];
$tanggal_diambil = $_POST['tanggal_diambil'];
$tanggal_diterima = $_POST['tanggal_diterima'];

//query tambah data
$query = "INSERT INTO barang VALUES (null, '$nama', '$sewa', '$harga', '$tanggal_diambil', '$tanggal_diterima')";
mysqli_query($db, $query);

//check status data
if ($query) {
    echo json_encode(['pesan' => 'Data Barang Berhasil Ditambahkan']);
} else {
    echo json_encode(['pesan' => 'Data Barang Gagal Ditambahkan']);
}