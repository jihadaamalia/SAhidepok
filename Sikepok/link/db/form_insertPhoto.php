<?php
require_once '../../../../include/config.php';

$data = json_decode(file_get_contents("php://input"));

$getnewid = mysqli_query($koneksi,"SELECT * FROM jenis NATURAL JOIN tempat_sehat order by id_tempat_sehat DESC limit 1;");
$col=mysqli_fetch_array($getnewid); 
$id=$col['id_tempat_sehat'];
$nama=$col['nama_tempat_sehat'];
$jenis= $col['nama_jenis'];
$nomor=1;
$uploadOk = 1;

do{
if(!empty($_FILES['file'.$nomor]['name']))  
 {  
     $check = getimagesize($_FILES["file".$nomor]["tmp_name"]);
     
     if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } 
      else {
          //echo "File is not an image.";
          $uploadOk = 0;
      }
    if ($uploadOk == 1){
      $filename = $_FILES['file'.$nomor]['name'];
      $filename=explode(".", $filename);
      $extension = end($filename);
      $newfilename = "Sikepok_".$jenis."_".$nama."_00".$nomor.".".$extension;
      $newfilename = str_replace('Tempat', '', $newfilename);
      $newfilename = str_replace(' ', '', $newfilename);
      $path = '../../../../assets/images/photos/sikepok/sikepok3/' . $newfilename;  
      if(move_uploaded_file($_FILES['file'.$nomor]['tmp_name'], $path))  
      {  
         $query3 = "INSERT INTO `foto_tempat_sehat`(`foto_tempat_sehat`, `id_tempat_sehat`) VALUES ('".$newfilename."', '".$id."')";  
         if(mysqli_query($koneksi, $query3))  
         {  
              echo 'File Uploaded'.$newfilename;  
         }  
         // else  
         // {  
         //      echo 'File Uploaded But not Saved';  
         // }  
      }  
	  // else
	  // {
		 //  echo 'gagal memindahkan file';
	  // }
  }
 }
 $nomor++;
 }
 while ($nomor<4)  
 // else  
 // {  
 //      echo 'Some Error';  
 // }
 // echo json_encode($uploadOk);
?>