<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM komunitas WHERE id_komunitas=$data->id";
$query1 = "DELETE FROM partner WHERE id_partner=$data->id";
$query2 = "DELETE FROM komunitas_user WHERE id_komunitas=$data->id";
$query3 = "DELETE FROM artikel WHERE id_komunitas=$data->id";

mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query2);
mysqli_query($koneksi, $query3);
echo true;
?>