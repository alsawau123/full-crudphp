<?php 
//render halaman jadi json
header('Content-Type: application/json');

require '../config/app.php';

$query = select("SELECT * FROM barang");

echo json_encode($query);