<html ng-app="postApp" ng-controller="postController">
<?php
session_start();
?>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Kapok - ADMIN</title>
    <link rel="shortcut icon" href="../../../assets/images/logo.png">

    <script src="../../assets/library/jquery.min.js"></script>
    <script src="../../dist/jquery.min.js"></script>
    <script src="../../dist/semantic.min.js"></script>
    <script src="../../dist/components/visibility.js"></script>
    <script src="../../dist/components/transition.js"></script>
    <script src="../../dist/components/modal.js"></script>
    <script src="../../dist/components/dropdown.js"></script>
    <script src="../../dist/jquery.js"></script>
    <script src="../../dist/semantic.min.js"></script>
    <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js"></script> 



    <script>
    var postApp = angular.module('postApp', []);
    postApp.controller('postController', function($scope, $http) {

        $scope.submitForm = function() {
        $http.post("db/form_unggahAct.php", {
          'nama_tempat':$scope.nama_tempat,
          'alamat_tempat':$scope.alamat_tempat,
          'kategori_tempat':$scope.kategori_tempat,
          'kecamatan_tempat':$scope.kecamatan_tempat,
          'jam_operasi_tempat':$scope.jam_operasi_tempat,
          'no_telp_tempat':$scope.no_telp_tempat,
          'fasilitas_tempat':$scope.fasilitas_tempat,
          'menu_fav_tempat':$scope.menu_fav_tempat,
          'koordinat_tempat':$scope.koordinat_tempat,
          'username_partner':$scope.username_partner,
          'password_partner':$scope.password_partner,
          'nama_partner':$scope.nama_partner,
          'email_partner':$scope.email_partner,
          'identitas_partner':$scope.identitas_partner,
          'deskripsi_tempat':$scope.deskripsi_tempat,
          'note_tempat':$scope.note_tempat
          })
          .success(function(data) {
              alert("Data Telah Ditambah");
              window.location.href = 'tambah_tempat.php';
          });
        };
    });
</script>

    <script >
    $(document)
    .ready(function() {
      $('.image').dimmer({
        on: 'hover'
      });
    })
    ;
  </script>
    <?php
         include "../../wrapper/header.php"
    ?>
  </head>
  <body>


<div id="one-page" class="ui text container">
      <!--Menu-->
      <div class="ui three item stackable tabs menu centered">
        <a href="data_kapok.php" class="item" data-tab="definition">Kelola Pengajuan Tempat</a>
        <a href="tambah_tempat.php" class="active item" data-tab="definition">Unggah Data Tempat</a>
        <a href="kelola_data.php" class="item" data-tab="definition">Kelola Data Tempat</a>
      </div>

    <h1 class="ui header"><center>Tambah Data Tempat</center></h1>

      <!--Data Pengajuan--> 

      <div class="ui message">
      <form class="ui form" name="userForm">
        <div class="field">
          <label>Nama Tempat</label>
          <input name="nama_tempat" placeholder="Contoh:Rumah Makan Suka Hati" type="text" ng-model="nama_tempat">
        </div>
        <div class="field">
          <label>Alamat</label>
          <textarea rows="3" name="alamat_tempat" ng-model="alamat_tempat"></textarea>
        </div>
        <div class="two fields">
        
        <div class="field">
          <label>Kategori</label>
          <select class="ui fluid dropdown" ng-model="kategori_tempat">
            <option value="">Kategori</option>
              <option value="kuliner">Kuliner</option>
              <option value="wisata">Wisata</option>
              <option value="olahraga">Olahraga</option>
              <option value="pasar">Pasar</option>
              <option value="tempat ibadah">Tempat Ibadah</option>
              <option value="perguruan tinggi">Perguruan Tinggi</option>
              <option value="hotel">Hotel</option>
          </select>
        </div>

        <div class="field">
          <label>Kecamatan</label>
          <select class="ui fluid dropdown" name="kecamatan_tempat" ng-model="kecamatan_tempat">
            <option value="">Kecamatan</option>
              <option value="beji">Beji</option>
              <option value="cilodong">Cilodong</option>
              <option value="cimanggis">Cimanggis</option>
              <option value="cinere">Cinere</option>
              <option value="cipayung">Cipayung</option>
              <option value="limo">Limo</option>
              <option value="pancoran mas">Pancoran Mas</option>
              <option value="sawangan">Sawangan</option>
              <option value="tapos">Tapos</option>
              <option value="bojongsari">Bojongsari</option>
              <option value="sukmajaya">Sukmajaya</option>
          </select>
        </div>

        </div>
        <div class="field">
          <label>Jam Opersional</label>
          <input name="jam_operasi_tempat" placeholder="Jam Operasional" type="text" ng-model="jam_operasi_tempat">
        </div>
        <div class="field">
          <label>No Telp</label>
          <input name="no_telp_tempat" placeholder="No Telp" type="text" ng-model="no_telp_tempat">
        </div>
        <div class="field">
          <label>Fasilitas</label>
          <textarea name="fasilitas_tempat" ng-model="fasilitas_tempat"></textarea>
        </div>
        <div class="field">
          <label>Menu Favorit</label>
          <textarea name="menu_fav_tempat" ng-model="menu_fav_tempat"></textarea>
        </div>
        <div class="field">
          <label>Kordinat Tempat</label>
          <input name="koordinat_tempat" placeholder="Kordinat Tempat" type="text" ng-model="koordinat_tempat">
        </div>
        <!-- <div class="field">
          <label>Unggah Gambar</label>
            <div class="ui five column grid">
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>
          <div class="column">
            <div class="blurring dimmable image">
              <div class="ui dimmer">
                <div class="content">
                  <div class="center">
                      <div class="ui inverted button">Unggah</div>
                  </div>  
                </div>
              </div>
                <div class="ui medium image">
                  <img src="../assets/images/kapok.jpg">
                </div>
            </div>
          </div>



          </div>
        </div>
          <br> -->
        <div class="field">
          <label>Username</label>
          <input name="username_partner" placeholder="Username" type="text" ng-model="username_partner">
        </div>
        <div class="field">
          <label>Password</label>
          <input name="password_partner" placeholder="Password" type="password" ng-model="password_partner">
        </div>
        <div class="field">
          <label>Nama Owner</label>
          <input name="nama_partner" placeholder="Nama Owner" type="text" ng-model="nama_partner">
        </div>
        <div class="field">
          <label>Email</label>
          <input name="email_partner" placeholder="Email" type="text" ng-model="email_partner">
        </div> 
        <div class="field">
          <label>No KTP</label>
          <input name="identitas_partner" placeholder="No KTP" type="text" ng-model="identitas_partner">
        </div>        
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="deskripsi_tempat" ng-model="deskripsi_tempat"></textarea>
        </div>        
        <div class="field">
          <label>Catatan</label>
          <textarea name="note_tempat" ng-model="note_tempat"></textarea>
        </div>
        <div class="ui checkbox">
          <input name="example" type="checkbox">
          <label>Dengan ini saya menyatakan telah mengisi form dengan data yang sebenar-benarnya dan menyetujui Syarat serta Ketentuan yang berlaku sebagai partner Kapok Hi-Depok.</label>
        </div>
        <br><br>
        <center><input class="ui positive button" name="submit" type="submit" ng-click="submitForm()" value="Simpan"></center>
      </form>
    </div>
      
</div>
  <br><br>
</body>

<footer>
    <?php
         include "../../wrapper/footer.php"
    ?>
</footer>
</html>