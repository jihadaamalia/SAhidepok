<?php
require_once '../../../../include/config.php';
 

$data = json_decode(file_get_contents("php://input"));

//get data from object
$uname=$data->username;
$pass=$data->password;
$nampart=$data->nama_partner;
$notlp=$data->no_telp;
$email=$data->email;
$foto= $data->foto;
$identitas=$data->identitas_part;
$namainst=$data->nama_instansi;
$tgl_gbg=$data->tanggal_gabung;

$query= "INSERT INTO partner VALUES (null, '$uname', '$pass', '$nampart', '$notlp', '$email', '$foto', '$identitas', '$namainst', '$tgl_gbg', 'active', 4)";

$input = mysqli_query($koneksi, $query);

echo json_encode($data);

?>