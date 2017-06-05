<html>
  <head>
    <title>Lapok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <?php
      include "../../wrapper/header.php"
    ?>

  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="item active" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header" style="padding-top:40px">Edit Partner Lapok</h1><br>
  <form class="ui column form" style="text-align: justify;">
  <div class="ui segment">
  <h4 class="ui dividing header">Data Diri Partner</h4>

  <div class="field">
    <label>Nama Partner</label>
    <input type="text" name="Nama_Partner" placeholder="Nama Partner">
  </div>

  <div class="field">
    <label>Username</label>
    <input type="text" name="Username_Partner" placeholder="Username Partner">
  </div>

  <div class="field">
    <label>Password</label>
    <input type="text" name="Password_Partner" placeholder="Password Partner">
  </div>

  <div class="field">
    <label>Email</label>
    <input type="email" name="Email_Partner" placeholder="Email Partner">
  </div>

  <div class="field">
  <label>No Telepon</label>
  <div class="two fields">
    <div class="field">
      <input type="text" name="Telp_satu" placeholder="Nomor Kesatu">
    </div>
    <div class="field">
      <input type="text" name="Telp_dua" placeholder="Nomor Kedua">
    </div>
  </div>
  </div>

  <div class="field">
    <label>Nama Instansi</label>
    <input type="text" name="Nama_Instansi" placeholder="Nama Instansi">
  </div>

  <div class="field">
    <label>Alamat Instansi</label>
    <input type="text" name="Alamat_Instansi" placeholder="Alamat Instansi">
  </div>
  
  <div class="field">
    <label>Unggah Foto</label>
    <div class="field">
    <div class="ui action input">
        <input type="text" id="_attachmentName">
        <label for="attachmentName" class="ui icon button btn-file">
             <i class="attach icon"></i>
             <input type="file" id="attachmentName" name="attachmentName" style="display: none">
        </label>
    </div>
    </div>
 </div> 
  
  <div class="ui right green button" onclick="window.location='index.php'" tabindex="0">Daftar</div>
</div>
</form>
</div>
</div>

  <?php
       include "../../wrapper/footer.php"
  ?>
  </body>
<footer>
</footer>
</html>