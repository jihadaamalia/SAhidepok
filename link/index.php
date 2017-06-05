<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Homepage Admin</title>
  <link rel="stylesheet" type="text/css" href="../dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/site.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/menu.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/transition.css">
  <link rel="stylesheet" type="text/css" href="../dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/form.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/input.css">

  <style type="text/css">

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 780px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: -0.4em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
      margin-bottom: 2em;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }

  </style>


  <script src="assets/library/jquery.min.js"></script>
  <script src="../dist/components/visibility.js"></script>
  <script src="../dist/components/sidebar.js"></script>
  <script src="../dist/components/transition.js"></script>
  <script src="../dist/semantic.min.js"></script>
  <script src="../dist/jquery.js"></script>

  
</head>
<body>

<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment" style="background-image:url('../assets/images/bg_2.jpg')">


      <div style="padding-top:90px;" class="ui inverted header">
      <center><img class="ui small image" src="../assets/images/logo.png"></center>
      <h1> Login Super Admin </h1></div>
      <h2> </h2>
        <form method="POST">      
         <div class="ui centered grid">
              <div class="ui form">
                <div class="field">
                  <div class="ui left icon input"> 
                    <input type="text" name="username" placeholder="Username" style="height:50px; width:300px; position:center;">
                    <i class="user icon"></i>
                  </div>
                </div>
                <div class="field">
                  <div class="ui left icon input">
                    <input type="password" name="password" placeholder="Password" style="height:50px; width:300px; position:center;">
                    <i class="lock icon"></i>
                  </div>
                </div>
                <center>
                <button type="submit" name="login" class="ui green button">LOGIN</button>
                <!-- <div onclick="document.forms['login'].submit();" class="ui blue submit button" style="height:40px; width:200px; position:center;">Login</div> --> </center>
              </div>
            
          </div>
        </form>
      </div>
    </div>

<?php
require_once '../../include/config.php';
error_reporting(0);
session_start();

require_once '../../include/cipher.php';
$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

$login = $_POST['login'];
if(isset($login))
{
  if (empty($_POST['username'] || $_POST['password'])) 
  {
    echo '<script language="javascript"> alert("Username atau Password tidak boleh kosong") </script>';
  }
  else
  {
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
  
   $enkripsi = $cipher->encrypt($password, $username);

   //SELECT LAPOK
    $query1 = mysqli_query ($koneksi, "SELECT * FROM s_admin WHERE username_s_admin = '$username' AND password_s_admin = '$enkripsi'");
    $hasil1  = mysqli_fetch_array($query1);
    $row1 = mysqli_num_rows($query1);

  
    if ($row1 == 1) {
     $_SESSION['superadmin'] = $hasil1['username_s_admin'];
     echo"<script> window.location='beranda.php';</script>";
    }
    else {
      echo '<script language="javascript"> alert("Username atau Password salah") </script>';
    }
   } 
}
?>
</body>
</html>