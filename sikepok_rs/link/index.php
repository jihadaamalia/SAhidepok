<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Sikepok ADMIN</title>
     <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <?php
         include "../../wrapper/header.php"
      ?>
    <script src="dirPagination.js"></script>
    <!-- SCRIPT UNTUK PANGGIL POPUP-->
    <!-- <script type="text/javascript">
    function panggil() {
      $('.ui.basic.modal')
        .modal('show')
      ;}
    </script> -->

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

         $scope.viewInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'lihat_profil_rs.php';
            }
          });
        }

        $scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'update_rs.php';
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
        
        // //lihat data
        // $scope.selectUser = {};
        // $scope.Info = function(info, id){
        //   alert(id);
        //   $http.post('getid2.php',{"id":id}).success(function(data){
        //     if (data == true) {
        //       $scope.selectUser = info;
        //       $('#SI1').modal('show');
        //     }
        //   });
          
        // }

      
     }]);  
     </script>

  </head>
    <body>
  <div id = "one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide" ng-init="displayData()">
  <!-- MENU --> 
  <div class="ui two item stackable tabs menu centered">
    <a href="pendaftaran_rs.php" class="item " data-tab="definition">Buat Baru</a>
    <a href="index.php" class="item active" data-tab="definition">Lihat Data</a>
  </div>
  <h1 class="ui header">Data Rumah Sakit</h1><br>
  <div class="ui search">
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
        <th>Nama</th>
        <th>Kecamatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <tr dir-paginate="ts in inform | filter: searchKeyword |itemsPerPage:6">
        <td>{{ts.nama_rs}}</td>
        <td>{{ts.kecamatan_rs}}</td>
        <td>
          <div class="ui buttons">
            <button ng-click="viewInfo(ts.id_rs)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(ts.id_rs)" class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(ts.id_rs)" class="ui icon button">
              <i class="trash icon"></i>
            </button>
          </div>
        </td>
      </tr>

    <!-- <?php 
      require 'config.php';

      $query = mysqli_query($koneksi, "SELECT * FROM rs");

      while($hasil = mysqli_fetch_array($query)){
        $id = $hasil['id_rs'];
    echo "
      <tr>
        <td>" . $hasil['nama_rs'] . "</td>
        <td>" . $hasil['kecamatan_rs'] . "</td>
        <td><a href = 'update_rs.php?id_rs=$hasil[id_rs]'> Edit </a>
            <a href = 'delete.php?id_rs=$hasil[id_rs]'> Hapus </a>
        </td>
      </tr>";
    }
    ?>  -->
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">

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