<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Sikepok ADMIN</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <?php
         include "../../wrapper/header.php";
         include 'modal_dokter.php';
    ?>
    <script src="dirPagination.js"></script>
  <script src="../assets/library/jquery.min.js"></script>
  <script src="../../dist/components/modal.js"></script>
  <script src="../../dist/jquery.min.js"></script>
  <script src="../../dist/semantic.min.js"></script>

    <!-- SCRIPT UNTUK PANGGIL POPUP-->
    <script type="text/javascript">
    function lihat_detail() {
      $('#lihat_detail')
        .modal('show')
      ;}
    </script>
    <script >
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_dokter.php").success(function(data){
            $scope.inform = data;  
          });  
        }

        $scope.editInfo = function(info){
          $http.post('getidDok.php',{"id_dok":info}).success(function(data){
            if (data == true) {
              // alert(data);
            //pindah halaman stlh dpt session id
              window.location.href = 'update_daftar_dokter.php';
            }
          });
        }

        $scope.deleteInfo = function(info){
          $http.post('db/db_delete_dokter.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              displayData();
            }
          });
        }

         //lihat data
        $scope.selectUser = {};
        $scope.Info = function(info, id){
          // alert(id);
          $http.post('getid2.php',{"id":id}).success(function(data){
            if (data == true) {
              $scope.selectUser = info;
              $('#lihat_detail').modal('show');
            }
          });
          
        }


}]);  
    </script>
  </head>
  <body>
  <div id = "one-page" class="ui one column stackable center aligned page grid" ng-init="displayData()">
  <div class="column fourteen wide" >
 <!-- MENU --> 
  <div class="ui four item stackable tabs menu centered">
    <a href="lihat_profil_rs.php" class="item" data-tab="definition">Data Rumah Sakit</a>
    <a href="lihat_jadwal_praktek.php" class="item" data-tab="definition">Jadwal Dokter</a>
    <a href="lihat_daftar_dokter.php" class="item active" data-tab="definition">Data Dokter</a>
    <a href="lihat_fasilitas_rs.php" class="item" data-tab="definition">Fasilitas</a>
  </div>

  <h1 class="ui header" style="padding-top: 20px">Daftar Dokter</h1>
  <div class="ui search" style="float: right; margin-bottom: 10px";>
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
        <th>Nama Dokter</th>
        <th>Spesialisasi</th>
        <th>Aksi</th>

      </tr>
    </thead>
    <tbody>
      <tr dir-paginate="dr in inform | filter: searchKeyword |itemsPerPage:10">
        <td>{{dr.nama_dokter}}</td>
        <td>{{dr.spesialisasi}}</td>
        <td>
          <div class="ui buttons">
            <button ng-click="Info(dr, dr.id_dokter)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(dr.id_dokter)" class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(dr.id_dokter)" class="ui icon button">
              <i class="trash icon"></i>
            </button>
          </div>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">
            <!-- PAGINATION -->   
         <dir-pagination-controls
          max-size="10"
          direction-links="true"
          boundary-links="true" >
        </dir-pagination-controls> 
        </th>
      </tr>
    </tfoot>
  </table>

  <a href="index.php"><div class="ui left floated orange button" style="margin-bottom: 10px"><i class="left chevron icon"></i>Kembali</div></a>
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