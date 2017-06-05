<?php
require 'connect.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($connect, $data->id);
$nama=mysqli_real_escape_string($connect,$data->nama);
$namaOwner=mysqli_real_escape_string($connect,$data->namaOwner);
$alamat=mysqli_real_escape_string($connect,$data->alamat);
$kecamatan=mysqli_real_escape_string($connect,$data->kecamatan);
$koordinat=mysqli_real_escape_string($connect,$data->koordinat);
$deskripsi=mysqli_real_escape_string($connect,$data->deskripsi);
$telpNew=mysqli_real_escape_string($connect,$data->telpNew);

$query= "UPDATE ukm SET nama_ukm = '$nama', nama_owner_ukm = '$namaOwner', alamat_ukm = '$alamat', kecamatan = '$kecamatan', koordinat_ukm = '$koordinat', deskripsi_ukm = '$deskripsi' WHERE id_ukm= '$id'";

$update = mysqli_query($connect, $query);

if (!empty($telpNew)){
$query2= "INSERT INTO ukm_notelp (notelp, id_ukm) VALUES ('$telpNew', '$id')";
$update2 = mysqli_query($connect, $query2);
}

echo json_encode($data);
?>
