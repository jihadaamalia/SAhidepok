<?php
require_once '../../../../include/config.php'; 
	$jenis=$_POST['Jenis'];
	$nama=$_POST['Nama_Usaha'];
	$alamat=$_POST['Alamat'];
	$kecamatan=$_POST['Kecamatan'];
	$koordinat=$_POST['Koordinat'];
	$telp1=$_POST['Telp1'];
	$telp2=$_POST['Telp2'];
	$operasional=$_POST['Operasional'];
	$keterangan=$_POST['Keterangan'];
echo $jenis.$nama;

$query = "INSERT INTO 'tempat_sehat'('id_tempat_sehat', 'nama_tempat_sehat', 'alamat_tempat_sehat', 'koordinat_tempat_sehat', 'kecamatan_tempat_sehat', 'keterangan_tempat_sehat', 'operasional_tempat_sehat', 'id_jenis') VALUES ('190','$nama','$alamat','$koordinat','$kecamatan','$keterangan','$operasional','$jenis')";
$input = mysqli_query($koneksi, $query);
if (!$input) { //try catch mysql query
				$message  = 'Invalid query: ' . mysqli_error() . "\n";
				$message .= 'Whole query: ' . $input;
				die($message);
			}

$getnewid = mysqli_query($koneksi,"SELECT * FROM tempat_sehat WHERE nama_tempat_sehat='$nama'");
$col=mysqli_fetch_array($getnewid); 
echo $col['id_tempat_sehat'];
