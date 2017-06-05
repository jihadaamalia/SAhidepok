<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi, $data->nama);
$alamat=mysqli_real_escape_string($koneksi, $data->alamat);
$no_telp=mysqli_real_escape_string($koneksi, $data->no_telp);
$spesialisasi=mysqli_real_escape_string($koneksi, $data->spesialisasi);
$email=mysqli_real_escape_string($koneksi, $data->email);
$keterangan=mysqli_real_escape_string($koneksi, $data->keterangan);

$query= "UPDATE `dokter` SET `nama_dokter`='$nama', `alamat_dokter` = '$alamat', `no_telp_dokter`='$no_telp', `email_dokter`='$email', `deskripsi_dokter` = '$keterangan' WHERE `id_dokter`= '$id'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);

// if (!empty($telpNew)){
// $query2= "INSERT INTO `telp_tempat_sehat`(`no_telp_tempat_sehat`, `id_tempat_sehat`) VALUES ('$telpNew', '$id')";
// $input2 = mysqli_query($koneksi, $query2);
// }

echo json_encode($data);
?>