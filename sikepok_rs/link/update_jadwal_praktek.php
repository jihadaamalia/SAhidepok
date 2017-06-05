<html>
  <head>
    <title>SiKepok ADMIN</title>
    <?php
         include "../../wrapper/header.php"
    ?>

    <!-- SCRIPT UNTUK PANGGIL POPUP-->
    <script type="text/javascript">
    function panggil() {
      $('.ui.basic.modal')
        .modal('show')
      ;}
    </script>
  </head>
 

  <div id = "one-page" class="ui text container">
  
  <!-- MENU --> 
  <!-- <div class="ui four item stackable tabs menu centered">
    <a href="update_rs.php" class="item" data-tab="definition">Data Rumah Sakit</a>
    <a href="form_jadwal_praktek.php" class="item" data-tab="definition">Jadwal Dokter</a>
    <a href="form_daftar_dokter.php" class="item" data-tab="definition">Data Dokter</a>
    <a href="pendaftaran_rs.php" class="item" data-tab="definition">Fasilitas</a>
  </div> -->

  <h1 class="ui header">
  <i class="left settings icon"></i>
  Ubah Jadwal Praktek</h1><br>
  <form class="ui column form" style="text-align: justify;">
  <div class="ui segment">

  <div class="field">
    <label>Nama Dokter</label>
        <input type="text" name="Nama_Dokter" placeholder="Agha">
  </div>

  <div class="field">
    <label>Jadwal Praktek</label>

    <div class="four fields">
      <div class="field">
        <input type="text" name="Hari" placeholder="Hari">
      </div>
      <div class="field">
        <input type="text" name="Masuk" placeholder="Jam Masuk">
      </div>
      <div class="field">
        <input type="text" name="Pulang" placeholder="Jam Selesai">
      </div>
      <button class="ui icon teal button">
      <i class="plus white icon"></i>
    </button>
    </div>
  </div>
  
  <a href="lihat_jadwal_praktek.php"><div class="ui right green button"><i class="left save icon"></i>Simpan</div></a>
  <a href="lihat_jadwal_praktek.php"><div class="ui right red button"><i class="left trash icon"></i>Batal</div></a>
</div>
</form>
  <br><br>
  
  </div>
    <?php
         include "../../wrapper/footer.php"
    ?>
</body>
<footer>
</footer>
</html>