<?php
require_once '../../../../include/config.php';

$data = json_decode(file_get_contents("php://input"));

$getnewid = mysqli_query($koneksi,"SELECT * FROM `tempat_sehat` order by id_tempat_sehat DESC limit 1;");
$col=mysqli_fetch_array($getnewid); 
$id=$col['id_tempat_sehat'];

if(!empty($_FILES))  
 {  
      $path = '../../../../assets/images/photos/sikepok/sikepok3/' . $_FILES['file']['name'];  
      if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
      {
			
           $query3 = "INSERT INTO `foto_tempat_sehat`(`foto_tempat_sehat`, `id_tempat_sehat`) VALUES ('".basename($_FILES["file"]["name"])."', '".$id."')";  
           if(mysqli_query($koneksi, $query3))  
           {  
                echo 'File Uploaded';  
           }  
           else  
           {  
                echo 'File Uploaded But not Saved';  
           }  
      }  
	  else
	  {
		  echo 'gagal memindahkan file';
	  }
 }  
 else  
 {  
      echo 'Some Error';  
 }

?>