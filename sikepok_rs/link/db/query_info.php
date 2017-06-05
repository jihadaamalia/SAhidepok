 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $rs = mysqli_query($koneksi,"SELECT * FROM rs where id_rs = '$id'");
 if(mysqli_num_rows($rs) > 0)  
 {  
      while($row = mysqli_fetch_array($rs))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  