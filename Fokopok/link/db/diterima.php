<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "UPDATE partner SET status_partner= 'terima' WHERE id_partner= $data->id";
mysqli_query($koneksi, $query);
echo true;
?>