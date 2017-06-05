
<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <title>Fokopok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script>
    <?php
    session_start();
         include "../../wrapper/header.php";
         include 'modal.php';
    ?>

    <script src="dirPagination.js"></script>

    <!-- SCRIPT UNTUK PANGGIL POPUP-->
    <script type="text/javascript">
	  function panggil() {
      $('.ui.basic.modal')
        .modal('show')
      ;}
  	</script>

     <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/db_show1.php").success(function(data){
            $scope.inform = data;  
          });  
        }
    
    $scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'update.php';
            }
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
        
        //lihat data
        $scope.selectUser = {};
        $scope.Info = function(info){
          $scope.selectUser = info;
          $('#SI1').modal('show');
        }
     }]);  
     </script>
  
  </head>
  

<div id="one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
  
    <!-- MENU --> 
  <div class="ui two item stackable tabs menu centered">
    <a href="index.php" class="item" data-tab="definition">Kelola Pengajuan</a>
    <a href="lihatdata.php" class="item active" data-tab="definition">Data Komunitas</a>
  </div>

  <h1 style="font-style:italic;padding-top:40px">Data Komunitas</h1> 
  <div class="ui search">
    <div class="ui icon input right floated" style="float:right; margin-bottom:10px;">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>

  <!-- TABEL -->	
  <table class="ui striped unstackable compact selectable table">
    <thead>
      <tr>
        <th>Nama pengguna</th>
        <th>Email</th>
        <th>Password</th>
        <th>Nama Komunitas</th>
        <th>Kategori</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <tr dir-paginate="ts in inform | filter: searchKeyword |itemsPerPage:3">
        <td class="collapsing">{{ts.username_partner}}</td>
        <td>{{ts.email_komunitas}}</td>
        <td>{{ts.password_partner}}</td>
        <td>{{ts.nama_komunitas}}</td>
        <td>{{ts.kategori_komunitas}}</td>
        <td>
          <div class="ui buttons">
            <button ng-click="Info(ts)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(ts.id_komunitas)" class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(ts.id_komunitas)" class="ui icon button">
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
    <?php
         include "../../wrapper/footer.php"
    ?>
</body>
<footer>
</footer>
</html>