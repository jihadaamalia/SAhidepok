 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 
session_start();
 $output = array();  
 $id=$_SESSION["id_fas"];
 $fasilitas = mysqli_query($koneksi, "SELECT * FROM fasilitas where id_fasilitas = '$id'");
 if(mysqli_num_rows($fasilitas) > 0)  
 {  
      while($row = mysqli_fetch_array($fasilitas))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  