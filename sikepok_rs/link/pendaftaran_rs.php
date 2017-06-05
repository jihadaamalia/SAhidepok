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
        $http.post("db/insert_rs.php", {
          'Nama_Rumah_sakit':$scope.Nama_Rumah_Sakit, //ng-model = kanan
          'Alamat':$scope.Alamat,
          'Kecamatan':$scope.Kecamatan,
          'Koordinat_Latitude':$scope.Koordinat_Latitude,
          'Koordinat_Longitude':$scope.Koordinat_Longitude,
          'Telp':$scope.Telp,
          'Website':$scope.Website,
          'Email':$scope.Email,
          'Keterangan':$scope.Keterangan
          })
          .success(function(data) {
              alert(data);
              window.location.href = 'Pendaftaran_dokter.php';
          });
        };
    });
</script>
  </head>
<body ng-app="postApp" ng-controller="postController">
  <div id = "one-page" class="ui text container">
  <h1 class="ui header">
  <i class="left edit icon"></i>
  Pendaftaran Rumah Sakit</h1><br>
  <form class="ui column form" style="text-align: justify;" name="RSForm">
  <div class="ui segment">

  <div class="field">
    <label>Nama Rumah Sakit</label>
        <input type="text" name="Nama_Rumah_Sakit" placeholder="contoh: Rumah Sakit Umum Depok (RSUD)" ng-model = "Nama_Rumah_Sakit">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" placeholder="Alamat" ng-model = "Alamat">
    </div>
    <div class="three fields">
      <div class="field">
        <input type="text" name="Kecamatan" placeholder="Kecamatan" ng-model = "Kecamatan">
      </div>
      <div class="field">
        <input type="text" name="Koordinat_Latitude" placeholder="Koordinat Latitude" ng-model = "Koordinat_Latitude">
      </div>
      <div class="field">
        <input type="text" name="Koordinat_Longitude" placeholder="Koordinat Longitude" ng-model = "Koordinat_Longitude">
      </div>
    </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
    <div class="field">
      <input type="text" name="Telp" placeholder="ex:0888123465**" ng-model = "Telp">
    </div>
  </div>

  <div class="two fields">
    <div class="field">
    <label>Website</label>
      <div class="field">
        <input type="text" name="Website" placeholder="ex:www.example.com" ng-model = "Website">
      </div>
    </div>

    <div class="field">
    <label>E-mail </label>
      <div class="field">
        <input type="text" name="Email" placeholder="ex:example@gmail.com" ng-model = "Email">
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
  <button type="submit" ng-click="submitForm()" class="ui right blue button">Selanjutnya <i class="right chevron icon"></i></button>
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