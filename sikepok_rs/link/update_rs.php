<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>SiKepok ADMIN</title>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
    <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/query_info.php").success(function(data){
            // alert(data.id_rs);
            $scope.inform = data;
          });  
        }

        $scope.UpdateForm = function(rs){
        $http.post('db/action_update_info.php',{
          'id':rs.id_rs,
          'nama':rs.nama_rs,
          'alamat':rs.alamat_rs,
          'kecamatan':rs.kecamatan_rs,
          'koordinat_latitude_rs':rs.koordinat_latitude_rs,
          'koordinat_longitude_rs':rs.koordinat_longitude_rs,
          'no_telp':rs.no_telp_rs,
          'website':rs.website_rs,
          'email':rs.email_rs,
          'keterangan':rs.deskripsi_rs
        }).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'index.php';
          });
        }

    });

</script>
    <?php
         include "../../wrapper/header.php";
    ?>

  </head>
  <body ng-init="displayData()">
  <div id = "one-page" class="ui text container">
  <h1 class="ui header"> 
  <i class="left settings icon"></i>
  Ubah Data Informasi Rumah Sakit</h1><br>
  <form class="ui column form" style="text-align: justify;" ng-repeat="rs in inform">
  <div class="ui segment">

  <div class="field">
    <label>ID</label>
    <input type="text" name="Id" ng-model="rs.id_rs" disabled>
  </div>

  <div class="field">
    <label>Nama Rumah Sakit</label>
        <input type="text" name="Nama_Rumah_Sakit" ng-model="rs.nama_rs">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" placeholder="Alamat" ng-model = "rs.alamat_rs">
    </div>
    <div class="three fields">
      <div class="field">
        <input type="text" name="Kecamatan" placeholder="Kecamatan" ng-model = "rs.kecamatan_rs">
      </div>
      <div class="field">
        <input type="text" name="Koordinat_Latitude" placeholder="Koordinat Latitude" ng-model = "rs.koordinat_latitude_rs">
      </div>
      <div class="field">
        <input type="text" name="Koordinat_Longitude" placeholder="Koordinat Longitude" ng-model = "rs.koordinat_longitude_rs">
      </div>
    </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
    <div class="field">
      <input type="text" name="Telp" ng-model = "rs.no_telp_rs">
    </div>
  </div>

  <div class="field">
  <label>Website</label>
    <div class="field">
      <input type="text" name="Web" ng-model = "rs.website_rs">
    </div>
  </div>

  <div class="field">
  <label>E-mail </label>
    <div class="field">
      <input type="text" name="Email" ng-model = "rs.email_rs">
    </div>
  </div>

  <div class="field">
    <label>Deskripsi</label>
    <textarea rows="2" name="Keterangan" ng-model = "rs.deskripsi_rs"></textarea>
  </div>
  
  <div class="field">
    <label>Unggah Foto</label>
    <div class="field">
    <div class="ui action input">
        <input type="text" id="_attachmentName" ng-model = "rs.foto_rs">
        <label for="attachmentName" class="ui icon button btn-file">
             <i class="attach icon"></i>
             <input type="file" id="attachmentName" name="attachmentName" style="display: none">
        </label>
    </div>
    </div>
  </div> 
  <button type="submit" ng-click = "UpdateForm(rs)" class="ui right green button"><i class="left save icon"></i>Simpan</button></a>
  <a href="lihat_profil_rs.php"><div class="ui right red button"><i class="left trash icon"></i>Batal</div></a>
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