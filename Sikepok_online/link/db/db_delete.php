<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM telp_tempat_sehat WHERE id_tempat_sehat=$data->id";
$query2 = "DELETE FROM foto_tempat_sehat WHERE id_tempat_sehat=$data->id";
$query3 = "DELETE FROM tempat_sehat WHERE id_tempat_sehat=$data->id";
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query2);
mysqli_query($koneksi, $query3);
echo true;
?>