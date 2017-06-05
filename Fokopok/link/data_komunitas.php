<html ng-app="myapp" ng-controller="usercontroller">
  <head>
    <title>Fokopok</title>
    <link rel="shortcut icon" href="../../assets/images/logo.png">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" src="js/jquery_1.7.1_min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">
    </script>

    <script>  
     var app = angular.module("App",['angularUtils.directives.dirPagination']);  
      app.controller("usercontroller",[ '$scope','$http', function($scope, $http){  

        //function untuk menampilkan all-data from table
       displayData();
        function displayData (){  
          $http.post("db/db_show.php").success(function(data){
            $scope.inform = data;  
          });  
        }
        }]); 
    </script>

    <?php
    session_start();
         include "../../wrapper/header.php"
      ?>
  </head>

<body>

<div id="one-page" class="ui text container" ng-init="displayData()">
    <button class="ui right labeled icon orange button" onclick="window.location='index.php'">
    Kembali
    <i class="left arrow icon"></i>
    </button>
 <table class="ui single line celled striped table">
    <thead>
      <tr>
        <th colspan="2">
          <h3> Detail Komunitas</h3>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="2">
          <h4>Komunitas</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nama Komunitas
          </div>
        </td>
        <td>
          {{selectUser.nama_komunitas}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Alamat</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Alamat Komunitas
          </div>
        </td>
        <td>
          {{selectUser.alamat_komunitas}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Kontak</h4>
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Nomor Telepon
          </div>
        </td>
        <td>
          {{selectUser.no_telp_partner}}
        </td>
      </tr>
      <tr>
        <td>
          <div class="content">
            Email
          </div>
        </td>
        <td>
          {{selectUser.email_komunitas}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <h4>Foto Komunitas</h4>
        </td>
      </tr>
      <tr>
        <td  colspan="2">
          <div class="content">
            <center><img src="../../../assets/images/photos/fokopok/{{selectUser.foto_komunitas}}" alt="" class"img-responsive"/></center>
          </div>
        </td>
      </tr>  
    </tbody>
  </thead>
</table>
</div><br><br>
</body>

<footer>
    <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>