<?php
require_once '../../../../include/config.php'; 

session_start();
$data = json_decode(file_get_contents("php://input"));
$id_insert = $_SESSION['id_insert'];



//get data from object

	$nama_dokter=$data->Nama_Dokter; //
	$alamat=$data->Alamat;
	$telp=$data->Telp;
	$email=$data->Email;
	$spesialisasi=$data->Spesialisasi;
	$senin=$data->Senin;
	$selasa=$data->Selasa;
	$rabu=$data->Rabu;
	$kamis=$data->Kamis;
	$jumat=$data->Jumat;
	$sabtu=$data->Sabtu;
	$minggu=$data->Minggu;
	$keterangan=$data->Keterangan;

	$query = "INSERT INTO dokter VALUES (null,'$nama_dokter','$alamat','$telp','$email','$spesialisasi','','$keterangan','$id_insert')";
	$input = mysqli_query($koneksi, $query);

	$newid = mysqli_query($koneksi, "SELECT	* FROM	dokter order by id_dokter DESC limit 1 ");
	$hasil = mysqli_fetch_array	($newid);
	$id_dok = $hasil['id_dokter'];

	$query2 = "INSERT INTO jadwal VALUES (null, '$senin', '$selasa', '$rabu', '$kamis', '$jumat', '$sabtu', '$minggu', '$id_dok', '$id_insert')";
	$input2 = mysqli_query($koneksi, $query2);


	// $getnewid = mysqli_query($koneksi,"SELECT * FROM rs WHERE nama_rs ='$nama_Rumah_sakit'");
	// $col=mysqli_fetch_array($getnewid); 

	// $_SESSION['id']=$col['id_rs'];

	// $id = $_SESSION['id'];

	echo json_encode($nama_dokter);

?>