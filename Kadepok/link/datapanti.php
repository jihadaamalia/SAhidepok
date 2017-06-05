<html ng-app="myapp" ng-controller="usercontroller">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kadepok</title>
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
          $http.post("db/query_info1.php").success(function(data){
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
      <div class="ui two item stackable tabs menu centered">
        <a href="#" class="active item" data-tab="definition">Kelola Pengajuan Panti Asuhan</a>
        <a href="panti.php" class="item" data-tab="definition">Kelola Data Panti</a>
      </div>

      <!--Data Pengajuan-->
      <button class="ui right labeled icon orange button" onclick="window.location='lihat_data.php'">
      Kembali
      <i class="left arrow icon"></i>
      </button>
      <table class="ui single line celled striped table">
        <thead>
          <tr>
            <th colspan="2">
              <h3> Detail Yayasan Panti Asuhan</h3>
            </th>
          </tr>
        </thead>
        <tbody ng-repeat = "panti in inform" >
          <tr>
            <td colspan="2">
              <h4>Panti Asuhan</h4>
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nama Panti Asuhan
              </div>
            </td>
            <td>
              {{panti.nama_panti}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h4>Alamat</h4>
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nama Jalan
              </div>
            </td>
            <td>
              {{panti.alamat_panti}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nama Kecamatan
              </div>
            </td>
            <td>
              {{panti.kecamatan_panti}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h4>Kontak</h4>
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nomor Telepon
              </div>
            </td>
            <td>
              {{panti.no_telp_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Email
              </div>
            </td>
            <td>
              {{panti.email_partner}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <h4>Foto Panti</h4>
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Bangunan dan Plang
              </div>
            </td>
            <td>
              <img class="ui small image" style="width:500px" src="../../../assets/images/photos/kadepok/{{panti.foto_profile_panti}}">
            </td>
          </tr>  
          <tr>
            <td colspan="2">
              <h4>Legalisasi Panti</h4>
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Foto
              </div>
            </td>
            <td> <div class="ui four column grid">
              <div class="ui images" ng-repeat = "panti in foto">
                <img class="ui image" style="width:500px" ng-src="../../../assets/images/photos/kadepok/legalitas/{{panti.foto_legalitas_panti}}">
              </div>
            </div>
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