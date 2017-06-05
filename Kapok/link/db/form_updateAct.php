<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object
$id_tempat=mysqli_real_escape_string($koneksi, $data->id_tempat);
$id_partner=mysqli_real_escape_string($koneksi, $data->id_partner);
$nama_tempat=mysqli_real_escape_string($koneksi,$data->nama_tempat);
$alamat_tempat=mysqli_real_escape_string($koneksi,$data->alamat_tempat);
$kecamatan_tempat=mysqli_real_escape_string($koneksi,$data->kecamatan_tempat);
$jam_operasi_tempat=mysqli_real_escape_string($koneksi,$data->jam_operasi_tempat);
$no_telp_tempat=mysqli_real_escape_string($koneksi,$data->no_telp_tempat);
$fasilitas_tempat=mysqli_real_escape_string($koneksi,$data->fasilitas_tempat);
$menu_fav_tempat=mysqli_real_escape_string($koneksi,$data->menu_fav_tempat);
$koordinat_tempat=mysqli_real_escape_string($koneksi,$data->koordinat_tempat);
$nama_partner=mysqli_real_escape_string($koneksi,$data->nama_partner);
$email_partner=mysqli_real_escape_string($koneksi,$data->email_partner);
$identitas_partner=mysqli_real_escape_string($koneksi,$data->identitas_partner);
$status_partner=mysqli_real_escape_string($koneksi,$data->status_partner);
$note_tempat=mysqli_real_escape_string($koneksi,$data->note_tempat);
$deskripsi_tempat=mysqli_real_escape_string($koneksi,$data->deskripsi_tempat);

$query= "UPDATE tempat, partner SET nama_tempat='$nama_tempat', alamat_tempat = '$alamat_tempat', kecamatan_tempat = '$kecamatan_tempat', jam_operasi_tempat = '$jam_operasi_tempat', no_telp_tempat = '$no_telp_tempat', fasilitas_tempat = '$fasilitas_tempat', menu_fav_tempat = '$menu_fav_tempat',koordinat_tempat = '$koordinat_tempat', note_tempat = '$note_tempat', deskripsi_tempat = '$deskripsi_tempat',nama_partner='$nama_partner', email_partner = '$email_partner', identitas_partner = '$identitas_partner', status_partner = '$status_partner' WHERE partner.id_partner= tempat.id_partner AND partner.id_partner='$id_partner'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);
echo json_encode($data);
?>