 <?php  
 // Including database connections
require_once '../../../../include/config.php';
$output = array();  
error_reporting(0);
session_start();
$id=$_SESSION["id"];
$query = "SELECT * FROM jenis NATURAL JOIN tempat_sehat WHERE id_tempat_sehat = '".$id."'";  
$result = mysqli_query($koneksi, $query);  
if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
       $output[] = $row;  
  }  
  echo json_encode($output);  
}  
 ?>  