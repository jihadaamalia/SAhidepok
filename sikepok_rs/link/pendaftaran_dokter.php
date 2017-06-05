<?php  session_start(); ?>
<html>
  <head>
    <title>SiKepok ADMIN</title>
    <?php
         include "../../wrapper/header.php"
    ?>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {

        $scope.submitForm = function() {
        $http.post("db/insert_dokter.php", {
          'Nama_Dokter':$scope.Nama_Dokter, //ng-model = kanan
          'Alamat':$scope.Alamat,
          'Telp':$scope.No_Telp,
          'Email':$scope.Email,
          'Spesialisasi':$scope.Spesialisasi,
          'Senin':$scope.Senin,
          'Selasa':$scope.Selasa,
          'Rabu':$scope.Rabu,
          'Kamis':$scope.Kamis,
          'Jumat':$scope.Jumat,
          'Sabtu':$scope.Sabtu,
          'Minggu':$scope.Minggu,
          'Keterangan':$scope.Keterangan
          })
          .success(function(data) {
              alert(data);
              window.location.href = 'Pendaftaran_fasilitas.php';
          });
        };

        $scope.tambahForm = function() {
        $http.post("db/insert_dokter.php", {
          'Nama_Dokter':$scope.Nama_Dokter, //ng-model = kanan
          'Alamat':$scope.Alamat,
          'Telp':$scope.No_Telp,
          'Email':$scope.Email,
          'Spesialisasi':$scope.Spesialisasi,
          'Senin':$scope.Senin,
          'Selasa':$scope.Selasa,
          'Rabu':$scope.Rabu,
          'Kamis':$scope.Kamis,
          'Jumat':$scope.Jumat,
          'Sabtu':$scope.Sabtu,
          'Minggu':$scope.Minggu,
          'Keterangan':$scope.Keterangan
          })
          .success(function(data) {
              alert(data);
              window.location.href = 'pendaftaran_dokter.php';
          });
        };
    });
</script>
    
  </head>
  <body  ng-app="postApp" ng-controller="postController">
  <div id = "one-page" class="ui text container">
  <h1 class="ui header" >
  <i class="left edit icon"></i>
  Pendaftaran Dokter</h1><br>

  <!-- <select class="ui dropdown" style="margin-bottom: 10px">
  <option value="">Tentukan Jumlah Form</option>
  <option value="1">1</option>
  <option value="0">2</option>
  <option value="0">3</option>
</select> -->

  <form class="ui column form" style="text-align: justify;">
  <div class="ui segment">

  <div class="field">
    <label>Nama Dokter</label>
        <input type="text" name="Nama_Dokter" placeholder="Nama Dokter" ng-model = "Nama_Dokter">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" placeholder="Alamat" ng-model = "Alamat">
    </div>
  </div>

<div class="two fields">
  <div class="field">
  <label>No Telepon</label>
    <div class="field">
      <input type="text" name="telp" placeholder="ex:0888123465**" ng-model = "No_Telp">
    </div>
  </div>
  <div class="field">
    <label>E-mail </label>
      <div class="field">
        <input type="text" name="telp" placeholder="ex:0888123465**" ng-model = "Email">
      </div>
    </div>
  </div>

  <div class="field">
    <label>Spesialisasi </label>
      <div class="field">
        <input type="text" name="Spesialisasi" placeholder="ex:0888123465**" ng-model = "Spesialisasi">
      </div>
    </div>
  </div>

  <div class="field">
  <label>Jadwal Praktek</label>

    <div class="ui aligned stackable grid container">
    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Senin
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Senin " placeholder="Jam Praktek" ng-model = "Senin">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Selasa
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Selasa" placeholder="Jam Praktek" ng-model = "Selasa">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Rabu
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Rabu" placeholder="Jam Praktek" ng-model =  "Rabu">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Kamis
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Kamis" placeholder="Jam Praktek" ng-model = "Kamis">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Jum'at
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Jumat" placeholder="Jam Praktek" ng-model = "Jumat">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Sabtu
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Sabtu" placeholder="Jam Praktek" ng-model = "Sabtu">
      </div>
    </div>

    <div class="row" >
      <div class="three wide column" style="padding:0px">
        Minggu
      </div>
      <div class="thirteen wide column" style="padding:0em 1em ">
        <input type="text" name="Minggu" placeholder="Jam Praktek" ng-model = "Minggu">
      </div>
    </div>
    </div>

    <div class="field">
    <label>Deskripsi</label>
    <textarea rows="2" name="Keterangan" placeholder="Tuliskan penjelasan tentang rumah sakit" ng-model = "Keterangan"></textarea>
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
 <button type="submit" ng-click = "tambahForm()" class="ui right green button"><i class="plus chevron icon"></i>Tambah Dokter</button>
  <button type="submit" ng-click = "submitForm()" class="ui right blue button">Selanjutnya<i class="right chevron icon"></i></button>
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