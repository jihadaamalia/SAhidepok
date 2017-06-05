 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 


session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $panti = mysqli_query($koneksi,"select nama_donasi, YEAR(tanggal_donasi) AS tahun, MONTHNAME (tanggal_donasi) AS bulan, count(*) AS jumlah, sum(jumlah_donasi) AS total from donasi where id_panti='$id' GROUP BY MONTH(tanggal_donasi)");
 if(mysqli_num_rows($panti) > 0)  
 {  
      while($row = mysqli_fetch_array($panti))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 
 
 ?>  