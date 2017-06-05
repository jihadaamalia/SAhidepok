<?php
require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM rs WHERE id_rs=$data->id";
mysqli_query($koneksi, $query);
echo true;
?>