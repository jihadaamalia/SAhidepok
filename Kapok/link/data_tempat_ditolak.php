<html ng-app="myapp" ng-controller="usercontroller">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kapok - ADMIN</title>
     <link rel="shortcut icon" href="../../assets/images/logo.png">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <?php
         include "../../wrapper/header.php"
    ?>
  <script src="dirPagination.js"></script>
  <script src="../assets/library/jquery.min.js"></script>
  <script src="../../dist/components/modal.js"></script>
  <script src="../../dist/jquery.min.js"></script>
  <script src="../../dist/semantic.min.js"></script>
  
  <script>
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_detail.php").success(function(data){
            $scope.inform = data;  
          });  
        }
    
    displayDataFoto();
        function displayDataFoto (){  
          $http.post("db/query_detail_foto.php").success(function(data){
            $scope.foto = data;  
          });  
        }
    
        }]);  
    </script>
  </head>
  <body>

    <div id="one-page"class="ui text container" ng-init="displayData()">
      
    <!--Menu-->
      <div class="ui three item stackable tabs menu centered">
      <a href="data_kapok.php" class="active item" data-tab="definition">Kelola Pengajuan Tempat</a>
      <a href="tambah_tempat.php" class="item" data-tab="definition">Unggah Data Tempat</a>
      <a href="kelola_data.php" class="item" data-tab="definition">Kelola Data Tempat</a>
    </div>

      <!--Data Pengajuan-->
      <button class="ui right labeled icon orange button" onclick="window.location='data_kapok.php'">
      Kembali
      <i class="left arrow icon"></i>
      </button>
      <table class="ui single line celled striped table">
        <thead>
          <tr>
            <th colspan="2">
              <h3> Detail Nama Tempat</h3>
            </th>
          </tr>
        </thead>
        <tbody ng-repeat = "tempat in inform" >
          <tr>
            <td>
              <div class="content">
                Nama Tempat
              </div>
            </td>
            <td>
              {{tempat.nama_tempat}}
            </td>
          </tr>
         <tr>
            <td>
              <div class="content">
                Alamat
              </div>
            </td>
            <td>
              {{tempat.alamat_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Kategori
              </div>
            </td>
            <td>
              {{tempat.kategori_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Kecamatan
              </div>
            </td>
            <td>
              {{tempat.kecamatan_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Username
              </div>
            </td>
            <td>
              {{tempat.username_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Password
              </div>
            </td>
            <td>
              {{tempat.password_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nama Owner 
              </div>
            </td>
            <td>
              {{tempat.nama_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Email
              </div>
            </td>
            <td>
              {{tempat.email_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                No Telp
              </div>
            </td>
            <td>
              {{tempat.no_telp_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                No KTP
              </div>
            </td>
            <td>
              {{tempat.identitas_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Catatan
              </div>
            </td>
            <td>
              {{tempat.note_tempat}}
            </td>
          </tr>
        </tbody>
      </thead>
    </table>
  </div>
<br><br>
<?php
         include "../../wrapper/footer.php"
    ?>
<footer>
    
</footer>
</html>