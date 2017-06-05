<?php
require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM dokter WHERE id_dokter=$data->id";
mysqli_query($koneksi, $query);
echo true;
?>