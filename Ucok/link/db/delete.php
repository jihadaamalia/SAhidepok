<?php require_once 'connect.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM ukm WHERE id_ukm=$data->id";
$query2 = "DELETE FROM barang WHERE id_ukm=$data->id";
$query3 = "DELETE FROM ukm_notelp WHERE id_ukm=$data->id";
$query4 = "DELETE FROM ukm_foto WHERE id_ukm=$data->id";
mysqli_query($connect, $query);
mysqli_query($connect, $query2);
mysqli_query($connect, $query3);
mysqli_query($connect, $query4);
echo true;
?>