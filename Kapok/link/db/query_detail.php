 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id"];

 $tempat = mysqli_query($koneksi,"SELECT * FROM tempat NATURAL JOIN partner where tempat.id_tempat='$id'");
 if(mysqli_num_rows($tempat) > 0)  
 {  
      while($row = mysqli_fetch_array($tempat))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  