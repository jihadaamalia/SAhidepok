 <?php  
 // Including database connections
require_once 'connect.php'; 
$output = array();  
session_start();
$id=$_SESSION["id"];
$query = "SELECT * FROM barang NATURAL JOIN kategori_ukm WHERE id_barang = '".$id."'";  
$result = mysqli_query($connect, $query);  
if(mysqli_num_rows($result) > 0)  
{  
  while($row = mysqli_fetch_array($result))  
  {  
       $output[] = $row;  
  }  
  echo json_encode($output);  
}  
 ?>  