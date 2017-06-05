<?php
require 'connect.php'; 

$data = json_decode(file_get_contents("php://input"));

//get data from object
$ID=$data->ID;
$Kategori=$data->Kategori;
$barang = $data->barang;
$harga = $data->harga;


$query= "INSERT INTO barang VALUES (null, '$barang', '$harga', '$ID', '$Kategori')";

$input = mysqli_query($connect, $query);
if (!$connect->query($query)) {
    printf("Errormessage: %s\n", $connect->error);
}

echo json_encode($ID);

?>