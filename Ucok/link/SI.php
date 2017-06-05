
<html ng-app="myapp" ng-controller="usercontroller">
<?php session_start(); ?>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <title>Detail Data Usaha</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="../assets/library/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dirPagination.js"></script>
   

  <script >
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/queryUKM.php").success(function(data){
            $scope.names = data;  
          });  
        }

        displayDataFoto();
        function displayDataFoto (){  
          $http.post("db/queryFoto.php").success(function(data){
            $scope.foto = data;  
          });  
        }


        
        displayDataFotoBrg();
        function displayDataFotoBrg (){  
          $http.post("db/queryFotoBrg.php").success(function(data){
            $scope.fotoBrg = data;  
          });  
        }

        displayDataBrg();
        function displayDataBrg (){  
          $http.post("db/queryBrg.php").success(function(data){
            $scope.Barang = data;  
          });  
        }


        $scope.deleteBrg = function(info){
          $http.post('db/deletebrg.php',{"id":info}).success(function(data){
            if (data == true) {
              alert("Data Barang Berhasil dihapus")
            //memanggil display data spy table terupdate
             window.location.href = 'SI.php';
            }
          });
        }



        }]);  
    </script>

    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>

  <div id="one-page" class="ui text container" ng-init="displayData()" >

    <!--Isi-->
    <button class="ui right labeled icon orange button" onclick="window.location='index.php'"> Kembali
    <i class="left arrow icon"></i>
    </button>
    <center><h2 ng-repeat ="tempat in names" > {{tempat.nama_ukm}}  </h2></center>
    

    <h4 class="ui horizontal divider header">
      <i class="sticky note outline icon"></i>
      Data Usaha
    </h4>
    <table ng-repeat ="tempat in names" class="ui single line celled striped table">
        <tbody>
          <tr>
            <td>
              <div class="content">
                Alamat
              </div>
            </td>
            <td>
              {{tempat.alamat_ukm}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Kecamatan
              </div>
            </td>
            <td>
              {{tempat.kecamatan}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                No Telp
              </div>
            </td>
            <td>
              {{tempat.notelp}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Koordinat 
              </div>
            </td>
            <td>
              {{tempat.koordinat_ukm}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Foto
              </div>
            </td>
            <td> <div class="ui four column grid">
              <div class="ui images" ng-repeat = "tempat in foto">
                <img class="ui image" style="width:200px" ng-src="../../assets/images/photos/ucok/{{tempat.foto_ukm}}">
              </div>
            </div>
            <div class="ui four column grid">
              <div class="ui images" ng-repeat = "tempat in fotoBrg">
                <img class="ui image" style="width:200px" ng-src="../../assets/images/photos/ucok/{{tempat.foto_barang}}">
              </div>
            </div>
            </td>
          </tr>
          
        </tbody>
      </thead>
    </table>

    <h4 class="ui horizontal divider header">
      <i class="tag icon"></i>
      Deskripsi
    </h4>
      <p ng-repeat ="tempat in names">{{tempat.deskripsi_ukm}}</p> <br>

    <h4 class="ui horizontal divider header">
    <i class="empty star icon"></i>
      Data Barang
    </h4>
    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th>
            <h4> Nama Barang </h4>
          </th>
          <th>
            <h4> Harga Barang </h4>
          </th>
          <th>
            <h4> Kategori </h4>
          </th>
          <th>
            <h4> Foto </h4>
          </th>
          <th>
          </th>
        </tr>
      </thead>
      <tbody ng-repeat ="tempat in Barang">
        <tr>
          <td>              
           {{tempat.nama_barang}}
          </td>
          <td>              
            {{tempat.harga_barang}}
          </td>
          <td>              
            {{tempat.nama_kategori}}
          </td>
            <td>
              <button ng-click="deleteBrg(tempat.id_barang)" class="ui icon button">
              <i class="trash icon"></i>
            </button>
            </td>
        </tr>
      </tbody>
    </table><br>
  </div>
  </body>
  <footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
  </footer>
</html>