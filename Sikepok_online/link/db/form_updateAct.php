<?php
require_once '../../../../include/config.php';

$data = json_decode(file_get_contents("php://input"));

//get data from object
$id=mysqli_real_escape_string($koneksi, $data->id);
$nama=mysqli_real_escape_string($koneksi,$data->nama);
$alamat=mysqli_real_escape_string($koneksi,$data->alamat);
$kecamatan=mysqli_real_escape_string($koneksi,$data->kecamatan);
$koordinat=mysqli_real_escape_string($koneksi,$data->koordinat);
$operasional=mysqli_real_escape_string($koneksi,$data->operasional);
$keterangan=mysqli_real_escape_string($koneksi,$data->keterangan);
$telp[0]=mysqli_real_escape_string($koneksi,$data->telp1);
$telp[1]=mysqli_real_escape_string($koneksi,$data->telp2);


$query= "UPDATE `tempat_sehat` SET `nama_tempat_sehat`='$nama', `alamat_tempat_sehat` = '$alamat', `kecamatan_tempat_sehat` = '$kecamatan', `koordinat_tempat_sehat` = '$koordinat', `operasional_tempat_sehat` = '$operasional', `keterangan_tempat_sehat` = '$keterangan' WHERE `id_tempat_sehat`= '$id'";
if (!$koneksi->query($query)) {
    printf("Errormessage: %s\n", $koneksi->error);
}
$update = mysqli_query($koneksi, $query);

///////////////////update multivalue//////////////////////////
$delete= mysqli_query($koneksi, "DELETE FROM telp_tempat_sehat WHERE id_tempat_sehat='$id'");  

$i=0;
while ($i<2){
	if ($telp[$i] !== ""){
		$insert= mysqli_query($koneksi, "INSERT INTO `telp_tempat_sehat`(`no_telp_tempat_sehat`, `id_tempat_sehat`) VALUES ('$telp[$i]', '$id')");
	}
	$i++;
}
///////////////update multivalue end here//////////////////////
echo json_encode($data);
?>