
<html ng-app="myapp" ng-controller="usercontroller">
  <head>
     <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Kapok - ADMIN</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="../assets/library/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dirPagination.js"></script>
    <script>  
      var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){   

            displayData();
            function displayData (){  
               $http.post("db/db_show.php").success(function(data){  
                $scope.names = data;    
              });   
          }

          $scope.viewInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'detail_kelola.php';
            }
          });
        }

        $scope.editInfo = function(info){
          $http.post('getid.php',{"id":info}).success(function(data){
            if (data == true) {
            //pindah halaman stlh dpt session id
              window.location.href = 'edit_tempat.php';
            }
          });
        }


     }]); 
      </script>

    <?php
      include "../../wrapper/header.php"
    ?>
  </head>

  <body>
  <div id="one-page" class="ui one column stackable center aligned page grid" ng-init="displayData()">
    <div class="column fourteen wide">
    <!--Menu-->
    <div class="ui three item stackable tabs menu centered">
      <a href="data_kapok.php" class="item" data-tab="definition">Kelola Pengajuan Tempat</a>
      <a href="tambah_tempat.php" class="item" data-tab="definition">Unggah Data Tempat</a>
      <a href="kelola_data.php" class="active item" data-tab="definition">Kelola Data Tempat</a>
    </div>

    <div class="ui container">



      <center><h1 class="ui header" style="padding-top:40px">Data Tempat Usaha</h1></center><br>

<!--<select class="ui dropdown" style="width:200px; float:left; margin-bottom:10px;">
        <option value="all">Semua Kecamatan</option>
        <option value="Beji">Kecamatan Beji</option>
        <option value="Bojongsari">Kecamatan Bojongsari</option>
        <optionu value="Cilodong">Kecamatan Cilodong</option>
        <option value="Cimanggis">Kecamatan Cimanggis</option>
        <option value="Cinere">Kecamatan Cinere</option>
        <option value="Cipayung">Kecamatan Cipayung</option>
        <option value="Limo">Kecamatan Limo</option>
        <option value="Pancoranmas">Kecamatan Pancoran Mas</option>
        <option value="Sawangan">Kecamatan Sawangan</option>
        <option value="Sukmajaya">Kecamatan Sukmajaya</option>
        <option value="Tapos">Kecamatan Tapos</option>
      </select> !-->

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

      <table class="ui striped unstackable compact selectable table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>
              <h4> Nama tempat </h4>
            </th>
            <th>
              <h4> Kategori </h4>
            </th>
            <th>
              <h4> Kecamatan </h4>
            </th>
            <th>
              <h4> Status </h4>
            </th>
            <th>
              <h4> Aksi </h4>
            </th>
          </tr>
        </thead>
        <tbody>
        
          <tr dir-paginate="tempat in names | filter: searchKeyword | itemsPerPage:6">
            <td>
              {{tempat.nama_tempat}}
            </td>
            <td>
              {{tempat.kategori_tempat}}
            </td>
            <td>
              {{tempat.kecamatan_tempat}}
            </td>
            <td>
              {{tempat.status_partner}}
            </td>
            <td>
              <button ng-click="viewInfo(tempat.id_tempat)" class="ui icon button" ><i class="file text icon"></i></button>
              <button ng-click="editInfo(tempat.id_tempat)" class="ui icon button"><i class="write icon"></i></button>
            </td>
          </tr>
        </tbody>
        
        <tfoot>
          <tr>
            <th colspan="5">  
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
    </div>
  </div>
</body>
<footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>