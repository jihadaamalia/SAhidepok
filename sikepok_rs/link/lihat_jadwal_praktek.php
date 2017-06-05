<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Sikepok ADMIN</title>
    <?php
         include "../../wrapper/header.php"
      ?>
      <!--
    <?php 
      require 'config.php';

      $query = mysqli_query($koneksi, "SELECT nama_dokter FROM jadwal inner join dokter on jadwal.id_dokter = dokter.id_dokter");
      $data = mysqli_fetch_array($query);
      ?>
      -->
    <!-- SCRIPT UNTUK PANGGIL POPUP-->

    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>

    <script type="text/javascript">
	  function panggil() {
      $('.ui.basic.modal')
        .modal('show')
      ;}
  	</script>

    <style>

      #scroll
    {
      overflow-y: scroll;
      overflow-x: hidden;
      white-space: nowrap;  
      height: 250px;
    }

        table, td, th 
        {    
            border: 2px solid #ddd;
            text-align: center;
        }

        table 
        {
            border-collapse: collapse;
            width: 100%;
        }

        th 
        {
            font-size:15px;
        }

        th, td 
        {
            padding: 5px;
        }  
    </style>

    <script >
    var app = angular.module("myapp",[]);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_jadwal.php").success(function(data){
            $scope.inform = data;  
          });  
        }

        $scope.editInfo = function(info){
          $http.post('getidjdwl.php',{"id_jdwl":info}).success(function(data){
            if (data == true) {
              // alert(data);
            //pindah halaman stlh dpt session id
              window.location.href = 'update_jadwal_praktek.php';
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
    }]);  

    </script>
  </head>

  <div id = "one-page" class="ui one column stackable center aligned page grid">
  <div class="column fourteen wide">
 <!-- MENU --> 
  <div class="ui four item stackable tabs menu centered">
    <a href="lihat_profil_rs.php" class="item" data-tab="definition">Data Rumah Sakit</a>
    <a href="lihat_jadwal_praktek.php" class="item active" data-tab="definition">Jadwal Dokter</a>
    <a href="lihat_daftar_dokter.php" class="item" data-tab="definition">Data Dokter</a>
    <a href="lihat_fasilitas_rs.php" class="item" data-tab="definition">Fasilitas</a>
  </div>

  <h1 class="ui header" style="padding-top: 20px">Jadwal Praktek</h1><br>
  <div class="ui bottom attached segment">
        
         <div class="ui category search" style="text-align: right">
          <div class="ui icon input">
            <input class="prompt" type="text" placeholder="Cari...">
            <i class="search icon"></i>
          </div>
          <div class="results"></div>
        </div><!--search--><br>
        <div class="ui container"  id="scroll">
  <div style="padding: 2%">
    <center>
        <div style="overflow-x:auto;">
            <table ng-init="displayJadwal()" cellspacing="20px" cellpadding="20px">
                <!-- <tr>
                    <th colspan="8">Spesialis Anak</th>
                </tr> -->
                <thead>
                  <tr style="font-weight: bold; padding: 10px">
                    <td>Nama Dokter</td>
                    <td>Senin</td>
                    <td>Selasa</td>
                    <td>Rabu</td>
                    <td>Kamis</td>
                   <td>Jumat</td>
                    <td>Sabtu</td>
                    <td>Minggu</td>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="dr in inform" style="font-size: 15px">
                    <td>{{dr.nama_dokter}}</td>
                    <td>{{dr.senin_jadwal}}</td>
                    <td>{{dr.selasa_jadwal}}</td>
                    <td>{{dr.rabu_jadwal}}</td>
                    <td>{{dr.kamis_jadwal}}</td>
                    <td>{{dr.jumat_jadwal}}</td>
                    <td>{{dr.sabtu_jadwal}}</td>
                    <td>{{dr.minggu_jadwal}}</td>

                  </tr>
                </tbody>
              </table>
            </div><br><br><br>
        </center>
    </div>


</div>

    </div><!--tutup container isi-->   
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