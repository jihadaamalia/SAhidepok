<?php require_once '../../../../include/config.php'; 
$data = json_decode(file_get_contents("php://input")); 
//delete foto dari folder 
$query = "SELECT * FROM foto_tempat_sehat WHERE id_tempat_sehat = $data->id" ;
$photo=mysqli_query($koneksi, $query);

while($col=mysqli_fetch_array($photo)){
	$path="../../../../assets/images/photos/sikepok/sikepok3/".$col['foto_tempat_sehat'];
	if(file_exists($path)){
		unlink($path);
		}
	else {
		echo "doesnt exist".$path;
	}
}

$query1 = "DELETE FROM telp_tempat_sehat WHERE id_tempat_sehat=$data->id";
$query2 = "DELETE FROM foto_tempat_sehat WHERE id_tempat_sehat=$data->id";
$query3 = "DELETE FROM tempat_sehat WHERE id_tempat_sehat=$data->id";

mysqli_query($koneksi, $query1);
mysqli_query($koneksi, $query2);
mysqli_query($koneksi, $query3);

echo true;
?>