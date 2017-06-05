 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $dokter = mysqli_query($koneksi,"SELECT * FROM dokter where id_rs='$id'");
 if(mysqli_num_rows($dokter) > 0)  
 {  
      while($row = mysqli_fetch_array($dokter))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  