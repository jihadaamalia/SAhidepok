<?php
require 'connect.php'; 

$data = json_decode(file_get_contents("php://input"));

//get data from object
$NamaUMKM=$data->NamaUMKM;
$NamaOwner=$data->NamaOwner;
$Alamat=$data->Alamat;
$Kecamatan=$data->Kecamatan;
$Koordinat=$data->Koordinat;
$Deskripsi=$data->Deskripsi;
$Telp1 = $data->Telp1;
$Telp2 = $data->Telp2;

$query= "INSERT INTO ukm VALUES (null, '$NamaUMKM', '$NamaOwner', '$Alamat', '$Kecamatan', '$Deskripsi', '$Koordinat')";

$input = mysqli_query($connect, $query);

$getnewid = mysqli_query($connect,"SELECT * FROM ukm WHERE nama_ukm ='$NamaUMKM'");
$col=mysqli_fetch_array($getnewid); 
$id=$col['id_ukm'];

$query1= "INSERT INTO ukm_notlp VALUES ('$Telp1', '$id'), ('$Telp2', '$id')";

$input1 = mysqli_query($connect, $query1);


echo json_encode($data);

?>