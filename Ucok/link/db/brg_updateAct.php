<?php
require 'connect.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id=mysqli_real_escape_string($connect, $data->id);
$nama=mysqli_real_escape_string($connect,$data->nama_brg);
$harga=mysqli_real_escape_string($connect,$data->harga_brg);
$ukm=mysqli_real_escape_string($connect,$data->id_ukm);
$kat=mysqli_real_escape_string($connect,$data->kategori);

$query= "UPDATE barang SET nama_barang= '$nama', harga_barang = '$harga' WHERE id_ukm= '$id'";

$update = mysqli_query($connect, $query);

echo json_encode($data);
?>
