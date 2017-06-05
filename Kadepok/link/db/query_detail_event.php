 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 


session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $panti = mysqli_query($koneksi,"SELECT * FROM event_panti right join event on event.id_event=event_panti.id_event where id_panti='$id'");
 if(mysqli_num_rows($panti) > 0)  
 {  
      while($row = mysqli_fetch_array($panti))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 
 
 ?>  