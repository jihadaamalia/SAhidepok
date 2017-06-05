<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Ucok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png"> 
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <?php
         include "../../wrapper/header.php";
         include "modal1.php";
    ?>
  <script src="dirPagination.js"></script>
 <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){ 
        //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("show.php").success(function(data){
            $scope.inform = data;  
          });  
        }

        $scope.viewInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'SI.php';
            }
          });
        }

        $scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'updateukm.php';
            }
          });
        }

        
        $scope.deleteInfo = function(info){
          $http.post('db/delete.php',{"id":info}).success(function(data){
            if (data == true) {
              alert("Data terhapus")
            //memanggil display data spy table terupdate
              displayData();
            }
          });
        }

        $scope.pilihUser = {};
        $scope.addInfo = function(info){
          $http.post('getid2.php',{"id":info.id_ukm}).success(function(data){
            if (data == true) {
              $scope.pilihUser = info;
              $('#brg').modal('show');
            }
          }); 
        }

        $scope.submitForm1 = function(id_ukm, barang, harga, Kategori) {
        $http.post("db/brgAct.php", {
          'ID':$scope.pilihUser.id_ukm,
          'Kategori':$scope.Kategori,
          'barang':$scope.barang,
          'harga':$scope.harga
          })
          .success(function(data) { 
              window.location.href = 'index.php';
          });
        };

        }]);
    </script>
  </head>
  <body>
  <div id="one-page" class="ui one column stackable center aligned page grid" ng-init="displayData()">
  <div class="column fourteen wide">
  
  <!-- MENU -->	
  <div class="ui two item stackable tabs menu centered">
    <a href="form_daftar.php" class="item" data-tab="definition">Buat Baru</a>
    <a href="index.php" class="active item" data-tab="definition">Lihat Data</a>
  </div>
<h1 class="ui header" style="padding-top:40px">Data Usaha</h1><br>
  <div class="ui search" style="margin-bottom:10px; float:right;">
    <div class="ui icon input right floated">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>

  <!-- TABEL -->	
  <table class="ui striped unstackable compact selectable table">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Nama UMKM</th>
        <th>Kecamatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="si in inform | filter: searchKeyword |itemsPerPage:5">
        <td>{{si.daftar_kategori}}</td>
        <td>{{si.nama_ukm}}</td>
        <td>{{si.kecamatan}}</td>
        <td>
            <button ng-click="viewInfo(si.id_ukm)" class="ui icon button">
              <i class="file text icon"></i>
            </button>
            <button data-content="Edit" ng-click="editInfo(si.id_ukm)" class="ui icon button" data-content="Edit Data">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(si.id_ukm)" class="ui icon button">
              <i class="trash icon"></i>
            </button>
            <button ng-click="addInfo(si)" class="ui icon button">
              <i class="plus icon"></i>
            </button>
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
          boundary-links="true" >
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