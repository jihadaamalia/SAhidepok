 <?php  
 // Including database connections
require_once '../../../../include/config.php';
 
 $output = array();  
 $query = "SELECT A.id_tempat_sehat, A.nama_tempat_sehat, A.alamat_tempat_sehat, B.nama_jenis, GROUP_CONCAT(DISTINCT C.no_telp_tempat_sehat SEPARATOR ', ') AS no_telp_tempat_sehat, A.koordinat_tempat_sehat, A.kecamatan_tempat_sehat, A.keterangan_tempat_sehat, A.operasional_tempat_sehat, foto_tempat_sehat FROM tempat_sehat A LEFT OUTER JOIN jenis B ON B.id_jenis=A.id_jenis LEFT OUTER JOIN telp_tempat_sehat C ON C.id_tempat_sehat=A.id_tempat_sehat LEFT OUTER JOIN foto_tempat_sehat D ON D.id_tempat_sehat=A.id_tempat_sehat GROUP BY id_tempat_sehat";  
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