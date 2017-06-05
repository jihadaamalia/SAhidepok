<!DOCTYPE html>
<html>
<head>
  <title>Super Admin Sikepok</title>
  <?php
         include "../../wrapper/header.php"
      ?>

    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <script>

    var postApp = angular.module('postApp', []);
	postApp.directive('fileModel', ['$parse', function ($parse) {
            return {
                restrict: 'A',
                link: function (scope, element, attrs) {
                    var model = $parse(attrs.fileModel);
                    var modelSetter = model.assign;
                    element.bind('change', function () {
                        scope.$apply(function () {
                            modelSetter(scope, element[0].files[0]);
                        });
                    });
                }
            };
        }]);
    postApp.controller('postController', function($scope, $http) {
		$scope.submitPhoto = function() {
			var files = $scope.myFile;
			var form_data = new FormData();  
            form_data.append('file', files);
			$http.post("db/form_insertPhoto.php", form_data,{
			transformRequest: angular.identity,  
            headers: {'Content-Type': undefined,'Process-Data': false}
			})
			.success(function(data) {
				window.location.href = 'index.php';
			});
		};
		
        $scope.submitForm = function() {
        $http.post("db/form_daftarAct.php", {
          'Jenis':$scope.Jenis,
          'Nama_Usaha':$scope.Nama_Usaha,
          'Alamat':$scope.Alamat,
          'Kecamatan':$scope.Kecamatan,
          'Koordinat':$scope.Koordinat,
          'Operasional':$scope.Operasional,
          'Keterangan':$scope.Keterangan,
          'Telp1':$scope.Telp1,
          'Telp2':$scope.Telp2
          })
          .success(function(data) {
			   $scope.submitPhoto();
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
  <h1 class="ui header" style="padding-top:40px">Pendaftaran Usaha Kesehatan</h1><br>

  <!-- FORM -->
  <form class="ui column form" style="text-align: justify;" name="userForm" >
  <div class="ui segment" >  
  <h4 class="ui dividing header">Detail Usaha</h4>
  <div class="field">
    <label>Jenis</label>
    <select class="ui fluid dropdown" placeholder ="Jenis Usaha" name="Jenis" ng-model="Jenis" >
      <option value="1">Apotek</option>
      <option value="2">Klinik</option>
      <option value="3">Puskesmas</option>
      <option value="4">Bidan</option>
      <option value="5">Tukang Urut</option>
      <option value="6">Khitan</option>
    </select>
  </div>
  
  <div class="field">
    <label>Nama Usaha</label>
    <input type="text" name="Nama_Usaha" ng-model="Nama_Usaha" placeholder="contoh: Apotek Rezeki">
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
      <input type="text" name="Telp1" ng-model="Telp1" placeholder="Nomor Kesatu">
    </div>
    <div class="field">
      <input type="text" name="Telp2" ng-model="Telp2" placeholder="Nomor Kedua">
    </div>
  </div>
  </div>


  <div class="field">
  <label>Waktu Operasional</label>
    <div class="field">
      <input type="text" name="Operasional" ng-model="Operasional" placeholder="Senin-Jumat, 08.00-23.00">
    </div>
  </div>

  <div class="field">
    <label>Keterangan</label>
    <textarea rows="2" name="Keterangan" ng-model="Keterangan" placeholder="Sebutkan spesialisasi/keahlian khusus dari penyedia jasa. Contoh: Spesialis patah tulang dan kesalahan pada otot"></textarea>
  </div>

  <div class="field">
    <label>Unggah Foto</label>
    <input type="file" file-model="myFile" multiple>
  </div>

  <button type="submit" ng-click="submitForm()" class="ui green button">Submit</button>
  </div>
</div>
  </form>

</div>
</div>
<?php
       include "../../wrapper/footer.php"
?>
</body>
</html>