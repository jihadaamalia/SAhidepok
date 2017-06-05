 <?php  
 // Including database connections
require_once '../../../../include/config.php';
 
 $output = array();  
 $query = "SELECT * from komunitas
INNER JOIN partner WHERE (status_partner='belum') AND (komunitas.id_partner=partner.id_partner)";
$query1 = "UPDATE partner
SET status_partner = 'diterima'
WHERE id_partner= 'id'";  
if(mysqli_multi_query($koneksi, $query.$query1)){
	echo "<script type='text/javascript'>alert('Berhasil diterima');</script>";
      }
      else{
        echo "<script type='text/javascript'>alert('Gagal diterima');</script>";
      }
 ?>  
