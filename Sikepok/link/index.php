<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Sikepok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script> 

    <?php
      session_start();
      //header default
      include "../../wrapper/header.php";
      
      //include form popup show data
      include 'modal1.php';?></div>

    <script src="dirPagination.js"></script>
    
    <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/db_show.php").success(function(data){
            $scope.inform = data;  
          });  
        }

        $scope.deleteInfo = function(info){
          $http.post('db/db_delete.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              console.log(data);
              displayData();
            }
          });
        }

        $scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'form_update.php';
            }
          });
        }

        //lihat data
        $scope.selectUser = {};
        $scope.Info = function(info){
          $http.post('getid2.php',{"id":info.id_tempat_sehat}).success(function(data){
            if (data == true) {
              $("#modal").load("coba.php #modal");
              $scope.selectUser = info;
              $('#SI1').modal('show');
            }
          });
          
        }

        


     }]);  
    </script>
  </head>
  <body>
  <div id="one-page" class="ui one column stackable center aligned page grid"  ng-init="displayData()">
  <div class="column fourteen wide">
  
  <!-- MENU --> 
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="active item" data-tab="definition">Lihat Data</a>
  </div>

  <h1 class="ui header" style="padding-top:40px">Data Usaha Kesehatan</h1><br>
  <div class="ui search" style="float: right; margin-bottom:10px;">
    <div class="ui icon input left floated">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>

  <!-- TABEL -->  
  <table class="ui striped unstackable compact selectable table" cellspacing="0" width="100%" >
    <thead>
      <tr>
        <th>Jenis</th>
        <th>Nama</th>
        <th>Kecamatan</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <tr dir-paginate="ts in inform | filter: searchKeyword |itemsPerPage:15">
        <td>{{ts.nama_jenis}}</td>
        <td>{{ts.nama_tempat_sehat}}</td>
        <td>{{ts.kecamatan_tempat_sehat}}</td>
        <td>
          <div class="ui buttons">
            <button ng-click="Info(ts)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(ts.id_tempat_sehat)"  class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(ts.id_tempat_sehat)" class="ui icon button">
              <i class="trash icon"></i>
            </button>                                   
          </div>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4">

        <!-- PAGINATION -->   
         <dir-pagination-controls
          max-size="5"
          direction-links="true"
          boundary-links="true" style="float:right">
    </dir-pagination-controls> 
        </th>
      </tr>
    </tfoot>
  </table>
  <br><br>
    
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

