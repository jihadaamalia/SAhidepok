<?php
session_start();
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object

	$nama_Rumah_sakit=$data->Nama_Rumah_sakit; //
	$alamat=$data->Alamat;
	$kecamatan=$data->Kecamatan;
	$koordinat_Latitude=$data->Koordinat_Latitude;
	$koordinat_Longitude=$data->Koordinat_Longitude;
	$telp=$data->Telp;
	$website=$data->Website;
	$email=$data->Email;
	$keterangan=$data->Keterangan;

	$query= "INSERT INTO rs VALUES (null,'$nama_Rumah_sakit','$alamat','$kecamatan','$koordinat_Latitude','$koordinat_Longitude','$telp','$website','$email',' ','$keterangan','2')";

	$input = mysqli_query($koneksi, $query);

	$getnewid = mysqli_query($koneksi,"SELECT * FROM rs WHERE nama_rs ='$nama_Rumah_sakit'");
	$col=mysqli_fetch_array($getnewid); 

	$_SESSION['id_insert']=$col['id_rs'];
	$id_insert = $_SESSION['id_insert'];

	echo json_encode($id_insert);

?>