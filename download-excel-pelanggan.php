<?php

session_start();

//membuat dan membatasi halaman 
if (!isset($_SESSION["login"])) {
	echo "<script>
		alert('login dulu dong');
		document.location.href = 'login.php';
		</script>";
		exit;
}

//mmembatasi halaman sesuai user login
if ($_SESSION["level"] !=1 and $_SESSION["level"] !=3) {
	echo "<script>
		alert('perhatian anda bukan pelanggan jadi tidak bisa masuk')
		document.location.href = 'crud-akun.php'
		</script>";
	exit;
}

require 'config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'no');
$sheet->setCellValue('B2', 'nama_pel');
$sheet->setCellValue('C2', 'no_ktpp');
$sheet->setCellValue('D2', 'jenis_kelamin');
$sheet->setCellValue('E2', 'telepon');
$sheet->setCellValue('F2', 'email');
$sheet->setCellValue('G2', 'foto');

$data_pelanggan = select("SELECT * FROM pelanggan");

$no = 1;
$start = 3;

foreach ($data_pelanggan as $pelanggan) {
    $sheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $sheet->setCellValue('B' . $start, $pelanggan['nama_pel'])->getColumnDimension('B')->setAutoSize(true);
    $sheet->setCellValue('C' . $start, $pelanggan['no_ktp'])->getColumnDimension('C')->setAutoSize(true);
    $sheet->setCellValue('D' . $start, $pelanggan['jenis_kelamin'])->getColumnDimension('D')->setAutoSize(true);
    $sheet->setCellValue('E' . $start, $pelanggan['telepon'])->getColumnDimension('E')->setAutoSize(true);
    $sheet->setCellValue('F' . $start, $pelanggan['email'])->getColumnDimension('F')->setAutoSize(true);
    $sheet->setCellValue('G' . $start, 'http://localhost/lat-crud/assets/img/'. $pelanggan['foto'])->getColumnDimension('G')->setAutoSize(true);

    $start++;

}

//table border
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            
        ],
    ],
];

$border = $start - 1;

$sheet->getStyle('A2:G'.$border)->applyFromArray($styleArray);



$writer = new Xlsx($spreadsheet);
$writer->save('Laporan Data Pelanggan.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Laporan Data Pelanggan.xlsx"');
readfile('Laporan Data Pelanggan.xlsx');
unlink('Laporan Data Pelanggan.xlsx');
exit;