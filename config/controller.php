<?php 

//membuat dan membatasi halaman 
// if (!isset($_SESSION["login"])) {
// 	echo "<script>
// 		alert('login dulu dong')
// 		document.location.href = 'login.php'
// 		</script>";
// 		exit;
// }


//fungsi menampilkan data
function select ($query)
{
	//panggil koneksi database
	global $db;

	$result = mysqli_query($db, $query);
	$rows = [];

	while ($row = mysqli_fetch_assoc($result)) {
		$rows [] = $row;
	}

	return $rows;

}

//fungsi menambahkan data barang
function create_barang($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);  
    $sewa = $post['sewa'];
    $harga = $post['harga'];
    $tanggal_diambil = date('Y-m-d H:i:s', strtotime($post['tanggal_diambil']));
    $tanggal_diterima = date('Y-m-d H:i:s', strtotime($post['tanggal_diterima']));

    // Query tambah data
    $query = "INSERT INTO barang VALUES (null, '$nama', '$sewa', '$harga', '$tanggal_diambil', '$tanggal_diterima')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengubah data barang
function update_barang($post)
{
    global $db;

    $id_barang = $post['id_barang'];
    $nama = $post['nama'];
    $sewa = $post['sewa'];
    $harga = $post['harga'];
    $tanggal_diambil = date('Y-m-d H:i:s');
    $tanggal_diterima = date('Y-m-d H:i:s', strtotime($post['tanggal_diterima']));

    // Query ubah data
    $query = "UPDATE barang  SET nama = '$nama', sewa = '$sewa', harga = '$harga' WHERE id_barang = $id_barang ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
    
}

//fungsi menghapus data barang
function delete_pel($id_pel)
{
    global $db;

    //ambil foto seseuai data yang dipilih
    $foto = select("SELECT * FROM pelanggan WHERE id_pel = $id_pel")[0];
    unlink("assets/img/". $foto['foto']);


    //query hapus data pel
    $query = "DELETE FROM pelanggan WHERE id_pel = $id_pel";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


// fungsi menambah data mahasiswa
function create_pelanggan($post)
{
    global $db;

    $nama = strip_tags ($post['nama_pel']); 
    $no_ktp = $post['no_ktp'];
    $jenis_kelamin = $post['jenis_kelamin'];
    $telepon = $post['telepon'];
    $email = $post['email'];
    $foto = upload_file();

    //check upload file
    if (!$foto) {
        return false;
    }
  

    // Query tambah data
    $query = "INSERT INTO pelanggan VALUES (null, '$nama', '$no_ktp', '$jenis_kelamin', '$telepon', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi memngubah data mahasiswa
function update_pelanggan($post)
{
    global $db;
    $id_pel = strip_tags($post['id_pel']);
    $nama = strip_tags ($post['nama_pel']); 
    $no_ktp = ($post['no_ktp']);
    $jenis_kelamin = ($post['jenis_kelamin']);
    $telepon = ($post['telepon']);
    $email = ($post['email']);
    $fotoLama = ($post['fotoLama']);

    //check upload foto baru  atau tidak
    if ($_FILES['foto'] ['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }

    //
  

    // Query tambah data
    $query = "UPDATE pelanggan SET nama_pel = '$nama', no_ktp =  '$no_ktp', jenis_kelamin = '$jenis_kelamin', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_pel = $id_pel";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengupload file 
function upload_file()
{
    $namaFile = $_FILES['foto'] ['name'];
    $ukuranFile = $_FILES['foto'] ['size'];
    $error = $_FILES['foto'] ['error'];
    $tmpName = $_FILES['foto'] ['tmp_name'];


//check  file yang diupload
$extensifileValid = ['jpg', 'jpeg', 'png'];
$extensifile      = explode('.', $namaFile);
$extensifile      = strtolower(end($extensifile));

if (!in_array($extensifile, $extensifileValid)) {
    // pesan gagal

    //check format/extensi file
    echo "<script>
            alert ('format file tidak valid');
            document.location.href = 'tambah-pelanggan.php';
          </script>";
          die ();
}
    //check ukuran file 2mmb
if  ($ukuranFile > 2048000){
    //pesan gagal
    echo "<script>
            alert('Ukuran file Max 2MB');
            document.location.href = 'tambah-pelanggan.php';
          </script>";
          die();
    }

    //generet nama file  baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local
     move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
     return $namaFileBaru;
}

//fungsi delete barang
function delete_barang($id_barang)
{
    global $db;

    //query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);



}

//fungsi tambah akun
function create_akun($post)
{
    global $db;

    $nama = htmlspecialchars($post['nama']);  
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $password = htmlspecialchars($post['password']);
    $level = htmlspecialchars($post['level']);
    $password = htmlspecialchars($post['password']);
    //enkripsi password
    $password = password_hash($password,    PASSWORD_DEFAULT);


    // Query tambah data
    $query = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi ubah akun
function ubah_akun($post)
{
    global $db;

    $id_akun = htmlspecialchars($post['id_akun']);
    $nama = htmlspecialchars($post['nama']);  
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $password = htmlspecialchars($post['password']);
    $level = htmlspecialchars($post['level']);

    //enkripsi password
    $password = password_hash($password,    PASSWORD_DEFAULT);

    // Query tambah data
    $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', password = '$password', level = '$level' WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


//fungsi menghapus data barang
function delete_akun($id_akun)
{
    global $db;



    //query hapus data akun
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}