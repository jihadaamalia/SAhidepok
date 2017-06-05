 <?php  
 // Including database connections
require_once 'connect.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id"];

 $brg = mysqli_query($connect,"SELECT * FROM barang RIGHT JOIN kategori_ukm on barang.id_kategori = kategori_ukm.id_kategori WHERE barang.id_UKM='$id'");
 if(mysqli_num_rows($brg) > 0)  
 {  
      while($row = mysqli_fetch_array($brg))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>