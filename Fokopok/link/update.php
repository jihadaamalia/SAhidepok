<html ng-app="postApp" ng-controller="postController">
  <head>
    <title>Fokopok</title>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
     <script>

    var postApp = angular.module('postApp', []);

    postApp.controller('postController', function($scope, $http) {
      displayData();
        function displayData (){  
          $http.get("db/form_updateShow.php").success(function(data){
            $scope.inform = data;
          });  
        }

        $scope.UpdateForm = function(ts){
        $http.post('db/form_updateAct.php',{'id':ts.id_komunitas,'nama':ts.nama_komunitas,'email':ts.email_komunitas, 'kategori':ts.kategori_komunitas, 'alamat':ts.alamat_komunitas, 'deskripsi':ts.deskripsi_komunitas, 'foto':ts.foto_komunitas}).success(function(data){
            alert("Data telah diubah");
            window.location.href = 'index.php';
          });
        }

    });

</script>
    <?php
         session_start();
        $id=$_SESSION["id"];
         require_once '../../../include/config.php';
         include "../../wrapper/header.php";
        ?>

  </head>

  <body ng-init="displayData()">
  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">

   <button class="ui right labeled icon orange button left floated" onclick="window.location='lihatdata.php'">
    Kembali
    <i class="left arrow icon"></i>
    </button>
    <h1 style="font-style:italic">Ubah Data Komunitas</h1> 
    <br>
    <form class="ui column form" style="text-align: justify;" name="userForm" ng-repeat="ts in inform" >
  
    <div class="ui segment">
    <div class="field">
    <label>ID</label>
    <input type="text" name="id_komunitas" ng-model="ts.id_komunitas" disabled> 
  </div>
   <div class="field">
    <label>Nama Komunitas</label>
    <input type="text" name="nama_komunitas" ng-model="ts.nama_komunitas">
  </div>

   <div class="field">
    <label>Email</label>
    <input type="email" name="email_komunitas" ng-model="ts.email_komunitas">
  </div>

  <div class="field">
    <label>Kategori</label>
    <select class="ui fluid dropdown" ng-model="kategori_komunitas">
     <option value="Kuliner">Kuliner</option>
      <option value="Seni">Seni</option>
      <option value="Budaya">Budaya</option>
      <option value="Kecantikan">Kecantikan</option>
      <option value="Bisnis">Bisnis</option>
      <option value="Kesehatan">Kesehatan</option>
      <option value="Olahraga">Olahraga</option>
      <option value="Musik">Musik</option>
      <option value="Pendidikan">Pendidikan</option>
      <option value="Sosial">Sosial</option>
    </select>
  </div>

  <div class="field">
    <label>Alamat</label>
    <div class="field">
      <textarea rows="2" name="alamat_komunitas" ng-model="ts.alamat_komunitas"></textarea>
    </div>
  </div>

  <div class="field">
    <label>Deskripsi</label>
    <textarea rows="2" name="deskripsi_komunitas" ng-model="ts.deskripsi_komunitas"></textarea>
  </div>
  
  <div class="field">
    <label>Unggah Foto</label>
    <input name="foto_komunitas" ng-model="ts.foto_komunitas">
  </div>
  
  <div type="submit" ng-click="UpdateForm(ts)" class="ui right green button">Submit</div>
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