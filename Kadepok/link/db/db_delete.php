<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
$query = "DELETE FROM panti WHERE id_panti=$data->id";
$query1 = "DELETE FROM rekening_panti WHERE id_panti=$data->id";
$query2 = "DELETE FROM telpon_panti WHERE id_panti=$data->id";
$query3 = "DELETE FROM event WHERE id_event=$data->id";
$query4 = "DELETE FROM partner WHERE id_partner=$data->id";
$query5 = "DELETE FROM donasi WHERE id_donasi=$data->id";
mysqli_query($koneksi, $query);
mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query2);
mysqli_query($koneksi, $query3);
mysqli_query($koneksi, $query4);
mysqli_query($koneksi, $query5);
echo true;
?>