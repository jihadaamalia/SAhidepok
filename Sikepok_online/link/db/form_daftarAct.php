<?php
require_once '../../../../include/config.php';

$data = json_decode(file_get_contents("php://input"));

//get data from object
$jenis=$data->Jenis;
$nama=$data->Nama_Usaha;
$alamat=$data->Alamat;
$kecamatan=$data->Kecamatan;
$koordinat=$data->Koordinat;
$operasional=$data->Operasional;
$keterangan=$data->Keterangan;
$Telp1 = $data->Telp1;
$Telp2 = $data->Telp2;

$query= "INSERT INTO `tempat_sehat` (`id_tempat_sehat`, `nama_tempat_sehat`, `alamat_tempat_sehat`, `koordinat_tempat_sehat`, `kecamatan_tempat_sehat`, `keterangan_tempat_sehat`, `operasional_tempat_sehat`, `id_jenis`) VALUES (null,'$nama','$alamat','$koordinat','$kecamatan','$keterangan','$operasional','$jenis')";

$input = mysqli_query($koneksi, $query);
// if (!$koneksi->query($query)) {
//     printf("Errormessage: %s\n", $koneksi->error);
// }

$getnewid = mysqli_query($koneksi,"SELECT * FROM `tempat_sehat` order by id_tempat_sehat DESC limit 1");
$col=mysqli_fetch_array($getnewid); 
$id=$col['id_tempat_sehat'];

if (!empty($Telp1) AND !empty($Telp2)){
$query2= "INSERT INTO `telp_tempat_sehat`(`no_telp_tempat_sehat`, `id_tempat_sehat`) VALUES ('$Telp1', '$id'), ('$Telp2', '$id')";
	$input2 = mysqli_query($koneksi, $query2);}
elseif (!empty($Telp1) AND empty($Telp2)){
	$query2= "INSERT INTO `telp_tempat_sehat`(`no_telp_tempat_sehat`, `id_tempat_sehat`) VALUES ('$Telp1', '$id')";
	$input2 = mysqli_query($koneksi, $query2);
}

?>