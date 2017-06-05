<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi, $data->nama);
$keterangan=mysqli_real_escape_string($koneksi, $data->keterangan);

$query= "UPDATE `fasilitas` SET `nama_fasilitas`='$nama', `deskripsi_fasilitas` = '$keterangan' WHERE `id_fasilitas`= '$id'";

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