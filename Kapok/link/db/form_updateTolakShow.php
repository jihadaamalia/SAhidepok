 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
$output = array();  
session_start();
$id=$_SESSION["id"];
$query = "SELECT * FROM tempat natural join partner where id_partner= '$id'";  
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