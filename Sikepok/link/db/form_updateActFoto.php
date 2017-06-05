<?php
require_once '../../../../include/config.php';

$data = json_decode(file_get_contents("php://input"));
session_start();
$id=$_SESSION["id"];

$getFoto = mysqli_query($koneksi,"SELECT * FROM foto_tempat_sehat WHERE id_tempat_sehat = '".$id."'");
//$foto=mysqli_fetch_array($getFoto); 

////Data utk rename///////
$getDetail = mysqli_query($koneksi,"SELECT * FROM jenis NATURAL JOIN tempat_sehat WHERE id_tempat_sehat = '".$id."'");
$col=mysqli_fetch_array($getDetail);
$id=$col['id_tempat_sehat'];
$nama=$col['nama_tempat_sehat'];
$jenis=$col['nama_jenis'];
$nomor=1;
$uploadOk=1;

//ECHO $foto['foto_tempat_sehat'];
while($foto=mysqli_fetch_array($getFoto)){
if(!empty($_FILES['file'.$nomor]['name']))  
 {  
  $check = getimagesize($_FILES["file".$nomor]["tmp_name"]);
     
     if($check !== false) {
        echo "File is an image - " . $check["mime"] . $_FILES['file'.$nomor]['name'];
        $uploadOk = 1;
        $path="../../../../assets/images/photos/sikepok/sikepok3/".$foto['foto_tempat_sehat'];
          if(file_exists($path)){
            unlink($path);
            echo "unlink success";
          }
          else{
            echo "not exist".$path;
          }

      } 
      else {
          echo "File is not an image.";
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
         $query3 = "UPDATE `foto_tempat_sehat` SET `foto_tempat_sehat`='".$newfilename."' WHERE id_tempat_sehat = '".$id."' AND foto_tempat_sehat ='".$foto['foto_tempat_sehat']."'"; 
         if (!$koneksi->query($query3)) {
    printf("Errormessage: %s\n", $koneksi->error);
} 
         if(mysqli_query($koneksi, $query3))  
         {  
              echo 'File Uploaded'.$newfilename;   
         }
         else 
         {
          echo "file not uploaded to db";
         }
       }
           
  
      else
      {
        echo "file not uploaded to folder";
      }
  }
  else
    {echo "upload not OK";}
 }
 else
  {
    echo "file empty"; }
    $nomor++;
 
}


 // echo json_encode($uploadOk);
?>