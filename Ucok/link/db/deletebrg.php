<?php require_once 'connect.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM barang WHERE id_barang=$data->id";
$query2 = "DELETE FROM kategori_ukm WHERE id_kategori=$data->id";
mysqli_query($connect, $query);
mysqli_query($connect, $query2);
echo true;
?>