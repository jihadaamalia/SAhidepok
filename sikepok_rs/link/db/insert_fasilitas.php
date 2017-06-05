<?php
require_once '../../../../include/config.php'; 

session_start();
$data = json_decode(file_get_contents("php://input"));
$id_insert = $_SESSION['id_insert'];

//get data from object

	$nama_fasilitas=$data->Nama_Fasilitas; 
	$keterangan=$data->Keterangan;

	$query = "INSERT INTO fasilitas VALUES (null,'$nama_fasilitas','','$keterangan','$id_insert')";
	$input = mysqli_query($koneksi, $query);

	echo json_encode($nama_fasilitas);
?>