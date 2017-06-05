 <?php  
 // Including database connections
require_once 'connect.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id"];

 $ukm = mysqli_query($connect,"SELECT * FROM barang Natural join barang_foto where id_ukm ='$id'");
 if(mysqli_num_rows($ukm) > 0)  
 {  
      while($row = mysqli_fetch_array($ukm))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>