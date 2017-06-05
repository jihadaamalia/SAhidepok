<?php
require_once '../../../../include/config.php';
$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi,$data->nama);
$email=mysqli_real_escape_string($koneksi,$data->email);
$kategori=mysqli_real_escape_string($koneksi,$data->kategori);
$alamat=mysqli_real_escape_string($koneksi,$data->alamat);
$deskripsi=mysqli_real_escape_string($koneksi,$data->deskripsi);
$foto=mysqli_real_escape_string($koneksi,$data->foto);

$query= "UPDATE `komunitas` SET `nama_komunitas` = '$nama', `email_komunitas` = '$email', `kategori_komunitas` = '$kategori', `alamat_komunitas` = '$alamat', `deskripsi_komunitas` = '$deskripsi', `foto_komunitas` = '$' WHERE `id_komunitas`= '$id'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);

echo json_encode($data);
?>