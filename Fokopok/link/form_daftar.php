<html>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kasihi Depok - ADMIN</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="../../../dist/semantic.min.css">

    <script src="../assets/library/jquery.min.js"></script>
    <script src="../../../dist/jquery.min.js"></script>
    <script src="../../../dist/semantic.min.js"></script>
    <script src="../../../dist/components/visibility.js"></script>
    <script src="../../../dist/components/transition.js"></script>
    <script src="../../../dist/components/modal.js"></script>
    <script src="../../../dist/components/dropdown.js"></script>
    <script src="../../../dist/jquery.js"></script>
    <script src="../../../dist/semantic.min.js"></script>
    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>


  <div class="ui text container">

  <button class="ui right labeled icon orange button" onclick="window.location='index.php'">
    Kembali
    <i class="left arrow icon"></i>
    </button>
  <h2 style="font-style:italic">Pembuatan Akun Baru</h2> 

  <table class="ui celled striped table">
    <thead>
      <tr>
        <th colspan="2">
          <h3> Periksa Kembali Detail Yayasan Panti Asuhan</h3>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">
          <h4>Komunitas</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nama Komunitas
          </div>
        </td>
        <td>
          Depok Photography
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Alamat</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nama Jalan
          </div>
        </td>
        <td>
          Jl. M. Yasin No. 6, Kelapa Dua
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nama Kecamatan
          </div>
        </td>
        <td>
          Kecamatan Tapos
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Kontak</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nomor Telepon
          </div>
        </td>
        <td>
          085788865433
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Email
          </div>
        </td>
        <td>
          dephotcommunity@gmail.com
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Foto Komunitas</h4>
        </td>
      </tr>
      <tr>
        <td  colspan="2">
          <div class="content">
            <center><img src="../assets/images/depot.jpg"></center>
          </div>
        </td>
      </tr>  
    </tbody>
  </thead>
</table>

<form class="ui form"  style="text-align: justify;">
  <div class="ui segments">
    <div class="ui segment">
      <h3 class="ui dividing header">Buat Admin Komunitas</h3>
      <div class="three fields">
        <div class="field">
          <div class="field">
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <input type="password" name="pass1" placeholder="Password">
        </div>
        <div class="field">
          <input type="password" name="pass1" placeholder="Tulis Ulang Password">
        </div>
      </div>
    </div>
    <div class="ui secondary segment">
      <a class="ui right floated orange button" onclick="kirim()"><b>Tambah Akun</b></a><br><br>
    </div>
  </div>
</form>
</div>

<br><br>
</body>

<footer>
    <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>