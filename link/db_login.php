<?php
  if(isset($_POST['login'])){
    $koneksi = mysqli_connect("localhost", "root", "", "hidepoki_db_main");  
    $uname= $_POST['Username'];
    $pass=$_POST['Password'];
    if (empty($uname)|| empty($pass)) 
  {
    echo '<script language="javascript"> alert("Username atau Password tidak boleh kosong") </script>';
  }
  else{
    $uname = mysqli_real_escape_string($koneksi,$_POST['Username']);
    $pass = mysqli_real_escape_string($koneksi,$_POST['Password']);
    $query = mysqli_query ($koneksi,"SELECT * FROM `user` WHERE `username_user` = '$uname' AND `password_user` = '$pass'");
    $row = mysqli_num_rows($query);
    $message = "Username atau Password salah";

    if (!mysqli_query ($koneksi,"SELECT * FROM `user` WHERE `username_user` = '$uname' AND `password_user` = '$pass'")){
      printf("Errormessage: %s\n", mysqli_error($koneksi));
    }
    if($row == 1) //apabila baris ditemukan
    {   
      echo "<script>window.location = 'beranda.php'</script>";
    }
    else
    {
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>