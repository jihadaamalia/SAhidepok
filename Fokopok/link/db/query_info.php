 <?php  
 // Including database connections
require_once '../../../../include/config.php';
session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $komunitas = mysqli_query($koneksi,"SELECT * FROM komunitas natural join partner natural join komunitas_user natural join artikel  where id_komunitas = '$id'");
 if(mysqli_num_rows($komunitas) > 0)  
 {  
      while($row = mysqli_fetch_array($komunitas))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 
 
 ?>  