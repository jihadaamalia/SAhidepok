<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id_tempat=mysqli_real_escape_string($koneksi, $data->id_tempat);
$note_tempat=mysqli_real_escape_string($koneksi, $data->note_tempat);
$status_partner=mysqli_real_escape_string($koneksi, $data->status_partner);

$query= "UPDATE tempat, partner SET note_tempat = '$note_tempat', status_partner='ditolak' WHERE tempat.id_partner=partner.id_partner AND id_tempat ='$id_tempat'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);
echo json_encode($data);
?>