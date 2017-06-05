 <?php  
 // Including database $koneksi
require_once '../../../../include/config.php';
 
 $output = array();  
 $query = "SELECT * from komunitas
NATURAL JOIN partner WHERE status_partner='belum'";  
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