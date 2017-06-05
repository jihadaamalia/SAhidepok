 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
$output = array();  
session_start();
$id=$_SESSION["id"];
$query = "SELECT * FROM event_tempat RIGHT JOIN tempat on event_tempat.id_tempat=tempat.id_tempat LEFT JOIN event on event_tempat.id_event=event.id_event LEFT JOIN partner on partner.id_partner=tempat.id_partner LEFT JOIN foto_tempat on foto_tempat.id_tempat=tempat.id_tempat group by tempat.id_tempat having tempat.id_tempat = '".$id."'";  
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