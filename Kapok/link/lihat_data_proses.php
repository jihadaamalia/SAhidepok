<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kapok - ADMIN</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
	<link rel="stylesheet" type="text/css" href="../assets/library/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>

    <?php
         include "../../wrapper/header.php"
    ?>
	<script src="dirPagination.js"></script>
	 <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        //function untuk menampilkan all-data from table
  
		
		displayData2();
		function displayData2 (){  
          $http.post("db/db_show2.php").success(function(data){
            $scope.inform2 = data;  
          });  
        }
		
		$scope.ProsesInfo = function(info){
          $http.post('db/db_proses.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              displayData2();
            }
          });
        }

         $scope.UpdateInfo = function(info){
          $http.post('db/db_diterima.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              window.location.href = 'lihat_data_diterima.php';
            }
          });
        }
    
    $scope.TolakInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              window.location.href = 'konfirmasi_tolak.php';
            }
          });
        }
	
		 $scope.viewInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'data_tempat.php';
            }
          });
        }
	
	 }]);  
     </script>
  </head>
  
  <body>


  <div id="one-page" class="ui text container" >

    <!--Menu-->
     <div class="ui three item stackable tabs menu centered">
      <a href="data_kapok.php" class="active item" data-tab="definition">Kelola Pengajuan Tempat</a>
      <a href="tambah_tempat.php" class="item" data-tab="definition">Unggah Data Tempat</a>
      <a href="kelola_data.php" class="item" data-tab="definition">Kelola Data Tempat</a>
    </div>
    <!-- TABEL -->	
    <div class="ui container">
      <center><h1 class="ui header" style="padding-top:40px">Data Pengelolaan Tempat</h1><br></center>
	  
	  	   	  
	 <div class="ui four item stackable tabs menu centered">
      <a href="data_kapok.php" class="item" data-tab="definition">Belum Diproses</a>
      <a href="lihat_data_proses.php" class="active item" data-tab="definition">Diproses</a>
      <a href="lihat_data_diterima.php" class="item" data-tab="definition">Diterima</a>
     <a href="lihat_data_ditolak.php" class="item" data-tab="definition">Ditolak</a>
    </div>
	  
 <div class="ui search" style="float: right; margin-bottom:10px;">
    <div class="ui icon input left floated">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
	  
      <table  ng-init="displayData2()" class="ui striped unstackable compact selectable table">
        <thead>
          <tr>
            <th colspan="3">
              <h4> Diproses </h4>
            </th>
          </tr>
        </thead>
        <tbody>
         <tr dir-paginate="ts in inform2 | filter: searchKeyword |itemsPerPage:5">
            <td class="collapsing">
              <center>{{ts.tanggal_gabung_partner}}</center>
            </td>
            <td>
              <h5>{{ts.nama_tempat}}</h5>
            </td>
			<td class="right aligned collapsing">
          <div class="ui buttons">
            <button ng-click="viewInfo(ts.id_tempat)" class="ui icon button">
              <i class="file text icon"></i>
            </button>
            <button ng-click="UpdateInfo(ts.id_partner)" class="ui icon button">
              <i class="check square icon"></i>
            </button>
            <button ng-click="TolakInfo(ts.id_partner)" class="ui icon button">
              <i class="minus circle icon"></i>
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

    <?php
         include "../../wrapper/footer.php"
    ?>
</body>
<footer>
</footer>
</html>