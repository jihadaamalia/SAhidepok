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
        $http.post("db/insert_fasilitas.php", {
          'Nama_Fasilitas':$scope.Nama_Fasilitas, //ng-model = kanan
          'Keterangan':$scope.Keterangan
          })
          .success(function(data) {
              alert(data);
              window.location.href = 'index.php';
          });
        };

        $scope.tambahForm = function() {
        $http.post("db/insert_fasilitas.php", {
          'Nama_Fasilitas':$scope.Nama_Fasilitas, //ng-model = kanan
          'Keterangan':$scope.Keterangan
          })
          .success(function(data) {
              alert(data);
              window.location.href = 'pendaftaran_fasilitas.php';
          });
        };
    });
</script>
    
  </head>
  <body  ng-app="postApp" ng-controller="postController">
  <div id = "one-page" class="ui text container">

  <h1 class="ui header"> 
  <i class="left edit icon"></i>
  Data Fasilitas</h1><br>
  <form class="ui column form" style="text-align: justify;">
  <div class="ui segment">

  <div class="field">
    <label>Nama Fasilitas</label>
        <input type="text" name="Nama_Fasilitas" placeholder="Nama Failitas" ng-model = "Nama_Fasilitas">
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
  <a href="pendaftaran_dokter.php"><div class="ui right blue button"><i class="left chevron icon"></i>Sebelumnya</div></a>
  <button type="submit" ng-click = "tambahForm()" class="ui right green button"><i class="plus chevron icon"></i>Simpan & Tambah Fasilitas</button>
  <button type="submit" ng-click = "submitForm()" class="ui right blue button">Simpan<i class="right chevron icon"></i></button>
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