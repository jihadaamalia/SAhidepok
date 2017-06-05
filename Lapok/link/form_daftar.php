<!DOCTYPE html>
<html>
<head>
  <title>Lapok</title>
  <?php
         include "../../wrapper/header.php"
      ?>

    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {

        $scope.submitForm = function() {
        $http.post("db/form_daftarAct.php", {
          'username':$scope.username,
          'password':$scope.password,
          'nama_partner':$scope.nama_partner,
          'no_telp':$scope.no_telp,
          'email':$scope.email,
          'foto':$scope.foto,
          'identitas_part':$scope.identitas_part,
          'nama_instansi':$scope.nama_instansi,
          'tanggal_gabung':$scope.tanggal_gabung
          })
          .success(function(data) {
              alert("Data telah ditambahkan");
              window.location.href = 'index.php';
          });
        };
    });
</script>
</head>

<body ng-app="postApp" ng-controller="postController">

  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="active item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="item" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header" style="padding-top:40px">Pendaftaran Partner Lapok</h1><br>

  <form class="ui column form" style="text-align: justify;" name="userForm">
  <div class="ui segment">
  <h4 class="ui dividing header">Data Diri Partner</h4>

  <div class="field">
    <label>Username</label>
    <input type="text" name="username_partner" ng-model="username" placeholder="Username Partner">
  </div>

  <div class="field">
    <label>Password</label>
    <input type="password" name="password" ng-model="password" placeholder="Password Partner">
  </div>

  <div class="field">
    <label>Nama Partner</label>
    <input type="text" name="nama_partner" ng-model="nama_partner" placeholder="contoh: Citra Chergia">
  </div>

  <div class="field">
    <label>No Telepon</label>
    <input type="email" name="no_telp" ng-model="no_telp" placeholder="Nomor Telepon">
  </div>

  <div class="field">
    <label>Email</label>
    <input type="email" name="email" ng-model="email" placeholder="Email Partner">
  </div>

  <div class="field">
    <label>No. Identitas</label>
    <input type="text" name="nama_instansi" ng-model="identitas_part"  placeholder="Nomor Identitas">
  </div>

  <div class="field">
    <label>Nama Instansi</label>
    <input type="text" name="nama_instansi" ng-model="nama_instansi"  placeholder="Nama Instansi">
  </div>

  <div class="field">
    <label>Tanggal Gabung</label>
    <input type="date" name="nama_instansi" ng-model="tanggal_gabung"  placeholder="Nama Instansi">
  </div>
  
  <div class="field">
    <label>Unggah Foto</label>
    <div class="field">
    <div class="ui action input">
        <input type="text" id="_attachmentName" ng-model="foto">
        <label for="attachmentName" class="ui icon button btn-file">
             <i class="attach icon"></i>
             <input type="file" id="attachmentName" name="attachmentName" style="display: none">
        </label>
    </div>
    </div>
 </div> 
  
  <button type="submit" class="ui green button" ng-click="submitForm()">Daftar</button>
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