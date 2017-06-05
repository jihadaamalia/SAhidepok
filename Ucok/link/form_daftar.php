<html ng-app="postApp" ng-controller="postController">
<?php
session_start();
?>
  <head>
    <title>Ucok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <?php
         include "../../wrapper/header.php"
      ?>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {

        $scope.submitForm = function(info) {
        $http.post("db/form_daftarAct.php", {
          'Kategori':$scope.Kategori,
          'NamaUMKM':$scope.NamaUMKM,
          'NamaOwner':$scope.NamaOwner,
          'Alamat':$scope.Alamat,
          'Kecamatan':$scope.Kecamatan,
          'Koordinat':$scope.Koordinat,
          'Deskripsi':$scope.Deskripsi,
          'Telp1':$scope.Telp1,
          'Telp2':$scope.Telp2
          })
          .success(function(data) {
              alert("Data telah ditambahkan");
               window.location.href = 'index.php';
          });
        };
    });
</script>
  </head>
<body>
  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="active item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="item" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header" style="padding-top:40px">Pendaftaran UMKM</h1><br>
  <form class="ui column form" style="text-align: justify;">
  <div class="ui segment">
  <h4 class="ui dividing header">Form Sistem Informasi UMKM Kota Depok</h4>

  <div class="field">
    <label>Nama UMKM</label>
        <input type="text" name="NamaUMKM" placeholder="contoh: Nadiah's Cake" ng-model="NamaUMKM">
  </div>

  <div class="field">
    <label>Nama Pemilik Usaha</label>
        <input type="text" name="NamaOwner" placeholder="contoh: Ibu Nadiah" ng-model="NamaOwner">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" placeholder="Alamat" ng-model="Alamat">
    </div>
    <div class="two fields">
      <div class="field">
        <input type="text" name="Kecamatan" ng-model="Kecamatan" placeholder="Kecamatan">
      </div>
      <div class="field">
        <input type="text" name="Koordinat" ng-model="Koordinat" placeholder="Koordinat">
      </div>
    </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
  <div class="two fields">
    <div class="field">
      <input type="text" name="Telp1" placeholder="Nomor Kesatu" ng-model="Telp1">
    </div>
    <div class="field">
      <input type="text" name="Telp2" placeholder="Nomor Kedua" ng-model="Telp2">
    </div>
  </div>
  </div>

  <div class="field">
    <label>Deskripsi UMKM</label>
    <textarea rows="2" name="Deskripsi" placeholder="Contoh: Nadiah's Cake menjual aneka kue ulangtahun." ng-model="Deskripsi"></textarea>
  </div>
  
   <div class="field">
    <label>Unggah Foto</label>
    <input type="file" name="foto">
  </div>

  <button type="submit" ng-click="submitForm()" class="ui green button">Submit</button>
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