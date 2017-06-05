<?php
require_once '../../../../include/config.php'; 

$data = json_decode(file_get_contents("php://input"));


//get data from object

$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi,$data->nama);
$alamat=mysqli_real_escape_string($koneksi,$data->alamat);
$kecamatan=mysqli_real_escape_string($koneksi,$data->kecamatan);
$koordinat=mysqli_real_escape_string($koneksi,$data->koordinat);
$email=mysqli_real_escape_string($koneksi,$data->email);
$deskripsi=mysqli_real_escape_string($koneksi,$data->deskripsi);

$telp[0]=mysqli_real_escape_string($koneksi,$data->telp1);
$telp[1]=mysqli_real_escape_string($koneksi,$data->telp2);
$telp[2]=mysqli_real_escape_string($koneksi,$data->telp3);


$rek[0]=mysqli_real_escape_string($koneksi,$data->rek1);
$rek[1]=mysqli_real_escape_string($koneksi,$data->rek2);
$rek[2]=mysqli_real_escape_string($koneksi,$data->rek3);

$query= "UPDATE panti, partner SET nama_panti='$nama', alamat_panti= '$alamat', kecamatan_panti = '$kecamatan', koordinat_panti = '$koordinat', email_panti = '$email', deskripsi_panti = '$deskripsi' WHERE panti.id_partner=partner.id_partner partneri.id_partner= '$id'";

if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}

$update = mysqli_query($koneksi, $query);

///////////////////update multivalue//////////////////////////
$delete= mysqli_query($koneksi, "DELETE FROM telpon_panti WHERE id_panti='$id'");  

$i=0;
while ($i<3){
	if ($telp[$i] !== ""){
		$insert= mysqli_query($koneksi, "INSERT INTO `telpon_panti`(`id_panti`, `telpon_panti`) VALUES ('$id','$telp[$i]')");
	}
	$i++;
}
///////////////update multivalue end here//////////////////////

///////////////////update multivalue//////////////////////////
$delete= mysqli_query($koneksi, "DELETE FROM rekening_panti WHERE id_panti='$id'");  

$i=0;
while ($i<3){
	if ($rek[$i] !== ""){
		$insert= mysqli_query($koneksi, "INSERT INTO `rekening_panti`(`id_panti`, `rekening_panti`) VALUES ('$id','$rek[$i]')");
	}
	$i++;
}
///////////////update multivalue end here//////////////////////






echo json_encode($data);
?>