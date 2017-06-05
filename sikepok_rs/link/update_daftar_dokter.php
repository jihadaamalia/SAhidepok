<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>SiKepok ADMIN</title>
    <?php
         include "../../wrapper/header.php";
    ?>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <!-- <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script> -->
    <script >
    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) { 

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_update_dokter.php").success(function(data){
            // alert(data);
            $scope.inform = data;  
          });  
        }

        $scope.UpdateForm = function(dr){
        $http.post('db/action_update_dokter.php',{
          'id':dr.id_dokter,
          'nama':dr.nama_dokter,
          'alamat':dr.alamat_dokter,
          'no_telp':dr.no_telp_dokter,
          'spesialisasi':dr.spesialisasi,
          'email':dr.email_dokter,
          'keterangan':dr.deskripsi_dokter
        }).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'lihat_daftar_dokter.php';
          });
        }
        });  
    </script>
  </head>

  <body ng-init="displayData()">
  <div id = "one-page" class="ui text container" >
  <h1 class="ui header">
  <i class="left settings icon"></i>
  Ubah Data Dokter</h1><br>
  <form class="ui column form" style="text-align: justify;" ng-repeat = "dr in inform">
  <div class="ui segment">

  <div class="field">
    <label>ID Dokter</label>
        <input type="text" name="ID_Dokter" ng-model="dr.id_dokter" disabled>
  </div>

  <div class="field">
    <label>Nama Dokter</label>
        <input type="text" name="Nama_Dokter" ng-model="dr.nama_dokter">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" ng-model="dr.alamat_dokter">
    </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
    <div class="field">
      <input type="text" name="Telp" ng-model="dr.no_telp_dokter">
    </div>
  </div>

  <div class="field">
  <label>Spesialisasi</label>
    <div class="field">
      <input type="text" name="Spesialisasi" ng-model="dr.spesialisasi">
    </div>
  </div>

  <div class="field">
  <label>E-mail </label>
    <div class="field">
      <input type="text" name="Email" ng-model="dr.email_dokter">
    </div>
  </div>

  <div class="field">
    <label>Deskripsi</label>
    <textarea rows="2" name="Keterangan" ng-model = "dr.deskripsi_dokter"></textarea>
  </div>
  
  <div class="field">
    <label>Unggah Foto</label>
    <div class="field">
    <div class="ui action input">
        <input type="text" id="_attachmentName" ng-model="dr.foto_dokter">
        <label for="attachmentName" class="ui icon button btn-file">
             <i class="attach icon"></i>
             <input type="file" id="attachmentName" name="attachmentName" ng-model="dr.foto_dokter" style="display: none">
        </label>
    </div>
    </div>
  </div> 
  
  <button type="submit" ng-click = "UpdateForm(dr)" class="ui right green button"><i class="left save icon"></i>Simpan</button>
  <a href="lihat_daftar_dokter.php"><div class="ui right red button"><i class="left trash icon"></i>Batal</div></a>
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