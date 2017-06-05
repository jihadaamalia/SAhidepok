
<html ng-app="myapp" ng-controller="usercontroller">
<?php session_start(); ?>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <title>Detail Nama Tempat</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="../assets/library/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="dirPagination.js"></script>
   

  <script >
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_detail.php").success(function(data){
            alert(data);
            $scope.names = data;  
          });  
        }

        displayDataFoto();
        function displayDataFoto (){  
          $http.post("db/query_detail_foto.php").success(function(data){
            alert(data);
            $scope.foto = data;  
          });  
        }


        displayDataEvent();
        function displayDataEvent (){  
          $http.post("db/query_detail_event.php").success(function(data){
            alert(data);
            $scope.event_kapok = data;  
          });  
        }



        }]);  
    </script>

    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>

  <div id="one-page" class="ui text container" ng-init="displayData()" >

    <!--Isi-->
    <button class="ui right labeled icon orange button" onclick="window.location='kelola_data.php'"> Kembali
    <i class="left arrow icon"></i>
    </button>
    <h2 ng-repeat ="tempat in names" > {{tempat.nama_tempat}}  </h2>
    

    <h4 class="ui horizontal divider header">
      <i class="sticky note outline icon"></i>
      Data Umum
    </h4>
    <table ng-repeat ="tempat in names" class="ui single line celled striped table">
        <tbody>
          <tr>
            <td>
              <div class="content">
                Alamat
              </div>
            </td>
            <td>
              {{tempat.alamat_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Kategori
              </div>
            </td>
            <td>
              {{tempat.kategori_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Kecamatan
              </div>
            </td>
            <td>
              {{tempat.kecamatan_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Jam Operasional
              </div>
            </td>
            <td>
              {{tempat.jam_operasi_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                No Telp
              </div>
            </td>
            <td>
              {{tempat.no_telp_tempat}}
            </td>
          </tr>
          <tr>
            <td>
          <div class="content">
                Fasilitas
              </div>
            </td>
            <td>
              {{tempat.fasilitas_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Menu Favorit
              </div>
            </td>
            <td>
              {{tempat.menu_fav_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Koordinat 
              </div>
            </td>
            <td>
              {{tempat.koordinat_tempat}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Foto
              </div>
            </td>
            <td> <div class="ui four column grid">
              <div class="ui images" ng-repeat = "tempat in foto">
                <img class="ui image" style="width:200px" ng-src="../../../assets/images/photos/kapok/{{tempat.foto_kapok}}">
              </div>
            </div>
          </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Username
              </div>
            </td>
            <td>
              {{tempat.username_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Password
              </div>
            </td>
            <td>
              {{tempat.password_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Nama Owner 
              </div>
            </td>
            <td>
              {{tempat.nama_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Email
              </div>
            </td>
            <td>
              {{tempat.email_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                No KTP
              </div>
            </td>
            <td>
              {{tempat.identitas_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Tanggal Gabung 
              </div>
            </td>
            <td>
              {{tempat.tanggal_gabung_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Status
              </div>
            </td>
            <td>
              {{tempat.status_partner}}
            </td>
          </tr>
          <tr>
            <td>
              <div class="content">
                Catatan
              </div>
            </td>
            <td>
              {{tempat.note_tempat}}
            </td>
          </tr>
          
        </tbody>
      </thead>
    </table>

    <h4 class="ui horizontal divider header">
      <i class="tag icon"></i>
      Deskripsi
    </h4>
      <p ng-repeat ="tempat in names">{{tempat.deskripsi_tempat}}</p> <br>

    <h4 class="ui horizontal divider header">
    <i class="empty star icon"></i>
      Event
    </h4>
    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th>
            <h4> Nama Event </h4>
          </th>
          <th>
            <h4> Foto </h4>
          </th>
          <th>
            <h4> Deskripsi </h4>
          </th>
          <th>
            <h4> Tanggal Mulai </h4>
          </th>
          <th>
            <h4> Tanggal Berakhir </h4>
          </th>
          <th>
            <h4> Lokasi  </h4>
          </th>
        </tr>
      </thead>
      <tbody ng-repeat ="tempat in event_kapok">
        <tr>
          <td>              
           {{tempat.nama_event}}
          </td>
          <td>
              <img class="ui images" style="width:150px" ng-src="../../../assets/images/photos/hidepok/event/{{tempat.foto_event}}">
          </td>
          <td>              
            {{tempat.deskripsi_event}}
          </td>
          <td>              
            {{tempat.tanggal_awal_event}}
          </td>
          <td>
            {{tempat.tanggal_akhir_event}}
          </td>
          <td>
            {{tempat.lokasi_event}}
          </td>
        </tr>
      </tbody>
    </table><br>
  </div>
  </body>
  <footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
  </footer>
</html>