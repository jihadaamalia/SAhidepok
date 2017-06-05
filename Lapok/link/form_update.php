<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>Lapok</title>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
            alert(data.id_partner);
            $scope.inform = data;
          });  
        }

        $scope.UpdateForm = function(ts){
        $http.post('db/form_updateAct.php',{'id':ts.id_partner,'nama_instansi':ts.nama_instansi_partner,'uname':ts.username_partner,'nama_partner':ts.nama_partner,'email':ts.email_partner, 'notlp':ts.no_telp_partner, 'no_identitas':ts.identitas_partner, 'tglgabung':ts.tanggal_gabung_partner, 'status':ts.status_partner, 'foto':ts.foto_partner}).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'index.php';
          });
        }

    });

</script>
    <?php
    require_once '../../../include/config.php';
 
    include "../../wrapper/header.php";
    session_start();
    $id=$_SESSION["id"];
    ?>
    
  <body ng-init="displayData()">
  <div id="one-page" class="ui one column stackable center aligned page grid">

  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="active item" data-tab="definition">Lihat Data</a>
  </div>

  <button class="ui orange button" style="margin: 3em 0em 0em;" onclick="window.location='index.php'"> <i class="left arrow icon"></i> Kembali
  </button>

  <h1 class="ui header">Ubah Data Partner</h1><br>
  <form class="ui column form" style="text-align: justify;" name="userForm" ng-repeat="ts in inform">
  <div class="ui segment" >
  <h4 class="ui dividing header">Detail Partner</h4>

  <div class="field">
    <label>ID</label>
    <input type="text" name="id_partner" ng-model="ts.id_partner" disabled> 
  </div>

  <div class="field">
    <label>Nama Instansi</label>
    <input type="text" name="nama_instansi_partner" ng-model="ts.nama_instansi_partner">
  </div>

  <div class="field">
    <label>Username Partner</label>
    <input type="text" name="username_partner" ng-model="ts.username_partner">
  </div>

  <div class="field">
    <label>Nama Partner</label>
    <input type="text" name="nama_partner" ng-model="ts.nama_partner">
  </div>

  <div class="field">
    <label>E-mail</label>
    <input type="text" name="email_partner" ng-model="ts.email_partner">
  </div>

  <div class="field">
    <label>No. Telepon</label>
    <input type="text" name="no_telp_partner" ng-model="ts.no_telp_partner">
  </div>

  <div class="field">
    <label>No. Identitas</label>
    <input type="text" name="identitas_partner" ng-model="ts.identitas_partner">
  </div>

  <div class="field">
  <label>Tanggal Gabung</label>
    <input type="text" name="tanggal_gabung_partner" ng-model="ts.tanggal_gabung_partner" disabled>
  </div>

  <div class="field">
  <label>Status</label>
    <input type="text" name="status_partner" ng-model="ts.status_partner" disabled>
  </div>
  
  
  <div class="field">
    <label>Unggah Foto</label>
    <?php
    $fotopartner = mysqli_query($koneksi,"SELECT * FROM partner WHERE foto_partner='$id'");
    $foto = 1;
    
    while($col1=mysqli_fetch_array($fotopartner)){
    ?>
    <div class="field">
    <div class="ui action input">
        <input type="text" id="attachmentName" value="<?php echo $col1['foto_partner']?>">
        <label for="attachmentName" class="ui icon button btn-file">
             <i class="attach icon"></i>
             <input type="file" id="attachmentName" name="attachmentName<?php echo $foto ?>" style="display: none" >
        </label>
    </div>
    </div>

    <?php
    $foto=$foto+1;
    }    
    ?> 
        
  </div> 
  
  <button type="submit" ng-click="UpdateForm(ts)" class="ui green button">Submit</button>
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