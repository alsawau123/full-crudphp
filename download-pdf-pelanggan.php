<?php 

require __DIR__.'/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$data_pelanggan = select("SELECT * FROM pelanggan");

$content .= '<style type="text/css">
        .gambar {
            width: 50px;
        }
</style>';

$content .= '

<page>
<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No KTP</th>
        <th>Jenis kelamin</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>foto</th>
    </tr>';

     $no = 1; 
     foreach($data_pelanggan as $pelanggan) {
        $content .='
            <tr>
                <td> '.$no++.'</td>
                <td> '.$pelanggan['nama_pel'].' </td>
                <td> '.$pelanggan['no_ktp'].' </td>
                <td> '.$pelanggan['jenis_kelamin'].' </td>
                <td> '.$pelanggan['telepon'].' </td>
                <td> '.$pelanggan['email'].' </td>
                <td><img src="assets/img/'.$pelanggan['foto'].'"></td>
                
                
            </tr>
        ';
}
$content .='
    </table>
</page>';


$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output();