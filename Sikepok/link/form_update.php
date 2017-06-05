<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>Super Admin Sikepok</title>
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
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
              //alert(data);
            $scope.inform = data;
            console.log(data);
          });  
        }
        function displayDataTelp (){  
          $http.get("db/form_updateShowTelp.php").success(function(data2){
            $scope.inform2 = data2;
            //alert(data2);
            console.log(data2);
          });  
        }
        function displayDataFoto (){  
          $http.get("db/form_updateShowFoto.php").success(function(data2){
            $scope.inform3 = data2;
            //alert(data2);
            console.log(data2);
          });  
        }
        $scope.UpdateForm = function(ts, telp1, telp2){
        $http.post('db/form_updateAct.php', {'id':ts.id_tempat_sehat,'nama':ts.nama_tempat_sehat,'alamat':ts.alamat_tempat_sehat,'kecamatan':ts.kecamatan_tempat_sehat,'koordinat':ts.koordinat_tempat_sehat, 'operasional':ts.operasional_tempat_sehat, 'keterangan':ts.keterangan_tempat_sehat, 'telp1':telp1, 'telp2':telp2}).success(function(data){
            console.log(data);
            window.location.href = 'index.php';
          });
        }
        $scope.submitFoto = function() {

        var files1 = $scope.myFile;
        var files2 = $scope.myFile2;
        var files3 = $scope.myFile3;

        var form_data = new FormData();  
        form_data.append('file1', files1);
        form_data.append('file2', files2);
        form_data.append('file3', files3);
        $http.post("db/form_updateActFoto.php", form_data,{
        transformRequest: angular.identity,  
              headers: {'Content-Type': undefined,'Process-Data': false}
        })
        .success(function(data) {
          alert(data);
          console.log(data);
          window.location.href = 'index.php';
        });
      };
        displayDataFoto();
        displayDataTelp();
        displayData();
    });

</script>
    <?php
    include "../../wrapper/header.php";
    // session_start();
    // $id=$_SESSION["id"];
    ?>
    
  <body ng-init="displayData()">
  <div id="one-page" class="ui one column stackable center aligned page grid">

  <div class="column fourteen wide">
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="active item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="item" data-tab="definition">Lihat Data</a>
  </div><br>
  
  <button class="ui left labeled icon orange button" onclick="window.location='index.php'" style="float:left;">
      Kembali
      <i class="left arrow icon"></i>
      </button>

  <h1 class="ui header" style="padding-top:40px">Ubah Data Usaha Kesehatan</h1><br>
  <form class="ui column form" style="text-align: justify;" name="userForm">
  <div class="ui segment" style="padding:40px">
  <h4 class="ui dividing header">Detail Usaha</h4>

  <div class="field">
    <label>Jenis</label>
    <input class="ui fluid dropdown" ng-model="inform[0].nama_jenis" disabled>
    </input>
  </div>

  <div class="field">
    <label>ID</label>
    <input type="text" name="Id" ng-model="inform[0].id_tempat_sehat" disabled>
  </div>

  <div class="field">
    <label>Nama Usaha</label>
    <input type="text" name="Nama_Usaha" ng-model="inform[0].nama_tempat_sehat">
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <input type="text" name="Alamat" ng-model="inform[0].alamat_tempat_sehat">
    </div>
    <div class="two fields">
      <div class="field">
        <input type="text" name="Kecamatan" ng-model="inform[0].kecamatan_tempat_sehat" >
      </div>
      <div class="field">
        <input type="text" name="Koordinat" ng-model="inform[0].koordinat_tempat_sehat" >
      </div>
    </div>
  </div>

  <div class="field">
  <label>Waktu Operasional</label>
  <div class="field">
    <input type="text" name="Operasional" ng-model="inform[0].operasional_tempat_sehat">
  </div>
  </div>

  <div class="field">
  <label>No Telepon</label>
  <div class="field">
    <input type="text" placeholder="Nomor" ng-model="inform2[0].no_telp_tempat_sehat">
  </div>
  <div class="field">
    <input type="text" placeholder="Nomor" ng-model="inform2[1].no_telp_tempat_sehat">
  </div>
  </div>

  <div class="field">
    <label>Keterangan</label>
    <textarea rows="2" name="Keterangan" ng-model="inform[0].keterangan_tempat_sehat" ></textarea>
  </div><br>
  
  <button type="submit" ng-click="UpdateForm(inform[0], inform2[0].no_telp_tempat_sehat, inform2[1].no_telp_tempat_sehat)" class="ui green button">Simpan</button>
</div>
</form>


<form class="ui column form" style="text-align: justify;" name="userForm">
  <div class="ui segment" style="padding:40px">
  <h4 class="ui dividing header">Ubah Foto</h4>
  <div class="three fields">
  <div class="field">
    <div class="ui small image">
    {{inform3[0].foto_tempat_sehat}}
    <img ng-src="../../../assets/images/photos/sikepok/sikepok3/{{inform3[0].foto_tempat_sehat}}" alt="" class="img-responsive">
    </div>
    <input type="file" file-model="myFile" >
  </div>

  <div class="field">
    <div class="ui small image">
    {{inform3[1].foto_tempat_sehat}}
    <img ng-src="../../../assets/images/photos/sikepok/sikepok3/{{inform3[1].foto_tempat_sehat}}" alt="" class ="img-responsive">
    </div>
    <input type="file" file-model="myFile2" >
  </div>

  <div class="field">
    <div class="ui small image">
    {{inform3[2].foto_tempat_sehat}}
    <img ng-src="../../../assets/images/photos/sikepok/sikepok3/{{inform3[2].foto_tempat_sehat}}" alt="" class ="img-responsive">
    </div>
    <input type="file" file-model="myFile3" >
  </div>
  </div>

  <button type="submit" ng-click="submitFoto()" class="ui green button">Simpan</button>
  </div>
</form>

</div>
</div>
<br><br><br>
  <?php
       include "../../wrapper/footer.php"
  ?>
  </body>
<footer>
</footer>
</html>