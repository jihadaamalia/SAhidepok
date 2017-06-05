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
              window.location.href = 'detailpanti.php';
            }
          });
        }
		
		$scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'editpanti.php';
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
     
	 
	 

     }]);  
     </script>
	

  </head>
  
  <body>


  <div id="one-page" class="ui text container">

    <!--Menu-->
    <div class="ui two item stackable tabs menu centered">
      <a href="lihat_data.php" class="item" data-tab="definition">Kelola Pengajuan Panti Asuhan</a>
      <a href="#" class="active item" data-tab="definition">Kelola Data Panti</a>
    </div>

    <!-- TABEL -->	
    <div class="ui container">
      <center><h1 class="ui header" style="padding-top:40px">Data Panti</h1><br></center>
      <!--<select class="ui dropdown" style="width:200px;">
        <option value="all">Semua Kecamatan</option>
        <option value="beji">Kecamatan Beji</option>
        <option value="bojongsari">Kecamatan Bojongsari</option>
        <option value="cilodong">Kecamatan Cilodong</option>
        <option value="cimanggis">Kecamatan Cimanggis</option>
        <option value="cinere">Kecamatan Cinere</option>
        <option value="cipayung">Kecamatan Cipayung</option>
        <option value="limo">Kecamatan Limo</option>
        <option value="pancoranmas">Kecamatan Pancoran Mas</option>
        <option value="sawangan">Kecamatan Sawangan</option>
        <option value="sukmajaya">Kecamatan Sukmajaya</option>
        <option value="tapos">Kecamatan Tapos</option>
      </select>-->
	    <div class="ui search" style="float: right; margin-bottom:10px;">
    <div class="ui icon input left floated">
      <input class="prompt" ng-model="searchKeyword" type="text" placeholder="Cari...">
      <i class="search icon"></i>
    </div>
    <div class="results"></div>
  </div>
      </div>
      <script type="text/javascript">
        $('.ui.dropdown')
          .dropdown({
          transition: 'fade down'
        });
      </script>
<!--TABLE-->
      <table class="ui striped unstackable compact selectable table">
        <thead>
          <tr>
            <th>
              <h4> Nama Panti </h4>
            </th>
         
            <th>
              <h4> Kecamatan </h4>
            </th>
            <th>
              <h4> Aksi </h4>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr dir-paginate="panti in inform | filter: searchKeyword |itemsPerPage:10">
            <td class="collapsing">
            	{{panti.nama_panti}}
            </td>
           
            <td>
            	{{panti.kecamatan_panti}}
            </td>
         <td>
          <div class="ui buttons">
            <button ng-click="viewInfo(panti.id_panti)" class="ui icon button">
              <i class="unhide icon"></i>
            </button>
            <button ng-click="editInfo(panti.id_panti)" class="ui icon button">
              <i class="write icon"></i>
            </button>
            <button ng-click="deleteInfo(panti.id_panti)" class="ui icon button">
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
	  
    </div><br><br><br>

</body>
<footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>
