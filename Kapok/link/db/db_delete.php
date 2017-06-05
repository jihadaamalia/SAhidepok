<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM tempat_sehat WHERE id_tempat_sehat=$data->id";
mysqli_query($koneksi, $query);
echo true;
?>