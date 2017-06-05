<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));

//get data from object
$nama_tempat=$data->nama_tempat;
$alamat_tempat=$data->alamat_tempat;
$kategori_tempat=$data->kategori_tempat;
$kecamatan_tempat=$data->kecamatan_tempat;
$jam_operasi_tempat=$data->jam_operasi_tempat;
$no_telp_tempat=$data->no_telp_tempat;
$fasilitas_tempat=$data->fasilitas_tempat;
$menu_fav_tempat= $data->menu_fav_tempat;
$koordinat_tempat= $data->koordinat_tempat;
$username_partner = $data->username_partner;
$password_partner= $data->password_partner;
$nama_partner = $data->nama_partner;
$email_partner = $data->email_partner;
$identitas_partner = $data->identitas_partner;
$deskripsi_tempat = $data->deskripsi_tempat;
$note_tempat = $data->note_tempat;

$query= "INSERT INTO partner (id_partner, username_partner, password_partner, nama_partner, email_partner, identitas_partner, tanggal_gabung_partner, status_partner, id_modul) VALUES (null,'$username_partner','$password_partner','$nama_partner','$email_partner','$identitas_partner', NOW(), 'diterima','6')";

$input = mysqli_query($koneksi, $query);

$getnewid = mysqli_query($koneksi,"SELECT * FROM partner WHERE username_partner='$username_partner'");
$col=mysqli_fetch_array($getnewid); 
$id=$col['id_partner'];

$query2= "INSERT INTO tempat (id_tempat, nama_tempat, kategori_tempat, alamat_tempat, kecamatan_tempat, deskripsi_tempat, jam_operasi_tempat, no_telp_tempat, fasilitas_tempat, menu_fav_tempat, koordinat_tempat, note_tempat, id_partner) VALUES (null, '$nama_tempat', '$kategori_tempat', '$alamat_tempat', '$kecamatan_tempat', '$deskripsi_tempat', '$jam_operasi_tempat', '$no_telp_tempat', '$fasilitas_tempat', '$menu_fav_tempat', '$koordinat_tempat', '$note_tempat', '$id')";
$input2 = mysqli_query($koneksi, $query2);

echo json_encode($data);
?>