<!-- <?php session_start() ?> -->
<html  ng-app="postApp" ng-controller="postController" >
  <head>
    <title>SiKepok ADMIN</title>
    <?php
         include "../../wrapper/header.php"
    ?>

    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 
    <!-- <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script> -->
    <script >
    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) { 

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_update_fasilitas.php").success(function(data){
            // alert(data);
            $scope.inform = data;  
          });  
        }

        $scope.UpdateForm = function(dr){
        $http.post('db/action_update_fasilitas.php',{
          'id':dr.id_fasilitas,
          'nama':dr.nama_fasilitas,
          'keterangan':dr.deskripsi_fasilitas
        }).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'lihat_fasilitas_rs.php';
          });
        }
        });  
    </script>

  </head>
  
 <body ng-init="displayData()">
  <div id = "one-page" class="ui text container">

  <h1 class="ui header">
  <i class="left settings icon"></i>
  Ubah Data Fasilitas</h1><br>
  <form class="ui column form" style="text-align: justify;" ng-repeat = "dr in inform">
  <div class="ui segment">

  <div class="field">
    <label>ID Fasilitas</label>
        <input type="text" name="Id_Fasilitas" ng-model="dr.id_fasilitas" disabled>
  </div>

  <div class="field">
    <label>Nama Fasilitas</label>
        <input type="text" name="Nama_Fasilitas" placeholder="Nama Fasilitas" ng-model = "dr.nama_fasilitas">
  </div>

  <div class="field">
    <label>Deskripsi</label>
    <textarea rows="2" name="Keterangan" placeholder="Tuliskan penjelasan tentang rumah sakit" ng-model= "dr.deskripsi_fasilitas"></textarea>
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
  
  <button type="submit" ng-click = "UpdateForm(dr)" class="ui right green button"><i class="left save icon"></i>Simpan</button>
  <a href="lihat_fasilitas_rs.php"><div class="ui right red button"><i class="left trash icon"></i>Batal</div></a>
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