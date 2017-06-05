<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Fokopok</title>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <?php
         session_start();
         include "../../wrapper/header.php";
         include 'modal.php';
    ?>

    <script src="dirPagination.js"></script>
    <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        displayData3();
        function displayData3 (){  
          $http.post("db/db_show2.php").success(function(data){
            $scope.dt = data;  
          });  
        }

        $scope.deleteInfo = function(info){
          $http.post('db/db_delete.php',{"id":info.id_komunitas}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              displayData3();
            }
          });
        }

        //lihat data
        $scope.selectUser = {};
        $scope.Info = function(info){
          $scope.selectUser = info;
          $('#SI1').modal('show');
        }
     }]);  
    </script>

  </head>
  <body>

  <div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
   
   <!-- MENU -->	
  <div class="ui two item stackable tabs menu centered">
    <a href="index.php" class="item active" data-tab="definition">Kelola Pengajuan</a>
    <a href="lihatdata.php" class="item" data-tab="definition">Data Komunitas</a>
  </div>

  
  <!-- TABEL -->	
  <div class="ui Container" ng-init="displayData3()">
    <h1 style="font-style:italic;padding-top:40px">Kelola Pengajuan</h1> 
    <div class="ui three item stackable tabs menu centered">
      <a href="index.php" class="item" data-tab="definition">Belum Diproses</a>
      <a href="lihatdata_terima.php" class="item" data-tab="definition">Diterima</a>
     <a href="lihatdata_tolak.php" class="active item" data-tab="definition">Ditolak</a>
    </div>

    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th colspan="3">
            <h4> Ditolak </h4>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr dir-paginate="ts in dt |itemsPerPage:5">
          <td>
            <h5>{{ts.nama_komunitas}}</h5>
          </td>
          <td>
            {{ts.note_komunitas}}
          </td>
          <td class="right aligned collapsing">
            <div class="ui icon button" ng-click="Info(ts)"><i class="file text icon"></i></div>
            <div class="ui icon button" ng-click="deleteInfo(ts)"><i class="trash icon"></i></div>
          </td>
        </tr>
      </tbody>
       <tfoot>
        <tr>
        <th colspan="3">

          <!-- PAGINATION -->   
           <dir-pagination-controls
            max-size="3"
            direction-links="true"
            boundary-links="true" >
          </dir-pagination-controls> 
          </th>
        </tr>
      </tfoot>
    </table><br>
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