<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Lapok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script> 
    
    <?php
      session_start();
      //header default
      include "../../wrapper/header.php";
      //include form popup show data
      include 'modal.php';
    ?>

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
          $http.post('getid2.php',{"id":info.id_partner}).success(function(data){
            if (data == true) {
              $("#modal").load("index.php #modal");
              $scope.selectUser = info;
              $('#SI1').modal('show');
            }
          });
          
        }

     }]);  
    </script>

  </head>

  <div id="one-page" class="ui one column stackable center aligned page grid" ng-init="displayData()">
  <div class="column fourteen wide">
  <!-- MENU --> 
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="active item" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header" style="padding-top:40px">Data Partner</h1><br>
  <div class="ui search" >
    <div class="ui icon input right floated" style="float:right; margin-bottom:10px;">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>

  <!-- TABEL -->  
  <table class="ui striped unstackable compact selectable table" cellspacing="0" width="100%" >
    <thead>
      <tr>
        <th>Username</th>
        <th>Nama Partner</th>
        <th>Nama Instansi</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <tr dir-paginate="ts in inform | filter: searchKeyword | itemsPerPage:8">
        <td>{{ts.username_partner}}</td>
        <td>{{ts.nama_partner}}</td>
        <td>{{ts.nama_instansi_partner}}</td>
        <td>
          <div class="ui buttons">
            <button ng-click="Info(ts)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(ts.id_partner)"  class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(ts.id_partner)" class="ui icon button">
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
          boundary-links="true">
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