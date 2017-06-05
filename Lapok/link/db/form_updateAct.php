<?php
require_once '../../../../include/config.php';
 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama_instansi=mysqli_real_escape_string($koneksi,$data->nama_instansi);
$uname=mysqli_real_escape_string($koneksi,$data->uname);
$nama_partner=mysqli_real_escape_string($koneksi,$data->nama_partner);
$email=mysqli_real_escape_string($koneksi,$data->email);
$notlp=mysqli_real_escape_string($koneksi,$data->notlp);
$no_identitas=mysqli_real_escape_string($koneksi,$data->no_identitas);
$tglgabung=mysqli_real_escape_string($koneksi,$data->tglgabung);
$status=mysqli_real_escape_string($koneksi,$data->status);
$foto=mysqli_real_escape_string($koneksi,$data->foto);

$query= "UPDATE `partner` SET `nama_instansi_partner` = '$nama_instansi', `username_partner` = '$uname', `nama_partner` = '$nama_partner', `email_partner` = '$email', `no_telp_partner` = '$notlp', `identitas_partner` = '$no_identitas', `tanggal_gabung_partner` = '$tglgabung', `status_partner` = '$status', `foto_partner` = '$foto' WHERE `id_partner`= '$id'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);

echo json_encode($data);
?>