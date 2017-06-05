<?php
         // include "../wrapper/header.php";
require_once '../../../../include/config.php'; 
         session_start();
         $output = array();  
         $id=$_SESSION["id"];
         $jadwal = mysqli_query($koneksi,"SELECT * FROM jadwal natural join dokter where id_rs = '$id'");

         if (mysqli_num_rows($jadwal) > 0) 
         {
         	while($row = mysqli_fetch_array($jadwal))  
		      {  	
		           $output[] = $row;  
		      }  
		      echo json_encode($output);
		 }
    ?>