<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi,$data->nama);
$alamat=mysqli_real_escape_string($koneksi,$data->alamat);
$kecamatan=mysqli_real_escape_string($koneksi,$data->kecamatan);
$koordinat_la=mysqli_real_escape_string($koneksi,$data->koordinat_latitude_rs);
$koordinat_long=mysqli_real_escape_string($koneksi,$data->koordinat_longitude_rs);
$no_telp=mysqli_real_escape_string($koneksi,$data->no_telp);
$website=mysqli_real_escape_string($koneksi,$data->website);
$email=mysqli_real_escape_string($koneksi,$data->email);
$keterangan=mysqli_real_escape_string($koneksi,$data->keterangan);

$query= "UPDATE `rs` SET `nama_rs`='$nama', `alamat_rs` = '$alamat', `kecamatan_rs` = '$kecamatan', `koordinat_latitude_rs` = '$koordinat_la', `koordinat_longitude_rs` = '$koordinat_long', `no_telp_rs`='$no_telp', `website_rs`='$website', `email_rs`='$email', `deskripsi_rs` = '$keterangan' WHERE `id_rs`= '$id'";

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