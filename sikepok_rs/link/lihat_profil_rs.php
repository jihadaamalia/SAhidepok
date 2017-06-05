<html ng-app="myapp" ng-controller="usercontroller">
  <head>
   <head>
    <title>Sikepok ADMIN</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <?php
         include "../../wrapper/header.php";
    ?>
    <script src="dirPagination.js"></script>
  <script src="../assets/library/jquery.min.js"></script>
  <script src="../../dist/components/modal.js"></script>
  <script src="../../dist/jquery.min.js"></script>
  <script src="../../dist/semantic.min.js"></script>

    <script >
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_info.php").success(function(data){
            $scope.inform = data;  
          });  
        }
        }]);  
    </script>
  </head>
<body>
  <div id = "one-page" class="ui text container" ng-init="displayData()">
  
  <!-- MENU --> 
  <div class="ui four item stackable tabs menu centered">
    <a href="lihat_profil_rs.php" class="item active" data-tab="definition">Data Rumah Sakit</a>
    <a href="lihat_jadwal_praktek.php" class="item" data-tab="definition">Jadwal Dokter</a>
    <a href="lihat_daftar_dokter.php" class="item" data-tab="definition">Data Dokter</a>
    <a href="lihat_fasilitas_rs.php" class="item" data-tab="definition">Fasilitas</a>
  </div>

  <center><h1 class="ui header" style="padding-top: 30px" >Informasi Rumah Sakit</h1></center>
  <div class="ui divided items">
      <div class="item">
        <div class="image">
          <img src="../assets/images/avatar/tom.jpg">
        </div>
        <div class="content">
          
          <div class="description">
        <table class="ui striped unstackable compact selectable table">
  
  <tbody ng-repeat = "rs in inform" >
    <tr style="padding: 20px">
      <td>Nama </td>
      <td> : </td>
      <td> {{rs.nama_rs}}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td> : </td>
      <td>{{rs.alamat_rs}}</td>
    </tr>
    <tr>
      <td>No Telp</td>
      <td> : </td>
      <td>{{rs.no_telp_rs}}</td>
    </tr>
   <tr>
      <td>Website </td>
      <td> : </td>
      <td>{{rs.website_rs}}</td>
    </tr>
   <tr>
      <td> Email</td>
      <td> : </td>
    <td>{{rs.email_rs}}</td>
    </tr>
    <tr>
      <td> Deskripsi</td>
      <td> : </td>
    <td> {{rs.deskripsi_rs}}</td>
    </tr>
   
  </tbody>
</table>

          </div><br>
          <div class="extra">    
            <a href="update_rs.php"><div class="ui right floated primary button"><i class="left write icon"></i>
              Ubah
            </div></a>
             <a href="index.php"><div class="ui left floated orange button" style="margin-bottom: 10px"><i class="left chevron icon"></i>Kembali</div></a>
          </div>
          <br>
        </div>

  </div>
  </div>
  </div>
    <?php
         include "../../wrapper/footer.php"
    ?>
</body>
<footer>
</footer>
</html>