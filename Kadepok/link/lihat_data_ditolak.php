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
	 <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        //function untuk menampilkan all-data from table
		
		displayData3();
		function displayData3 (){  
          $http.post("db/db_show3.php").success(function(data){
            $scope.inform3 = data;  
          });  
        }
		
		
		$scope.UpdateInfo = function(info){
          $http.post('db/db_diterima.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              displayData3();
            }
          });
        }
		
		$scope.TolakInfo = function(info){
          $http.post('db/db_ditolak.php',{"id":info}).success(function(data){
            if (data == true) {
            //memanggil display data spy table terupdate
              displayData();
            }
          });
        }

	
		 $scope.viewInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'datapanti.php';
            }
          });
        }
	
	
	
	 }]);  
     </script>
  </head>
  
  <body>


  <div id="one-page" class="ui text container" >

    <!--Menu-->
    <div class="ui two item stackable tabs menu centered">
      <a href="#" class="active item" data-tab="definition">Kelola Pengajuan Panti Asuhan</a>
      <a href="panti.php" class="item" data-tab="definition">Kelola Data Panti</a>
    </div>

    <!-- TABEL -->	
    <div class="ui container">
      <center><h1 class="ui header" style="padding-top:40px">Data Pengelolaan Panti</h1><br></center>
	  
	  
		  
	  <div class="ui three item stackable tabs menu centered">
      <a href="lihat_data.php" class="item" data-tab="definition">Belum Diproses</a>
      <a href="lihat_data_diterima.php" class="item" data-tab="definition">Diterima</a>
	   <a href="lihat_data_ditolak.php" class=" active item" data-tab="definition">Ditolak</a>
    </div>
	  
 <div class="ui search" style="float: right; margin-bottom:10px;">
    <div class="ui icon input left floated">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
	  
      <table  ng-init="displayData3()" class="ui striped unstackable compact selectable table">
        <thead>
          <tr>
            <th colspan="4">
              <h4> Ditolak </h4>
            </th>
          </tr>
        </thead>
        <tbody>
         <tr dir-paginate="ts in inform3 | filter: searchKeyword |itemsPerPage:2">
            <td class="collapsing">
              <center>{{ts.tanggal_daftar_panti}}</center>
            </td>
            <td>
              <h5>{{ts.nama_panti}}</h5>
            </td>
		
			<td>
          <div class="ui buttons">
            <button ng-click="viewInfo(ts.id_panti)" class="ui icon button">
              <i class="unhide icon"></i>
            </button><!---
            <button ng-click="UpdateInfo(ts.id_partner)" class="ui icon button">
              <i class="check square icon"></i>
            </button>
            <button ng-click="TolakInfo(ts.id_partner)" class="ui icon button">
              <i class="minus circle icon"></i>
            </button>-->
          </div>
        </td>
			
			<!--
            <td class="right aligned collapsing">
              <div class="ui icon button" onclick="window.location='datapanti.php'"><i class="file text icon"></i></div>
              <div class="ui icon button"><i class="check square icon"></i></div>
              <div class="ui icon button"><i class="minus circle icon"></i></div>
            </td>-->
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