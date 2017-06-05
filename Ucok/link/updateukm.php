<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>Ucok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
            alert(data.id_ukm);
            $scope.inform = data;
          });  
        }

        $scope.UpdateForm = function(si){
        $http.post('db/form_updateAct.php',{'id':si.id_ukm,'nama':si.nama_ukm, 'namaOwner':si.nama_owner_ukm,'alamat':si.alamat_ukm,'kecamatan':si.kecamatan,'koordinat':si.koordinat_ukm, 'deskripsi':si.deskripsi_ukm}).success(function(data){
            alert(data);
            window.location.href = 'index.php';
          });
        }

    });

</script>
    <?php
    require_once 'db/connect.php';
    include "../../wrapper/header.php";
    session_start();
    $id=$_SESSION["id"];
    ?>
    
  <body ng-init="displayData()">
  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="updateukm.php" class="item active" data-tab="definition">Edit Data Usaha</a>
    <a href="index.php" class="item" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header" style="padding-top:40px">Edit Data Usaha</h1><br>
  <form class="ui column form" style="text-align: justify;" name="userForm" ng-repeat="si in inform">
  <div class="ui segment">
  <h4 class="ui dividing header">Form Sistem Informasi UMKM Kota Depok</h4>


  <div class="field">
    <label>ID</label>
    <input type="text" name="Id" ng-model="si.id_ukm" disabled>
  </div>

  <div class="field">
    <label>Nama UMKM</label>
        <input type="text" name="namaUKM" placeholder="contoh: Nadiah's Cake" ng-model="si.nama_ukm">
  </div>

  <div class="field">
    <label>Nama Pemilik Usaha</label>
        <input type="text" name="namaOwner" placeholder="contoh: Ibu Nadiah" ng-model="si.nama_owner_ukm">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" placeholder="Alamat" ng-model="si.alamat_ukm">
    </div>
    <div class="two fields">
      <div class="field">
        <input type="text" name="Kecamatan" ng-model="si.kecamatan" placeholder="Kecamatan">
      </div>
      <div class="field">
        <input type="text" name="Koordinat" ng-model="si.koordinat_ukm" placeholder="Koordinat">
      </div>
    </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
  <?php
    $telpukm = mysqli_query($connect,"SELECT * FROM ukm_notlp WHERE id_ukm='$id'");
    $telp = 1;
    
    while($col2=mysqli_fetch_array($telpukm)){
    ?>
  <div class="field">
    <input type="text" name="telp<?php echo $telp ?>" placeholder="Nomor <?php echo $telp ?>" value="<?php echo $col2['notelp']?>">
  </div>
  <?php
    $telp=$telp + 1;
  }

  ?>
  </div>


  <div class="field">
    <label>Deskripsi UMKM</label>
    <textarea rows="2" name="Keterangan" placeholder="Contoh: Nadiah's Cake menjual aneka kue ulangtahun." ng-model="si.deskripsi_ukm"></textarea>
  </div> 
  
 <button type="submit" ng-click="UpdateForm(si)" class="ui green button">Submit</button>
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