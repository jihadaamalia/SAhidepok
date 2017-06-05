 <?php  
 // Including database connections
require_once '../../../../include/config.php'; 


session_start();
 $output = array();  
 $id=$_SESSION["id"];
 $panti = mysqli_query($koneksi,"SELECT nama_panti, alamat_panti, jumlah_anak_panti, tahun_berdiri_panti, deskripsi_panti, telpon_panti,email_panti, rekening_panti, nama_partner FROM panti LEFT OUTER JOIN (SELECT id_panti, GROUP_CONCAT(telpon_panti SEPARATOR ', ') AS telpon_panti FROM `telpon_panti` GROUP BY id_panti) a ON panti.id_panti=a.id_panti LEFT OUTER JOIN (SELECT id_panti, GROUP_CONCAT(rekening_panti SEPARATOR ', ') AS rekening_panti FROM `rekening_panti` GROUP BY id_panti) b ON panti.id_panti=b.id_panti  LEFT OUTER JOIN partner ON panti.id_partner=partner.id_partner where a.id_panti='$id'");
 if(mysqli_num_rows($panti) > 0)  
 {  
      while($row = mysqli_fetch_array($panti))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 
 
 ?>  