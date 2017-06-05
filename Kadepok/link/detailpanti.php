<?php
session_start();
?>

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
  <script src="../assets/library/jquery.min.js"></script>
  <script src="../../dist/components/modal.js"></script>
  <script src="../../dist/jquery.min.js"></script>
  <script src="../../dist/semantic.min.js"></script>
  <script >
    var app = angular.module("myapp",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

    //function untuk menampilkan all-data from table
        displayData();
        function displayData (){  
          $http.post("db/query_info.php").success(function(data){
            $scope.inform = data;  
          });  
        }
		
		
		displayDataEvent();
        function displayDataEvent (){  
          $http.post("db/query_detail_event.php").success(function(data){
            $scope.event_kadepok = data;  
          });  
        }
		
		displayDataDonasi();
        function displayDataDonasi (){  
          $http.post("db/query_detail_donasi.php").success(function(data){
            $scope.donasi_kadepok = data;  
          });  
        }
		
        }]);  
    </script>
  
  </head>
  <body>

  <div id="one-page" class="ui text container" ng-init="displayData()">

    <!--Menu-->
    <div class="ui two item stackable tabs menu centered">
      <a href="lihat_data.php" class="item" data-tab="definition">Kelola Pengajuan Panti Asuhan</a>
      <a href="#" class="active item" data-tab="definition">Kelola Data Panti</a>
    </div>

    <!--Isi-->
    <button class="ui right labeled icon orange button" onclick="window.location='panti.php'"> Kembali
    <i class="left arrow icon"></i>
    </button>
    <h2 ng-repeat="pnt in inform" style="font-style:italic; padding-top:40px">{{pnt.nama_panti}}</h2>

    <h4 class="ui horizontal divider header">
      <i class="sticky note outline icon"></i>
      Data Umum
    </h4>
	
	 <table class="ui striped unstackable compact selectable table">
  
  <tbody ng-repeat = "panti in inform" >
    <tr style="padding: 20px">
      <td>Alamat </td>
      <td> : </td>
      <td>{{panti.alamat_panti}}</td>
    </tr>
    <tr>
      <td>No. Telepon</td>
      <td> : </td>
      <td>{{panti.telpon_panti}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td> : </td>
      <td>{{panti.email_panti}}</td>
    </tr>
   <tr>
      <td>Jumlah anak </td>
      <td> : </td>
      <td>{{panti.jumlah_anak_panti}}</td>
    </tr>
   <tr>
      <td>Tahun berdiri</td>
      <td> : </td>
    <td>{{panti.tahun_berdiri_panti}}</td>
    </tr>
    <tr>
      <td> Rekening</td>
      <td> : </td>
    <td> {{panti.rekening_panti}}</td>
    </tr>
       <tr>
      <td> Nama pengurus</td>
      <td> : </td>
    <td> {{panti.nama_partner}}</td>
    </tr>
  </tbody>
</table>
	
	
    <!--<b style="font-size: 16px;""> Alamat :</b> Jl.KH Ahmad Dahlan No. 24 Beji Timur Depok<br>
    <b style="font-size: 16px;""> Nomor Telepon : </b> 021-727777<br>
    <b style="font-size: 16px;""> Jumlah Anak :</b> 70<br>
    <b style="font-size: 16px;""> Tahun Berdiri :</b> 2000<br>
    <b style="font-size: 16px;""> Email :</b> darulilmi@gmail.com<br>
    <b style="font-size: 16px;""> Rekening :</b> 1370 004 337 144<br>
    <b style="font-size: 16px;""> Pengurus :</b> H. Darul<br>-->

    <h4 class="ui horizontal divider header">
      <i class="tag icon"></i>
      Deskripsi
    </h4>
      <p ng-repeat = "panti in inform" >{{panti.deskripsi_panti}}.</p> 
    
    <h4 class="ui horizontal divider header">
      <i class="bar chart icon"></i>
      Statistik Donasi Per Bulan
    </h4>
    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th>
            <h4> Tahun </h4>
          </th>
          <th>
            <h4> Bulan </h4>
          </th>
          <th>
            <h4> Jumlah Donatur  </h4>
          </th>
          <th>
            <h4> Jumlah Donasi  </h4>
          </th>
      </thead>
      <tbody ng-repeat="donasi in donasi_kadepok">
        <tr>
          <td>              
            {{donasi.tahun}}
          </td>
          <td>              
           {{donasi.bulan}}
          </td>
          <td>
            {{donasi.jumlah}}
          </td>
          <td>
        Rp. {{donasi.total}}

          </td>
        </tr>
      </tbody>
    </table>

    <h4 class="ui horizontal divider header">
    <i class="empty star icon"></i>
      Event yang Dilaksanakan
    </h4>
    <table class="ui striped unstackable compact selectable table">
      <thead>
        <tr>
          <th>
            <h4> Nama Event </h4>
          </th>
          <th>
            <h4> Tanggal awal </h4>
          </th>
          <th>
            <h4> Tanggal akhir  </h4>
          </th>
          <th>
            <h4> Lokasi  </h4>
          </th>
      </thead>
      <tbody  ng-repeat="panti in event_kadepok">
        <tr>
          <td>              
			{{panti.nama_event}}
          </td>
          <td>              
             {{panti.tanggal_awal_event}}
          </td>
          <td>
             {{panti.tanggal_akhir_event}}
          </td>
          <td>
             {{panti.lokasi_event}}
          </td>
        </tr>
      </tbody>
    </table>
<br><br>
  </div>
  </body>
  <footer>
      <?php
         include "../../wrapper/footer.php"
    ?>
  </footer>
</html>